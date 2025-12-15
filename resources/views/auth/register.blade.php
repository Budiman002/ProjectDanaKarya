@extends('layouts.auth')

@section('content')
<div>
    <h2 class="text-4xl font-bold text-gray-900 mb-8 text-center">Registration</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Full Name -->
        <div class="mb-5">
            <label class="block text-base font-medium text-gray-900 mb-3">
                Full Name <span class="text-red-500">*</span>
            </label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                class="w-full px-5 py-4 text-lg rounded-lg border border-gray-300 text-gray-900 placeholder-gray-500 focus:ring-2 focus:ring-[#1A7332] focus:border-[#1A7332] @error('name') border-red-500 @enderror"
                required
            >
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-900 mb-2">
                Email Address <span class="text-red-500">*</span>
            </label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                class="w-full px-4 py-3 text-base rounded-lg border border-gray-300 text-gray-900 placeholder-gray-500 focus:ring-2 focus:ring-[#1A7332] focus:border-[#1A7332] @error('email') border-red-500 @enderror"
                required
            >
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-900 mb-2">
                Password <span class="text-red-500">*</span>
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

        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-900 mb-2">
                Confirm Password <span class="text-red-500">*</span>
            </label>
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                class="w-full px-4 py-3 text-base rounded-lg border border-gray-300 text-gray-900 placeholder-gray-500 focus:ring-2 focus:ring-[#1A7332] focus:border-[#1A7332]"
                required
            >
        </div>

        <!-- Phone Number -->
        <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-900 mb-2">
                Phone Number
            </label>
            <input
                type="text"
                id="phone"
                name="phone"
                value="{{ old('phone') }}"
                placeholder="+62"
                class="w-full px-4 py-3 text-base rounded-lg border border-gray-300 text-gray-900 placeholder-gray-500 focus:ring-2 focus:ring-[#1A7332] focus:border-[#1A7332] @error('phone') border-red-500 @enderror"
            >
            @error('phone')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Role Selection -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-900 mb-3">
                Register as <span class="text-red-500">*</span>
            </label>
            <div class="flex items-center space-x-6">
                <label class="flex items-center">
                    <input
                        type="radio"
                        name="role"
                        value="backer"
                        {{ old('role', 'backer') == 'backer' ? 'checked' : '' }}
                        class="w-4 h-4 text-[#1A7332] focus:ring-[#1A7332]"
                    >
                    <span class="ml-2 text-sm text-gray-900">Backer</span>
                </label>
                <label class="flex items-center">
                    <input
                        type="radio"
                        name="role"
                        value="creator"
                        {{ old('role') == 'creator' ? 'checked' : '' }}
                        class="w-4 h-4 text-[#1A7332] focus:ring-[#1A7332]"
                    >
                    <span class="ml-2 text-sm text-gray-900">Creator</span>
                </label>
            </div>
            @error('role')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <button
            type="submit"
            class="w-full bg-[#F0B74C] hover:bg-[#E0A73C] text-white font-semibold py-3 text-base rounded-full transition duration-200"
        >
            Sign Up
        </button>

        <!-- Login Link -->
        <p class="text-center text-sm text-gray-700 mt-5">
            Already have an account?
            <a href="{{ route('login') }}" class="text-[#1A7332] hover:underline font-semibold">Sign In</a>
        </p>
    </form>
</div>
@endsection
