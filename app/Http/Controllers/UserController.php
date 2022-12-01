<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // SHow register form 
    public function create(){
        return view('auth.register');
    }
    
    // create new user
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => 'required',
            'username' => ['required', Rule::unique('users', 'username')],
            'password' => 'required',
            'status' => 'sometimes',
        ]);

        // Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        // create user
        User::create($formFields);

        return redirect()->back()->with('message', 'New user created');
    }
    // show login form
    public function index(){
        return view('auth.login');
    }

    // Login user
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in');
        }

        return back()->withErrors(['username' => 'Invalid credentials'])->onlyInput('username');

    }

    // Logout user 
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'You have been logged out');
    }
}
