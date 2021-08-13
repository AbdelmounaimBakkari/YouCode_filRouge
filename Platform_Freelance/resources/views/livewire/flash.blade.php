<div x-data="{ open: false }" @flash-message.window="open = true; setTimeout(()=> open = false, 5000);">
    <div x-show="open" class="border-2 {{ $type ? $colors[$type] : ''}} font-semibold px-1 py-2 rounded">
        {{ $message }} 
    </div>
</div>
