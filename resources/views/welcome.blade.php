<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

        {{-- <style type="text/tailwindcss">
        @theme {
            --color-clifford: #da373d;
        }
        </style> --}}
    </head>

    <body class="min-h-screen bg-cover bg-center bg-no-repeat relative"
    style="background-image: url('{{ asset('/images/Cow Animal Nature - Free photo on Pixabay.jpeg') }}'); background-attachment: fixed;">

  <!-- Floating Navigation Bar -->
  <nav id="navbar" class="fixed top-6 left-1/2 transform -translate-x-1/2 z-50 bg-white/15 backdrop-blur-xl border border-white/20 rounded-full shadow-2xl transition-all duration-500 hover:bg-white/20 hover:shadow-3xl">
      <div class="px-8 py-3">
          <div class="flex justify-between items-center h-12">
              <!-- Logo -->
              <div class="flex items-center">
                  <div class="flex-shrink-0 flex items-center">
                      <div class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center mr-3 shadow-lg">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                          </svg>
                      </div>
                      <span class="text-lg font-bold text-white tracking-wide">Tag & Seal</span>
                  </div>
              </div>

              <!-- Navigation Menu -->
              <div class="hidden md:block">
                        <div class="flex items-center space-x-8 ml-12">
                            <a href="/" class="text-white hover:text-yellow-300 px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 hover:bg-white/10">Home</a>
                            <a href="/solutions" class="text-white/90 hover:text-yellow-300 px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 hover:bg-white/10">Solutions</a>
                            <a href="/about" class="text-white/90 hover:text-yellow-300 px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 hover:bg-white/10">About</a>
                            <a href="/contact" class="text-white/90 hover:text-yellow-300 px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 hover:bg-white/10">Contact</a>
                            <a href="/admin" class="bg-yellow-400 hover:bg-yellow-300 text-green-900 px-6 py-2 rounded-full text-sm font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">Admin Panel</a>
                        </div>
              </div>

              <!-- Mobile menu button -->
              <div class="md:hidden">
                  <button type="button" class="text-white/90 hover:text-yellow-300 focus:outline-none focus:text-yellow-300 p-2 rounded-full hover:bg-white/10 transition-all duration-300" onclick="toggleMobileMenu()">
                      <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                      </svg>
                  </button>
              </div>
          </div>
      </div>

      <!-- Mobile menu -->
      <div id="mobile-menu" class="md:hidden hidden bg-white/15 backdrop-blur-xl border border-white/20 rounded-2xl mt-3 shadow-2xl">
          <div class="px-6 py-4 space-y-3">
                    <a href="/" class="text-white hover:text-yellow-300 block px-4 py-3 rounded-full text-base font-medium transition-all duration-300 hover:bg-white/10">Home</a>
                    <a href="/solutions" class="text-white hover:text-yellow-300 block px-4 py-3 rounded-full text-base font-medium transition-all duration-300 hover:bg-white/10">Solutions</a>
                    <a href="/about" class="text-white hover:text-yellow-300 block px-4 py-3 rounded-full text-base font-medium transition-all duration-300 hover:bg-white/10">About</a>
                    <a href="/contact" class="text-white hover:text-yellow-300 block px-4 py-3 rounded-full text-base font-medium transition-all duration-300 hover:bg-white/10">Contact</a>
              <a href="/admin" class="bg-yellow-400 hover:bg-yellow-300 text-green-900 block px-4 py-3 rounded-full text-base font-semibold transition-all duration-300 shadow-lg">Admin Panel</a>
          </div>
      </div>
  </nav>

  <!-- Overlay with gradient -->
  <div class="absolute inset-0 bg-gradient-to-br from-green-900/70 via-green-800/60 to-green-900/70"></div>

  <!-- Home Section -->
  <section id="home" class="min-h-screen flex items-center justify-center relative z-10 w-full px-4 sm:px-6 lg:px-8">
      <div class="max-w-4xl mx-auto text-center transform transition-all duration-500 hover:scale-105">
          <!-- Logo/Icon -->
          <div class="mb-8">
              <div class="w-24 h-24 mx-auto bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center shadow-xl border-2 border-yellow-300/30">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                  </svg>
              </div>
          </div>

          <!-- Main Heading -->
          <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-6 leading-tight tracking-tight">
              <span class="text-yellow-300">Tag & Seal</span> System
          </h1>

          <!-- Subtitle -->
          <p class="text-xl md:text-2xl text-gray-100 mb-4 max-w-2xl mx-auto leading-relaxed">
              A secure traceability solution using RFID and tamper-evident technology to monitor livestock, crops, and critical physical assets.
          </p>

          <!-- Company Info -->
          <p class="text-lg text-gray-200 mb-10 max-w-2xl mx-auto leading-relaxed">
              <span class="text-yellow-300 font-semibold">Powered by Climb Up Limited</span> - Empowering agriculture through transformative ICT solutions built for Africa's realities.
          </p>

          <!-- CTA Buttons -->
          <div class="flex flex-col sm:flex-row justify-center gap-4 mb-12">
              <a href="/admin" class="px-8 py-4 bg-yellow-400 hover:bg-yellow-300 text-green-900 font-bold rounded-full transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg flex items-center justify-center gap-2">
                  <span>Get Started</span>
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
              </a>
              {{-- <a href="#features" class="px-8 py-4 bg-white/10 hover:bg-white/20 text-white font-medium rounded-full backdrop-blur-sm transition-all duration-300 border border-white/20">
                  Learn More
              </a> --}}
          </div>

          <!-- System Capabilities -->
          <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto mt-12">
              <div class="bg-white/15 backdrop-blur-sm p-4 rounded-xl border border-white/20 hover:bg-white/20 transition-all duration-300 shadow-lg">
                  <div class="text-yellow-300 text-3xl font-bold mb-1">15+</div>
                  <div class="text-sm text-gray-200">Farm Activities</div>
              </div>
              <div class="bg-white/15 backdrop-blur-sm p-4 rounded-xl border border-white/20 hover:bg-white/20 transition-all duration-300 shadow-lg">
                  <div class="text-yellow-300 text-3xl font-bold mb-1">4-Level</div>
                  <div class="text-sm text-gray-200">Hierarchy System</div>
              </div>
              <div class="bg-white/15 backdrop-blur-sm p-4 rounded-xl border border-white/20 hover:bg-white/20 transition-all duration-300 shadow-lg">
                  <div class="text-yellow-300 text-3xl font-bold mb-1">Farm-Fork</div>
                  <div class="text-sm text-gray-200">Traceability</div>
              </div>
              <div class="bg-white/15 backdrop-blur-sm p-4 rounded-xl border border-white/20 hover:bg-white/20 transition-all duration-300 shadow-lg">
                  <div class="text-yellow-300 text-3xl font-bold mb-1">Real-time</div>
                  <div class="text-sm text-gray-200">Data Sync</div>
              </div>
          </div>
      </div>
  </section>

  <!-- Our Solutions Section -->
  <section id="solutions" class="min-h-screen flex items-center justify-center relative z-10 w-full px-4 sm:px-6 lg:px-8 py-0 bg-gradient-to-br from-white via-green-50 to-yellow-50">
      <div class="max-w-6xl mx-auto py-20">
          <div class="text-center mb-16">
              <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">System Features</h2>
              <p class="text-xl text-gray-600 max-w-3xl mx-auto">Complete livestock management with hierarchical data structure and full traceability</p>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
              <div class="bg-white/80 backdrop-blur-sm p-8 rounded-2xl border border-gray-200 hover:bg-white/90 transition-all duration-300 shadow-lg">
                  <div class="w-16 h-16 bg-yellow-400 rounded-xl flex items-center justify-center mb-6 mx-auto">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                      </svg>
                  </div>
                  <h3 class="text-2xl font-bold text-gray-800 mb-4">Farm Profiling</h3>
                  <p class="text-gray-600">Complete farm mapping and profiling with detailed farmer information, crop data, and farm size tracking.</p>
              </div>

              <div class="bg-white/80 backdrop-blur-sm p-8 rounded-2xl border border-gray-200 hover:bg-white/90 transition-all duration-300 shadow-lg">
                  <div class="w-16 h-16 bg-yellow-400 rounded-xl flex items-center justify-center mb-6 mx-auto">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                      </svg>
                  </div>
                  <h3 class="text-2xl font-bold text-gray-800 mb-4">Livestock Management</h3>
                  <p class="text-gray-600">Track 15+ farm activities including registration, feeding, breeding, health monitoring, and sales management.</p>
              </div>

              <div class="bg-white/80 backdrop-blur-sm p-8 rounded-2xl border border-gray-200 hover:bg-white/90 transition-all duration-300 shadow-lg">
                  <div class="w-16 h-16 bg-yellow-400 rounded-xl flex items-center justify-center mb-6 mx-auto">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                      </svg>
                  </div>
                  <h3 class="text-2xl font-bold text-gray-800 mb-4">Farm-to-Fork Traceability</h3>
                  <p class="text-gray-600">Complete traceability system from farm origin to consumer market with hierarchical data management.</p>
              </div>
          </div>
      </div>
  </section>

  <!-- About Us Section -->
  <section id="about" class="min-h-screen flex items-center justify-center relative z-10 w-full px-4 sm:px-6 lg:px-8 py-20">
      <div class="max-w-6xl mx-auto">
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
              <div>
                  <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">About Tag & Seal System</h2>
                  <p class="text-xl text-gray-200 mb-6">A comprehensive livestock management system with 4-level hierarchical data structure from individual farmers to national level.</p>
                  <p class="text-lg text-gray-300 mb-8">Developed by Climb Up Limited, our system enables complete farm profiling, livestock tracking, and farm-to-fork traceability with real-time data synchronization across all levels.</p>

                  <div class="space-y-4">
                      <div class="flex items-center">
                          <div class="w-6 h-6 bg-yellow-400 rounded-full flex items-center justify-center mr-4">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                              </svg>
                          </div>
                          <span class="text-white">4-Level Hierarchy: Farmer → Village → Ward → District → Region → National</span>
                      </div>
                      <div class="flex items-center">
                          <div class="w-6 h-6 bg-yellow-400 rounded-full flex items-center justify-center mr-4">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                              </svg>
                          </div>
                          <span class="text-white">15+ Farm Activities: Registration, Feeding, Breeding, Health, Sales</span>
                      </div>
                      <div class="flex items-center">
                          <div class="w-6 h-6 bg-yellow-400 rounded-full flex items-center justify-center mr-4">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                              </svg>
                          </div>
                          <span class="text-white">Complete Farm-to-Fork Traceability System</span>
                      </div>
                  </div>
              </div>

              <div class="bg-white/20 backdrop-blur-sm p-8 rounded-2xl border border-white/30 shadow-lg">
                  <div class="text-center">
                      <div class="w-32 h-32 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-6">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                          </svg>
                      </div>
                      <h3 class="text-2xl font-bold text-white mb-4">Climb Up Limited</h3>
                      <p class="text-gray-200">Your trusted partner for innovative ICT solutions. Empowering agriculture, utilities, and enterprise ecosystems through transformative technology built for Africa's realities.</p>
                      <div class="mt-4">
                          <p class="text-sm text-gray-300 mb-2">Other Solutions:</p>
                          <p class="text-sm text-gray-300">• Shamba Bora Agribusiness Platform</p>
                          <p class="text-sm text-gray-300">• Shamba Bora ERP System</p>
                          <p class="text-sm text-gray-300">• Prepaid Water Metering Solutions</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- Contact Us Section -->
  <section id="contact" class="bg-white flex items-center justify-center relative z-10 w-full px-4 sm:px-6 lg:px-8 py-20 pb-0" style="min-height: calc(100vh + 200px);">
      <div class="max-w-4xl mx-auto text-center">
          <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">Contact Us</h2>
          <p class="text-xl text-gray-600 mb-12">Get in touch with our team to learn more about our solutions</p>

          <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
              <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 shadow-lg">
                  <div class="w-12 h-12 bg-yellow-400 rounded-lg flex items-center justify-center mx-auto mb-4">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                      </svg>
                  </div>
                  <h3 class="text-lg font-semibold text-gray-800 mb-2">Email</h3>
                  <p class="text-gray-600">info@tagandseal.com</p>
              </div>

              <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 shadow-lg">
                  <div class="w-12 h-12 bg-yellow-400 rounded-lg flex items-center justify-center mx-auto mb-4">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                      </svg>
                  </div>
                  <h3 class="text-lg font-semibold text-gray-800 mb-2">Phone</h3>
                  <p class="text-gray-600">+255 123 456 789</p>
              </div>

              <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 shadow-lg">
                  <div class="w-12 h-12 bg-yellow-400 rounded-lg flex items-center justify-center mx-auto mb-4">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                      </svg>
                  </div>
                  <h3 class="text-lg font-semibold text-gray-800 mb-2">Location</h3>
                  <p class="text-gray-600">Dar es Salaam, Tanzania</p>
              </div>
          </div>

          <div class="bg-gray-50 p-8 rounded-2xl border border-gray-200 shadow-lg">
              <h3 class="text-2xl font-bold text-gray-800 mb-6">Send us a Message</h3>
              <form class="space-y-6">
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                      <input type="text" placeholder="Your Name" class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500">
                      <input type="email" placeholder="Your Email" class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500">
                  </div>
                  <textarea placeholder="Your Message" rows="4" class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500"></textarea>
                  <button type="submit" class="w-full px-8 py-4 bg-yellow-400 hover:bg-yellow-300 text-green-900 font-bold rounded-lg transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                      Send Message
                  </button>
              </form>
          </div>
      </div>
  </section>

  <!-- Animated Background Elements -->
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
      <div class="absolute top-1/4 left-1/4 w-32 h-32 bg-yellow-300/10 rounded-full filter blur-3xl animate-pulse"></div>
      <div class="absolute bottom-1/3 right-1/4 w-40 h-40 bg-green-300/10 rounded-full filter blur-3xl animate-pulse delay-1000"></div>
      <div class="absolute top-1/3 right-1/3 w-24 h-24 bg-white/10 rounded-full filter blur-3xl animate-pulse delay-1500"></div>
  </div>

  <!-- Footer/Navigation Bar -->
  <footer class="relative z-20 bg-white/20 backdrop-blur-md border-t border-white/30 shadow-lg">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

              <!-- Logo and Company Info -->
              <div class="lg:col-span-1">
                  <div class="flex items-center mb-6">
                      <div class="w-12 h-12 bg-yellow-400 rounded-lg flex items-center justify-center mr-4">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                          </svg>
                      </div>
                      <span class="text-2xl font-bold text-white">Tag & Seal System</span>
                  </div>
                  <p class="text-gray-300 mb-6 leading-relaxed">
                      A Climb Up Limited solution for complete livestock management with hierarchical data structure and farm-to-fork traceability.
                  </p>

                  <!-- Social Media Links -->
                  <div class="flex space-x-4">
                      <a href="#" class="w-10 h-10 bg-white/10 hover:bg-yellow-400 rounded-lg flex items-center justify-center transition-all duration-300 group">
                          <svg class="w-5 h-5 text-white group-hover:text-green-900" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                          </svg>
                      </a>
                      <a href="#" class="w-10 h-10 bg-white/10 hover:bg-yellow-400 rounded-lg flex items-center justify-center transition-all duration-300 group">
                          <svg class="w-5 h-5 text-white group-hover:text-green-900" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                          </svg>
                      </a>
                      <a href="#" class="w-10 h-10 bg-white/10 hover:bg-yellow-400 rounded-lg flex items-center justify-center transition-all duration-300 group">
                          <svg class="w-5 h-5 text-white group-hover:text-green-900" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                          </svg>
                      </a>
                      <a href="#" class="w-10 h-10 bg-white/10 hover:bg-yellow-400 rounded-lg flex items-center justify-center transition-all duration-300 group">
                          <svg class="w-5 h-5 text-white group-hover:text-green-900" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/>
                          </svg>
                      </a>
                  </div>
              </div>

              <!-- Quick Links -->
              <div>
                  <h3 class="text-lg font-semibold text-white mb-6">Quick Links</h3>
                  <ul class="space-y-3">
                      <li><a href="/" class="text-gray-300 hover:text-yellow-300 transition-colors duration-200">Home</a></li>
                      <li><a href="/solutions" class="text-gray-300 hover:text-yellow-300 transition-colors duration-200">Our Solutions</a></li>
                      <li><a href="/about" class="text-gray-300 hover:text-yellow-300 transition-colors duration-200">About Us</a></li>
                      <li><a href="/contact" class="text-gray-300 hover:text-yellow-300 transition-colors duration-200">Contact Us</a></li>
                      <li><a href="/admin" class="text-gray-300 hover:text-yellow-300 transition-colors duration-200">Admin Panel</a></li>
                  </ul>
              </div>

              <!-- Navigation Pages -->
              <div>
                  <h3 class="text-lg font-semibold text-white mb-6">Navigation Pages</h3>
                  <ul class="space-y-3">
                      <li><a href="/admin/users" class="text-gray-300 hover:text-yellow-300 transition-colors duration-200">User Management</a></li>
                      <li><a href="/admin/farmers" class="text-gray-300 hover:text-yellow-300 transition-colors duration-200">Farmer Management</a></li>
                      <li><a href="/admin/farms" class="text-gray-300 hover:text-yellow-300 transition-colors duration-200">Farm Management</a></li>
                      <li><a href="/admin/villages" class="text-gray-300 hover:text-yellow-300 transition-colors duration-200">Village Management</a></li>
                      <li><a href="/admin/wards" class="text-gray-300 hover:text-yellow-300 transition-colors duration-200">Ward Management</a></li>
                      <li><a href="/admin/districts" class="text-gray-300 hover:text-yellow-300 transition-colors duration-200">District Management</a></li>
                      <li><a href="/admin/regions" class="text-gray-300 hover:text-yellow-300 transition-colors duration-200">Region Management</a></li>
                  </ul>
              </div>

              <!-- Contact Info -->
              <div>
                  <h3 class="text-lg font-semibold text-white mb-6">Contact Information</h3>
                  <div class="space-y-4">
                      <div class="flex items-start">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400 mt-1 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                          </svg>
                          <div>
                              <p class="text-gray-300">info@tagandseal.com</p>
                              <p class="text-gray-300">support@tagandseal.com</p>
                          </div>
                      </div>
                      <div class="flex items-start">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400 mt-1 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                          </svg>
                          <div>
                              <p class="text-gray-300">+255 123 456 789</p>
                              <p class="text-gray-300">+255 987 654 321</p>
                          </div>
                      </div>
                      <div class="flex items-start">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400 mt-1 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                          </svg>
                          <div>
                              <p class="text-gray-300">Dar es Salaam, Tanzania</p>
                              <p class="text-gray-300">East Africa</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <!-- Bottom Bar -->
          <div class="border-t border-white/20 mt-12 pt-8">
              <div class="flex flex-col md:flex-row justify-between items-center">
                  <div class="text-gray-300 text-sm mb-4 md:mb-0">
                      © 2024 Climb Up Limited. All rights reserved.
                  </div>
                  <div class="flex space-x-6 text-sm">
                      <a href="#" class="text-gray-300 hover:text-yellow-300 transition-colors duration-200">Privacy Policy</a>
                      <a href="#" class="text-gray-300 hover:text-yellow-300 transition-colors duration-200">Terms of Service</a>
                      <a href="#" class="text-gray-300 hover:text-yellow-300 transition-colors duration-200">Cookie Policy</a>
                  </div>
              </div>
          </div>
      </div>
  </footer>

  <!-- JavaScript -->
  <script>
      // Mobile menu toggle
      function toggleMobileMenu() {
          const mobileMenu = document.getElementById('mobile-menu');
          mobileMenu.classList.toggle('hidden');
      }

      // Smooth scrolling for navigation links
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
          anchor.addEventListener('click', function (e) {
              e.preventDefault();
              const target = document.querySelector(this.getAttribute('href'));
              if (target) {
                  target.scrollIntoView({
                      behavior: 'smooth',
                      block: 'start'
                  });
              }
          });
      });

      // Close mobile menu when clicking on a link
      document.querySelectorAll('#mobile-menu a').forEach(link => {
          link.addEventListener('click', function() {
              document.getElementById('mobile-menu').classList.add('hidden');
          });
      });

      // Add scroll effect to navigation
      window.addEventListener('scroll', function() {
          const nav = document.getElementById('navbar');
          const contactSection = document.getElementById('contact');
          const solutionsSection = document.getElementById('solutions');
          const contactSectionTop = contactSection.offsetTop;
          const contactSectionBottom = contactSectionTop + contactSection.offsetHeight;
          const solutionsSectionTop = solutionsSection.offsetTop;
          const solutionsSectionBottom = solutionsSectionTop + solutionsSection.offsetHeight;
          const scrollY = window.scrollY;

          // Check if we're in the contact section or solutions section (light backgrounds)
          if ((scrollY >= contactSectionTop - 100 && scrollY <= contactSectionBottom + 100) ||
              (scrollY >= solutionsSectionTop - 100 && scrollY <= solutionsSectionBottom + 100)) {
              // In light background sections - use dark navbar background only
              nav.className = 'fixed top-6 left-1/2 transform -translate-x-1/2 z-50 bg-gray-800/90 backdrop-blur-xl border border-gray-600/30 rounded-full shadow-2xl transition-all duration-500 hover:bg-gray-700/90 hover:shadow-3xl';
          } else {
              // Not in light background sections - use light navbar background only
              nav.className = 'fixed top-6 left-1/2 transform -translate-x-1/2 z-50 bg-white/15 backdrop-blur-xl border border-white/20 rounded-full shadow-2xl transition-all duration-500 hover:bg-white/20 hover:shadow-3xl';
          }
      });
  </script>
</body>
</html>
