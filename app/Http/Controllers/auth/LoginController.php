<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('pages.examples.login'); // Ensure this view exists
    }

    // Handle the login form submission
    public function login(Request $request)
    {
        // Validate incoming request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Attempt to login the user
        if (Auth::attempt($request->only('email', 'password'), $request->has('remember'))) {
            // If successful, redirect to the intended page or home
            return redirect()->intended(route('admin.home'));
        }

        // If login fails, redirect back to login page with an error message
        return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }
}
