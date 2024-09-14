<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; // Ensure correct namespace for User model
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function register(Request $request)
    {
        // Validate user registration inputs
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username', // Ensure username is required and unique
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|confirmed',
            // 'role' => 'required|in:user', // Role must be 'user'
        ]);
    
        // User data only
        $data = [
            'username' => $request->username, // Ensure 'username' is included
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user', // Set role as 'user' by default
            'created_at' => now(),
            'updated_at' => now(),
        ];
    
        // Insert user data into the database
        User::create($data); // Using Eloquent's create method for mass assignment
    
        // Redirect to login page with success message
        // Flash a success message to the session
        $request->session()->flash('success', 'Account created successfully');

        // Redirect to the login page
        return redirect()->route('login');
    }
}
