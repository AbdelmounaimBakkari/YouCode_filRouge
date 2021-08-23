<div class="text-lef lol">
    <div class="py-6">
        <div class="flex max-w-md h-80 bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="w-1/3 bg-blue-400">
            </div> 
            <div class="w-2/3 p-4">
                <div class="flex justify-between items-start">
                    <h1 title="{{ $job->title }}" class="text-gray-900 font-bold text-2xl overflow-y-auto h-24 scrollbar">
                        {{ $job->title }}
                    </h1>
                    <button class="h-5 w-5 text-gray-600" wire:click="addLike">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="{{$job->isLiked() ? 'blue' : 'none'}}" viewBox="0 0 24 24" stroke="blue">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </button>   
                </div>
                <p class="mt-2 text-gray-600 text-sm dscoverflow">
                    {{ $job->description }}
                </p>
                <div class="flex justify-between item-center mt-5">
                    <p>par: {{ $job->user->name }}</p>
                    <span class="mt-3">{{ $job->created_at->diffForHumans()}}</span>
                </div>
                <div class="flex item-center justify-between mt-4">
                    <h1 class="text-gray-700 font-bold text-xl">{{ number_format($job->price / 100, 2, ',',' ') }} MAD</h1>
                    <button class="px-3 py-2 bg-gray-800 text-white text-xs font-bold uppercase rounded">
                        <a href="{{ route('jobs.show', $job->id) }}">Consuler</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


