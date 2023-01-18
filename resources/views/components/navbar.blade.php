<nav class="fixed top-0 left-0 z-10 flex items-center bg-white w-full shadow-md px-5 lg:px-32">
    <div class="container">
        <div class="relative flex items-center justify-between py-3">
            <div class="font-semibold lg:text-xl text-md hidden lg:contents">
                <a href="{{ route('index') }}">
                    <h1>Muhammadiyah</h1>
                </a>
            </div>
            <div class="md:flex">
                <form action="{{ route('search') }}" method="get">
                    <label class="relative block">
                        <span class="sr-only">Search</span>
                        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="0.50"
                                class="w-6 h-6 stroke-slate-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </span>
                        <input
                            class="placeholder:text-slate-400 block bg-white lg:w-96 w-64 border border-slate-300 rounded-full py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-primary focus:ring-1 sm:text-sm"
                            placeholder="Search for anything..." type="text" name="search"/>
                    </label>
                </form>
            </div>
            @auth
                <div class="font-semibold text-sm lg:text-md flex justify-between gap-5 items-center">
                    <a href="#" class="relative inline-flex items-center text-sm font-medium text-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 fill-slate-500">
                            <path
                                d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
                        </svg>
                        <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-emerald-400 border-2 border-white rounded-full -top-2 -right-2 dark:border-gray-900">10</div>
                    </a>

                    <div class="dropdown cursor-pointer">
                        {{ Auth::user()->name }}
                        <div class="dropdown-content">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="flex">
                    <a href="{{ route('login') }}"><button
                            class="px-5 py-2 ring-emerald-400 rounded-full font-semibold text-white bg-emerald-400 hover:bg-emerald-600">SIGN
                            IN</button> </a>
                    <a href="{{ route('register') }}">
                        <button
                            class="font-semibold px-5 py-2 rounded-full ring-emerald-400 text-emerald-400 ml-3 ring-1">SIGN
                            UP</button>
                    </a>
                </div>
            @endauth
        </div>
    </div>
</nav>
