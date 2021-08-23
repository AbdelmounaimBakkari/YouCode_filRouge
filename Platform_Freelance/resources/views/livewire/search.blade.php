<div class="inline-block" x-data="{ open: true }">
    <input @click.away="{ open = false; @this.resetIndex() }" @click="{ open = true }" class="bg-gray-200 text-gray-700 border-2 focus:outline-none placeholder-gray-500 px-4 py-1 mr-5 rounded-full w-72" placeholder=" Rechercher une mission ..." wire:model="query"
    wire:keydown.prevent.arrow-down="incrementIndex"
    wire:keydown.prevent.arrow-up="decrementIndex"
    wire:keydown.backspace="resetIndex"
    wire:keydown.enter.prevent="showJob"
    >

    @if (strlen ($query) > 2)
    <div class="absolute bg-gray-100 text-md w-56 mt-1 rounded" x-show="open">
        @if (count($jobs) > 0)
            @foreach ($jobs as $index => $job)
                <p class="py-1 px-2 {{ $index === $selectedIndex ? 'text-green-500' : '' }}">{{ $job->title }}</p>
            @endforeach
        @else  
            <span class="text-red-400 py-1 px-2"> 0  résultats pour "{{ $query }}"</span>  
        @endif
    </div>
    @endif

</div>