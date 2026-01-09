@extends('layouts.public')

@section('content')
<!-- Hero Section with Sliding Background Images -->
<section class="relative bg-[#1A7332] pt-0 pb-20 md:pb-24">
    <div class="w-full">
        <!-- Image Container with aspect ratio that matches images -->
        <div class="relative w-full aspect-[16/9] md:aspect-[21/9] overflow-hidden">
            <!-- Sliding Background Images -->
            @foreach(['LandingPageBackground1.png', 'LandingPageBackground2.png', 'LandingPageBackground3.png', 'LandingPageBackground4.png', 'LandingPageBackground5.png'] as $index => $image)
            <div class="hero-slide absolute inset-0 transition-opacity duration-1000 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}">
                <img src="{{ asset('images/' . $image) }}" alt="Background {{ $index + 1 }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/40"></div>
            </div>
            @endforeach

            <!-- Text Content Overlay -->
            <div class="absolute inset-0 flex items-center justify-end z-10">
                <div class="max-w-2xl px-6 sm:px-10 md:px-16 mr-0 md:mr-[10%]">
                    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold mb-4 md:mb-6 leading-tight drop-shadow-lg text-white text-left">
                        {{ __('Wujudkan Impian') }}<br>
                        <span class="text-[#F5A623]">{{ __('UMKM Indonesia') }}</span>
                    </h1>
                    <p class="text-base sm:text-lg md:text-xl text-gray-100 mb-6 md:mb-8 leading-relaxed drop-shadow-md text-left">
                        {{ __('Platform crowdfunding terpercaya untuk membantu UMKM Indonesia berkembang. Mari bersama membangun masa depan yang lebih cerah.') }}
                    </p>
                    <div class="flex flex-col sm:flex-row gap-3 md:gap-4 mb-8">
                        @guest
                            <a href="{{ route('register') }}" class="px-6 md:px-8 py-3 md:py-3.5 bg-[#F5A623] hover:bg-[#E09612] text-white font-semibold rounded-lg transition shadow-lg text-center text-sm md:text-base">
                                {{ __('Start Funding') }}
                            </a>
                            <a href="{{ route('campaigns.index') }}" class="px-6 md:px-8 py-3 md:py-3.5 bg-white/10 hover:bg-white/20 backdrop-blur-sm text-white font-semibold rounded-lg transition border-2 border-white/30 text-center text-sm md:text-base">
                                {{ __('Browse Campaigns') }}
                            </a>
                        @else
                            <a href="{{ route('campaigns.index') }}" class="px-6 md:px-8 py-3 md:py-3.5 bg-[#F5A623] hover:bg-[#E09612] text-white font-semibold rounded-lg transition shadow-lg text-center text-sm md:text-base">
                                {{ __('Browse Campaigns') }}
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Bar - Positioned to overlap hero section -->
    <div class="relative -mt-16 md:-mt-20 z-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-[#F5A623] rounded-2xl shadow-2xl py-8 px-6">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <!-- Total Campaigns -->
                    <div class="text-center">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <p class="text-3xl font-bold text-white mb-1">{{ $totalCampaigns }}</p>
                        <p class="text-sm text-white/90">{{ __('Campaigns') }}</p>
                    </div>

                    <!-- Projects Funded -->
                    <div class="text-center">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <p class="text-3xl font-bold text-white mb-1">{{ $fundedCampaigns }}</p>
                        <p class="text-sm text-white/90">{{ __('Projects Funded') }}</p>
                    </div>

                    <!-- Total Backers -->
                    <div class="text-center">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <p class="text-3xl font-bold text-white mb-1">{{ $totalDonations }}</p>
                        <p class="text-sm text-white/90">{{ __('Backers') }}</p>
                    </div>

                    <!-- Total Raised -->
                    <div class="text-center">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <p class="text-3xl font-bold text-white mb-1">Rp {{ number_format($totalRaised / 1000000, 0) }}M</p>
                        <p class="text-sm text-white/90">{{ __('Funds Raised') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Auto-rotate hero background images
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.hero-slide');
        let currentSlide = 0;

        function nextSlide() {
            slides[currentSlide].classList.remove('opacity-100');
            slides[currentSlide].classList.add('opacity-0');

            currentSlide = (currentSlide + 1) % slides.length;

            slides[currentSlide].classList.remove('opacity-0');
            slides[currentSlide].classList.add('opacity-100');
        }

        // Change image every 5 seconds
        setInterval(nextSlide, 5000);
    });
</script>

<!-- How It Works -->
<section class="py-16 md:py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('How It Works') }}</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                {{ __('Memulai campaign atau mendukung UMKM hanya dalam beberapa langkah mudah') }}
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Step 1 -->
            <div class="text-center group">
                <div class="w-20 h-20 bg-[#1A7332] rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform shadow-lg">
                    <span class="text-3xl font-bold text-white">1</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">{{ __('Create Campaign') }}</h3>
                <p class="text-gray-600">
                    {{ __('Daftarkan UMKM Anda dan buat campaign dengan detail lengkap tentang bisnis dan kebutuhan dana') }}
                </p>
            </div>

            <!-- Step 2 -->
            <div class="text-center group">
                <div class="w-20 h-20 bg-[#1A7332] rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform shadow-lg">
                    <span class="text-3xl font-bold text-white">2</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">{{ __('Get Support') }}</h3>
                <p class="text-gray-600">
                    {{ __('Bagikan campaign Anda dan dapatkan dukungan dari backers yang peduli terhadap perkembangan UMKM') }}
                </p>
            </div>

            <!-- Step 3 -->
            <div class="text-center group">
                <div class="w-20 h-20 bg-[#1A7332] rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform shadow-lg">
                    <span class="text-3xl font-bold text-white">3</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">{{ __('Reach Your Goal') }}</h3>
                <p class="text-gray-600">
                    {{ __('Capai target pendanaan dan wujudkan impian untuk mengembangkan bisnis UMKM Anda') }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Ongoing Campaigns -->
<section class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('Ongoing Campaigns') }}</h2>
                <p class="text-lg text-gray-600">{{ __('Dukung UMKM Indonesia untuk mewujudkan impian mereka') }}</p>
            </div>
            <a href="{{ route('campaigns.index') }}" class="hidden md:inline-flex items-center gap-2 px-6 py-3 bg-[#1A7332] hover:bg-[#1A5647] text-white font-semibold rounded-lg transition">
                {{ __('View All') }}
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($featuredCampaigns as $campaign)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition group">
                    <!-- Campaign Image -->
                    <div class="relative h-48 bg-gray-200 overflow-hidden">
                        @if($campaign->image)
                            <!-- <img src="{{ asset('storage/' . $campaign->image) }}" alt="{{ $campaign->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"> -->
                            <img src="{{ asset($campaign->image) }}" alt="{{ $campaign->title }}" class="...">
                            @else
                            <div class="w-full h-full bg-gradient-to-br from-[#1A7332] to-[#F0B74C] flex items-center justify-center">
                                <span class="text-white text-4xl font-bold">{{ substr($campaign->title, 0, 1) }}</span>
                            </div>
                        @endif
                        <div class="absolute top-3 right-3">
                            <span class="px-3 py-1 bg-[#F5A623] text-white text-xs font-semibold rounded-full">
                                {{ $campaign->category->name }}
                            </span>
                        </div>
                    </div>

                    <!-- Campaign Content -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-[#1A7332] transition">
                            {{ $campaign->title }}
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                            {{ Str::limit($campaign->description, 100) }}
                        </p>

                        <!-- Progress Bar -->
                        @php
                            $percentage = $campaign->target_amount > 0
                                ? min(($campaign->current_amount / $campaign->target_amount) * 100, 100)
                                : 0;
                        @endphp
                        <div class="mb-4">
                            <div class="flex justify-between text-sm mb-2">
                                <span class="font-semibold text-[#1A7332]">{{ number_format($percentage, 0) }}%</span>
                                <span class="text-gray-600">{{ \Carbon\Carbon::parse($campaign->deadline)->diffForHumans() }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-[#1A7332] h-2 rounded-full transition-all" style="width: {{ $percentage }}%"></div>
                            </div>
                        </div>

                        <!-- Funding Info -->
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <p class="text-lg font-bold text-gray-900">Rp {{ number_format($campaign->current_amount, 0, ',', '.') }}</p>
                                <p class="text-xs text-gray-600">of Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-bold text-gray-900">{{ $campaign->donations_count }}</p>
                                <p class="text-xs text-gray-600">{{ __('Backers') }}</p>
                            </div>
                        </div>

                        <!-- Donate Button -->
                        <a href="{{ route('campaigns.show', $campaign->slug) }}" class="block w-full px-4 py-3 bg-[#F5A623] hover:bg-[#E09612] text-white text-center font-semibold rounded-lg transition">
                            {{ __('Donate Now') }}
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                    </svg>
                    <p class="text-gray-600 text-lg">{{ __('No campaigns available yet') }}</p>
                </div>
            @endforelse
        </div>

        <div class="text-center mt-12 md:hidden">
            <a href="{{ route('campaigns.index') }}" class="inline-flex items-center gap-2 px-8 py-3 bg-[#1A7332] hover:bg-[#1A5647] text-white font-semibold rounded-lg transition">
                {{ __('View All Campaigns') }}
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Categories -->
<section class="py-16 md:py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('Browse by Category') }}</h2>
            <p class="text-lg text-gray-600">{{ __('Temukan campaign sesuai minat dan passion Anda') }}</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-6">
            @foreach($categories->take(4) as $category)
                @php
                    // Map category names to image files
                    $categoryImages = [
                        'UMKM' => 'UMKM.jpg',
                        'Technology' => 'Technology.jpg',
                        'Education' => 'Education.jpg',
                        'Health' => 'Health.jpg',
                        'Environment' => 'Environment.jpg',
                        'Social' => 'Social.jpg',
                        'Art & Culture' => 'SeniBudaya.jpg',
                    ];
                    $categoryImage = $categoryImages[$category->name] ?? 'UMKM.jpg';
                @endphp
                <a href="{{ route('campaigns.index', ['category' => $category->slug]) }}" class="group">
                    <div class="relative rounded-xl overflow-hidden h-48 hover:shadow-lg transition-all hover:-translate-y-1">
                        <!-- Background Image with Overlay -->
                        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/Category/' . $categoryImage) }}');"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent group-hover:from-[#1A7332]/80 group-hover:via-[#1A7332]/50 transition-all"></div>

                        <!-- Content -->
                        <div class="relative h-full flex flex-col justify-end p-6 text-white">
                            <div class="text-3xl mb-2">{{ $category->icon }}</div>
                            <h3 class="font-bold text-lg mb-1">{{ __($category->name) }}</h3>
                            <p class="text-xs text-white/90">{{ $category->campaigns_count }} campaigns</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
            @foreach($categories->skip(4) as $category)
                @php
                    // Map category names to image files
                    $categoryImages = [
                        'UMKM' => 'UMKM.jpg',
                        'Technology' => 'Technology.jpg',
                        'Education' => 'Education.jpg',
                        'Health' => 'Health.jpg',
                        'Environment' => 'Environment.jpg',
                        'Social' => 'Social.jpg',
                        'Art & Culture' => 'SeniBudaya.jpg',
                    ];
                    $categoryImage = $categoryImages[$category->name] ?? 'UMKM.jpg';
                @endphp
                <a href="{{ route('campaigns.index', ['category' => $category->slug]) }}" class="group">
                    <div class="relative rounded-xl overflow-hidden h-48 hover:shadow-lg transition-all hover:-translate-y-1">
                        <!-- Background Image with Overlay -->
                        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/Category/' . $categoryImage) }}');"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent group-hover:from-[#1A7332]/80 group-hover:via-[#1A7332]/50 transition-all"></div>

                        <!-- Content -->
                        <div class="relative h-full flex flex-col justify-end p-6 text-white">
                            <div class="text-3xl mb-2">{{ $category->icon }}</div>
                            <h3 class="font-bold text-lg mb-1">{{ __($category->name) }}</h3>
                            <p class="text-xs text-white/90">{{ $category->campaigns_count }} campaigns</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-16 md:py-24 bg-[#1A7332] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <!-- Image -->
            <div class="relative">
                <div class="absolute inset-0 bg-[#F5A623] rounded-full blur-3xl opacity-20"></div>
                <img src="{{ asset('images/AuthBackground.png') }}" alt="About DanaKarya" class="relative rounded-2xl shadow-2xl">
            </div>

            <!-- Content -->
            <div>
                <h2 class="text-3xl md:text-4xl font-bold mb-6">{{ __('About DanaKarya') }}</h2>
                <p class="text-lg text-gray-100 mb-6 leading-relaxed">
                    {{ __('DanaKarya adalah platform crowdfunding yang didedikasikan untuk membantu UMKM Indonesia berkembang dan mewujudkan impian mereka. Kami percaya bahwa setiap bisnis kecil memiliki potensi besar untuk membawa perubahan positif.') }}
                </p>
                <p class="text-lg text-gray-100 mb-8 leading-relaxed">
                    {{ __('Dengan dukungan dari komunitas backers yang peduli, kami telah membantu ratusan UMKM mendapatkan pendanaan yang mereka butuhkan untuk tumbuh dan berkembang.') }}
                </p>
                <a href="/about" class="inline-flex items-center gap-2 px-8 py-4 bg-[#F5A623] hover:bg-[#E09612] text-white font-semibold rounded-lg transition">
                    {{ __('Learn More') }}
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 md:py-24 bg-gradient-to-r from-[#1A7332] to-[#1A5647] text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">{{ __('Ready to Start Your Campaign?') }}</h2>
        <p class="text-xl text-gray-100 mb-8 max-w-2xl mx-auto">
            {{ __('Wujudkan impian bisnis Anda bersama komunitas DanaKarya. Daftarkan campaign Anda sekarang dan mulai mendapatkan dukungan.') }}
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            @guest
                <a href="{{ route('register') }}" class="px-8 py-4 bg-[#F5A623] hover:bg-[#E09612] text-white font-semibold rounded-lg transition shadow-lg">
                    {{ __('Get Started Now') }}
                </a>
                <a href="/contact" class="px-8 py-4 bg-white/10 hover:bg-white/20 backdrop-blur-sm text-white font-semibold rounded-lg transition border-2 border-white/30">
                    {{ __('Contact Us') }}
                </a>
            @else
                <a href="{{ route('campaigns.index') }}" class="px-8 py-4 bg-[#F5A623] hover:bg-[#E09612] text-white font-semibold rounded-lg transition shadow-lg">
                    {{ __('Browse Campaigns') }}
                </a>
            @endguest
        </div>
    </div>
</section>
@endsection
