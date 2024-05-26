<?php

namespace App\Http\Controllers;

use App\Models\StudyAbroad\Same;
use App\Models\StudyAbroad\Saus;
use Illuminate\Http\Request;

class StudyController extends Controller
{
    //

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:sauses',
            'mobile_number' => 'required|string|max:15',
            'nearest_office' => 'required|string|max:255',
            'preferred_study_destination' => 'required|string|max:255',
            'preferred_study_year' => 'required|string|max:255',
            'preferred_study_intake' => 'required|string|max:255',
            'agree_to_terms' => 'required|boolean',
        ]);
        // \Log::info($validatedData);
        $saus = Saus::create($validatedData);

        return response()->json(['message' => 'Form submitted successfully', 'data' => $saus], 201);
    }

    public function amestore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:sauses',
            'mobile_number' => 'required|string|max:15',
            'nearest_office' => 'required|string|max:255',
            'preferred_study_destination' => 'required|string|max:255',
            'preferred_study_year' => 'required|string|max:255',
            'preferred_study_intake' => 'required|string|max:255',
            'agree_to_terms' => 'required|boolean',
        ]);
        // \Log::info($validatedData);
        $same = Same::create($validatedData);

        return response()->json(['message' => 'Form submitted successfully', 'data' => $same], 201);
    }
}
