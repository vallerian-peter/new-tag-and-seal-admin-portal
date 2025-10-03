<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>About Us - Tag & Seal</title>
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
                            <a href="/solutions" class="text-gray-600 hover:text-green-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Our Solutions</a>
                            <a href="/about" class="text-green-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">About Us</a>
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
                    <a href="/solutions" class="text-gray-600 hover:text-green-600 block px-3 py-2 rounded-md text-base font-medium">Our Solutions</a>
                    <a href="/about" class="text-green-600 block px-3 py-2 rounded-md text-base font-medium">About Us</a>
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
                        About <span class="text-green-600">Tag & Seal</span>
                    </h1>
                    <p class="text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto">
                        Revolutionizing livestock management through innovative technology solutions
                    </p>
                </div>

                <!-- Mission & Vision -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-20">
                    <div class="bg-white/80 backdrop-blur-sm p-8 rounded-2xl border border-gray-200 shadow-lg">
                        <div class="w-16 h-16 bg-green-600 rounded-xl flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">Our Mission</h2>
                        <p class="text-gray-600 text-lg leading-relaxed">
                            To empower farmers with cutting-edge technology solutions that make livestock tracking,
                            health monitoring, and record management simple, efficient, and reliable. We believe
                            that every farmer deserves access to modern tools that can transform their operations.
                        </p>
                    </div>

                    <div class="bg-white/80 backdrop-blur-sm p-8 rounded-2xl border border-gray-200 shadow-lg">
                        <div class="w-16 h-16 bg-yellow-400 rounded-xl flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-800 mb-4">Our Vision</h2>
                        <p class="text-gray-600 text-lg leading-relaxed">
                            To become the leading provider of livestock management solutions in Africa,
                            creating a connected ecosystem where farmers can monitor, manage, and optimize
                            their livestock operations with unprecedented precision and ease.
                        </p>
                    </div>
                </div>

                <!-- Our Story -->
                <div class="mb-20">
                    <div class="text-center mb-12">
                        <h2 class="text-4xl font-bold text-gray-800 mb-6">Our Story</h2>
                        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                            Born from a passion for agriculture and technology
                        </p>
                    </div>

                    <div class="bg-white/80 backdrop-blur-sm p-8 rounded-2xl border border-gray-200 shadow-lg">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                            <div>
                                <p class="text-gray-600 text-lg leading-relaxed mb-6">
                                    Tag & Seal was founded in 2024 with a simple yet powerful vision: to bridge the gap
                                    between traditional farming practices and modern technology. Our founders, having
                                    witnessed the challenges faced by livestock farmers in Tanzania and across East Africa,
                                    recognized the need for innovative solutions.
                                </p>
                                <p class="text-gray-600 text-lg leading-relaxed mb-6">
                                    We started as a small team of agricultural experts and technology enthusiasts,
                                    united by the belief that every farmer deserves access to tools that can transform
                                    their operations. Today, we're proud to serve thousands of farmers across the region.
                                </p>
                                <p class="text-gray-600 text-lg leading-relaxed">
                                    Our journey continues as we develop new features, expand our reach, and work
                                    tirelessly to make livestock management more efficient, profitable, and sustainable
                                    for farmers everywhere.
                                </p>
                            </div>
                            <div class="bg-green-50 p-6 rounded-xl border border-green-200">
                                <div class="text-center">
                                    <div class="w-24 h-24 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Founded 2024</h3>
                                    <p class="text-gray-600">Making a difference in agriculture</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Our Values -->
                <div class="mb-20">
                    <div class="text-center mb-12">
                        <h2 class="text-4xl font-bold text-gray-800 mb-6">Our Values</h2>
                        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                            The principles that guide everything we do
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <div class="bg-white/80 backdrop-blur-sm p-6 rounded-xl border border-gray-200 text-center shadow-lg">
                            <div class="w-12 h-12 bg-yellow-400 rounded-lg flex items-center justify-center mx-auto mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">Innovation</h3>
                            <p class="text-gray-600">We continuously push the boundaries of what's possible in agricultural technology.</p>
                        </div>

                        <div class="bg-white/80 backdrop-blur-sm p-6 rounded-xl border border-gray-200 text-center shadow-lg">
                            <div class="w-12 h-12 bg-yellow-400 rounded-lg flex items-center justify-center mx-auto mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">Passion</h3>
                            <p class="text-gray-600">We're driven by our love for agriculture and commitment to farmer success.</p>
                        </div>

                        <div class="bg-white/80 backdrop-blur-sm p-6 rounded-xl border border-gray-200 text-center shadow-lg">
                            <div class="w-12 h-12 bg-yellow-400 rounded-lg flex items-center justify-center mx-auto mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">Community</h3>
                            <p class="text-gray-600">We build strong relationships with farmers and agricultural communities.</p>
                        </div>

                        <div class="bg-white/80 backdrop-blur-sm p-6 rounded-xl border border-gray-200 text-center shadow-lg">
                            <div class="w-12 h-12 bg-yellow-400 rounded-lg flex items-center justify-center mx-auto mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">Reliability</h3>
                            <p class="text-gray-600">Farmers can count on our solutions to work when they need them most.</p>
                        </div>

                        <div class="bg-white/80 backdrop-blur-sm p-6 rounded-xl border border-gray-200 text-center shadow-lg">
                            <div class="w-12 h-12 bg-yellow-400 rounded-lg flex items-center justify-center mx-auto mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">Growth</h3>
                            <p class="text-gray-600">We help farmers grow their operations and achieve sustainable success.</p>
                        </div>

                        <div class="bg-white/80 backdrop-blur-sm p-6 rounded-xl border border-gray-200 text-center shadow-lg">
                            <div class="w-12 h-12 bg-yellow-400 rounded-lg flex items-center justify-center mx-auto mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">Sustainability</h3>
                            <p class="text-gray-600">We promote sustainable farming practices for a better future.</p>
                        </div>
                    </div>
                </div>

                <!-- Team Section -->
                <div class="mb-20">
                    <div class="text-center mb-12">
                        <h2 class="text-4xl font-bold text-gray-800 mb-6">Our Team</h2>
                        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                            Meet the passionate individuals behind Tag & Seal
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <div class="bg-white/80 backdrop-blur-sm p-6 rounded-xl border border-gray-200 text-center shadow-lg">
                            <div class="w-20 h-20 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Agricultural Experts</h3>
                            <p class="text-gray-600">Deep knowledge of farming practices and livestock management</p>
                        </div>

                        <div class="bg-white/80 backdrop-blur-sm p-6 rounded-xl border border-gray-200 text-center shadow-lg">
                            <div class="w-20 h-20 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Technology Specialists</h3>
                            <p class="text-gray-600">Cutting-edge software development and system architecture</p>
                        </div>

                        <div class="bg-white/80 backdrop-blur-sm p-6 rounded-xl border border-gray-200 text-center shadow-lg">
                            <div class="w-20 h-20 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Support Team</h3>
                            <p class="text-gray-600">Dedicated customer service and farmer support specialists</p>
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
                        <div class="w-8 h-8 bg-yellow-400 rounded-lg flex items-center justify-center mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
