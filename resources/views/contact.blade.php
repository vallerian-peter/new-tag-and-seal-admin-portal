<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Contact Us - Tag & Seal</title>
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
                            <a href="/about" class="text-gray-600 hover:text-green-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">About Us</a>
                            <a href="/contact" class="text-green-600 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Contact Us</a>
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
                    <a href="/about" class="text-gray-600 hover:text-green-600 block px-3 py-2 rounded-md text-base font-medium">About Us</a>
                    <a href="/contact" class="text-green-600 block px-3 py-2 rounded-md text-base font-medium">Contact Us</a>
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
                        Contact <span class="text-green-600">Us</span>
                    </h1>
                    <p class="text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto">
                        Get in touch with our team to learn more about our solutions
                    </p>
                </div>

                <!-- Contact Information -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-20">
                    <div class="bg-white/80 backdrop-blur-sm p-8 rounded-2xl border border-gray-200 text-center shadow-lg">
                        <div class="w-16 h-16 bg-green-600 rounded-xl flex items-center justify-center mx-auto mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Email Us</h3>
                        <p class="text-gray-600 mb-4">Send us an email and we'll respond within 24 hours</p>
                        <div class="space-y-2">
                            <p class="text-green-600 font-medium">info@tagandseal.com</p>
                            <p class="text-green-600 font-medium">support@tagandseal.com</p>
                        </div>
                    </div>

                    <div class="bg-white/80 backdrop-blur-sm p-8 rounded-2xl border border-gray-200 text-center shadow-lg">
                        <div class="w-16 h-16 bg-yellow-400 rounded-xl flex items-center justify-center mx-auto mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Call Us</h3>
                        <p class="text-gray-600 mb-4">Speak directly with our support team</p>
                        <div class="space-y-2">
                            <p class="text-green-600 font-medium">+255 123 456 789</p>
                            <p class="text-green-600 font-medium">+255 987 654 321</p>
                        </div>
                    </div>

                    <div class="bg-white/80 backdrop-blur-sm p-8 rounded-2xl border border-gray-200 text-center shadow-lg">
                        <div class="w-16 h-16 bg-yellow-400 rounded-xl flex items-center justify-center mx-auto mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Visit Us</h3>
                        <p class="text-gray-600 mb-4">Come and see us at our office</p>
                        <div class="space-y-2">
                            <p class="text-green-600 font-medium">Dar es Salaam</p>
                            <p class="text-green-600 font-medium">Tanzania, East Africa</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="max-w-4xl mx-auto">
                    <div class="bg-white/90 backdrop-blur-sm p-8 rounded-2xl border border-gray-200 shadow-lg">
                        <div class="text-center mb-8">
                            <h2 class="text-3xl font-bold text-gray-800 mb-4">Send us a Message</h2>
                            <p class="text-gray-600">We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
                        </div>

                        <form class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                    <input type="text" id="name" name="name" placeholder="Your full name"
                                           class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 transition-all duration-200">
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                    <input type="email" id="email" name="email" placeholder="your.email@example.com"
                                           class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 transition-all duration-200">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                    <input type="tel" id="phone" name="phone" placeholder="+255 123 456 789"
                                           class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 transition-all duration-200">
                                </div>
                                <div>
                                    <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                                    <select id="subject" name="subject"
                                            class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 transition-all duration-200">
                                        <option value="">Select a subject</option>
                                        <option value="general">General Inquiry</option>
                                        <option value="support">Technical Support</option>
                                        <option value="sales">Sales Question</option>
                                        <option value="partnership">Partnership</option>
                                        <option value="feedback">Feedback</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                                <textarea id="message" name="message" rows="6" placeholder="Tell us how we can help you..."
                                          class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 transition-all duration-200 resize-none"></textarea>
                            </div>

                            <div class="flex items-center">
                                <input type="checkbox" id="newsletter" name="newsletter"
                                       class="w-4 h-4 text-green-600 bg-white border-gray-300 rounded focus:ring-green-500 focus:ring-2">
                                <label for="newsletter" class="ml-2 text-sm text-gray-600">
                                    I would like to receive updates about Tag & Seal products and services
                                </label>
                            </div>

                            <div class="text-center">
                                <button type="submit"
                                        class="px-12 py-4 bg-yellow-400 hover:bg-yellow-300 text-green-900 font-bold rounded-lg transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2 focus:ring-offset-transparent">
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- FAQ Section -->
                <div class="mt-20">
                    <div class="text-center mb-12">
                        <h2 class="text-4xl font-bold text-gray-800 mb-6">Frequently Asked Questions</h2>
                        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                            Find answers to common questions about our services
                        </p>
                    </div>

                    <div class="max-w-4xl mx-auto space-y-6">
                        <div class="bg-white/80 backdrop-blur-sm p-6 rounded-xl border border-gray-200 shadow-lg">
                            <h3 class="text-xl font-bold text-gray-800 mb-3">How does the livestock tracking system work?</h3>
                            <p class="text-gray-600">Our system uses GPS-enabled tags that are attached to your livestock. These tags continuously transmit location and health data to our cloud platform, which you can access through our web dashboard or mobile app.</p>
                        </div>

                        <div class="bg-white/80 backdrop-blur-sm p-6 rounded-xl border border-gray-200 shadow-lg">
                            <h3 class="text-xl font-bold text-gray-800 mb-3">What types of livestock can be tracked?</h3>
                            <p class="text-gray-600">Our system is designed to work with various types of livestock including cattle, goats, sheep, and other farm animals. The tracking tags are designed to be comfortable and durable for long-term use.</p>
                        </div>

                        <div class="bg-white/80 backdrop-blur-sm p-6 rounded-xl border border-gray-200 shadow-lg">
                            <h3 class="text-xl font-bold text-gray-800 mb-3">Is there a mobile app available?</h3>
                            <p class="text-gray-600">Yes, we provide a mobile app for both iOS and Android devices. The app allows you to monitor your livestock, receive alerts, and manage your records from anywhere.</p>
                        </div>

                        <div class="bg-white/80 backdrop-blur-sm p-6 rounded-xl border border-gray-200 shadow-lg">
                            <h3 class="text-xl font-bold text-gray-800 mb-3">What kind of support do you provide?</h3>
                            <p class="text-gray-600">We offer 24/7 customer support through email, phone, and live chat. Our support team includes agricultural experts and technical specialists who can help with both technical issues and farming-related questions.</p>
                        </div>

                        <div class="bg-white/80 backdrop-blur-sm p-6 rounded-xl border border-gray-200 shadow-lg">
                            <h3 class="text-xl font-bold text-gray-800 mb-3">How much does the service cost?</h3>
                            <p class="text-gray-600">Our pricing is flexible and depends on the number of livestock you want to track and the features you need. Contact us for a personalized quote based on your specific requirements.</p>
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

            // Form handling
            document.querySelector('form').addEventListener('submit', function(e) {
                e.preventDefault();

                // Get form data
                const formData = new FormData(this);
                const data = Object.fromEntries(formData);

                // Simple validation
                if (!data.name || !data.email || !data.message) {
                    alert('Please fill in all required fields.');
                    return;
                }

                // Simulate form submission
                alert('Thank you for your message! We will get back to you within 24 hours.');
                this.reset();
            });
        </script>
    </body>
</html>
