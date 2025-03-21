<?php

namespace App\Http\Controllers;

use App\Actions\CalculateMetrics;
use App\Http\Requests\CalculationRequest;
use App\Models\Activity;
use App\Models\Calculation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CalculationController extends Controller
{
    /**
     * Display the calculation form.
     */
    public function create(): View
    {
        // Get all activities for the form dropdown
        $activities = Activity::all();
        
        return view('calculations.create', compact('activities'));
    }
    
    /**
     * Process the calculation request.
     */
    public function store(CalculationRequest $request, CalculateMetrics $calculateMetrics): JsonResponse
    {
        // Validate and get the form data
        $data = $request->validated();
        
        // Calculate the metrics using our action class
        $result = $calculateMetrics->execute($data);
        
        // Create calculation record without user_id for demo purposes
        Calculation::create([
            'formula' => $data['formula'],
            'gender' => $data['gender'],
            'age' => $data['age'],
            'weight' => $data['weight'],
            'height' => $data['height'],
            'body_fat_percentage' => $data['body_fat'] ?? null,
            'activity_id' => $data['activity_id'],
            'bmr' => $result['bmr'],
            'tdee' => $result['tdee'],
        ]);
        
        // Return JSON response for the frontend to display
        return response()->json($result);
    }
    
    /**
     * Display a specific calculation.
     */
    public function show(Calculation $calculation): View
    {
        return view('calculations.show', compact('calculation'));
    }
    
    /**
     * List all calculations.
     */
    public function index(): View
    {
        $calculations = Calculation::latest()->paginate(10);
            
        return view('calculations.index', compact('calculations'));
    }
    
    /**
     * Delete a calculation.
     */
    public function destroy(Calculation $calculation): JsonResponse
    {
        $calculation->delete();
        
        return response()->json(['message' => 'Calculation deleted successfully']);
    }
}
