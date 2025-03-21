@extends('layouts.app')

@section('content')
    <!-- Hero Section with Revolut-style gradient background -->
    <section class="py-16 md:py-24 relative overflow-hidden rounded-b-3xl">
        <!-- Background gradient similar to Revolut -->
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-600 to-blue-500 dark:from-indigo-900 dark:to-blue-900 opacity-90"></div>
        
        <!-- Animated background circles like Revolut -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute h-64 w-64 rounded-full bg-indigo-400 opacity-20 dark:bg-indigo-600 top-0 right-0 translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute h-96 w-96 rounded-full bg-blue-400 opacity-20 dark:bg-blue-600 bottom-0 left-0 -translate-x-1/2 translate-y-1/2"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h1 class="text-5xl md:text-6xl font-bold mb-6 text-white tracking-tight">
                        Nutrition<br>Simplified
                    </h1>
                    <p class="text-xl text-white/90 leading-relaxed mb-8 max-w-lg">
                        Calculate your perfect macro balance for optimal health and fitness with MacroMate's precision calculator.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('calculations.create') }}" class="inline-block bg-white text-indigo-600 hover:bg-indigo-50 font-medium py-3 px-8 rounded-full transition-all">
                            Start Calculator
                        </a>
                        <a href="{{ route('about') }}" class="inline-block bg-transparent border border-white text-white hover:bg-white/10 font-medium py-3 px-8 rounded-full transition-all">
                            Learn More
                        </a>
                    </div>
                </div>
                <div class="hidden lg:flex justify-end">
                    <div class="relative">
                        <!-- Phone mockup with app screenshot -->
                        <div class="w-80 h-auto bg-white dark:bg-gray-800 rounded-3xl shadow-2xl overflow-hidden border-8 border-white dark:border-gray-800 rotate-6">
                            <div class="p-2 bg-gray-100 dark:bg-gray-700 rounded-t-2xl flex justify-center">
                                <div class="w-24 h-5 bg-gray-200 dark:bg-gray-600 rounded-full"></div>
                            </div>
                            <div class="p-4">
                                <div class="mb-4 bg-indigo-100 dark:bg-indigo-900/30 p-4 rounded-xl">
                                    <div class="h-4 w-32 bg-indigo-200 dark:bg-indigo-800 rounded-full mb-2"></div>
                                    <div class="h-8 w-full bg-indigo-300 dark:bg-indigo-700 rounded-full"></div>
                                </div>
                                <div class="space-y-3">
                                    <div class="h-4 w-full bg-gray-200 dark:bg-gray-600 rounded-full"></div>
                                    <div class="h-4 w-5/6 bg-gray-200 dark:bg-gray-600 rounded-full"></div>
                                    <div class="h-4 w-4/6 bg-gray-200 dark:bg-gray-600 rounded-full"></div>
                                </div>
                                <div class="mt-6 grid grid-cols-3 gap-3">
                                    <div class="h-20 bg-green-100 dark:bg-green-900/30 rounded-lg"></div>
                                    <div class="h-20 bg-blue-100 dark:bg-blue-900/30 rounded-lg"></div>
                                    <div class="h-20 bg-indigo-100 dark:bg-indigo-900/30 rounded-lg"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Decorative elements -->
                        <div class="absolute -top-4 -right-4 w-32 h-32 bg-yellow-300 dark:bg-yellow-500 rounded-full opacity-20 -z-10"></div>
                        <div class="absolute -bottom-8 -left-8 w-40 h-40 bg-green-300 dark:bg-green-500 rounded-full opacity-20 -z-10"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section with Cards - Revolut Style -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16 max-w-3xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-bold mb-6 text-primary">Designed for your fitness journey</h2>
                <p class="text-xl text-secondary">Our calculator adapts to your unique body metrics, goals, and lifestyle</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="card overflow-hidden transition-all hover:shadow-lg">
                    <div class="h-2 bg-gradient-to-r from-green-400 to-blue-500"></div>
                    <div class="p-8">
                        <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900/30 rounded-full flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-brand" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-4 text-primary">Scientific Calculation</h3>
                        <p class="text-secondary">
                            Choose between industry-standard formulas: Mifflin-St Jeor for general use or Katch-McArdle for those tracking body fat.
                        </p>
                    </div>
                </div>
                
                <!-- Feature 2 -->
                <div class="card overflow-hidden transition-all hover:shadow-lg">
                    <div class="h-2 bg-gradient-to-r from-purple-400 to-pink-500"></div>
                    <div class="p-8">
                        <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-full flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500 dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-4 text-primary">Personalized Macros</h3>
                        <p class="text-secondary">
                            Get tailored macro splits for balanced, low-carb, or high-carb diets based on your specific metabolic profile.
                        </p>
                    </div>
                </div>
                
                <!-- Feature 3 -->
                <div class="card overflow-hidden transition-all hover:shadow-lg">
                    <div class="h-2 bg-gradient-to-r from-red-400 to-yellow-500"></div>
                    <div class="p-8">
                        <div class="w-12 h-12 bg-red-100 dark:bg-red-900/30 rounded-full flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 dark:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                    </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-4 text-primary">Goal Setting</h3>
                        <p class="text-secondary">
                            Receive calorie targets for weight loss, maintenance, or muscle gain based on your calculated TDEE.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Calculator Section with Clean Design -->
    <section class="py-20 bg-main relative overflow-hidden">
        <!-- Decorative elements -->
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></div>
        <div class="absolute -right-64 top-32 w-96 h-96 rounded-full bg-indigo-200 dark:bg-indigo-900/20 mix-blend-multiply dark:mix-blend-normal opacity-50"></div>
        <div class="absolute -left-32 bottom-16 w-72 h-72 rounded-full bg-blue-200 dark:bg-blue-900/20 mix-blend-multiply dark:mix-blend-normal opacity-50"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl mx-auto text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-6 text-primary">Calculate your macros</h2>
                <p class="text-xl text-secondary">Get precise calorie and macronutrient targets based on your body metrics</p>
            </div>
            
            <div class="bg-gray-800 rounded-2xl shadow-xl overflow-hidden max-w-4xl mx-auto">
                <div class="lg:flex">
                    <div class="lg:w-1/2 p-8 bg-gray-800">
                        <h3 class="text-2xl font-bold mb-6 text-white">Your Personalized Calculator</h3>
                        <p class="text-white mb-6">Enter your details below to calculate your optimal nutrition plan:</p>
                        <calculation-form 
                            initial-activities='@json($activities)'
                            @calculation-completed="showCalculationResults">
                        </calculation-form>
                    </div>
                    <div class="lg:w-1/2 bg-gradient-to-br from-indigo-900 to-blue-900 p-8 flex items-center">
                        <div>
                            <h3 class="text-xl font-bold mb-4 text-white">Why it works</h3>
                            <ul class="space-y-4">
                                <li class="flex">
                                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-green-900/30 flex items-center justify-center mr-3">
                                        <span class="text-green-400 text-lg font-bold">1</span>
                                    </div>
                                    <div>
                                        <p class="text-white font-medium">We use scientifically-validated formulas trusted by nutritionists</p>
                                    </div>
                        </li>
                                <li class="flex">
                                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-900/30 flex items-center justify-center mr-3">
                                        <span class="text-blue-400 text-lg font-bold">2</span>
                                    </div>
                                    <div>
                                        <p class="text-white font-medium">Our calculator adjusts for your activity level and personal stats</p>
                                    </div>
                        </li>
                                <li class="flex">
                                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-purple-900/30 flex items-center justify-center mr-3">
                                        <span class="text-purple-400 text-lg font-bold">3</span>
                                    </div>
                                    <div>
                                        <p class="text-white font-medium">You get flexible macro options for your preferred diet style</p>
                                    </div>
                        </li>
                    </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-16" id="results-section">
                <calculation-result id="calculation-results"></calculation-result>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto bg-gradient-to-r from-indigo-600 to-blue-500 dark:from-indigo-700 dark:to-blue-700 rounded-2xl overflow-hidden shadow-xl">
                <div class="p-12 md:p-16 text-center">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6 text-white">Ready to optimize your nutrition?</h2>
                    <p class="text-xl text-white/90 mb-10 max-w-lg mx-auto">
                        Start using MacroMate today to get personalized nutrition targets aligned with your fitness goals.
                    </p>
                    <a href="{{ route('calculations.create') }}" class="inline-block bg-white text-indigo-600 hover:bg-indigo-50 font-medium py-3 px-10 rounded-full transition-all text-lg">
                        Start Calculating
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

<style>
/* Add some Revolut-inspired animations */
@keyframes floatCircle {
    0% { transform: translate(0, 0); }
    50% { transform: translate(-10px, 10px); }
    100% { transform: translate(0, 0); }
}

.bg-gradient-to-br {
    background-size: 200% 200%;
    animation: gradientMove 15s ease infinite;
}

@keyframes gradientMove {
    0% { background-position: 0% 50% }
    50% { background-position: 100% 50% }
    100% { background-position: 0% 50% }
}
</style>
