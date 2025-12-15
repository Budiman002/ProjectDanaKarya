@extends('layouts.auth')

@section('content')
<div>
    <h2 class="text-4xl font-bold text-gray-900 mb-3 text-center">Welcome Back!</h2>
    <p class="text-center text-gray-700 mb-8 text-lg">Sign in to continue</p>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-6">
            <label for="email" class="block text-base font-medium text-gray-900 mb-3">
                Email
            </label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                class="w-full px-5 py-4 text-lg rounded-lg border border-gray-300 text-gray-900 placeholder-gray-500 focus:ring-2 focus:ring-[#1A7332] focus:border-[#1A7332] @error('email') border-red-500 @enderror"
                required
                autofocus
            >
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-900 mb-2">
                Password
            </label>
            <input
                type="password"
                id="password"
                name="password"
                class="w-full px-4 py-3 text-base rounded-lg border border-gray-300 text-gray-900 placeholder-gray-500 focus:ring-2 focus:ring-[#1A7332] focus:border-[#1A7332] @error('password') border-red-500 @enderror"
                required
            >
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="mb-8 flex items-center justify-between">
            <label class="flex items-center">
                <input
                    type="checkbox"
                    name="remember"
                    class="w-5 h-5 text-[#1A7332] focus:ring-[#1A7332] border-gray-300 rounded"
                >
                <span class="ml-3 text-base text-gray-900">Remember Me</span>
            </label>

            <a href="{{ route('password.request') }}" class="text-base text-[#1A7332] hover:underline font-medium">
                Forgot Password?
            </a>
        </div>

        <!-- Submit Button -->
        <button
            type="submit"
            class="w-full bg-[#F0B74C] hover:bg-[#E0A73C] text-white font-semibold py-3 text-base rounded-full transition duration-200"
        >
            Sign In
        </button>

        <!-- Register Link -->
        <p class="text-center text-sm text-gray-700 mt-5">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-[#1A7332] hover:underline font-semibold">Sign Up</a>
        </p>
    </form>
</div>
@endsection
