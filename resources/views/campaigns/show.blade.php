@extends('layouts.public')

@section('content')
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Main Content -->
            <div class="flex-1">
                <!-- Campaign Image -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                    @if($campaign->image)
                        <img src="{{ asset($campaign->image) }}" alt="{{ $campaign->title }}" class="w-full h-96 object-cover">
                    @else
                        <div class="w-full h-96 bg-gradient-to-br from-[#2D7A67] to-[#7DD3C0] flex items-center justify-center">
                            <span class="text-white text-6xl font-bold">{{ substr($campaign->title, 0, 1) }}</span>
                        </div>
                    @endif
                </div>

                <!-- Campaign Info -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="px-3 py-1 bg-[#F5A623] text-white text-sm font-semibold rounded-full">
                            {{ $campaign->category->icon }} {{ $campaign->category->name }}
                        </span>
                        @if($campaign->status === 'active')
                            <span class="px-3 py-1 bg-green-100 text-green-800 text-sm font-semibold rounded-full">
                                Active
                            </span>
                        @elseif($campaign->status === 'funded')
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 text-sm font-semibold rounded-full">
                                Funded
                            </span>
                        @endif
                    </div>

                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ $campaign->title }}</h1>

                    <div class="flex items-center gap-4 text-gray-600 mb-6">
                        <div class="flex items-center gap-2">
                            <div class="w-10 h-10 bg-[#7DD3C0] rounded-full flex items-center justify-center">
                                <span class="text-white font-bold">{{ substr($campaign->user->name, 0, 1) }}</span>
                            </div>
                            <div>
                                <p class="text-sm">Created by</p>
                                <p class="font-semibold text-gray-900">{{ $campaign->user->name }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="prose max-w-none">
                        <h2 class="text-xl font-bold text-gray-900 mb-3">About This Campaign</h2>
                        <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $campaign->description }}</p>
                    </div>
                </div>

                <!-- FAQ Section -->
                @if($campaign->faq_goal || $campaign->faq_fund_usage || $campaign->faq_timeline || $campaign->faq_custom_1_question || $campaign->faq_custom_2_question)
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Frequently Asked Questions</h2>
                    
                    <div class="space-y-4">
                        @if($campaign->faq_goal)
                        <details class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition">
                            <summary class="font-semibold text-gray-900 cursor-pointer flex items-center gap-2">
                                <span>📌</span>
                                <span>Apa tujuan utama campaign ini?</span>
                            </summary>
                            <p class="mt-3 text-gray-700 leading-relaxed pl-6">{{ $campaign->faq_goal }}</p>
                        </details>
                        @endif
                        
                        @if($campaign->faq_fund_usage)
                        <details class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition">
                            <summary class="font-semibold text-gray-900 cursor-pointer flex items-center gap-2">
                                <span>💰</span>
                                <span>Bagaimana dana yang terkumpul akan digunakan?</span>
                            </summary>
                            <p class="mt-3 text-gray-700 leading-relaxed pl-6">{{ $campaign->faq_fund_usage }}</p>
                        </details>
                        @endif
                        
                        @if($campaign->faq_timeline)
                        <details class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition">
                            <summary class="font-semibold text-gray-900 cursor-pointer flex items-center gap-2">
                                <span>⏰</span>
                                <span>Kapan campaign ini akan terealisasi?</span>
                            </summary>
                            <p class="mt-3 text-gray-700 leading-relaxed pl-6">{{ $campaign->faq_timeline }}</p>
                        </details>
                        @endif
                        
                        @if($campaign->faq_custom_1_question)
                        <details class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition">
                            <summary class="font-semibold text-gray-900 cursor-pointer flex items-center gap-2">
                                <span>❓</span>
                                <span>{{ $campaign->faq_custom_1_question }}</span>
                            </summary>
                            <p class="mt-3 text-gray-700 leading-relaxed pl-6">{{ $campaign->faq_custom_1_answer }}</p>
                        </details>
                        @endif
                        
                        @if($campaign->faq_custom_2_question)
                        <details class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition">
                            <summary class="font-semibold text-gray-900 cursor-pointer flex items-center gap-2">
                                <span>❓</span>
                                <span>{{ $campaign->faq_custom_2_question }}</span>
                            </summary>
                            <p class="mt-3 text-gray-700 leading-relaxed pl-6">{{ $campaign->faq_custom_2_answer }}</p>
                        </details>
                        @endif
                    </div>
                </div>
                @endif

                <!-- Campaign Updates -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6" x-data="{ lightboxImage: null }">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold text-gray-900">{{ __('Campaign Updates') }} ({{ $campaign->updates_count }})</h2>
                    </div>

                    @if($campaign->updates->count() > 0)
                        <div class="space-y-6">
                            @foreach($campaign->updates as $update)
                                <div class="border-b border-gray-200 last:border-0 pb-6 last:pb-0">
                                    <div class="flex justify-between items-start mb-2">
                                        <h3 class="text-lg font-semibold text-gray-900">{{ $update->title }}</h3>
                                        <span class="text-sm text-gray-500">{{ $update->created_at->diffForHumans() }}</span>
                                    </div>

                                    @if($update->image)
                                        <img
                                            src="{{ asset('storage/' . $update->image) }}"
                                            alt="{{ $update->title }}"
                                            class="w-full h-64 object-cover rounded-lg mb-3 cursor-pointer hover:opacity-90 transition"
                                            @click="lightboxImage = '{{ asset('storage/' . $update->image) }}'"
                                        >
                                    @endif

                                    <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $update->content }}</p>
                                </div>
                            @endforeach
                        </div>

                        <!-- Lightbox Modal -->
                        <div
                            x-show="lightboxImage"
                            x-transition
                            @click="lightboxImage = null"
                            class="fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center p-4"
                            style="display: none;"
                        >
                            <div class="relative max-w-7xl max-h-full">
                                <button
                                    @click.stop="lightboxImage = null"
                                    class="absolute -top-12 right-0 text-white hover:text-gray-300 text-4xl font-bold"
                                >
                                    &times;
                                </button>
                                <img
                                    :src="lightboxImage"
                                    class="max-w-full max-h-[90vh] object-contain rounded-lg"
                                    @click.stop
                                >
                            </div>
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <h3 class="text-lg font-medium text-gray-900 mb-1">{{ __('No updates yet') }}</h3>
                            <p class="text-gray-500">{{ __('The creator hasn\'t posted any updates for this campaign.') }}</p>
                        </div>
                    @endif
                </div>

                <!-- Recent Backers -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">{{ __('Recent Backers') }} ({{ $campaign->donations_count }})</h2>

                    @if($campaign->donations->count() > 0)
                        <div class="space-y-3">
                            @foreach($campaign->donations->take(10) as $donation)
                                <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-0">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-[#7DD3C0] rounded-full flex items-center justify-center">
                                            <span class="text-white font-bold">{{ substr($donation->user->name, 0, 1) }}</span>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-900">{{ $donation->user->name }}</p>
                                            <p class="text-xs text-gray-500">{{ $donation->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-bold text-[#2D7A67]">Rp {{ number_format($donation->amount, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            <h3 class="text-lg font-medium text-gray-900 mb-1">{{ __('No backers yet') }}</h3>
                            <p class="text-gray-500 mb-4">{{ __('Be the first to support this campaign!') }}</p>
                            <button onclick="scrollAndHighlightDonateButton()" class="inline-flex items-center px-6 py-3 bg-[#F5A623] hover:bg-[#E09612] text-white font-semibold rounded-lg transition shadow-lg transform hover:scale-105">
                                {{ __('Back This Project') }}
                            </button>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="lg:w-96">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-24">
                    <!-- Progress -->
                    @php
                        $percentage = $campaign->target_amount > 0 
                            ? min(($campaign->current_amount / $campaign->target_amount) * 100, 100) 
                            : 0;
                    @endphp

                    <div class="mb-6">
                        <div class="flex justify-between items-baseline mb-2">
                            <p class="text-3xl font-bold text-gray-900">Rp {{ number_format($campaign->current_amount, 0, ',', '.') }}</p>
                        </div>
                        <p class="text-gray-600 mb-4">raised of Rp {{ number_format($campaign->target_amount, 0, ',', '.') }} goal</p>
                        
                        <div class="w-full bg-gray-200 rounded-full h-3 mb-2">
                            <div class="bg-[#2D7A67] h-3 rounded-full transition-all" style="width: {{ $percentage }}%"></div>
                        </div>
                        <p class="text-sm text-gray-600">{{ number_format($percentage, 1) }}% funded</p>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-2 gap-4 mb-6 pb-6 border-b">
                        <div>
                            <p class="text-2xl font-bold text-gray-900">{{ $campaign->donations_count }}</p>
                            <p class="text-sm text-gray-600">Backers</p>
                        </div>
                        <div>
                            @php
                                $deadline = \Carbon\Carbon::parse($campaign->deadline);
                                $now = \Carbon\Carbon::now();
                                $daysRemaining = (int) $now->diffInDays($deadline, false);
                            @endphp

                            @if($daysRemaining < 0)
                                <p class="text-2xl font-bold text-red-600">Ended</p>
                                <p class="text-sm text-gray-600">{{ abs($daysRemaining) }} {{ abs($daysRemaining) === 1 ? 'day' : 'days' }} ago</p>
                            @elseif($daysRemaining === 0)
                                <p class="text-2xl font-bold text-orange-600">Last day!</p>
                                <p class="text-sm text-gray-600">Ends today</p>
                            @else
                                <p class="text-2xl font-bold text-gray-900">{{ $daysRemaining }}</p>
                                <p class="text-sm text-gray-600">Days to go</p>
                            @endif
                        </div>
                    </div>

                    <!-- Donate Button -->
                    @if($campaign->status === 'funded' || $campaign->current_amount >= $campaign->target_amount)
                        <div class="block w-full px-6 py-4 bg-gray-300 text-gray-600 text-center font-bold rounded-lg mb-4 cursor-not-allowed">
                            Campaign Fully Funded
                        </div>
                        <p class="text-sm text-gray-600 text-center mb-4">
                            This campaign has reached its funding goal and is no longer accepting donations.
                        </p>
                    @else
                        <button id="donate-button" onclick="openDonateModal()" class="block w-full px-6 py-4 bg-[#F5A623] hover:bg-[#E09612] text-white text-center font-bold rounded-lg transition mb-4">
                            Back This Project
                        </button>
                    @endif

                    <!-- Campaign Details -->
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Creator</span>
                            <span class="font-semibold text-gray-900">{{ $campaign->user->name }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Category</span>
                            <span class="font-semibold text-gray-900">{{ $campaign->category->name }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Deadline</span>
                            <span class="font-semibold text-gray-900">{{ \Carbon\Carbon::parse($campaign->deadline)->format('M d, Y') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Created</span>
                            <span class="font-semibold text-gray-900">{{ $campaign->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

<!-- Donation Modal -->
<div id="donate-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center p-4" onclick="closeDonateModal(event)">
    <div class="bg-white rounded-lg max-w-2xl w-full max-h-[90vh] overflow-y-auto" onclick="event.stopPropagation()">
        <!-- Modal Header -->
        <div class="bg-gradient-to-r from-[#2D7A67] to-[#7DD3C0] p-6 text-white sticky top-0">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm opacity-90 mb-2">You're supporting</p>
                    <h2 class="text-2xl font-bold mb-2">{{ $campaign->title }}</h2>
                    <p class="text-sm opacity-90">by {{ $campaign->user->name }}</p>
                </div>
                <button onclick="closeDonateModal()" class="text-white hover:text-gray-200 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Modal Body -->
        <form id="donation-form" class="p-6 space-y-6">
            @csrf
            <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">

            <!-- Amount Selection -->
            <div>
                <label class="block text-sm font-medium text-gray-900 mb-3">Select Amount</label>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-3 mb-4">
                    <button type="button" onclick="selectAmount(50000)" class="amount-btn px-4 py-3 border-2 border-gray-300 rounded-lg hover:border-[#2D7A67] hover:bg-[#2D7A67] hover:text-white transition font-semibold">
                        Rp 50.000
                    </button>
                    <button type="button" onclick="selectAmount(100000)" class="amount-btn px-4 py-3 border-2 border-gray-300 rounded-lg hover:border-[#2D7A67] hover:bg-[#2D7A67] hover:text-white transition font-semibold">
                        Rp 100.000
                    </button>
                    <button type="button" onclick="selectAmount(250000)" class="amount-btn px-4 py-3 border-2 border-gray-300 rounded-lg hover:border-[#2D7A67] hover:bg-[#2D7A67] hover:text-white transition font-semibold">
                        Rp 250.000
                    </button>
                    <button type="button" onclick="selectAmount(500000)" class="amount-btn px-4 py-3 border-2 border-gray-300 rounded-lg hover:border-[#2D7A67] hover:bg-[#2D7A67] hover:text-white transition font-semibold">
                        Rp 500.000
                    </button>
                    <button type="button" onclick="selectAmount(1000000)" class="amount-btn px-4 py-3 border-2 border-gray-300 rounded-lg hover:border-[#2D7A67] hover:bg-[#2D7A67] hover:text-white transition font-semibold">
                        Rp 1.000.000
                    </button>
                    <button type="button" onclick="selectCustomAmount()" class="amount-btn px-4 py-3 border-2 border-[#F5A623] text-[#F5A623] rounded-lg hover:bg-[#F5A623] hover:text-white transition font-semibold">
                        Custom
                    </button>
                </div>

                <div id="custom-amount-input" class="hidden">
                    <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Enter Custom Amount</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500">Rp</span>
                        <input
                            type="number"
                            id="amount"
                            name="amount"
                            min="10000"
                            step="1000"
                            class="w-full pl-12 pr-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#2D7A67] focus:border-transparent"
                            placeholder="Minimum Rp 10.000"
                        >
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Minimum donation: Rp 10.000</p>
                </div>

                <div id="selected-amount-display" class="hidden mt-4 p-4 bg-green-50 border border-green-200 rounded-lg">
                    <p class="text-sm text-gray-700">Selected Amount:</p>
                    <p class="text-2xl font-bold text-[#2D7A67]" id="display-amount">Rp 0</p>
                </div>
            </div>

            <!-- Donor Information -->
            <div class="border-t pt-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Your Information</h3>

                <div class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-900 mb-2">
                            Full Name <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ Auth::check() ? Auth::user()->name : '' }}"
                            {{ Auth::check() ? 'readonly' : '' }}
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#2D7A67] focus:border-transparent {{ Auth::check() ? 'bg-gray-50' : '' }}"
                            required
                        >
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-900 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ Auth::check() ? Auth::user()->email : '' }}"
                            {{ Auth::check() ? 'readonly' : '' }}
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#2D7A67] focus:border-transparent {{ Auth::check() ? 'bg-gray-50' : '' }}"
                            required
                        >
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-900 mb-2">
                            Phone Number <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="tel"
                            id="phone"
                            name="phone"
                            value="{{ Auth::check() && Auth::user()->phone ? Auth::user()->phone : '' }}"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#2D7A67] focus:border-transparent"
                            placeholder="08xxxxxxxxxx"
                            required
                        >
                    </div>

                    <div>
                        <label for="bank" class="block text-sm font-medium text-gray-900 mb-2">
                            Select Bank <span class="text-red-500">*</span>
                        </label>
                        <select
                            id="bank"
                            name="bank"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#2D7A67] focus:border-transparent"
                            required
                        >
                            <option value="">Choose your bank</option>
                            <option value="BCA">BCA</option>
                            <option value="MANDIRI">Mandiri</option>
                            <option value="BNI">BNI</option>
                            <option value="BRI">BRI</option>
                            <option value="PERMATA">Permata</option>
                            <option value="CIMB">CIMB Niaga</option>
                        </select>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-900 mb-2">
                            Message (Optional)
                        </label>
                        <textarea
                            id="message"
                            name="message"
                            rows="3"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#2D7A67] focus:border-transparent"
                            placeholder="Leave a message for the campaign creator..."
                        ></textarea>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="border-t pt-6">
                <button
                    type="submit"
                    class="w-full px-6 py-4 bg-[#F5A623] hover:bg-[#E09612] text-white font-bold rounded-lg transition disabled:bg-gray-300 disabled:cursor-not-allowed"
                    id="submit-btn"
                >
                    Proceed to Payment
                </button>
                <p class="text-xs text-gray-500 text-center mt-3">
                    You will receive payment instructions after submitting
                </p>
            </div>
        </form>
    </div>
</div>

<style>
@keyframes pulse-glow {
    0%, 100% {
        box-shadow: 0 0 0 0 rgba(245, 166, 35, 0.7);
        transform: scale(1);
    }
    50% {
        box-shadow: 0 0 0 10px rgba(245, 166, 35, 0);
        transform: scale(1.05);
    }
}

.highlight-donate {
    animation: pulse-glow 1.5s ease-in-out 3;
}
</style>

<script>
function scrollAndHighlightDonateButton() {
    const donateButton = document.getElementById('donate-button');

    if (donateButton) {
        // Smooth scroll to donate button
        donateButton.scrollIntoView({
            behavior: 'smooth',
            block: 'center'
        });

        // Add highlight animation after scroll
        setTimeout(() => {
            donateButton.classList.add('highlight-donate');

            // Remove animation class after it finishes
            setTimeout(() => {
                donateButton.classList.remove('highlight-donate');
                // Open modal after highlight
                openDonateModal();
            }, 4500); // 1.5s * 3 iterations
        }, 800); // Delay to let scroll finish
    }
}

function openDonateModal() {
    const modal = document.getElementById('donate-modal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden'; // Prevent background scroll
}

function closeDonateModal(event) {
    if (event) event.preventDefault();
    const modal = document.getElementById('donate-modal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.style.overflow = ''; // Re-enable scroll
}

let selectedAmountValue = 0;

function selectAmount(amount) {
    selectedAmountValue = amount;

    // Update hidden input
    const amountInput = document.getElementById('amount');
    amountInput.value = amount;

    // Hide custom input, show selected display
    document.getElementById('custom-amount-input').classList.add('hidden');
    document.getElementById('selected-amount-display').classList.remove('hidden');

    // Update display
    document.getElementById('display-amount').textContent = 'Rp ' + amount.toLocaleString('id-ID');

    // Highlight selected button
    document.querySelectorAll('.amount-btn').forEach(btn => {
        btn.classList.remove('border-[#2D7A67]', 'bg-[#2D7A67]', 'text-white');
        btn.classList.add('border-gray-300');
    });
    event.target.classList.remove('border-gray-300');
    event.target.classList.add('border-[#2D7A67]', 'bg-[#2D7A67]', 'text-white');
}

function selectCustomAmount() {
    selectedAmountValue = 0;

    // Show custom input
    document.getElementById('custom-amount-input').classList.remove('hidden');
    document.getElementById('selected-amount-display').classList.add('hidden');

    // Clear amount input
    const amountInput = document.getElementById('amount');
    amountInput.value = '';
    amountInput.focus();

    // Update button highlights
    document.querySelectorAll('.amount-btn').forEach(btn => {
        btn.classList.remove('border-[#2D7A67]', 'bg-[#2D7A67]', 'text-white');
        btn.classList.add('border-gray-300');
    });
    event.target.classList.remove('border-gray-300', 'border-[#F5A623]', 'text-[#F5A623]');
    event.target.classList.add('bg-[#F5A623]', 'text-white');
}

// Form submission
document.getElementById('donation-form').addEventListener('submit', async function(e) {
    e.preventDefault();

    const submitBtn = document.getElementById('submit-btn');
    submitBtn.disabled = true;
    submitBtn.textContent = 'Processing...';

    const formData = new FormData(this);

    try {
        const response = await fetch('{{ route('donations.store') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
            },
            body: formData
        });

        const data = await response.json();

        if (response.ok && data.success) {
            // Redirect to success page
            window.location.href = '/donations/' + data.donation_id + '/success';
        } else {
            alert(data.error || 'An error occurred. Please try again.');
            submitBtn.disabled = false;
            submitBtn.textContent = 'Proceed to Payment';
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
        submitBtn.disabled = false;
        submitBtn.textContent = 'Proceed to Payment';
    }
});
</script>
@endsection