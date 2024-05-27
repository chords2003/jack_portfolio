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
}
