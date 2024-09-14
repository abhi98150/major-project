<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; // Ensure correct namespace for User model

class UsersController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.index', compact('users'));
   }

    public function create(){
        return view('users.create');
    }
//...............................store...........................................//
    public function store(Request $request){
        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'role' => 'required|in:user,seller',
            'company_name' => 'nullable|string|max:255',
            'pan_no' => 'nullable|string|max:255',
            'mobile_number' => 'nullable|string|max:255',
        ]);

        // Prepare common data
        $data = [
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
        ];

        // Add seller-specific data if the role is 'seller'
        if ($request->input('role') === 'seller') {
            $data['company_name'] = $request->input('company_name');
            $data['pan_no'] = $request->input('pan_no');
            $data['mobile_number'] = $request->input('mobile_number');
        } else {
            // Ensure seller-specific fields are not included if the role is not 'seller'
            $data['company_name'] = null;
            $data['pan_no'] = null;
            $data['mobile_number'] = null;
        }

        // Insert data into the database
        User::create($data);

        return redirect()->route('users.index')->with('success', 'User registered successfully!');
    }
//...................................................delete.............................................//
    public function delete($id){
        if (!$id) {
            return redirect()->back();
        }

        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'User deleted successfully!');
        }

        return redirect()->back()->with('error', 'User not found.');
    }
//...............................................edit....................................................//
    public function edit($id){
        if (!$id) {
            return redirect()->back();
        }

        $user = User::find($id);
        if ($user) {
            return view('users.edit', compact('user'));
        }

        return redirect()->back()->with('error', 'User not found.');
    }
//.................................................update...................................................//
    public function update(Request $request, $id){
        if (!$id) {
            return redirect()->back();
        }

        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|confirmed|min:8',
            'role' => 'required|in:user,seller',
            'company_name' => 'nullable|string|max:255',
            'pan_no' => 'nullable|string|max:255',
            'mobile_number' => 'nullable|string|max:255',
        ]);

        // Find the user
        $user = User::find($id);
        if ($user) {
            $data = [
                'name' => $request->input('name'),
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => $request->has('password') ? bcrypt($request->input('password')) : $user->password,
                'role' => $request->input('role'),
                'company_name' => $request->input('company_name'),
                'pan_no' => $request->input('pan_no'),
                'mobile_number' => $request->input('mobile_number'),
            ];

            $user->update($data);
            return redirect()->route('users.index')->with('success', 'User updated successfully!');
        }

        return redirect()->back()->with('error', 'User not found.');
    }
}
