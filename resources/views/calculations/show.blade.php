@extends('layouts.app')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Calculation Details</h1>
            <p class="text-gray-600 mt-1">
                Saved on {{ $calculation->created_at->format('F j, Y, g:i a') }}
            </p>
        </div>
        <div>
            <a href="{{ route('calculations.index') }}" class="btn btn-secondary">
                Back to List
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Input Data -->
        <div class="card">
            <h2 class="section-title">Your Information</h2>
            <dl class="divide-y divide-gray-200">
                <div class="py-3 grid grid-cols-3">
                    <dt class="text-sm font-medium text-gray-500">Age</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $calculation->age }}</dd>
                </div>
                <div class="py-3 grid grid-cols-3">
                    <dt class="text-sm font-medium text-gray-500">Gender</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ ucfirst($calculation->gender) }}</dd>
                </div>
                <div class="py-3 grid grid-cols-3">
                    <dt class="text-sm font-medium text-gray-500">Height</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $calculation->height }} cm</dd>
                </div>
                <div class="py-3 grid grid-cols-3">
                    <dt class="text-sm font-medium text-gray-500">Weight</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $calculation->weight }} kg</dd>
                </div>
                <div class="py-3 grid grid-cols-3">
                    <dt class="text-sm font-medium text-gray-500">Activity Level</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $calculation->activity->name }}</dd>
                </div>
                <div class="py-3 grid grid-cols-3">
                    <dt class="text-sm font-medium text-gray-500">Formula</dt>
                    <dd class="text-sm text-gray-900 col-span-2">
                        @if($calculation->formula === 'mifflin_st_jeor')
                            Mifflin-St Jeor
                        @else
                            Katch-McArdle
                        @endif
                    </dd>
                </div>
                @if($calculation->body_fat)
                <div class="py-3 grid grid-cols-3">
                    <dt class="text-sm font-medium text-gray-500">Body Fat %</dt>
                    <dd class="text-sm text-gray-900 col-span-2">{{ $calculation->body_fat }}%</dd>
                </div>
                @endif
            </dl>
        </div>

        <!-- Results -->
        <div class="card">
            <h2 class="section-title">Calculation Results</h2>
            <div class="space-y-6">
                <div>
                    <p class="text-sm text-gray-600">Basal Metabolic Rate (BMR)</p>
                    <p class="text-2xl font-bold">{{ round($calculation->bmr) }} calories/day</p>
                    <p class="text-xs text-gray-500">Calories needed at complete rest</p>
                </div>
                
                <div>
                    <p class="text-sm text-gray-600">Total Daily Energy Expenditure (TDEE)</p>
                    <p class="text-3xl font-bold text-indigo-600">{{ round($calculation->tdee) }} calories/day</p>
                    <p class="text-xs text-gray-500">Calories needed for maintenance</p>
                </div>

                <div class="pt-4 border-t border-gray-200">
                    <h3 class="text-sm font-medium text-gray-900 mb-2">Calorie targets:</h3>
                    <div class="grid grid-cols-3 gap-2 text-center">
                        <div class="bg-red-50 p-2 rounded">
                            <p class="text-xs font-medium">Weight Loss</p>
                            <p class="text-lg font-bold">{{ round($calculation->tdee * 0.8) }}</p>
                            <p class="text-xs text-gray-500">calories/day</p>
                        </div>
                        <div class="bg-blue-50 p-2 rounded">
                            <p class="text-xs font-medium">Maintenance</p>
                            <p class="text-lg font-bold">{{ round($calculation->tdee) }}</p>
                            <p class="text-xs text-gray-500">calories/day</p>
                        </div>
                        <div class="bg-green-50 p-2 rounded">
                            <p class="text-xs font-medium">Weight Gain</p>
                            <p class="text-lg font-bold">{{ round($calculation->tdee * 1.1) }}</p>
                            <p class="text-xs text-gray-500">calories/day</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Button -->
    <div class="mt-6 text-right">
        <form action="{{ route('calculations.destroy', $calculation) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this calculation?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn bg-red-600 text-white hover:bg-red-700 focus:ring-red-500">
                Delete This Calculation
            </button>
        </form>
    </div>
@endsection 