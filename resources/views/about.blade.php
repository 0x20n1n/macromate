@extends('layouts.app')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-primary">About MacroMate</h1>
        <p class="text-secondary mt-1">Learn more about our calorie and macro calculator</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
        <div>
            <h2 class="text-xl font-semibold mb-4 text-primary">What is MacroMate?</h2>
            <p class="text-secondary mb-6">
                MacroMate is a comprehensive tool designed to help you understand your body's energy needs. 
                Our calculator provides accurate estimates of your Basal Metabolic Rate (BMR) and Total Daily 
                Energy Expenditure (TDEE), along with recommended macronutrient splits for different dietary approaches.
            </p>
            
            <h2 class="text-xl font-semibold mb-4 text-primary">How Does It Work?</h2>
            <p class="text-secondary mb-6">
                By analyzing your age, gender, height, weight, and activity level, MacroMate calculates your daily
                calorie needs using scientifically-validated formulas. We offer two calculation methods:
            </p>
            
            <ul class="list-disc pl-6 mb-6 space-y-2 text-secondary">
                <li>
                    <strong>Mifflin-St Jeor Equation:</strong> Considered the gold standard for estimating BMR for the general population.
                </li>
                <li>
                    <strong>Katch-McArdle Formula:</strong> A more precise calculation for individuals who know their body fat percentage.
                </li>
            </ul>
        </div>
        
        <div class="feature-card bg-indigo-50 dark:bg-indigo-900/20 rounded-lg p-8">
            <h2 class="text-xl font-semibold mb-4 text-primary">Key Features</h2>
            <ul class="space-y-4">
                <li class="flex">
                    <svg class="w-6 h-6 text-brand mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <div>
                        <h3 class="font-medium text-primary">Accurate Calculations</h3>
                        <p class="text-secondary text-sm">Using scientifically validated formulas to provide reliable results</p>
                    </div>
                </li>
                <li class="flex">
                    <svg class="w-6 h-6 text-brand mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <div>
                        <h3 class="font-medium text-primary">Multiple Macro Splits</h3>
                        <p class="text-secondary text-sm">Recommendations for balanced, low-carb, and high-carb diets</p>
                    </div>
                </li>
                <li class="flex">
                    <svg class="w-6 h-6 text-brand mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <div>
                        <h3 class="font-medium text-primary">Save Your Results</h3>
                        <p class="text-secondary text-sm">Create an account to track changes in your calculations over time</p>
                    </div>
                </li>
                <li class="flex">
                    <svg class="w-6 h-6 text-brand mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <div>
                        <h3 class="font-medium text-primary">Personalized Dashboard</h3>
                        <p class="text-secondary text-sm">View all your past calculations in one convenient place</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="card p-8 mb-12">
        <h2 class="text-xl font-semibold mb-6 text-center text-primary">Understanding Your Results</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="card p-6">
                <h3 class="font-medium text-lg mb-2 text-primary">Basal Metabolic Rate (BMR)</h3>
                <p class="text-secondary text-sm">
                    The number of calories your body needs to maintain basic physiological functions while at complete rest. 
                    This includes breathing, circulation, cell production, and more.
                </p>
            </div>
            
            <div class="card p-6">
                <h3 class="font-medium text-lg mb-2 text-primary">Total Daily Energy Expenditure (TDEE)</h3>
                <p class="text-secondary text-sm">
                    The total number of calories you burn in a day, including your BMR plus additional calories burned through physical activity and the digestion of food.
                </p>
            </div>
            
            <div class="card p-6">
                <h3 class="font-medium text-lg mb-2 text-primary">Macronutrient Recommendations</h3>
                <p class="text-secondary text-sm">
                    Guidelines for how to distribute your calories across proteins, carbohydrates, and fats based on different dietary approaches and your specific goals.
                </p>
            </div>
        </div>
    </div>

    <div class="text-center mb-12">
        <h2 class="text-xl font-semibold mb-6 text-primary">Ready to Calculate Your Macros?</h2>
        <a href="{{ route('calculations.create') }}" class="btn btn-primary py-2 px-4 rounded">Get Started Now</a>
    </div>

    <div class="border-t border-gray-200 dark:border-gray-700 pt-8 text-sm text-muted">
        <p class="mb-4">
            <strong>Disclaimer:</strong> MacroMate provides estimates based on scientific formulas, but individual needs may vary. 
            These calculations should be used as a starting point. Always consult with a healthcare professional before making significant changes to your diet.
        </p>
        <p>
            The formulas used in our calculator are widely accepted in the nutrition and fitness community, but they are not a substitute for professional medical advice.
        </p>
    </div>
@endsection 