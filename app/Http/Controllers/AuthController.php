<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illumiate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Register a user
    public function register(Request $request)
    {
        // return view('auth.register');
        // dd($request->username); //grabs the username from the post body
        
        //validate
        //grab ,validate and store the value  in the fields variable
        $fields = $request->validate([
            // fieldname => [laravel validation rules]
            'username' => ['required','max:255'],
            'email' => ['required','max:255', 'email','unique:users'],
            'password' => ['required', 'min:8','confirmed']
        ])

        //Register -- eloquent orm
        // User::create(
        //     'username' => $request->username,
        //     'email' => $request->email,
        //     'password' => $request->password
        // )

        //instead of passing the fields one by one as above pas the variable 'fields'
        $user = User::create($fields);

        //Login
         Auth::login($user)

        //Redirect user
   
        return redirect()->route('home');
    }
    
    //login a user
    public function login(Request $request){
         //validate
        //grab ,validate and store the value  in the fields variable
        $fields = $request->validate([
            // fieldname => [laravel validation rules]
            'email' => ['required','max:255', 'email',],
            'password' => ['required', 'min:8']
        ])
        
        //Try to login the user
       if( Auth::attempt($fields,$request->remember)){
        // return redirect()->route('home'); //cutom redirect page

        return redirect()->intended(); //login to the intended page
       }else{
        // return back()->withErrors($request->errors);
        return back()->withErrors(['failed' => 'The provided credentials do not match our records']);
       }
    }

    //logout user
    public function login(Request $request){
        Auth::logout();
        
        //invalidate he user session
        $request->session()->invalidate();
        
        //regenrate csrf toker
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
