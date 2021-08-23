<header class="sticky top-0 bg-gray-50 shadow-xl w-full flex flex-col md:flex-row justify-between items-center py-5 z-50">
    <div>
        <a class="text-gray-800 no-underline hover:no-underline font-bold text-2xl lg:text-4xl ml-6" href="/"><span class="text-blue-400">&#10094; &#10095;</span> FreeCoder</a>
    </div>

    <nav>
        <livewire:search />
        <a href="{{ route('jobs.index')}}"class="mr-5 p-1 hover:text-white hover:font-semibold border rounded border-transparent hover:bg-gray-800 hover:border-blue-400">Nos missions</a>
        @guest
            <a href="{{ route('login')}}"class="mr-5 p-1 hover:text-white hover:font-semibold border rounded border-transparent hover:bg-gray-800 hover:border-blue-400">Se connecter</a>
            <a href="{{ route('register')}}"class="mr-5 p-1 hover:text-white hover:font-semibold border rounded border-transparent hover:bg-gray-800 hover:border-blue-400">S'enregistrer</a>
        @else
            <a href="{{ route('conversation.index')}}"class="mr-5 p-1 hover:text-white hover:font-semibold border rounded border-transparent hover:bg-gray-800 hover:border-blue-400">Mes conversations</a>
            <a href="{{ route('home')}}"class="mr-5 p-1 hover:text-white hover:font-semibold border rounded border-transparent hover:bg-gray-800 hover:border-blue-400">Tableau de bord</a>
            <a href="{{ route('logout')}}"class="mr-5 p-1 hover:text-white hover:font-semibold border rounded border-transparent hover:bg-gray-800 hover:border-blue-400" onclick="event.preventDefault();document.getElementById('logout_form').submit();">Se déconnecter</a>
            <form id="logout_form" method="POST" action="{{ route('logout') }}" style="display: none;">
                @csrf
            </form>
        @endguest
    </nav>
</header>