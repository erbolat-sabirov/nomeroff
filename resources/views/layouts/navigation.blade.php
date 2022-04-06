<nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        Дашборд
                    </x-nav-link>

                    <x-nav-link :href="route('cars.index')" :active="request()->routeIs('cars.index')">
                        Клиенты
                    </x-nav-link>
                    <x-nav-link :href="route('managers.index')" :active="request()->routeIs('managers.index')">
                        Менеджеры
                    </x-nav-link>

                    <div class="h-screen flex justify-center">
                        <div x-data="{show: false}" @click.away="show = false"> <button @click="show = ! show" class="mt-4 block rounded-lg px-1 text-sm py-2 overflow-hidden text-gray-300 hover:text-gray-500">
                                <div class="flex justify-between"> <span>Услуги</span> <svg class="fill-current text-gray-200" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                        <path d="M7 10l5 5 5-5z" />
                                        <path d="M0 0h24v24H0z" fill="none" /></svg> </div>
                            </button>
                            <div x-show="show" class="mt-2 py-2 bg-white rounded-lg shadow-xl absolute">
                                <a href="{{ route('services.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">Комплексные услуги</a>
                                <a href="{{ route('service-items.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">Услуги</a>
                            </div>
                        </div>
                    </div>

                    <div class="h-screen flex justify-center">
                        <div x-data="{show: false}" @click.away="show = false"> <button @click="show = ! show" class="mt-4 block rounded-lg px-1 text-sm py-2 overflow-hidden text-gray-300 hover:text-gray-500">
                                <div class="flex justify-between"> <span>Машины</span> <svg class="fill-current text-gray-200" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                        <path d="M7 10l5 5 5-5z" />
                                        <path d="M0 0h24v24H0z" fill="none" /></svg> </div>
                            </button>
                            <div x-show="show" class="mt-2 py-2 bg-white rounded-lg shadow-xl absolute">
                                <a href="{{ route('car-types.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">Тип</a>
                                <a href="{{ route('car-brands.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">Бренд</a>
                                <a href="{{ route('car-models.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">Модель</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-300 hover:text-gray-500 hover:border-gray-300 focus:outline-none focus:text-gray-500 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                Выход
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium"
                aria-current="page">Dashboard</a>

            <a href="#"
                class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Team</a>

            <a href="#"
                class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Projects</a>

            <a href="#"
                class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendar</a>

            <a href="#"
                class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Reports</a>
        </div>
        <div class="pt-4 pb-3 border-t border-gray-700">
            <div class="flex items-center px-5">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full"
                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium leading-none text-white">Tom Cook</div>
                    <div class="text-sm font-medium leading-none text-gray-400">tom@example.com</div>
                </div>
                <button type="button"
                    class="ml-auto bg-gray-800 flex-shrink-0 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                    <span class="sr-only">View notifications</span>
                    <!-- Heroicon name: outline/bell -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </button>
            </div>
            <div class="mt-3 px-2 space-y-1">
                <a href="#"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Your
                    Profile</a>

                <a href="#"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Settings</a>

                <a href="#"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Sign
                    out</a>
            </div>
        </div>
    </div>
</nav>
{{-- <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        Дашборд
                    </x-nav-link>
                    <x-nav-link :href="route('cars.index')" :active="request()->routeIs('managers.index')">
                        Клиенты
                    </x-nav-link>
                    <x-nav-link :href="route('managers.index')" :active="request()->routeIs('managers.index')">
                        Менеджеры
                    </x-nav-link>
                    <div class="h-screen flex justify-center">
                        <div x-data="{show: false}" @click.away="show = false"> <button @click="show = ! show" class="mt-4 block rounded-lg px-1 text-sm py-2 overflow-hidden text-gray-500 hover:text-gray-700">
                                <div class="flex justify-between"> <span>Услуги</span> <svg class="fill-current text-gray-200" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                        <path d="M7 10l5 5 5-5z" />
                                        <path d="M0 0h24v24H0z" fill="none" /></svg> </div>
                            </button>
                            <div x-show="show" class="mt-2 py-2 bg-white rounded-lg shadow-xl absolute">
                                <a href="{{ route('services.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">Комплексные услуги</a>
                                <a href="{{ route('service-items.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">Услуги</a>
                            </div>
                        </div>
                    </div>
                    <div class="h-screen flex justify-center">
                        <div x-data="{show: false}" @click.away="show = false"> <button @click="show = ! show" class="mt-4 block rounded-lg px-1 text-sm py-2 overflow-hidden text-gray-500 hover:text-gray-700">
                                <div class="flex justify-between"> <span>Машины</span> <svg class="fill-current text-gray-200" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                                        <path d="M7 10l5 5 5-5z" />
                                        <path d="M0 0h24v24H0z" fill="none" /></svg> </div>
                            </button>
                            <div x-show="show" class="mt-2 py-2 bg-white rounded-lg shadow-xl absolute">
                                <a href="{{ route('car-types.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">Тип</a>
                                <a href="{{ route('car-brands.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">Бренд</a>
                                <a href="{{ route('car-models.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">Модель</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                Выход
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                Дашборд
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        Выход
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav> --}}
