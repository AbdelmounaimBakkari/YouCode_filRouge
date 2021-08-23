@extends('layouts.app')

@section('content')
<h1 class="text-3xl text-gray-800 py-7 mx-5">
</h1>

<div class="mx-auto bg-white rounded border overflow-hidden w-4/5 lg:w-3/5 md:w-3/5 shadow-md hover:shadow-lg">
    <div class="w-full p-3">
        <div class="flex">
            <div class="rounded-full h-10 w-10 bg-white flex items-center justify-center overflow-hidden">
                <img src="{{asset('img/avatar.png')}}">
            </div>
            <span class="pt-1 ml-2 font-bold text-lg text-gray-800">{{ $job->user->name }}</span>
        </div>
        <div class="mb-5 mt-7 mx-3">
            <h2 class="text-4xl font-bold text-blue-400">{{ $job->title }}</h2>
            <span class="text-sm text-gray-400">{{ $job->created_at }}</span>
        </div>
    </div>
    <div class="px-3 pb-2">
        <p class="text-justify text-lg text-gray-800">{{ $job->description }}</p>
    </div>
    <div class="p-3 flex justify-between">
        <span class=" text-2xl font-bold text-gray-600">
            {{ number_format($job->price / 100, 2, ',',' ') }} MAD
        </span>
        <section x-data="{open: false}" class="relative">
            <a class="bg-blue-300 hover:bg-transparent text-black hover:text-blue-500 rounded shadow hover:shadow-lg py-2 px-4 border border-transparent hover:border-blue-300 mx-10 mb-20 cursor-pointer" @click="open = !open">Clique ici pour soumettre une candidature &#8628;</a>
            <form class="mt-10 -ml-72 w-full max-w-md" x-show="open" x-cloak method="POST" action="{{ route('proposals.store', $job) }}">
                @csrf
                <textarea name="content" cols="90" rows="6" class="p-3 font-thin border border-blue-300 scrollbar"></textarea>
                <button type="submit" class="block bg-gray-800 hover:bg-blue-300 rounded shadow hover:shadow-lg text-white hover:text-black px-3 py-2">Soumettre ma lettre de motivation</button>
            </form>
        </section>
    </div>
</div>
<br>



{{-- :::::::::::: --}}
    {{-- <section x-data="{open: false}">
        <a class="bg-blue-300 hover:bg-transparent text-black hover:text-blue-300 rounded shadow hover:shadow-lg py-2 px-4 border border-transparent hover:border-blue-300 mx-10 mb-20" @click="open = !open">Clique ici pour soumettre une candidature</a>
        <form class="w-full max-w-md" x-show="open" x-cloak method="POST" action="{{ route('proposals.store', $job) }}">
            @csrf
            <textarea name="content" cols="90" rows="6" class="p-3 font-thin border border-green-300"></textarea>
            <button type="submit" class="block bg-green-700 text-white px-3 py-2">Soumettre ma lettre de motivation</button>
        </form>
    </section> --}}
@endsection