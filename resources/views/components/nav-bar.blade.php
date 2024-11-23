@props([
'unauthorisedUsers'
])

<div>
    <nav x-data="{ open: false }" class="bg-gray-100 shadow">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex justify-start md:justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button -->
                    <button @click="open = !open" class="z-50 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out" x-bind:aria-label="open ? 'Close main menu' : 'Main menu'" aria-label="Main menu" x-bind:aria-expanded="open">
                        <!-- Icon when menu is closed. -->
                        <svg x-state:on="Menu open" x-state:off="Menu closed"
                             :class="{ 'hidden': open, 'block': !open }" class="block h-6 w-6" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <!-- Icon when menu is open. -->
                        <svg x-state:on="Menu open" x-state:off="Menu closed" :class="{ 'hidden': !open, 'block': open }"
                             class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="relative flex-1 flex items-center justify-end mr-4 sm:mr-0 sm:items-stretch sm:justify-start">
                    <div class="flex-shrink-0 flex items-center">
                        <div class="text-indigo-600 text-2xl font-extrabold"><a href="/">EPS Inspect</a></div>
                    </div>
                    @auth
                        <div class="relative hidden sm:ml-6 sm:flex">
                            <a href="/menu" class="inline-flex items-center px-3 pt-1 border-b-2
                                        {{request()->route()->named('welcome.menu')
                                        ? 'border-indigo-500 text-gray-900 '
                                        : 'border-transparent text-gray-500 '}}
                                text-sm font-medium leading-5 focus:outline-none focus:border-indigo-700 transition
                                duration-150 ease-in-out">
                                Menu
                            </a>

                            <a href="{{route('inspections')}}" class="inline-flex items-center px-3 pt-1
                            border-b-2
                                {{request()->route()->named('inspections*')
                                ? 'border-indigo-500 text-gray-900 '
                                : 'border-transparent text-gray-500 '}}
                                text-sm font-medium leading-5 focus:outline-none focus:border-indigo-700 transition
                                duration-150 ease-in-out">
                                Inspections
                            </a>
                            @if(auth()->user()->admin)
                                <a href="{{route('clients')}}" class="inline-flex items-center px-3 pt-1
                                border-b-2
                                    {{request()->route()->named('clients*')
                                    ? 'border-indigo-500 text-gray-900 '
                                    : 'border-transparent text-gray-500 '}}
                                    text-sm font-medium leading-5 focus:outline-none focus:border-indigo-700 transition
                                    duration-150 ease-in-out">
                                    Clients
                                </a>
                                <a href="{{route('users')}}" class="inline-flex items-center px-3 pt-1
                                border-b-2
                                    {{request()->route()->named('users*')
                                    ? 'border-indigo-500 text-gray-900 '
                                    : 'border-transparent text-gray-500 '}}
                                    text-sm font-medium leading-5 focus:outline-none focus:border-indigo-700 transition
                                    duration-150 ease-in-out">
                                    Users
                                </a>
                                <a href="{{route('api_admin')}}" class="inline-flex items-center px-3 pt-1 border-b-2
                                    {{request()->route()->named('api_admin*')
                                    ? 'border-indigo-500 text-gray-900 '
                                    : 'border-transparent text-gray-500 '}}
                                    text-sm font-medium leading-5 focus:outline-none focus:border-indigo-700 transition
                                    duration-150 ease-in-out">
                                    API Admin
                                </a>
                                <a href="{{ route('setup') }}" class="inline-flex items-center px-3 pt-1 border-b-2
                                    {{request()->route()->named('setup')
                                    ? 'border-indigo-500 text-gray-900 '
                                    : 'border-transparent text-gray-500 '}}
                                    text-sm font-medium leading-5 focus:outline-none focus:border-indigo-700 transition
                                    duration-150 ease-in-out">
                                    Setup
                                </a>
                            @endif
                        </div>
                    @endauth
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    @auth
                        <div class="inline-flex items-center px-1 pt-1 text-xs md:text-sm font-medium leading-5
                        text-gray-900 hidden md:block">{{auth()->user()->name}}</div>
                        <div class="ml-8 inline-flex items-center px-1 pt-1 text-xs md:text-sm font-medium leading-5
                        text-gray-900 hidden md:block">
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                         document.getElementById('logout-form1').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form1" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    @else
                        <div class="inline-flex items-center px-1 pt-1 text-xs md:text-sm font-medium leading-5
                            text-gray-900 hidden md:block">
                            <a href="/register" class="">Register</a>
                        </div>
                        <div class="ml-8 inline-flex items-center px-1 pt-1 text-xs md:text-sm font-medium leading-5
                            text-gray-900 hidden md:block">
                            <a href="/login" class="">Login</a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>

        <div x-description="Mobile menu, toggle classes based on menu state." x-state:on="Menu open"
             x-state:off="Menu closed" :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            <div class="pt-2 pb-4">
                @auth
                    <a href="" class="block pl-3 pr-4 py-2 border-l-4
                        {{request()->route()->named('welcome')
                        ? 'border-indigo-500 text-gray-900 text-indigo-700 bg-indigo-50 '
                        : 'border-transparent text-gray-600 '}} text-base font-medium  focus:outline-none
                        focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150
                        ease-in-out">
                        Inspections
                    </a>
                    @if(auth()->user()->admin)
                        <a href="{{route('clients')}}" class="block pl-3 pr-4 py-2 border-l-4
                            {{request()->route()->named('welcome')
                            ? 'border-indigo-500 text-gray-900 text-indigo-700 bg-indigo-50 '
                            : 'border-transparent text-gray-600 '}} text-base font-medium  focus:outline-none
                            focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150
                            ease-in-out">
                            Clients
                        </a>
                        <a href="{{route('users')}}" class="block pl-3 pr-4 py-2 border-l-4
                            {{request()->route()->named('welcome')
                            ? 'border-indigo-500 text-gray-900 text-indigo-700 bg-indigo-50 '
                            : 'border-transparent text-gray-600 '}} text-base font-medium  focus:outline-none
                            focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150
                            ease-in-out">
                            Users
                        </a>
                        <a href="{{route('api_admin')}}" class="block pl-3 pr-4 py-2 border-l-4
                            {{request()->route()->named('api_admin')
                            ? 'border-indigo-500 text-gray-900 text-indigo-700 bg-indigo-50 '
                            : 'border-transparent text-gray-600 '}} text-base font-medium  focus:outline-none
                            focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150
                            ease-in-out">
                            API Admin
                        </a>
                        <a href="{{ route('setup') }}" class="block pl-3 pr-4 py-2 border-l-4
                            {{request()->route()->named('setup')
                            ? 'border-indigo-500 text-gray-900 text-indigo-700 bg-indigo-50 '
                            : 'border-transparent text-gray-600 '}} text-base font-medium  focus:outline-none
                            focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150
                            ease-in-out">
                            Setup
                        </a>
                    @endif
                    <div class="mt-1 block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium
                    text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none
                    focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form2').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form2" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                @else
                    <a href="/register" class="mt-1 block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">Register</a>
                    <a href="/login" class="mt-1 block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">Login</a>
                @endauth

            </div>
        </div>
    </nav>
</div>
