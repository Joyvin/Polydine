<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request->email)->first();
            Auth::login($user, true);
            return 200;
        }
  
        return 'You have entered invalid credentials';
    }

    public function validateEmail(Request $request){
        return $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
        ]);
    }

    public function validateName(Request $request){
        $this->validate($request, [
            'name' => 'required|string|min:5|max:255|unique:users',
        ]);
    }
    
    public function validatePassword(Request $request){
        return $request->validate([
            'password' => 'required|string|min:8|max:15',
        ]);
    }

    public function register(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        Auth::login($user);

        return 200;
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
      
            $user = Socialite::driver('google')->user();
       
            $finduser = User::where('email', $user->email)->first();
       
            if($finduser){
       
                Auth::login($finduser);
      
                return redirect()->route('home');
       
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => Hash::make(mb_substr($user->id, 0, 10))
                ]);
      
                Auth::login($newUser);
      
                return redirect()->route('dashboard');
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
