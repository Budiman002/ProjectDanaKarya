@extends('layouts.public')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Welcome Section -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">{{ __('Welcome back') }}, {{ auth()->user()->name }}!</h1>
            <p class="mt-2 text-gray-600">{{ __('Thank you for supporting amazing campaigns') }}</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total Donations -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-[#1A7332] rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">{{ __('Total Donated') }}</p>
                        <p class="text-2xl font-bold text-gray-900">Rp {{ number_format(auth()->user()->donations()->where('status', 'confirmed')->sum('amount'), 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <!-- Campaigns Supported -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-[#F0B74C] rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">{{ __('Campaigns Supported') }}</p>
                        <p class="text-2xl font-bold text-gray-900">{{ auth()->user()->donations()->where('status', 'confirmed')->distinct('campaign_id')->count('campaign_id') }}</p>
                    </div>
                </div>
            </div>

            <!-- Total Contributions -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-[#39BB5C] rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">{{ __('Total Contributions') }}</p>
                        <p class="text-2xl font-bold text-gray-900">{{ auth()->user()->donations()->where('status', 'confirmed')->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-lg shadow p-6 mb-8">
            <h2 class="text-xl font-bold text-gray-900 mb-4">{{ __('Quick Actions') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <a href="{{ route('campaigns.index') }}" class="flex items-center p-4 bg-[#1A7332] text-white rounded-lg hover:bg-[#155a28] transition">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span class="font-medium">{{ __('Browse Campaigns') }}</span>
                </a>
                <a href="{{ route('donation.history') }}" class="flex items-center p-4 bg-[#F0B74C] text-white rounded-lg hover:bg-[#d9a03d] transition">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <span class="font-medium">{{ __('Donation History') }}</span>
                </a>
                <a href="{{ route('profile') }}" class="flex items-center p-4 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span class="font-medium">{{ __('My Profile') }}</span>
                </a>
            </div>
        </div>

        <!-- Active Campaigns You Support -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4">{{ __('Campaigns You Support') }}</h2>
            @php
                $supportedCampaigns = auth()->user()->donations()
                    ->where('status', 'confirmed')
                    ->with('campaign.category')
                    ->latest()
                    ->take(6)
                    ->get()
                    ->unique('campaign_id')
                    ->map(function($donation) {
                        return $donation->campaign;
                    })
                    ->filter();
            @endphp

            @if($supportedCampaigns->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($supportedCampaigns as $campaign)
                        <a href="{{ route('campaigns.show', $campaign->slug) }}" class="group">
                            <div class="border rounded-lg overflow-hidden hover:shadow-lg transition">
                                <img src="{{ asset($campaign->image) }}" alt="{{ $campaign->title }}" class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <span class="text-xs font-semibold text-[#1A7332] bg-green-50 px-2 py-1 rounded">
                                        {{ $campaign->category->name }}
                                    </span>
                                    <h3 class="mt-2 font-semibold text-gray-900 group-hover:text-[#1A7332] transition line-clamp-2">
                                        {{ $campaign->title }}
                                    </h3>
                                    <div class="mt-3">
                                        <div class="flex justify-between text-sm text-gray-600 mb-1">
                                            <span>{{ __('Progress') }}</span>
                                            <span>{{ number_format(($campaign->current_amount / $campaign->target_amount) * 100, 0) }}%</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                            <div class="bg-[#1A7332] h-2 rounded-full" style="width: {{ min(($campaign->current_amount / $campaign->target_amount) * 100, 100) }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">{{ __('No campaigns yet') }}</h3>
                    <p class="mt-1 text-sm text-gray-500">{{ __('Start supporting campaigns to make a difference!') }}</p>
                    <div class="mt-6">
                        <a href="{{ route('campaigns.index') }}" class="inline-flex items-center px-4 py-2 bg-[#1A7332] text-white rounded-lg hover:bg-[#155a28] transition">
                            {{ __('Browse Campaigns') }}
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
