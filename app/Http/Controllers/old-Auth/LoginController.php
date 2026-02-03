<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LoginController extends Controller
{
    // Show login page
    public function showLoginForm()
    {
        return view('login.index'); // Path to login page
    }

    // Process login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            $user->update(['last_login' => Carbon::now()]); // Update last login time

            // Redirect based on role
            return ($user->role === 'admin') 
                ? redirect()->route('admindashboard.index') 
                : redirect()->route('home'); // Adjust for normal users
        }

        return back()->with('error', 'Invalid email or password');
    }

    // Logout function
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
