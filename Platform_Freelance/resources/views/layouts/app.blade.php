<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FreeCoder</title>
        <link rel="icon" type="image/png" href="{{ asset('img/icon.png') }}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        @livewireStyles
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.2/dist/alpine.min.js" defer></script>

    </head>
    <body class="bg-white scrollbar">
      <div class="mx-auto">
        @include('partials.navbar')
        <div class="sticky top-0">
          <livewire:flash /> 
        </div>
        <div class="min-h-screen">
          @yield('content')
        </div>
        @include('partials.footer')
      </div>
      @livewireScripts
    </body>
</html>