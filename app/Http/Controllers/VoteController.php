<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VoteController extends Controller
{
    // Store the session details in the database
    public function store(Request $request, $session_id, $feature_id )
    {

         // Data for finding existing vote or creating new one
        $findData = [
            'feature_id' => $feature_id,
            'user_id' => auth()->id(),
        ];

        // Data for updating or creating
        $newData = [
            'score' => $request->card,
        ];

        // Update an existing vote or create a new one
        Vote::updateOrCreate($findData, $newData);

        // Redirect to a specific route or display a success message
        return redirect()->route('sessions.index');
    }

}
