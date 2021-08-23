<div class="flex h-screen antialiased text-gray-800">
    <div class="flex flex-row h-full w-full overflow-x-hidden">
        <div class="flex flex-col py-3 pl-6 pr-2 w-64 bg-white flex-shrink-0">
            <div class="flex flex-col items-center bg-indigo-100 border border-gray-200 mt-4 w-full py-6 px-4 rounded-lg">
                <div class="h-20 w-20 rounded-full border overflow-hidden">
                    <img src="{{asset('img/avatar.png')}}" alt="Avatar" class="h-full w-full">
                </div>
                <div class="text-lg font-semibold mt-2 mb-4">
                    {{$conversation->from === auth()->user()->id ?$conversation->getToUser()->name : $conversation->getFromUser()->name}} 
                </div> 
                <div class="bg-blue-200 px-4 py-2 rounded-xl">
                    <p class="underline mt-4">Service :</p>
                    <p class="text-lg text-gray-800 font-semibold mt-2">{{ $conversation->job->title }}</p>
                    <p class="text-lg text-gray-800 font-semibold text-right my-4">{{ number_format($conversation->job->price / 100, 2, ',',' ') }} MAD</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col flex-auto h-5/6 p-6">
            <div class="flex flex-col flex-auto flex-shrink-0 rounded-2xl bg-gray-100 h-full p-4">
                <div class="flex flex-col h-full overflow-auto mb-4 scrollbar"
                x-data="{ scroll: () => { $el.scrollTo(0, $el.scrollHeight); }}" 
                x-init="scroll()">
                    <div class="flex flex-col h-full">
                        <div class="grid grid-cols-12 gap-y-2">
                            @foreach($conversation->messages as $message)
                            <div class="{{$message->user->id === auth()->user()->id ? 'col-start-6 col-end-13 p-3 rounded-lg' : 'col-start-1 col-end-8 p-3 rounded-lg'}}">
                                <div class="{{$message->user->id === auth()->user()->id ? 'flex items-center justify-start flex-row-reverse' : 'flex flex-row items-center'}}">
                                    <div class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0">
                                    {{substr($message->user->name, 0,1)}}
                                    </div>
                                    <div class="{{$message->user->id === auth()->user()->id ? 'relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl' : 'relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl'}}">
                                        <div>
                                            {{ $message->content }}
                                        </div>
                                    </div>
                                </div>
                                {{-- <div>{{ $message->created_at }} </div> --}}
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="flex flex-row items-center h-16 rounded-xl bg-white w-full px-4">
                    <div class="flex-grow ml-4">
                        <div class="relative w-full">
                            <input wire:keydown.enter.prevent="sendMessage" wire:model="message"
                            type="text" class="flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  