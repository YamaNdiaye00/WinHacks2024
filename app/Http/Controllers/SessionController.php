<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SessionController extends Controller
{
    // Opens resources/views/session/index.blade.php

    public function index()
    {
        // Get the current authenticated user
        $user = auth()->user();

        // Get the sessions that the user is administrating
        $adminSessions = $user->administeredSessions()->orderBy('name', 'asc')->get();

        // Get the sessions that the user is part of
        $memberSessions = $user->sessions()->orderBy('name', 'asc')->get();

        // Merge the collections, ensuring uniqueness
        $sessions = $adminSessions->merge($memberSessions)->unique('id');

        return view('session.index', [
            'sessions' => $sessions,
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
            'name' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ]);

        // Set the admin user ID to the current user
        $validatedData['admin_user_id'] = auth()->id();

        // Generates unique Random Shareable Session ID
        $session_id = Str::random(10);
        while (Session::where('session_id', $session_id)->exists()) {
            $session_id = Str::random(10);
        }

        $validatedData['session_id'] = $session_id;

        // Create a new session
        $session = new Session($validatedData);
        $session->save();

        // Redirect to a specific route or display a success message
        return redirect()->route('sessions.index');
    }

    // Display the session joining form
    public function join()
    {
        return view('session.join-session');
    }

    public function addUser(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'session_id' => 'required',
            'password' => 'required',
        ]);

        // Attempt to find the session with the provided session_id
        $session = Session::where('session_id', $validatedData['session_id'])->first();

        // Check if session exists and if the password matches
        if ($session && Hash::check($validatedData['password'], $session->password)) {
            // Add the current user to the session's users
            $session->users()->attach(auth()->id());

            // Redirect with success message
            return redirect()->route('sessions.index')->with('success', 'Successfully joined the session.');
        }

        // Redirect with an error message if the session_id or password don't match
        return back()->withErrors(['session_id' => 'The session ID or password is incorrect.']);
    }


    public function manage($session_id)
    {
        // Find the session by session_id
        $session = Session::where('session_id', $session_id)->firstOrFail();


        return view('session.current.manage', ['session' => $session]);
    }

    public function feature($session_id, $feature_id)
    {
        $feature = Feature::where('id', $feature_id)->firstOrFail();
        $session = $feature->session;

        return view('session.current.manage', ['session' => $session, 'feature' => $feature]);
    }


}

