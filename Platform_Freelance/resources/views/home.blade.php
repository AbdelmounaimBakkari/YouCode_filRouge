@extends('layouts.app')

@section('content')

<!-- component -->
<!-- This is an example component -->
<div x-data="{ clkSide : 'favorites' }" class="flex flex-row h-full">
    <!-- Sidebar -->
    <nav class="bg-gray-900 w-20 justify-between flex flex-col ">
        <div class="mt-10 mb-10">
            <a>
                <img src="{{asset('img/avatar.png')}}" class="rounded-full w-10 h-10 mb-4 mx-auto">
            </a>
            <div class="mt-20">
                <ul>
                    <li @click="clkSide = 'favorites'" class="mb-10">
                        <div>
                            <svg class="fill-current h-5 w-5 mx-auto text-gray-300 hover:text-blue-400" :class="{ 'text-blue-400': clkSide === 'favorites'}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </li>

                    @if(auth()->user()->role_id === 1)

                    <li @click="clkSide = 'services'" class="mb-10">
                        <span>
                            <svg class="fill-current h-5 w-5 mx-auto text-gray-300 hover:text-blue-400" :class="{ 'text-blue-400': clkSide === 'services'}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
                            </svg>
                        </span>
                    </li>

                    @elseif(auth()->user()->role_id === 2)

                    <li @click="clkSide = 'propositions'" class="mb-10">
                        <span>
                            <svg class="fill-current h-5 w-5 mx-auto text-gray-300 hover:text-blue-400" :class="{ 'text-blue-400': clkSide === 'propositions'}" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm14 1a1 1 0 11-2 0 1 1 0 012 0zM2 13a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2zm14 1a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </li>

                    @endif

                </ul>
            </div>
        </div>
    </nav>
    <div class="px-16 py-4 text-gray-700 bg-gray-200 h-screen w-screen">
        <!-- Content -->
        <h1 class="text-3xl text-green-500">Tableau de bord</h1>
        <div class="flex flex-col md:flex-row">

            @if(auth()->user()->role_id === 1)
            <section x-show="clkSide === 'services'" class="text-gray-800 w-full h-srceen">
                <div x-data="{ clkJob : '' }" class="flex flex-row gap-5 p-20 h-screen">
                    <div class="w-1/3 h-4/5 rounded-lg bg-gray-300 p-5 overflow-auto scrollbar">
                        <div class="flex justify-between mb-5">
                            <h5 class="font-semibold text-2xl">Vos Services ({{ auth()->user()->jobs()->count() }})</h5>
                            <a href="{{route('jobs.indexDashboard')}}" class="rounded p-1 uppercase bg-gray-800 hover:bg-blue-400 text-white hover:text-black ">Gérer</a>
                        </div>
                        @foreach(auth()->user()->jobs as $job)
                        <div @click="clkJob = '{{ $job->id }}'" class="mb-3 shadow-sm hover:shadow-xl p-2 cursor-pointer">
                            <div class="flex mb-1">
                                <span class="text-blue-400 text-3xl font-semibold mx-2">❯</span>
                                <h3 class="text-2xl font-semibold">{{ $job->title }}</h3>
                            </div>
                            <p class="text-xl font-semibold ml-5">
                                ce service a <span class="font-bold">({{ $job->proposals->count() }})</span> @choice('demande|demandes', $job->proposals)
                            </p>
                            <div class="mt-2 bg-blue-400 h-1 rounded"></div>
                        </div>
                        @endforeach
                    </div>
                    <div class="w-2/3 h-4/5 bg-gray-300 rounded-lg p-5 overflow-auto scrollbar">
                        <div class="p-3">
                            <p class="text-gray-400">Espace d'affichage les demende de vos services</p>
                            <div class="bg-gray-400 h-px w-full"></div>
                        </div>
                        @foreach(auth()->user()->jobs as $job)
                        <div x-show="clkJob === '{{ $job->id }}'" class="p-5">
                        @foreach($job->proposals as $proposal)
                        <div class="flex items-center">
                            <img src="{{asset('img/avatar.png')}}" alt="{{$proposal->user->name}}" class="w-10 h-10 rounded-full">
                            <p class="text-2xl font-semibold ml-5">{{ $proposal->user->name }}</p>
                        </div>
                        <div>
                            <div class="bg-gray-400 bg-opacity-25 h-px mt-2"></div>
                            <p class="text-xl text-justify font-medium px-7 py-2">{{ $proposal->coverLetter->content }}</p>
                            <div class="bg-gray-400 bg-opacity-25 h-px mt-2"></div>
                        </div>
                        <div class="flex justify-end mx-14">
                            @if ($proposal->validated)
                            <a class="bg-blue-400 border border-gray-800 text-xs p-1 my-2 inline-block text-black rounded">Déjà validé</a>
                            @else
                            <a href="{{ route('confirm.proposal', [$proposal->id])}}" class="bg-gray-800 text-xs py-2 px-2 mt-2 mb-3 inline-block text-white hover:bg-blue-400 hover:text-black duration-200 transition rounded">Valider le demande</a>
                            @endif
                        </div>
                        <div class="mt-2 mb-4 bg-blue-400 h-0.5 rounded"></div>
                        @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            @elseif(auth()->user()->role_id === 2)
            <section x-show="clkSide === 'propositions'" class="text-gray-800 w-full">
                <div x-data="{ clkDemande : '' }" class="flex flex-row gap-5 p-20 h-screen">
                    <div class="w-1/3 h-4/5 rounded-lg bg-gray-300 p-5 overflow-auto scrollbar">
                        <div class="flex justify-between mb-5">
                            <h5 class="font-semibold text-2xl">Vos demandes ({{ auth()->user()->proposals->count() }})</h5>
                        </div>
                        @foreach(auth()->user()->proposals as $proposal)
                        <div @click="clkDemande = '{{ $proposal->id }}'" class="mb-3 shadow-sm hover:shadow-xl p-2 cursor-pointer">
                            <div class="flex mb-1">
                                <span class="text-blue-400 text-3xl font-semibold mx-2">❯</span>
                                <h3 class="text-2xl font-semibold"> {{$proposal->job->title}} </h3>
                            </div>
                            <div class="flex justify-between">
                                <p class="text-xl"> de: {{$proposal->job->user->name}} </p>
                                <p class="text-xl"> {{number_format($proposal->job->price / 100, 2, ',',' ')}} MAD </p>
                            </div>
                            <div class="mt-2 bg-blue-400 h-1 rounded"></div>
                        </div>
                        @endforeach
                    </div>
                    <div class="w-2/3 h-4/5 bg-gray-300 rounded-lg p-5 overflow-auto scrollbar">
                        <div class="p-3">
                            <p class="text-gray-400">Espace d'affichage vos messages de demandes</p>
                            <div class="bg-gray-400 h-px w-full"></div>
                        </div>
                        
                        @foreach(auth()->user()->proposals as $proposal)
                        <div x-show="clkDemande === '{{ $proposal->id }}'" class="p-5">
                            <div class="p-5 my-2">
                                <p class="text-ml font-semibold"> {{ $proposal->coverLetter->content }} </p>
                                <div class="bg-gray-400 bg-opacity-25 h-px mt-2"></div>
                            </div>
                            <div class="flex justify-end mx-14">
                                @if ($proposal->validated)
                                <a class="bg-blue-400 border border-gray-800 text-xs p-1 my-2 inline-block text-black rounded">Demande validé</a>
                                @else
                                <span  class="bg-gray-800 text-xs py-2 px-2 mt-2 mb-3 inline-block text-white rounded">Demande pas encore validé</span>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            @endif
            <section x-show="clkSide === 'favorites'" class="text-gray-800 w-full">
                <div x-data="{ clkJob : '' }" class="flex flex-row gap-5 p-20 h-screen">
                    <div class="w-full h-4/5 rounded-lg bg-gray-300 p-8 overflow-auto scrollbar">
                        <div class="flex justify-between mb-5">
                            <h5 class="font-bold text-3xl">Vos favorites services ({{ auth()->user()->likes()->count() }})</h5>
                        </div>
                        <div class="flex flex-wrap gap-4">
                        @foreach(auth()->user()->likes as $like)
                            <a href="{{ route('jobs.show', [$like->id]) }}" class="p-5 w-5/12 mx-auto bg-blue-400 bg-opacity-50 rounded-md overflow">
                                <p class="font-semibold text-2xl">{{ $like->title }}</p>
                                <div class="flex justify-between">
                                    <p class="text-xl">de: {{ $like->user->name }}</p>
                                    <p class="text-xl">{{ number_format($like->price / 100, 2, ',',' ') }} MAD</p>
                                </div>
                                <div class="bg-gray-400 bg-opacity-25 h-px mt-2"></div>
                            </a>
                        @endforeach
                        </div>
                    </div>
                </div>

            </section>
            
        </div>
    </div>
</div>

@endsection