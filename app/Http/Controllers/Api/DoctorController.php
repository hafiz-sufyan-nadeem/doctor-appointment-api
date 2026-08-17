<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DoctorProfile;
use Illuminate\Http\Request;


class DoctorController extends Controller
{
    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'specialization' => 'required',
            'fees' => 'required',
        ]);

        $profile = DoctorProfile::updateOrCreate(
            ['user_id' => $request->user()->id],
            $validated
        );
        return response()->json([
            'profile' => $profile,
        ]);
    }

    public function index()
    {
        $doctors = DoctorProfile::with('user')->get();
        return response()->json([
            'doctors' => $doctors,
        ]);
    }
}
