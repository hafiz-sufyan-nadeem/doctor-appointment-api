<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Availability;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'day' => 'required|in:Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday',
            'startTime' => 'required',
            'endTime' => 'required',
        ]);

        $doctorProfile = $request->user()->doctorProfile;

        $availability = Availability::create([
            'doctor_id' => $doctorProfile->id,
            'day' => $validated['day'],
            'startTime' => $validated['startTime'],
            'endTime' => $validated['endTime'],
        ]);

        return response()->json([
           'availability' => $availability,
        ],201);
    }
}
