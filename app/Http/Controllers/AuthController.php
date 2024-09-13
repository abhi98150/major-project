<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\welcomeMail;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Check if user exists
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect()->route('users.index');
            }
            $request->session()->flash('error', 'Check your email and password');
            return redirect()->back();
        }

        $request->session()->flash('error', 'Check your email and password');
        return redirect()->back();
    }

    public function register(Request $request)
{
    // Validate user registration inputs
    $request->validate([
        'name' => 'required',
        'username' => 'required|unique:users,username', // Ensure username is required and unique
        'email' => 'required|unique:users,email',
        'password' => 'required|min:6|confirmed',
        'role' => 'required|in:user,seller', // Role must be either 'user' or 'seller'
    ]);

    // Common data for both users and sellers
    $data = [
        'username' => $request->username, // Make sure 'username' is included
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => $request->role, // Save the role as 'user' or 'seller'
        'created_at' => now(),
        'updated_at' => now(),
    ];

    // Additional seller data if role is 'seller'
    if ($request->role == 'seller') {
        $request->validate([
            'company_name' => 'required',
            'pan_no' => 'required',
            'mobile_number' => 'required',
        ]);

        $data['company_name'] = $request->company_name;
        $data['pan_no'] = $request->pan_no;
        $data['mobile_number'] = $request->mobile_number;
    }
        // Insert user or seller data into the database
        User::insert($data); // Assuming you're using Eloquent's create method for mass assignment

        // Send a welcome email upon successful registration
        // if ($isDone) {
        //     Mail::to($request->email)->send(new welcomeMail($request->username, $request->name));
        //     $request->session()->flash('success', 'Account created successfully');
        // }

        return redirect()->route('login');
    }
}
