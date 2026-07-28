<nav x-data="{ open: false }" class="sticky top-0 z-50 bg-white/80 backdrop-blur-lg border-b border-gray-200 shadow-md">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between items-center h-16">

            <!-- Left -->

            <div class="flex items-center">

                <!-- Logo -->

                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-3">

                    <x-application-logo
                        class="block h-10 w-auto fill-current text-indigo-600" />

                    <span class="hidden md:block font-bold text-xl text-gray-800">
                        Task Manager
                    </span>

                </a>

                <!-- Desktop Menu -->

                <div class="hidden sm:flex items-center ml-10 space-x-3">

                    <x-nav-link
                        :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')">

                        🏠 Dashboard

                    </x-nav-link>

                    <x-nav-link
                        :href="route('tasks.index')"
                        :active="request()->routeIs('tasks.*')">

                        📋 Tasks

                    </x-nav-link>

                </div>

            </div>


            <!-- Desktop Right -->

            <div class="hidden sm:flex items-center">

                <x-dropdown align="right" width="56">

                    <x-slot name="trigger">

                        <button
                            class="flex items-center gap-3 bg-gray-100 hover:bg-indigo-50 px-4 py-2 rounded-xl transition">

                            <div
                                class="w-9 h-9 rounded-full bg-indigo-600 text-white flex items-center justify-center font-bold">

                                {{ strtoupper(substr(Auth::user()->name,0,1)) }}

                            </div>

                            <div class="text-left">

                                <p class="font-semibold text-gray-800">

                                    {{ Auth::user()->name }}

                                </p>

                                <p class="text-xs text-gray-500">

                                    {{ Auth::user()->email }}

                                </p>

                            </div>

                            <svg class="w-4 h-4 text-gray-600"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7" />

                            </svg>

                        </button>

                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link
                            :href="route('profile.edit')">

                            👤 Profile

                        </x-dropdown-link>

                        <form
                            method="POST"
                            action="{{ route('logout') }}">

                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">

                                🚪 Logout

                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>

            <!-- Mobile Hamburger -->

            <div class="sm:hidden">

                <button
                    @click="open = ! open"
                    class="p-2 rounded-lg hover:bg-gray-100">

                    <svg class="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            :class="{ 'hidden': open, 'inline-flex': !open }"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />

                        <path
                            :class="{ 'hidden': !open, 'inline-flex': open }"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />

                    </svg>

                </button>

            </div>

        </div>

    </div>

    <!-- Mobile Menu -->

    <div
        x-show="open"
        x-transition
        class="sm:hidden bg-white border-t">

        <div class="px-4 py-4 space-y-2">

            <x-responsive-nav-link
                :href="route('dashboard')"
                :active="request()->routeIs('dashboard')">

                🏠 Dashboard

            </x-responsive-nav-link>

            <x-responsive-nav-link
                :href="route('tasks.index')"
                :active="request()->routeIs('tasks.*')">

                📋 Tasks

            </x-responsive-nav-link>

        </div>

        <div class="border-t p-4">

            <div class="font-semibold">

                {{ Auth::user()->name }}

            </div>

            <div class="text-sm text-gray-500">

                {{ Auth::user()->email }}

            </div>

            <div class="mt-4 space-y-2">

                <x-responsive-nav-link
                    :href="route('profile.edit')">

                    👤 Profile

                </x-responsive-nav-link>

                <form
                    method="POST"
                    action="{{ route('logout') }}">

                    @csrf

                    <x-responsive-nav-link
                        :href="route('logout')"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">

                        🚪 Logout

                    </x-responsive-nav-link>

                </form>

            </div>

        </div>

    </div>

</nav>