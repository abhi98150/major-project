<?php

namespace App\Http\Controllers;

use App\Vendor; // Ensure correct namespace for your Vendor model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    public function login(Request $request)
    {
        // Validate vendor login inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to log in the vendor using the vendor guard
        if (Auth::guard('vendor')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            // Authentication passed
            return redirect()->route('vendor.dashboard'); // Redirect to vendor dashboard
        }

        // Authentication failed
        $request->session()->flash('error', 'Invalid email or password.');
        return redirect()->back();
    }

    public function register(Request $request)
    {
        // Validate vendor registration inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:vendors,username', // Ensure username is unique
            'email' => 'required|email|unique:vendors,email',
            'company_name' => 'required|string|max:255',
            'pan_no' => 'required|string|max:10|unique:vendors,pan_no', // Ensure PAN number is unique
            'password' => 'required|min:6|confirmed',
        ]);

        // Create a new vendor record
        $vendor = Vendor::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'company_name' => $request->company_name,
            'pan_no' => $request->pan_no,
            'password' => Hash::make($request->password), // Encrypt the password
            'role' => 'vendor', // Set the default role as 'vendor'
        ]);

        // Log in the newly registered vendor
        Auth::guard('vendor')->login($vendor);

        $request->session()->flash('success', 'Account created and logged in successfully.');

        // Redirect to the vendor dashboard
        return redirect()->route('vendor.dashboard');
    }

    public function logout(Request $request)
    {
        // Log out the vendor
        Auth::guard('vendor')->logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        // Redirect to the login page
        return redirect()->route('vendor.login');
    }
}
