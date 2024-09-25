<header>
    <!-- Navigation -->
    <nav x-data="{ mobileMenuOpen: false, userMenuOpen: false }" class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 justify-between">
                <div class="flex">
                    <div class="flex flex-shrink-0 items-center">
                        <a href="{{route('home')}}">
                            <h2 class="font-bold text-2xl">Barta</h2>
                        </a>
                    </div>
                </div>
                <div class="hidden sm:ml-6 sm:flex gap-2 sm:items-center">

                    <!-- Profile dropdown -->
                    <div class="relative ml-3" x-data="{ open: false }">

                        <div>
                            @php
                                $defaultAvatar = asset("assets/default-avatar.png");
                            @endphp

                            @auth
                                                        @php
                                                            $githubUsername = Auth::user()->username;
                                                            $avatarUrl = $githubUsername ? "https://avatars.githubusercontent.com/$githubUsername" : $defaultAvatar;
                                                            $userName = Auth::user()->name;
                                                        @endphp
                            @else
                                                        @php
                                                            $avatarUrl = $defaultAvatar;
                                                            $userName = 'Guest';
                                                        @endphp
                            @endauth

                            <button @click="open = !open" type="button"
                                class="flex rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" src="{{ $avatarUrl }}" alt="{{ $userName }}" />
                            </button>

                        </div>

                        <!-- Dropdown menu -->
                        @include('components.navbar')

                    </div>
                </div>
                <div class="-mr-2 flex items-center sm:hidden">
                    <!-- Mobile menu button -->
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button"
                        class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gray-500"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <!-- Icon when menu is closed -->
                        <svg x-show="!mobileMenuOpen" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>

                        <!-- Icon when menu is open -->
                        <svg x-show="mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>
</header>