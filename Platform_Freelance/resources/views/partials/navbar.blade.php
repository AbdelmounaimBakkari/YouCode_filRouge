<header class="sticky top-0 bg-gray-50 shadow-xl w-full flex flex-col md:flex-row justify-between items-center content-center z-50">

    <nav
      class="flex items-center justify-between flex-wrap p-3 w-full top-0"
      x-data="{ isOpen: false }"
      @keydown.escape="isOpen = false"
      :class="{ 'shadow-lg bg-gray-200' : isOpen , 'bg-gray-50' : !isOpen}"
    >

      <div class="flex items-center flex-shrink-0 text-white mr-6">
        <a href="/">
            <img src="{{ asset('img/logo.png') }}" alt="FreeCoder" class="w-80 ml-10 my-auto h-full">
        </a>
      </div>
      <livewire:search />


      <button
        @click="isOpen = !isOpen"
        type="button"
        class="block lg:hidden px-2 text-gray-500 hover:text-gray-800 focus:outline-none focus:text-blue-400"
        :class="{ 'transition transform-180': isOpen }"
      >
        <svg
          class="h-6 w-6 fill-current"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
        >
          <path
            x-show="isOpen"
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"
          />
          <path
            x-show="!isOpen"
            fill-rule="evenodd"
            d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"
          />
        </svg>
      </button>


      <div
        class="w-full flex-grow lg:flex lg:items-center lg:w-auto"
        :class="{ 'block shadow-3xl': isOpen, 'hidden': !isOpen }"
        @click.away="isOpen = false"
        x-show.transition="true"
      >
        <ul
          class="pt-6 lg:pt-0 list-reset lg:flex justify-end flex-1 items-center"
        >
          <li class="mr-3">
            <a
              class="inline-block py-2 px-4 text-gray-800 hover:text-white hover:bg-gray-800 rounded no-underline"
              href="{{ route('jobs.index')}}"
              @click="isOpen = false"
              >Services
            </a>
          </li>
          @guest
          <li class="mr-3">
            <a
              class="inline-block py-2 px-4 text-gray-800 hover:text-white hover:bg-gray-800 rounded no-underline"
              href="{{ route('login')}}"
              @click="isOpen = false"
              >Se connecter
            </a>
          </li>
          <li class="mr-3">
            <a
              class="inline-block py-2 px-4 text-gray-800 hover:text-white hover:bg-gray-800 rounded no-underline"
              href="{{ route('register')}}"
              @click="isOpen = false"
              >S'enregistrer
            </a>
          </li>
          @else
          <li class="mr-3">
            <a
              class="inline-block py-2 px-4 text-gray-800 hover:text-white hover:bg-gray-800 rounded no-underline"
              href="{{ route('conversation.index')}}"
              @click="isOpen = false"
              >Conversations
            </a>
          </li>
          <li class="mr-3">
            <a
              class="inline-block py-2 px-4 text-gray-800 hover:text-white hover:bg-gray-800 rounded no-underline"
              href="{{ route('home')}}"
              @click="isOpen = false"
              >Tableau de bord
            </a>
          </li>
          <li class="mr-3">
            <form id="logout_form" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="inline-block py-2 px-4 text-gray-800 hover:text-white hover:bg-gray-800 rounded no-underline" @click="isOpen = false">Se déconnecter</button>
            </form>
          </li>
          @endguest
        </ul>
      </div>
    </nav>

</header>