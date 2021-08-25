@extends('layouts.app')

@section('content')

<div>

    <form action="{{ route('jobs.update', $job->id) }}" method="POST" class="form bg-white p-6 my-10 relative">
        @csrf   
        <h3 class="text-2xl text-gray-900 font-semibold">Lorem ipsum dolor</h3>
        <p class="text-gray-600"> Lorem consectetur adipisicing elit.</p>
        <input type="text" name="title" placeholder="Nom de votre mission" value="{{ $job->title }}" class="border p-2 w-full mt-3">
        <textarea name="description" cols="10" rows="3" placeholder="Description .." class="border p-2 mt-3 w-full">
        {{ $job->description }}
        </textarea>
        <input type="number" name="price" value="{{ $job->price / 100 }}" placeholder="prix en MAD" class="border p-2 w-full mt-3">
        <button type="submit" class="w-full mt-6 bg-blue-600 hover:bg-blue-500 text-white font-semibold p-3">Update la mission</button>
    </form>

</div>

@endsection