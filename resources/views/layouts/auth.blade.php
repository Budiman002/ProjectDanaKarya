<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Auth' }} - DanaKarya</title>
    <!-- Tailwind CSS & Alpine.js via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="font-sans antialiased">
    <!-- Navbar -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="/" class="flex items-center">
                        <img src="{{ asset('images/LogoDanaKarya.png') }}" alt="DanaKarya" class="h-16">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-gray-700 hover:text-gray-900 transition font-medium">Home</a>
                    <a href="/about" class="text-gray-700 hover:text-gray-900 transition font-medium">About</a>
                    <a href="/campaigns" class="text-gray-700 hover:text-gray-900 transition font-medium">Donation List</a>
                    <a href="/contact" class="text-gray-700 hover:text-gray-900 transition font-medium">Contact Us</a>
                </div>

                <!-- Right Side: Auth Links -->
                <div class="hidden md:flex items-center gap-4">
                    @auth
                        <!-- User Dropdown -->
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-white/20 transition">
                                <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                                    <span class="text-[#F0B74C] font-bold text-sm">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                                </div>
                                <span class="text-white font-medium">{{ Auth::user()->name }}</span>
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            <!-- Dropdown Menu -->
                            <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50">
                                <a href="{{ route('profile') }}" class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    My Profile
                                </a>
                                <a href="{{ route('settings') }}" class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    Settings
                                </a>
                                <hr class="my-2">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="flex items-center gap-2 px-4 py-2 text-red-600 hover:bg-red-50 w-full text-left">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                        </svg>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <!-- Not Logged In -->
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900 transition font-medium">Sign In</a>
                        <a href="/campaigns" class="px-6 py-2 bg-[#F0B74C] text-white font-semibold rounded-lg hover:bg-[#E0A73C] transition">
                            Start Funding
                        </a>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button type="button" class="text-white">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content - Centered Container with Background -->
    <div class="min-h-screen flex items-center justify-center p-2 md:p-4" style="background-image: url('{{ asset('images/LoginRegisBackground.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <!-- Center Container -->
        <div class="w-full max-w-6xl bg-white rounded-2xl shadow-2xl overflow-hidden">
            <div class="flex flex-col lg:flex-row min-h-[500px]">
                <!-- Left Side - AuthBackground Image in Container -->
                <div class="lg:w-3/5 p-6 lg:p-8 flex items-center justify-center bg-gray-50">
                    <div class="w-full h-full flex items-center justify-center">
                        <img src="{{ asset('images/AuthBackground.png') }}" alt="Auth Background" class="w-full h-full object-contain rounded-xl shadow-lg">
                    </div>
                </div>

                <!-- Right Side - Form -->
                <div class="lg:w-2/5 p-8 lg:p-10 flex items-center justify-center">
                    <div class="w-full max-w-md">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
