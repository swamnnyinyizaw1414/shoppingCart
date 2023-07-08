<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(){
        $formData=request()->validate([
            'name'=>'required|min:3|max:255',
            'username'=>['required','min:3','max:255',Rule::unique('users','username')],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>'required|min:8',
        ]); 
        
        $user=User::create($formData);
        // session()->flash('success','Welcome Dear '.$user->name);   
        auth()->login($user);
        return redirect('/')->with('success','Welcome Dear '.$user->name);

    }

    public function logout(){
        auth()->logout();
        return redirect('/')->with('success','Logged out!!!');
    }

    public function login(){
        return view('auth.login');
    }

    public function post_login(){
        $formData=request()->validate([
            'email'=>['required','email','max:255',Rule::exists('users','email')],
            'password'=>['required','min:8','max:255']
        ],[                                                             //overidding error syntax of laravel
            'email.required'=>'We need your email address!!!',   
            'password.min'=>'Password should be more than 8 characters'
        ]);
        
        if(auth()->attempt($formData)){ 
                if(auth()->user()->isAdmin){
                    return redirect('/admin/blogs');
                }else{
                    return redirect('/')->with('success','Welcome back!!!');
                }
        }else{
            return redirect()->back()->withErrors([
                'email'=>'User Credentials Wrong!!!'
            ]);
        }
    }
}
