<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SellersController extends Controller
{
    public function index()
    {
        $sellers = User::where('role', 'seller')->get(); // Fetch only sellers
        return view('sellers.index', compact('sellers'));
    }

    public function create()
    {
        return view('sellers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:seller',
            'company_name' => 'required|string|max:255',
            'pan_no' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:20',
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
            'company_name' => $request->input('company_name'),
            'pan_no' => $request->input('pan_no'),
            'mobile_number' => $request->input('mobile_number'),
        ];

        User::create($data);

        return redirect()->route('sellers.index');
    }

    public function delete($id)
    {
        $seller = User::find($id);
        if ($seller && $seller->role === 'seller') {
            $seller->delete();
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $seller = User::find($id);
        if ($seller && $seller->role === 'seller') {
            return view('sellers.edit', compact('seller'));
        }
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'company_name' => 'required|string|max:255',
            'pan_no' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:20',
        ]);

        $seller = User::find($id);
        if ($seller && $seller->role === 'seller') {
            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password') ? bcrypt($request->input('password')) : $seller->password,
                'company_name' => $request->input('company_name'),
                'pan_no' => $request->input('pan_no'),
                'mobile_number' => $request->input('mobile_number'),
            ];

            $seller->update($data);
        }
        
        return redirect()->route('sellers.index');
    }
}
