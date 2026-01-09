@extends('layouts.public')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-[#1A7332] to-[#1A5647] text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ __('Get in Touch') }}</h1>
        <p class="text-xl text-gray-100">
            {{ __('Punya pertanyaan? Tim DanaKarya siap membantu Anda!') }}
        </p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-16 md:py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">{{ __('Send Us a Message') }}</h2>

                <!-- Success Message -->
                <div id="success-message" class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg hidden">
                    Thank you for contacting us! We will get back to you soon.
                </div>

                <!-- Error Message -->
                <div id="error-message" class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg hidden">
                    Failed to send message. Please try again.
                </div>

                <form id="contact-form" class="space-y-6">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-900 mb-2">
                            {{ __('Full Name') }} <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 text-gray-900 focus:ring-2 focus:ring-[#1A7332] focus:border-transparent"
                            required
                        >
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-900 mb-2">
                            {{ __('Email Address') }} <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 text-gray-900 focus:ring-2 focus:ring-[#1A7332] focus:border-transparent"
                            required
                        >
                    </div>

                    <!-- Subject -->
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-900 mb-2">
                            {{ __('Subject') }} <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            id="subject"
                            name="subject"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 text-gray-900 focus:ring-2 focus:ring-[#1A7332] focus:border-transparent"
                            required
                        >
                    </div>

                    <!-- Message -->
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-900 mb-2">
                            {{ __('Message') }} <span class="text-red-500">*</span>
                        </label>
                        <textarea
                            id="message"
                            name="message"
                            rows="6"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 text-gray-900 focus:ring-2 focus:ring-[#1A7332] focus:border-transparent"
                            required
                        ></textarea>
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        id="submit-btn"
                        class="w-full px-8 py-4 bg-[#F5A623] hover:bg-[#E09612] text-white font-semibold rounded-lg transition shadow-lg"
                    >
                        {{ __('Send Message') }}
                    </button>
                </form>
            </div>

            <!-- Contact Info -->
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">{{ __('Contact Information') }}</h2>
                <p class="text-gray-600 mb-8">
                    {{ __('Hubungi kami melalui channel di bawah ini atau isi form, dan kami akan merespons secepat mungkin.') }}
                </p>

                <!-- Contact Cards -->
                <div class="space-y-6">
                    <!-- Email -->
                    <div class="flex items-start gap-4 p-6 bg-white rounded-xl shadow-md">
                        <div class="w-12 h-12 bg-[#1A7332] rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">{{ __('Email') }}</h3>
                            <a href="mailto:danakaryaid@gmail.com" class="text-[#1A7332] hover:underline">danakaryaid@gmail.com</a>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex items-start gap-4 p-6 bg-white rounded-xl shadow-md">
                        <div class="w-12 h-12 bg-[#1A7332] rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">{{ __('Phone') }}</h3>
                            <a href="tel:+6285381008349" class="text-[#1A7332] hover:underline">+62 853-8100-8349</a>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="flex items-start gap-4 p-6 bg-white rounded-xl shadow-md">
                        <div class="w-12 h-12 bg-[#1A7332] rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">{{ __('Address') }}</h3>
                            <p class="text-gray-600">
                                Jl. Kebon Jeruk Raya No. 27<br>
                                Jakarta Barat, DKI Jakarta 11530<br>
                                Indonesia
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="mt-8">
                    <h3 class="font-semibold text-gray-900 mb-4">{{ __('Follow Us') }}</h3>
                    <div class="flex gap-4">
                        <!-- Facebook -->
                        <a href="#" class="w-14 h-14 bg-[#F0B74C] rounded-full shadow-lg hover:shadow-xl hover:scale-110 flex items-center justify-center transition-all duration-300 group p-3">
                            <img src="{{ asset('images/SocialMediaLogo/Facebook.png') }}" alt="Facebook" class="w-full h-full object-contain brightness-0 invert">
                        </a>
                        <!-- Twitter/X -->
                        <a href="#" class="w-14 h-14 bg-[#F0B74C] rounded-full shadow-lg hover:shadow-xl hover:scale-110 flex items-center justify-center transition-all duration-300 group p-3">
                            <img src="{{ asset('images/SocialMediaLogo/X.png') }}" alt="X (Twitter)" class="w-full h-full object-contain brightness-0 invert">
                        </a>
                        <!-- Instagram -->
                        <a href="#" class="w-14 h-14 bg-[#F0B74C] rounded-full shadow-lg hover:shadow-xl hover:scale-110 flex items-center justify-center transition-all duration-300 group p-3">
                            <img src="{{ asset('images/SocialMediaLogo/Instagram.png') }}" alt="Instagram" class="w-full h-full object-contain brightness-0 invert">
                        </a>
                        <!-- LinkedIn -->
                        <a href="#" class="w-14 h-14 bg-[#F0B74C] rounded-full shadow-lg hover:shadow-xl hover:scale-110 flex items-center justify-center transition-all duration-300 group p-3">
                            <img src="{{ asset('images/SocialMediaLogo/Linkedin.png') }}" alt="LinkedIn" class="w-full h-full object-contain brightness-0 invert">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-[#1A7332] to-[#1A5647] text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">{{ __('Can\'t Find Your Answer?') }}</h2>
        <p class="text-xl text-gray-100 mb-8">
            {{ __('Tenang, tim DanaKarya siap membantu kamu! Hubungi kami langsung jika kamu tidak menemukan jawaban yang kamu cari.') }}
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="mailto:danakaryaid@gmail.com" class="px-8 py-4 bg-[#F5A623] hover:bg-[#E09612] text-white font-semibold rounded-lg transition shadow-lg">
                {{ __('Email Us') }}
            </a>
            <a href="tel:+6285381008349" class="px-8 py-4 bg-white/10 hover:bg-white/20 backdrop-blur-sm text-white font-semibold rounded-lg transition border-2 border-white/30">
                {{ __('Call Us') }}
            </a>
        </div>
    </div>
</section>

<!-- EmailJS CDN -->
<script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>

<script>
  // Initialize EmailJS
  (function () {
    emailjs.init("D3CIOpMohPYaWAQ4b");
  })();

  // Handle form submission
  document.getElementById("contact-form").addEventListener("submit", function (e) {
    e.preventDefault();

    const submitBtn = document.getElementById("submit-btn");
    const successMsg = document.getElementById("success-message");
    const errorMsg = document.getElementById("error-message");

    // Hide messages
    successMsg.classList.add("hidden");
    errorMsg.classList.add("hidden");

    // Disable button and show loading state
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<svg class="animate-spin h-5 w-5 text-white mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Sending...';

    // Send email via EmailJS
    emailjs.sendForm(
      "service_re14h9a",
      "template_75m8ilg",
      this
    ).then(
      function () {
        // Success
        successMsg.classList.remove("hidden");
        submitBtn.disabled = false;
        submitBtn.innerHTML = "{{ __('Send Message') }}";

        // Reset form
        document.getElementById("contact-form").reset();

        // Scroll to success message
        successMsg.scrollIntoView({ behavior: 'smooth', block: 'center' });
      },
      function (error) {
        // Error
        errorMsg.classList.remove("hidden");
        submitBtn.disabled = false;
        submitBtn.innerHTML = "{{ __('Send Message') }}";

        console.error("EmailJS Error:", error);

        // Scroll to error message
        errorMsg.scrollIntoView({ behavior: 'smooth', block: 'center' });
      }
    );
  });
</script>
@endsection
