@extends('layouts.app')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
        <p class="text-gray-600 mt-1">Welcome to MacroMate!</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="card p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-medium">Recent Calculations</h2>
                <a href="{{ route('calculations.index') }}" class="text-sm text-indigo-600 hover:text-indigo-900">View all</a>
            </div>
            
            @if($calculations->isEmpty())
                <div class="text-center py-8">
                    <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                    <p class="text-gray-500 mb-4">No calculations have been made yet</p>
                    <a href="{{ route('calculations.create') }}" class="btn btn-primary btn-sm">Create Your First Calculation</a>
                </div>
            @else
                <ul class="divide-y divide-gray-200">
                    @foreach($calculations as $calculation)
                    <li class="py-3">
                        <div class="flex justify-between">
                            <div>
                                <span class="block text-sm font-medium text-gray-900">
                                    @if($calculation->formula === 'mifflin_st_jeor')
                                        Mifflin-St Jeor
                                    @else
                                        Katch-McArdle
                                    @endif
                                </span>
                                <span class="block text-xs text-gray-500">{{ $calculation->created_at->format('M j, Y') }}</span>
                            </div>
                            <div class="text-right">
                                <span class="block text-sm font-medium text-indigo-600">{{ round($calculation->tdee) }} cal</span>
                                <span class="block text-xs text-gray-500">{{ $calculation->activity->name }}</span>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="card p-6">
            <h2 class="text-lg font-medium mb-4">Quick Stats</h2>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-50 rounded p-4 text-center">
                    <span class="block text-sm text-gray-500">Calculations</span>
                    <span class="block text-2xl font-bold text-gray-900 mt-1">{{ $count }}</span>
                </div>
                <div class="bg-gray-50 rounded p-4 text-center">
                    <span class="block text-sm text-gray-500">Latest TDEE</span>
                    <span class="block text-2xl font-bold text-gray-900 mt-1">
                        {{ $calculations->isNotEmpty() ? round($calculations->first()->tdee) : '—' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="card p-6 flex flex-col">
            <h2 class="text-lg font-medium mb-4">Quick Actions</h2>
            <div class="space-y-3 flex-grow">
                <a href="{{ route('calculations.create') }}" class="btn btn-primary w-full flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    New Calculation
                </a>
                <a href="{{ route('calculations.index') }}" class="btn btn-secondary w-full flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                    View All Calculations
                </a>
            </div>
        </div>
    </div>
@endsection 