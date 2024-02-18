<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    // Opens resources/views/session/index.blade.php

    public function index()
    {
        return view('session.index', [
            "sessions" => Session::orderBy('session_name', 'asc')->get(),
        ]);
    }

    // Display the session creation form
    public function create()
    {
        return view('session.create-session');
    }

    // Store the session details in the database
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'session_name' => 'required|string|max:255',
        ]);

        // Set the admin user ID to the current user
        $validatedData['admin_user_id'] = auth()->id();
        // Create a new session
        $session = new Session($validatedData);
        $session->save();

        // Redirect to a specific route or display a success message
        return redirect()->route('sessions.index');
    }
}

