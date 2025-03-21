@extends('layouts.app')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">All Calculations</h1>
            <p class="text-gray-600 mt-1">
                View and manage saved calculations
            </p>
        </div>
        <div>
            <a href="{{ route('calculations.create') }}" class="btn btn-primary">
                New Calculation
            </a>
        </div>
    </div>

    @if($calculations->isEmpty())
        <div class="card text-center py-12">
            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
            </svg>
            <h2 class="text-xl font-medium text-gray-600 mb-2">No Calculations Yet</h2>
            <p class="text-gray-500 mb-6">Start by creating a new calculation to track your energy needs.</p>
            <a href="{{ route('calculations.create') }}" class="btn btn-primary">Create Your First Calculation</a>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg overflow-hidden">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Formula</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">BMR</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">TDEE</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Activity</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($calculations as $calculation)
                    <tr class="hover:bg-gray-50">
                        <td class="py-4 px-4 text-sm text-gray-900">
                            {{ $calculation->created_at->format('M j, Y') }}
                        </td>
                        <td class="py-4 px-4 text-sm text-gray-900">
                            @if($calculation->formula === 'mifflin_st_jeor')
                                Mifflin-St Jeor
                            @else
                                Katch-McArdle
                            @endif
                        </td>
                        <td class="py-4 px-4 text-sm text-gray-900">
                            {{ round($calculation->bmr) }}
                        </td>
                        <td class="py-4 px-4 text-sm font-medium text-indigo-600">
                            {{ round($calculation->tdee) }}
                        </td>
                        <td class="py-4 px-4 text-sm text-gray-900">
                            {{ $calculation->activity->name }}
                        </td>
                        <td class="py-4 px-4 text-sm text-gray-500">
                            <a href="{{ route('calculations.show', $calculation) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                            
                            <form action="{{ route('calculations.destroy', $calculation) }}" method="POST" class="inline ml-3">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this calculation?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $calculations->links() }}
        </div>
    @endif
@endsection 