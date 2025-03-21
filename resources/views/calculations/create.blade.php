@extends('layouts.app')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-primary">Calculate Your Calories & Macros</h1>
        <p class="text-secondary mt-2">
            Use this calculator to determine your Total Daily Energy Expenditure (TDEE) and Basal Metabolic Rate (BMR).
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <calculation-form 
            initial-activities='@json($activities)'
            @calculation-completed="showCalculationResults">
        </calculation-form>
        <div class="md:col-span-1">
            <div class="card p-6">
                <h2 class="section-title">About Our Calculator</h2>
                <div class="prose">
                    <p class="text-secondary">Our calculator uses scientifically validated formulas to estimate your calorie needs:</p>
                    
                    <h3 class="text-lg font-medium text-primary mt-4">Mifflin-St Jeor Equation</h3>
                    <p class="text-sm text-secondary">The most widely used formula by professionals. It calculates your BMR based on weight, height, age, and gender.</p>
                    <p class="text-xs italic text-muted">For men: BMR = (10 × weight in kg) + (6.25 × height in cm) - (5 × age in years) + 5</p>
                    <p class="text-xs italic text-muted">For women: BMR = (10 × weight in kg) + (6.25 × height in cm) - (5 × age in years) - 161</p>
                    
                    <h3 class="text-lg font-medium text-primary mt-4">Katch-McArdle Formula</h3>
                    <p class="text-sm text-secondary">A more precise formula for those who know their body fat percentage. It calculates BMR based on lean body mass.</p>
                    <p class="text-xs italic text-muted">BMR = 370 + (21.6 × lean mass in kg)</p>
                    
                    <h3 class="text-lg font-medium text-primary mt-4">Total Daily Energy Expenditure (TDEE)</h3>
                    <p class="text-sm text-secondary">Your TDEE is calculated by multiplying your BMR by an activity factor based on your typical daily activity level.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8" id="results-section">
        <calculation-result id="calculation-results"></calculation-result>
    </div>
@endsection 