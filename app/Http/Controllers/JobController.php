<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::latest()->with(['employer', 'tags'])->get()->groupBy('featured');

        $featuredJobs = $jobs->get(1, collect()); // Get featured jobs or an empty collection
        $nonFeaturedJobs = $jobs->get(0, collect()); // Get non-featured jobs or an empty collection

        $tags = Tag::all(); // Only retrieve tags without eager loading jobs

        return view('jobs.index', [
            'jobs' => $nonFeaturedJobs,
            'featuredJobs' => $featuredJobs,
            'tags' => $tags,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     * Validate the request attributes and create a new job with the validated attributes.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([ //validate the request attributes with the following rules...
            'title' => ['required'],
            'salary' => ['required'],
            'location' => ['required'],
            'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
            'url' => ['required', 'active_url'],
            'tags' => ['nullable'],
        ]);

        $attributes['featured'] = $request->has('featured'); //if the request has a featured key, set the featured attribute to true

        $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, 'tags')); //create a job with all attributes except tags

        if ($attributes['tags'] ?? false) { //if the tags attribute exists, then do the following...
            foreach (explode(',', $attributes['tags']) as $tag) { //for each tag in the tags attribute, explode the tags attribute into an array of tags separated by commas and do the following...
                $job->tag($tag);
            }
        }

        return redirect('/');
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
{
    $request->validate([
        'title' => 'required',
        'salary' => 'required',
        'location' => 'required',
        'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
        'url' => ['required', 'active_url'],
        'tags' => 'nullable',
    ]);

    // Update the job with the validated data except for tags
    $job->update($request->only(['title', 'salary', 'location', 'schedule', 'url']));

    // Update the tags if provided
    if ($request->has('tags')) {
        // Get the tag names from the request
        $tagNames = explode(',', $request->input('tags'));

        // Retrieve or create the tags and get their IDs
        $tagIds = [];
        foreach ($tagNames as $tagName) {
            $tag = Tag::firstOrCreate(['name' => trim($tagName)]);
            $tagIds[] = $tag->id;
        }

        // Sync the job's tags with these IDs
        $job->tags()->sync($tagIds);
    }

    return redirect('/')->with('success', 'Job updated successfully');
}

    public function hide(Job $job)
    {
        // Toggle the hidden state
        $job->hidden = !$job->hidden;
        $job->save();

        // Return a JSON response indicating success
        return response()->json(['success' => true]);
    }


    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/')->with('success', 'Job deleted successfully');
    }
}
