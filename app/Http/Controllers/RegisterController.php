<?php



namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

//Handles user registration/signup

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
