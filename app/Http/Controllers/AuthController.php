<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    use ValidatesRequests;

    // Show login page
    public function index()
    {
        Auth::logout(); // Ensure user is logged out
        return view('login');
    }

    // Handle login submission
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:5'
        ]);

        $credentials = $request->only('username', 'password');

        // Attempt login
        if (!Auth::attempt($credentials)) {
            return back()
                ->withErrors(['login_error' => 'Invalid username or password'])
                ->withInput($request->only('username'));
        }

        // Regenerate session to prevent fixation attacks
        $request->session()->regenerate();

        // Optional: store username in session
        Session::put('username', $request->username);

        return redirect()->intended('/dashboard');
    }

    // Handle logout
    public function destroy(Request $request)
    {
        Auth::logout();

        // Invalidate session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
