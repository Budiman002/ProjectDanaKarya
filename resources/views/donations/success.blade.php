@extends('layouts.public')

@section('content')
<section class="py-12 bg-gray-50">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Payment Header -->
            <div class="bg-[#2D7A67] p-8 text-center text-white">
                <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-12 h-12 text-[#2D7A67]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold mb-2">Complete Your Payment</h1>
                <p class="text-white/90">Please transfer to the Virtual Account below</p>
            </div>

            <!-- Donation Details -->
            <div class="p-6 space-y-6">
                <div>
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Donation Details</h2>
                    
                    <div class="bg-gray-50 rounded-lg p-4 space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Donation ID</span>
                            <span class="font-semibold text-gray-900">#{{ $donation->id }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Amount</span>
                            <span class="font-bold text-[#2D7A67] text-xl">Rp {{ number_format($donation->amount, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Status</span>
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-sm font-semibold rounded-full">
                                {{ ucfirst($donation->status) }}
                            </span>
                        </div>
                        @if($donation->bank && $donation->va_number)
                        <div class="flex justify-between">
                            <span class="text-gray-600">Bank</span>
                            <span class="font-semibold text-gray-900">{{ $donation->bank }}</span>
                        </div>
                        @endif
                        <div class="flex justify-between">
                            <span class="text-gray-600">Date</span>
                            <span class="font-semibold text-gray-900">{{ $donation->created_at->format('M d, Y H:i') }}</span>
                        </div>
                    </div>
                </div>

                @if($donation->va_number)
                <div class="border-t pt-6">
                    <div class="bg-[#2D7A67] text-white rounded-lg p-6">
                        <h3 class="font-bold text-lg mb-4">Virtual Account Number</h3>
                        <div class="bg-white text-gray-900 rounded-lg p-4 mb-4">
                            <p class="text-sm text-gray-600 mb-1">{{ $donation->bank }} Virtual Account</p>
                            <p class="text-3xl font-bold tracking-wider">{{ $donation->va_number }}</p>
                        </div>
                        <div class="text-sm space-y-2">
                            <p class="font-semibold">How to Pay:</p>
                            <ol class="list-decimal list-inside space-y-1 text-white/90">
                                <li>Open your {{ $donation->bank }} mobile banking or ATM</li>
                                <li>Select Transfer or Payment menu</li>
                                <li>Enter the Virtual Account number above</li>
                                <li>Enter the amount: <strong>Rp {{ number_format($donation->amount, 0, ',', '.') }}</strong></li>
                                <li>Confirm and complete the payment</li>
                            </ol>
                            <p class="text-xs text-white/80 mt-3">* This is a demo VA number. In production, use real payment gateway.</p>
                        </div>
                    </div>
                </div>
                @endif

                <div class="border-t pt-6">
                    <h3 class="font-semibold text-gray-900 mb-2">Campaign Supported</h3>
                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg">
                        @if($donation->campaign->image)
                            <img src="{{ asset($donation->campaign->image) }}" alt="{{ $donation->campaign->title }}" class="w-20 h-20 object-cover rounded-lg">
                        @endif
                        <div>
                            <p class="font-semibold text-gray-900">{{ $donation->campaign->title }}</p>
                            <p class="text-sm text-gray-600">by {{ $donation->campaign->user->name }}</p>
                        </div>
                    </div>
                </div>

                @if($donation->message)
                <div class="border-t pt-6">
                    <h3 class="font-semibold text-gray-900 mb-2">Your Message</h3>
                    <p class="text-gray-700 bg-gray-50 rounded-lg p-4">{{ $donation->message }}</p>
                </div>
                @endif

                <div class="border-t pt-6">
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                        <p class="text-sm text-blue-800">
                            <strong>What's Next?</strong><br>
                            @if($donation->va_number)
                            Please complete your payment using the Virtual Account number above. Once we receive your payment, your donation will be confirmed and you'll appear in the backers list.
                            @else
                            Your payment is being processed. Once confirmed, your donation will be added to the campaign and you'll appear in the backers list. You'll receive a confirmation email shortly.
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 pt-4">
                    <a href="{{ route('campaigns.show', $donation->campaign->slug) }}" class="flex-1 px-6 py-3 bg-[#2D7A67] hover:bg-[#1A5647] text-white text-center font-semibold rounded-lg transition">
                        View Campaign
                    </a>
                    <a href="{{ route('campaigns.index') }}" class="flex-1 px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-800 text-center font-semibold rounded-lg transition">
                        Browse Campaigns
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection