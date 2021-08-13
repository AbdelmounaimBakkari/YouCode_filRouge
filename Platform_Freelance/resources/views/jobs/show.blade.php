@extends('layouts.app')

@section('content')
    <h1 class="text-3xl text-green-500 mb-3">
        Mission :
    </h1>

    <div class="px-3 py-5 mb-3 shadow-sm hover:shadow-md rounded border border-gray-200 max-w-xl mx-auto">
        <h2 class="text-xl font-bold text-green-800">{{ $job->title }}</h2>
        <p class="text-md text-gray-800">{{ $job->description }}</p>
        <span class=" text-sm text-gray-600">{{ number_format($job->price / 100, 2, ',',' ') }} MAD</span>
    </div>

    <section x-data="{open: false}">
        <a class="text-green-500 cursor-pointer" @click="open = !open">Clique ici pour soumettre une candidature</a>
        <form class="w-full max-w-md" x-show="open" x-cloak method="POST" action="{{ route('proposals.store', $job) }}">
            @csrf
            <textarea name="content" cols="90" rows="6" class="p-3 font-thin border border-green-300"></textarea>
            <button type="submit" class="block bg-green-700 text-white px-3 py-2">Soumettre ma lettre de motivation</button>
        </form>
    </section>
@endsection