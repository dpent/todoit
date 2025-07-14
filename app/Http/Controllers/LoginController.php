<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use OpenApi\Annotations as OA;

//This controller is responsible for Authentication
//Login and logout tasks specifically
class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    /**
    * @OA\Post(
    *     path="/login",
    *     tags={"Authentication"},
    *     summary="Authenticate user and start a session",
     *     operationId="loginUser",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email", "password"},
     *             @OA\Property(property="email", type="string", format="email", example="user@example.com"),
     *             @OA\Property(property="password", type="string", format="password", example="secret123")
    *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Redirect to intended route after successful login"
        *     ),
     *     @OA\Response(
     *         response=422,
     *         description="The provided credentials do not match our records.",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="The provided credentials do not match our records.")
    *         )
     *     )
     * )
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


    /**
     * @OA\Post(
     *     path="/logout",
     *     tags={"logout"},
     *     summary="Logout authenticated user and invalidate session",
     *     operationId="logoutUser",
     *     @OA\RequestBody(
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Redirect to intended route after successful login"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Counldn't log user out",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="User was not logged out. Try again.")
     *         )
     *     )
     * )
     */
    public function logout(Request $request): RedirectResponse{
        Auth::logout();
        //Destroy session each time use logs out
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
