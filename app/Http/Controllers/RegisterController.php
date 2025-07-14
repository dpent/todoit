<?php



namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

//Handles user registration/signup

/**
 * @OA\Post(
 *     path="/sinup",
 *     tags={"Register new user"},
 *     summary="Create a new user and save it in the database",
 *     operationId="register",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"first_name,last_name,username,email", "password"},
 *             @OA\Property(property="first_name", type="string", format="text", example="John"),
 *             @OA\Property(property="last_name", type="string", format="text", example="Doe"),
 *             @OA\Property(property="username", type="string", format="text", example="jDoe"),
 *             @OA\Property(property="email", type="string", format="email", example="user@example.com"),
 *             @OA\Property(property="password", type="string", format="password", example="secret123")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Redirect to intended route after successful signup"
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="The credentials provided are not valid",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="The provided credentials are not valid")
 *         )
 *     )
 * )
 */

class RegisterController extends Controller
{

    //Validates credentials and saves user to the db
    public function register(Request $request) : RedirectResponse{
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:2'],
            ]);

        $user=User::create([
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        //User is logged in after registering and redirected
        Auth::login($user);

        return redirect('/loggedIn');
    }

}
