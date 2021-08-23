<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::online()->latest()->get();
        Carbon::setLocale('fr');
        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }


    public function show(Job $id)
    {
        return view('jobs.show', [
            'job' => $id
        ]);
    }

    public function indexDashboard()
    {
        // dd(["", auth()->user(), Auth::user()]);
        $id = Auth::user()->id;
        $jobs = Job::online()->latest()->where('user_id', $id)->get();

        return view('dashboard.index', [
            'jobs' => $jobs
        ]);
    }


    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $job = Job::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => (float)$request->input('price') * 100,
            'user_id' => auth()->user()->id
        ]);

        // return view('jobs.show', ['job' => $job]);
        return redirect()->route('jobs.indexDashboard');
    }



    public function edit(Job $id)
    {
        return view('jobs.edit', [
            'job' => $id
        ]);
    }

    public function update(Request $request, Job $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $updatedJob = tap(Job::where('id', $id->id))
            ->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'price' => (float)$request->input('price') * 100,
            ])->first();

        // return view('jobs.show', ['job' => $updatedJob]);
        return redirect()->route('jobs.indexDashboard');
    }


    public function destroy(Job $id)
    {
        // $remove = Job::where('id', $job->id);
        // $remove
        // dd([$job->id]);
        $id->delete();
        return redirect()->route('jobs.indexDashboard');
    }
}
