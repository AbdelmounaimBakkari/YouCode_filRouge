@extends('layouts.app')

@section('content')
    <h1 class="text-3xl text-gray-800 py-10 px-5">
        Nos dernières missions
    </h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mx-7">
    @foreach ($jobs as $job)
        <livewire:job :job="$job" />
    @endforeach
    </div>
    
@endsection