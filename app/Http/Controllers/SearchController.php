<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)//this is a single action controller. It has only one method, __invoke, which is called when the controller is invoked.
    {
       $jobs = Job::query()->with(['employer', 'tags'])
            ->where('title', 'like', '%' . $request->input('q') . '%')
            ->orWhere('salary', 'like', '%' . $request->input('q') . '%')
            ->get();

            return view('jobs.results', ['jobs' => $jobs]);
    }
}
