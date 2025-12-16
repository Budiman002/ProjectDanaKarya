@extends('layouts.admin')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600">Total Donations</p>
                <p class="text-2xl font-bold text-gray-900">Rp {{ number_format($totalDonations, 0, ',', '.') }}</p>
                <p class="text-xs text-gray-500 mt-1">{{ $donationsCount }} transactions</p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600">Average Donation</p>
                <p class="text-2xl font-bold text-gray-900">Rp {{ number_format($donationsCount > 0 ? $totalDonations / $donationsCount : 0, 0, ',', '.') }}</p>
                <p class="text-xs text-gray-500 mt-1">per transaction</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600">Total Campaigns</p>
                <p class="text-2xl font-bold text-gray-900">{{ $totalCampaigns }}</p>
                <p class="text-xs text-gray-500 mt-1">{{ $successfulCampaigns }} completed</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600">Success Rate</p>
                <p class="text-2xl font-bold text-gray-900">{{ $totalCampaigns > 0 ? round(($successfulCampaigns / $totalCampaigns) * 100, 1) : 0 }}%</p>
                <p class="text-xs text-gray-500 mt-1">campaign completion</p>
            </div>
            <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Monthly Donations</h2>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="text-left py-2 text-sm font-semibold text-gray-700">Month</th>
                        <th class="text-right py-2 text-sm font-semibold text-gray-700">Amount</th>
                        <th class="text-right py-2 text-sm font-semibold text-gray-700">Count</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($monthlyDonations as $monthly)
                    <tr class="border-b">
                        <td class="py-2 text-sm text-gray-600">{{ \Carbon\Carbon::parse($monthly->month . '-01')->format('F Y') }}</td>
                        <td class="py-2 text-sm text-gray-900 text-right">Rp {{ number_format($monthly->total, 0, ',', '.') }}</td>
                        <td class="py-2 text-sm text-gray-600 text-right">{{ $monthly->count }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="py-4 text-center text-gray-500 text-sm">No data available</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Campaigns by Category</h2>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="text-left py-2 text-sm font-semibold text-gray-700">Category</th>
                        <th class="text-right py-2 text-sm font-semibold text-gray-700">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categoryStats as $stat)
                    <tr class="border-b">
                        <td class="py-2 text-sm text-gray-600">{{ $stat->name }}</td>
                        <td class="py-2 text-sm text-gray-900 text-right">{{ $stat->total }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2" class="py-4 text-center text-gray-500 text-sm">No data available</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Top Campaigns</h2>
        <div class="space-y-3">
            @forelse($topCampaigns as $campaign)
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                <div class="flex-1">
                    <h3 class="font-semibold text-gray-900 text-sm">{{ Str::limit($campaign->title, 40) }}</h3>
                    <p class="text-xs text-gray-500">{{ $campaign->donations_count ?? 0 }} donations</p>
                </div>
                <div class="text-right">
                    <p class="font-bold text-gray-900 text-sm">Rp {{ number_format($campaign->donations_sum_amount ?? 0, 0, ',', '.') }}</p>
                </div>
            </div>
            @empty
            <p class="text-center text-gray-500 text-sm py-4">No campaigns yet</p>
            @endforelse
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Top Donors</h2>
        <div class="space-y-3">
            @forelse($topDonors as $donor)
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-[#2D7A67] rounded-full flex items-center justify-center text-white font-bold">
                        {{ strtoupper(substr($donor->name, 0, 1)) }}
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 text-sm">{{ $donor->name }}</h3>
                        <p class="text-xs text-gray-500">{{ $donor->donations_count ?? 0 }} donations</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="font-bold text-gray-900 text-sm">Rp {{ number_format($donor->donations_sum_amount ?? 0, 0, ',', '.') }}</p>
                </div>
            </div>
            @empty
            <p class="text-center text-gray-500 text-sm py-4">No donors yet</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
