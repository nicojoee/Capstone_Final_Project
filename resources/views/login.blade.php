<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Finance Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        html {
            scroll-behavior: smooth;
        }
        
        body {
            overflow-x: hidden;
            overflow-y: auto;
        }
        
        .bg-animated {
            background: linear-gradient(135deg, #0a0e27 0%, #1a1f3a 25%, #0f1629 50%, #1e2749 75%, #0a0e27 100%);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
            min-height: 100vh;
        }
        
        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .particle {
            position: fixed;
            border-radius: 50%;
            pointer-events: none;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0) translateX(0); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-100vh) translateX(50px); opacity: 0; }
        }
        
        .glassmorphism {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }
        
        .glow-blue {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.5),
                        0 0 40px rgba(59, 130, 246, 0.3),
                        0 0 60px rgba(59, 130, 246, 0.2);
        }
        
        .glow-text {
            text-shadow: 0 0 10px rgba(59, 130, 246, 0.8),
                         0 0 20px rgba(59, 130, 246, 0.6),
                         0 0 30px rgba(59, 130, 246, 0.4);
        }
        
        .scan-line {
            position: fixed;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.8), transparent);
            animation: scan 4s linear infinite;
            pointer-events: none;
            z-index: 50;
        }
        
        @keyframes scan {
            0% { top: 0; }
            100% { top: 100%; }
        }
        
        .grid-bg {
            background-image: 
                linear-gradient(rgba(59, 130, 246, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(59, 130, 246, 0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: gridMove 20s linear infinite;
        }
        
        @keyframes gridMove {
            0% { background-position: 0 0; }
            100% { background-position: 50px 50px; }
        }
        
        .login-btn {
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
        }
        
        .login-btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }
        
        .login-btn:hover::before {
            width: 300px;
            height: 300px;
        }
        
        .logo-pulse {
            animation: pulse 2s ease-in-out infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.05); opacity: 0.9; }
        }
        
        .depth-shadow {
            box-shadow: 
                0 2px 4px rgba(0, 0, 0, 0.2),
                0 4px 8px rgba(0, 0, 0, 0.15),
                0 8px 16px rgba(0, 0, 0, 0.1),
                0 16px 32px rgba(0, 0, 0, 0.05);
        }

        .feature-card {
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(59, 130, 246, 0.3);
        }

        .scroll-indicator {
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }
    </style>
</head>
<body class="bg-animated relative">
    <!-- Animated Grid Background -->
    <div class="grid-bg fixed inset-0 opacity-30"></div>
    
    <!-- Floating Particles -->
    <div id="particles"></div>
    
    <!-- Scan Line Effect -->
    <div class="scan-line"></div>
    
    <!-- Main Container -->
    <div class="relative z-10 min-h-screen">
        <!-- Header with Logo -->
        <div class="pt-8 pb-4 text-center">
            <div class="logo-pulse inline-block p-4 glassmorphism rounded-2xl glow-blue">
   <svg class="w-16 h-16 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <!--<img src="{{ asset('images/logo.png') }}" alt="Finance Manager Logo" class="w-24 h-24">-->
            </div>
            <h1 class="text-4xl font-bold text-white glow-text mt-4 tracking-wider">FINANCE MANAGER</h1>
            <p class="text-blue-300 text-sm mt-2 font-light tracking-widest">ENTERPRISE EDITION</p>
        </div>
        
        <!-- Login Form -->
        <div class="flex items-center justify-center px-4 py-12">
            <div class="w-full max-w-md">
                <!-- Alert Message -->
                @if(session('error'))
                <div class="glassmorphism border-red-500 text-red-300 px-4 py-3 rounded-lg mb-6 depth-shadow animate-pulse">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-sm">{{ session('error') }}</span>
                    </div>
                </div>
                @endif
                
                <!-- Glass Card -->
                <div class="glassmorphism rounded-3xl p-8 depth-shadow relative overflow-hidden">
                    <!-- Decorative Elements -->
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-500 rounded-full blur-3xl opacity-20"></div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-purple-500 rounded-full blur-3xl opacity-20"></div>
                    
                    <div class="relative z-10">
                        <div class="text-center mb-8">
                            <h2 class="text-2xl font-bold text-white mb-2">Welcome Back</h2>
                            <p class="text-gray-400 text-sm">Sign in to access your financial dashboard</p>
                        </div>

                        <a href="{{ route('google.redirect') }}" class="login-btn flex items-center justify-center gap-3 w-full bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-500 hover:to-blue-400 text-white font-semibold py-4 px-6 rounded-xl transition duration-300 shadow-lg hover:shadow-2xl transform hover:-translate-y-1 relative z-10">
                            <svg class="w-6 h-6 relative z-10" viewBox="0 0 24 24">
                                <path fill="#FFFFFF" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#FFFFFF" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FFFFFF" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                <path fill="#FFFFFF" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                            </svg>
                            <span class="relative z-10">Continue with Google</span>
                        </a>

                        <div class="mt-6 flex items-center justify-center gap-4 text-xs text-gray-500">
                            <div class="h-px bg-gray-700 flex-1"></div>
                            <span class="uppercase tracking-wider">Secure Authentication</span>
                            <div class="h-px bg-gray-700 flex-1"></div>
                        </div>

                        <div class="mt-6 flex justify-center gap-4 text-gray-400 text-xs">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>256-bit Encryption</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                </svg>
                                <span>OAuth 2.0</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Info Text -->
                <p class="text-center text-sm text-gray-500 mt-6 px-4">
                    By continuing, you agree to our Terms of Service and Privacy Policy
                </p>

                <!-- Scroll Indicator -->
                <div class="text-center mt-8">
                    <div class="scroll-indicator inline-block text-blue-400">
                        <svg class="w-6 h-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                        </svg>
                        <p class="text-xs mt-1">Scroll for more</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="px-4 py-16 max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-white mb-4">Why Choose Finance Manager?</h2>
                <p class="text-gray-400">Enterprise-grade financial management at your fingertips</p>
            </div>

            <div class="grid md:grid-cols-3 gap-6 mb-16">
                <!-- Feature 1 -->
                <div class="feature-card glassmorphism rounded-2xl p-6 depth-shadow">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mb-4 glow-blue">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Real-time Analytics</h3>
                    <p class="text-gray-400 text-sm">Track your income and expenses with live charts and insights</p>
                </div>

                <!-- Feature 2 -->
                <div class="feature-card glassmorphism rounded-2xl p-6 depth-shadow">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center mb-4 glow-blue">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Secure & Private</h3>
                    <p class="text-gray-400 text-sm">Bank-level encryption with Google OAuth 2.0 authentication</p>
                </div>

                <!-- Feature 3 -->
                <div class="feature-card glassmorphism rounded-2xl p-6 depth-shadow">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center mb-4 glow-blue">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Export Reports</h3>
                    <p class="text-gray-400 text-sm">Download your transaction history as CSV for analysis</p>
                </div>

                <!-- Feature 4 -->
                <div class="feature-card glassmorphism rounded-2xl p-6 depth-shadow">
                    <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-lg flex items-center justify-center mb-4 glow-blue">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Transaction History</h3>
                    <p class="text-gray-400 text-sm">Comprehensive records with search and filter capabilities</p>
                </div>

                <!-- Feature 5 -->
                <div class="feature-card glassmorphism rounded-2xl p-6 depth-shadow">
                    <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center mb-4 glow-blue">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Budget Tracking</h3>
                    <p class="text-gray-400 text-sm">Monitor your balance and spending patterns effortlessly</p>
                </div>

                <!-- Feature 6 -->
                <div class="feature-card glassmorphism rounded-2xl p-6 depth-shadow">
                    <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-lg flex items-center justify-center mb-4 glow-blue">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Mobile Responsive</h3>
                    <p class="text-gray-400 text-sm">Access your finances anywhere, on any device</p>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <footer class="relative z-10 py-8 px-4">
            <div class="max-w-4xl mx-auto">
                <!-- Owner Info -->
                <div class="glassmorphism rounded-2xl p-6 mb-4 text-center depth-shadow">
                    <div class="flex items-center justify-center gap-3 mb-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center glow-blue">
                            <span class="text-white font-bold text-lg">NJS</span>
                        </div>
                        <div class="text-left">
                            <h3 class="text-white font-bold text-lg">Nicholas Joe Sumantri</h3>
                            <p class="text-blue-300 text-sm">System Developer & Creator</p>
                        </div>
                    </div>
                    
                    <div class="space-y-1 text-gray-300 text-sm">
                        <p class="flex items-center justify-center gap-2">
                            <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                            </svg>
                            Mathematics 2022
                        </p>
                        <p class="font-semibold text-white">Sepuluh Nopember Institute of Technology</p>
                        <p class="flex items-center justify-center gap-2">
                            <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                            Surabaya, Jawa Timur
                        </p>
                    </div>
                    
                    <!-- Contact -->
                    <div class="mt-4 pt-4 border-t border-gray-700">
                        <p class="text-gray-400 text-xs mb-2">Found an issue or bug? Contact me:</p>
                        <a href="mailto:nicholas.joe.sumantri@gmail.com" class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-blue-600/20 to-purple-600/20 hover:from-blue-600/30 hover:to-purple-600/30 border border-blue-500/30 text-blue-300 rounded-lg text-sm font-medium transition-all duration-300 hover:scale-105">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                            </svg>
                            nicholas.joe.sumantri@gmail.com
                        </a>
                    </div>
                </div>
                
                <!-- Copyright & Social -->
                <div class="text-center space-y-3">
                <div class="flex justify-center gap-4">
    @if(config('app.social_facebook'))
    <a href="{{ config('app.social_facebook') }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 glassmorphism rounded-full flex items-center justify-center text-gray-400 hover:text-blue-400 transition-all duration-300 hover:scale-110 hover:glow-blue">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
        </svg>
    </a>
    @endif

    @if(config('app.social_instagram'))
    <a href="{{ config('app.social_instagram') }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 glassmorphism rounded-full flex items-center justify-center text-gray-400 hover:text-blue-400 transition-all duration-300 hover:scale-110 hover:glow-blue">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
        </svg>
    </a>
    @endif

    @if(config('app.social_linkedin'))
    <a href="{{ config('app.social_linkedin') }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 glassmorphism rounded-full flex items-center justify-center text-gray-400 hover:text-blue-400 transition-all duration-300 hover:scale-110 hover:glow-blue">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
        </svg>
    </a>
    @endif

    @if(config('app.social_github'))
    <a href="{{ config('app.social_github') }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 glassmorphism rounded-full flex items-center justify-center text-gray-400 hover:text-blue-400 transition-all duration-300 hover:scale-110 hover:glow-blue">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
        </svg>
    </a>
    @endif
</div>
                    
                    <div class="text-gray-500 text-xs space-y-1">
                        <p>&copy; 2025 Finance Manager. All rights reserved.</p>
                        <p class="text-gray-600">Version 1.0.0 | Powered by Laravel & Google OAuth</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script>
        // Create floating particles
        const particlesContainer = document.getElementById('particles');
        const particleCount = 50;
        
        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            
            const size = Math.random() * 4 + 1;
            const startX = Math.random() * window.innerWidth;
            const duration = Math.random() * 10 + 10;
            const delay = Math.random() * 5;
            
            particle.style.width = `${size}px`;
            particle.style.height = `${size}px`;
            particle.style.left = `${startX}px`;
            particle.style.bottom = '0';
            particle.style.background = `rgba(59, 130, 246, ${Math.random() * 0.5 + 0.3})`;
            particle.style.animation = `float ${duration}s linear ${delay}s infinite`;
            
            particlesContainer.appendChild(particle);
        }
    </script>
</body>
</html>
