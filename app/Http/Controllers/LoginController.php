<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

//This controller is responsible for Authentication
//Login and logout tasks specifically
class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) { //New session every login
            $request->session()->regenerate();

            return redirect()->intended('/loggedIn');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse{
        Auth::logout();
        //Destroy session each time use logs out
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
