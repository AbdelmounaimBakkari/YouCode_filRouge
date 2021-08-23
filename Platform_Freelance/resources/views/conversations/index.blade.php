@extends('layouts.app')

@section('content')
<div class="h-screen px-2">
  <h1 class="text-3xl text-gray-800 py-7 mx-5">Vos conversations</h1>
  <div class="max-w-md mx-auto bg-gray-200 shadow-lg rounded-lg overflow-hidden overflow-y-auto md:max-w-3xl scrollbar">
    <div class="md:flex min-h-full h-96">
      <div class="w-full p-4">
        @if(count($conversations) < 1)
        <span></span>
        <div class="container mx-auto w-auto my-auto">
          <p class="text-4xl text-blue-800 uppercase font-bold text-center">vous n'avez pas encore des conversations..</p>      
        </div>
        @else
        <ul>
          @foreach($conversations as $conversation)
          <a href="{{ route('conversation.show', $conversation->id) }}" title="{{ $conversation->job->title }}" class="focus:outline-none">
            <li class="flex justify-between items-center bg-white mt-2 p-2 hover:shadow-lg rounded cursor-pointer">
              <div class="flex ml-2"> 
                <img src="{{asset('img/avatar.png')}}" class="rounded-full w-12 h-12">
                <div class="flex flex-col ml-2">
                  <span class="font-medium text-black"> {{ auth()->user()->id === $conversation->messages->last()->user->id ? $conversation->getToUser()->name : $conversation->messages->last()->user->name }}</span>
                  <span class="text-sm text-gray-400 truncate w-32 md:w-96">{{ Illuminate\Support\Str::limit($conversation->messages->last()->content, 50) }}</span>
                </div>
              </div>
              <div class="flex flex-col items-center">
                <span class="text-gray-300">{{ $conversation->messages->last()->created_at->diffForHumans() }}</span> 
              </div>
            </li>
          </a>
          @endforeach
        </ul>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection