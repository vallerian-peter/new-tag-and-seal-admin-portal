<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Our Solutions - Tag & Seal</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>

    <body class="min-h-screen bg-gradient-to-br from-green-50 via-yellow-50 to-green-100 relative">

        <!-- Top Navigation Bar -->
        <nav class="relative z-20 bg-white/90 backdrop-blur-md border-b border-gray-200 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <div class="flex-shrink-0 flex items-center">
                            <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <span class="text-xl font-bold text-gray-800">Tag & Seal</span>
                        </div>
                    </div>

                    <!-- Navigation Menu -->
                    <div class="hidden md:block">
                        <div class="ml-12 flex items-baseline space-x-8">
                            <a href="/" class="text-gray-600 hover:text-green-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Home</a>
                            <a href="/solutions" class="text-green-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Our Solutions</a>
                            <a href="/about" class="text-gray-600 hover:text-green-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">About Us</a>
                            <a href="/contact" class="text-gray-600 hover:text-green-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Contact Us</a>
                            <a href="/admin" class="bg-yellow-400 hover:bg-yellow-300 text-green-900 px-4 py-2 rounded-md text-sm font-medium transition-colors duration-200">Admin Panel</a>
                        </div>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="md:hidden">
                        <button type="button" class="text-gray-600 hover:text-green-600 focus:outline-none focus:text-green-600" onclick="toggleMobileMenu()">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu -->
            <div id="mobile-menu" class="md:hidden hidden bg-white/95 backdrop-blur-md border-t border-gray-200">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <a href="/" class="text-gray-600 hover:text-green-600 block px-3 py-2 rounded-md text-base font-medium">Home</a>
                    <a href="/solutions" class="text-green-600 block px-3 py-2 rounded-md text-base font-medium">Our Solutions</a>
                    <a href="/about" class="text-gray-600 hover:text-green-600 block px-3 py-2 rounded-md text-base font-medium">About Us</a>
                    <a href="/contact" class="text-gray-600 hover:text-green-600 block px-3 py-2 rounded-md text-base font-medium">Contact Us</a>
                    <a href="/admin" class="bg-yellow-400 hover:bg-yellow-300 text-green-900 block px-3 py-2 rounded-md text-base font-medium">Admin Panel</a>
                </div>
            </div>
        </nav>

        <!-- Modern gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-green-50/50 via-yellow-50/30 to-green-50/50"></div>

        <!-- Main Content -->
        <div class="relative z-10 min-h-screen py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Hero Section -->
                <div class="text-center mb-20">
                    <h1 class="text-5xl md:text-6xl font-extrabold text-gray-800 mb-6">
                        Our <span class="text-green-600">Solutions</span>
                    </h1>
                    <p class="text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto">
                        Comprehensive livestock management solutions designed for modern farmers
                    </p>
                </div>

                <!-- Main Solutions -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-20">
                    <!-- Real-time Tracking -->
                    <div class="bg-white/80 backdrop-blur-sm p-8 rounded-2xl border border-gray-200 hover:bg-white/90 transition-all duration-300 shadow-lg">
                        <div class="w-16 h-16 bg-green-600 rounded-xl flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Real-time Tracking</h3>
                        <p class="text-gray-600 mb-6">Monitor your livestock 24/7 with advanced GPS tracking and health monitoring systems.</p>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                GPS Location Tracking
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                Health Monitoring
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                Movement Alerts
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                24/7 Monitoring
                            </li>
                        </ul>
                    </div>

                    <!-- Digital Records -->
                    <div class="bg-white/80 backdrop-blur-sm p-8 rounded-2xl border border-gray-200 hover:bg-white/90 transition-all duration-300 shadow-lg">
                        <div class="w-16 h-16 bg-green-600 rounded-xl flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Digital Records</h3>
                        <p class="text-gray-600 mb-6">Maintain comprehensive digital records of all your livestock with our easy-to-use management system.</p>
                        <ul class="space-y-2 text-gray-300">
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-yellow-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                Livestock Profiles
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-yellow-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                Health History
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-yellow-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                Breeding Records
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-yellow-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                Vaccination Tracking
                            </li>
                        </ul>
                    </div>

                    <!-- Quick Access -->
                    <div class="bg-white/80 backdrop-blur-sm p-8 rounded-2xl border border-gray-200 hover:bg-white/90 transition-all duration-300 shadow-lg">
                        <div class="w-16 h-16 bg-green-600 rounded-xl flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Quick Access</h3>
                        <p class="text-gray-600 mb-6">Access your livestock data instantly from anywhere with our cloud-based platform.</p>
                        <ul class="space-y-2 text-gray-300">
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-yellow-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                Cloud Storage
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-yellow-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                Mobile App
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-yellow-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                Real-time Updates
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-yellow-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                Offline Access
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Additional Features -->
                <div class="mb-20">
                    <div class="text-center mb-12">
                        <h2 class="text-4xl font-bold text-gray-800 mb-6">Additional Features</h2>
                        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                            Everything you need for comprehensive livestock management
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="bg-white/80 backdrop-blur-sm p-6 rounded-xl border border-gray-200 text-center shadow-lg">
                            <div class="w-12 h-12 bg-yellow-400 rounded-lg flex items-center justify-center mx-auto mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800 mb-2">Analytics</h3>
                            <p class="text-gray-600 text-sm">Comprehensive data analysis and insights</p>
                        </div>

                        <div class="bg-white/80 backdrop-blur-sm p-6 rounded-xl border border-gray-200 text-center shadow-lg">
                            <div class="w-12 h-12 bg-yellow-400 rounded-lg flex items-center justify-center mx-auto mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM4.828 7l2.586 2.586a2 2 0 002.828 0L12 7H4.828z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800 mb-2">Reports</h3>
                            <p class="text-gray-600 text-sm">Detailed reports and documentation</p>
                        </div>

                        <div class="bg-white/80 backdrop-blur-sm p-6 rounded-xl border border-gray-200 text-center shadow-lg">
                            <div class="w-12 h-12 bg-yellow-400 rounded-lg flex items-center justify-center mx-auto mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800 mb-2">Mobile App</h3>
                            <p class="text-gray-600 text-sm">Access from your smartphone</p>
                        </div>

                        <div class="bg-white/80 backdrop-blur-sm p-6 rounded-xl border border-gray-200 text-center shadow-lg">
                            <div class="w-12 h-12 bg-yellow-400 rounded-lg flex items-center justify-center mx-auto mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M12 2.25a9.75 9.75 0 100 19.5 9.75 9.75 0 000-19.5z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800 mb-2">Support</h3>
                            <p class="text-gray-600 text-sm">24/7 customer support</p>
                        </div>
                    </div>
                </div>

                <!-- Benefits Section -->
                <div class="mb-20">
                    <div class="text-center mb-12">
                        <h2 class="text-4xl font-bold text-gray-800 mb-6">Why Choose Tag & Seal?</h2>
                        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                            The benefits of using our livestock management solutions
                        </p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center mr-4 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 mb-2">Increased Efficiency</h3>
                                    <p class="text-gray-600">Streamline your operations and reduce manual work with automated tracking and record-keeping.</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center mr-4 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 mb-2">Better Health Management</h3>
                                    <p class="text-gray-600">Monitor livestock health in real-time and get alerts for potential issues before they become problems.</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center mr-4 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 mb-2">Cost Reduction</h3>
                                    <p class="text-gray-600">Reduce losses and improve profitability through better tracking and management of your livestock.</p>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center mr-4 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 mb-2">Data-Driven Decisions</h3>
                                    <p class="text-gray-600">Make informed decisions based on comprehensive data and analytics about your livestock.</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center mr-4 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 mb-2">Compliance & Traceability</h3>
                                    <p class="text-gray-600">Meet regulatory requirements and maintain complete traceability of your livestock.</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center mr-4 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-800 mb-2">Scalability</h3>
                                    <p class="text-gray-600">Grow your operations with confidence knowing our system can scale with your needs.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CTA Section -->
                <div class="text-center">
                    <div class="bg-white/80 backdrop-blur-sm p-8 rounded-2xl border border-gray-200 shadow-lg">
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">Ready to Transform Your Livestock Management?</h2>
                        <p class="text-xl text-gray-600 mb-8">Join thousands of farmers who trust Tag & Seal for their livestock management needs.</p>
                        <div class="flex flex-col sm:flex-row justify-center gap-4">
                            <a href="/contact" class="px-8 py-4 bg-yellow-400 hover:bg-yellow-300 text-green-900 font-bold rounded-full transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                                Get Started Today
                            </a>
                            <a href="/admin" class="px-8 py-4 bg-green-600 hover:bg-green-700 text-white font-medium rounded-full transition-all duration-300 border border-green-600">
                                Try Admin Panel
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Footer -->
        <footer class="relative z-20 bg-white/90 backdrop-blur-md border-t border-gray-200 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="text-center">
                    <div class="flex items-center justify-center mb-4">
                        <div class="w-8 h-8 bg-green-600 rounded-lg flex items-center justify-center mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <span class="text-lg font-bold text-gray-800">Tag & Seal</span>
                    </div>
                    <p class="text-gray-600 text-sm">© 2024 Tag & Seal. All rights reserved.</p>
                </div>
            </div>
        </footer>

        <!-- JavaScript -->
        <script>
            function toggleMobileMenu() {
                const mobileMenu = document.getElementById('mobile-menu');
                mobileMenu.classList.toggle('hidden');
            }
        </script>
    </body>
</html>
