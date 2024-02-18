<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FeatureController extends Controller
{
    public function store(Request $request, int $session_id)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required',
        ]);

        $validatedData = $request->all();
        $validatedData['session_id'] = $session_id;

        // Create a new feature
        $feature = new Feature($validatedData);
        $feature->save();

        // Redirect to a specific route or display a success message
        return back();
    }

}
