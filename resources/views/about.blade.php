@extends('layouts.app')

@section('content')
    <!-- Hero Section with gradient background -->
    <section class="py-16 md:py-20 relative overflow-hidden rounded-b-3xl mb-12">
        <!-- Background gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-600 to-blue-500 dark:from-indigo-900 dark:to-blue-900 opacity-90"></div>
        
        <!-- Animated background circles -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute h-64 w-64 rounded-full bg-indigo-400 opacity-20 dark:bg-indigo-600 top-0 right-0 translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute h-96 w-96 rounded-full bg-blue-400 opacity-20 dark:bg-blue-600 bottom-0 left-0 -translate-x-1/2 translate-y-1/2"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl">
                <h1 class="text-4xl md:text-5xl font-bold mb-6 text-white tracking-tight">
                    About MacroMate
                </h1>
                <p class="text-xl text-white/90 leading-relaxed max-w-2xl">
                    Your trusted companion for accurate nutritional insights and personalized macro calculations.
                </p>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <div class="container mx-auto px-4">
        <!-- What is MacroMate section -->
        <section class="mb-20">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 text-primary">What is MacroMate?</h2>
                    <p class="text-secondary mb-6 text-lg">
                        MacroMate is a comprehensive tool designed to help you understand your body's energy needs. 
                        Our calculator provides accurate estimates of your Basal Metabolic Rate (BMR) and Total Daily 
                        Energy Expenditure (TDEE), along with recommended macronutrient splits for different dietary approaches.
                    </p>
                    
                    <h3 class="text-xl font-semibold mb-4 text-primary">How Does It Work?</h3>
                    <p class="text-secondary mb-6">
                        By analyzing your age, gender, height, weight, and activity level, MacroMate calculates your daily
                        calorie needs using scientifically-validated formulas. We offer two calculation methods:
                    </p>
                    
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center mr-3">
                                <span class="text-green-600 dark:text-green-400 text-sm font-bold">1</span>
                            </div>
                            <div>
                                <p class="text-secondary font-medium"><strong>Mifflin-St Jeor Equation:</strong> Considered the gold standard for estimating BMR for the general population.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mr-3">
                                <span class="text-blue-600 dark:text-blue-400 text-sm font-bold">2</span>
                            </div>
                            <div>
                                <p class="text-secondary font-medium"><strong>Katch-McArdle Formula:</strong> A more precise calculation for individuals who know their body fat percentage.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                
                <div class="relative">
                    <!-- Phone mockup with calculation screen -->
                    <div class="w-80 h-auto mx-auto bg-white dark:bg-gray-800 rounded-3xl shadow-2xl overflow-hidden border-8 border-white dark:border-gray-800 rotate-6">
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
        </section>

        <!-- Key Features section -->
        <section class="mb-20 pt-8">
            <div class="text-center mb-12">
                <h2 class="text-2xl md:text-3xl font-bold mb-6 text-primary">Key Features</h2>
                <p class="text-xl text-secondary max-w-2xl mx-auto">Tools and insights to help you achieve your nutrition goals</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="card overflow-hidden transition-all hover:shadow-lg">
                    <div class="h-2 bg-gradient-to-r from-green-400 to-blue-500"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900/30 rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-brand" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold mb-2 text-primary">Accurate Calculations</h3>
                        <p class="text-secondary text-sm">
                            Using scientifically validated formulas to provide reliable results
                        </p>
                    </div>
                </div>
                
                <div class="card overflow-hidden transition-all hover:shadow-lg">
                    <div class="h-2 bg-gradient-to-r from-purple-400 to-pink-500"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500 dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold mb-2 text-primary">Multiple Macro Splits</h3>
                        <p class="text-secondary text-sm">
                            Recommendations for balanced, low-carb, and high-carb diets
                        </p>
                    </div>
                </div>
                
                <div class="card overflow-hidden transition-all hover:shadow-lg">
                    <div class="h-2 bg-gradient-to-r from-red-400 to-yellow-500"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 bg-red-100 dark:bg-red-900/30 rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 dark:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold mb-2 text-primary">Save Your Results</h3>
                        <p class="text-secondary text-sm">
                            Create an account to track changes in your calculations over time
                        </p>
                    </div>
                </div>
                
                <div class="card overflow-hidden transition-all hover:shadow-lg">
                    <div class="h-2 bg-gradient-to-r from-blue-400 to-teal-500"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold mb-2 text-primary">Personalized Dashboard</h3>
                        <p class="text-secondary text-sm">
                            View all your past calculations in one convenient place
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Understanding Your Results section -->
        <section class="mb-20 py-16 px-8 bg-gradient-to-br from-indigo-50 to-blue-50 dark:from-indigo-900/20 dark:to-blue-900/20 rounded-3xl">
            <h2 class="text-2xl md:text-3xl font-bold mb-8 text-center text-primary">Understanding Your Results</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="card overflow-hidden transition-all hover:shadow-lg">
                    <div class="h-2 bg-gradient-to-r from-green-400 to-blue-500"></div>
                    <div class="p-6">
                        <div class="flex-shrink-0 w-12 h-12 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg mb-3 text-primary">Basal Metabolic Rate (BMR)</h3>
                        <p class="text-secondary">
                            The number of calories your body needs to maintain basic physiological functions while at complete rest. 
                            This includes breathing, circulation, cell production, and more.
                        </p>
                    </div>
                </div>
                
                <div class="card overflow-hidden transition-all hover:shadow-lg">
                    <div class="h-2 bg-gradient-to-r from-blue-400 to-indigo-500"></div>
                    <div class="p-6">
                        <div class="flex-shrink-0 w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg mb-3 text-primary">Total Daily Energy Expenditure (TDEE)</h3>
                        <p class="text-secondary">
                            The total number of calories you burn in a day, including your BMR plus additional calories burned through physical activity and the digestion of food.
                        </p>
                    </div>
                </div>
                
                <div class="card overflow-hidden transition-all hover:shadow-lg">
                    <div class="h-2 bg-gradient-to-r from-purple-400 to-pink-500"></div>
                    <div class="p-6">
                        <div class="flex-shrink-0 w-12 h-12 rounded-full bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600 dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg mb-3 text-primary">Macronutrient Recommendations</h3>
                        <p class="text-secondary">
                            Guidelines for how to distribute your calories across proteins, carbohydrates, and fats based on different dietary approaches and your specific goals.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="mb-16">
            <div class="max-w-4xl mx-auto bg-gradient-to-r from-indigo-600 to-blue-500 dark:from-indigo-700 dark:to-blue-700 rounded-2xl overflow-hidden shadow-xl">
                <div class="p-12 md:p-16 text-center">
                    <h2 class="text-2xl md:text-3xl font-bold mb-6 text-white">Ready to Calculate Your Macros?</h2>
                    <p class="text-xl text-white/90 mb-8 max-w-lg mx-auto">
                        Get personalized nutrition targets aligned with your fitness goals in just a few clicks.
                    </p>
                    <a href="{{ route('calculations.create') }}" class="inline-block bg-white text-indigo-600 hover:bg-indigo-50 font-medium py-3 px-10 rounded-full transition-all text-lg">
                        Get Started Now
                    </a>
                </div>
            </div>
        </section>

        <!-- Disclaimer Section -->
        <section class="border-t border-gray-200 dark:border-gray-700 pt-8 pb-12 text-sm text-muted max-w-4xl mx-auto">
            <h3 class="font-semibold mb-4 text-primary text-base">Disclaimer:</h3>
            <p class="mb-4">
                MacroMate provides estimates based on scientific formulas, but individual needs may vary. 
                These calculations should be used as a starting point. Always consult with a healthcare professional before making significant changes to your diet.
            </p>
            <p>
                The formulas used in our calculator are widely accepted in the nutrition and fitness community, but they are not a substitute for professional medical advice.
            </p>
        </section>
    </div>
@endsection

<style>
/* Animations for decorative elements */
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