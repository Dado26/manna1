<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function LoginForm()
            {
        $user = Auth::user();

        return view('auth.login', compact('user'));
            }
            
            public function LoginAttempt(LoginRequest $request) 
                    {
                $email = $request->get('email');
                $password = $request->get('password');
                $remember = $request->get('remember_me');

                
                if(Auth::attempt(['email'=>$email, 'password'=>$password], $remember)){
                    return redirect()->route('home');
                }
                return redirect()->back()->withErrors(['Wrong email or password']);
            }
            
             public function RegisterForm()
            {
        $user = Auth::user();
        return view('auth.register', compact('user'));
            }
            /**
             * sign up a new user
             * 
             * @param SignUpRequest $request
             * @return redirect
             */
            
          public function RegisterAttempt(RegisterRequest $request){
              
             
              $params = $request->all();
              
              $user = User::create($params);
              
              if($user){
                  return redirect()->route('login_form');
              }
              return redirect()->back()->withErrors(['Failed to create a new user']);
          }
          
          public function LogOut(){
              Auth::logout();
              
              return redirect()->route('home');
          }
}
