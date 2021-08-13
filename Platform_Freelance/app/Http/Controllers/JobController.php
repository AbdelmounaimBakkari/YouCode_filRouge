<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::online()->latest()->get();

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }


    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        // dd('oui, je suis ici');
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

        return view('jobs.show', ['job' => $job]);
    }


    public function show(Job $id)
    {
        return view('jobs.show', [
            'job' => $id
        ]);
    }


    public function edit(Job $id)
    {
        // return view('blog.edit')
        //     ->with('post', Post::where('slug', $slug)->first());
    }

    public function update(Request $request, Job $id)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'description' => 'required',
        // ]);

        // Post::where('slug', $slug)
        //     ->update([
        //     'title' => $request->input('title'),
        //     'description' => $request->input('description'),
        //     'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
        //     'user_id' => auth()->user()->id
        //     ]);

        // return redirect('/blog')
        //     ->with('message', 'Your post has been updated !');
    }


    public function destroy(Job $is)
    {
        // $post = Post::where('slug', $slug);
        // $post->delete();

        // return redirect('/blog')
        //     ->with('message', 'Your post has been deleted !');
    }
}
