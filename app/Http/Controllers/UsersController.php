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

    
        public function index(){
             $users = User::all();
             return view('users.index', compact('users'));
        }
     
        public function create(){
             return view('users.create');
        }
     
     //..................................Store...............................................//
     
        public function store( Request $request){
     
               // $request->validate();
     
         $data = [
           'name' => $request->get('name'),
           'email' => $request->get('email'),
           'password' =>bcrypt($request->get('password')) 
         ];
     
         User::insert($data);
         return redirect()->route('users.index');
        }
     //.......................................Delete.......................................//
     
        public function delete($id){
     
          if(!$id){
               return redirect()->back();
          }
     
          $user = User::find($id);
          if($user){
               $user->delete();
               return redirect()->back();
          }
     
          return redirect()->back();
        }
     //.............................................Edit..............................//
     
        public function edit($id){
     
          if(!$id){
               return redirect()->back();
          }
     
          $user = User::find($id);
          if($user){
             
               return view('users.edit',compact('user'));
          }
     
          return redirect()->back();
        }
     //..............................................Update..............................//
     
        public function update( Request $request, $id){  
          if(!$id){
               return redirect()->back();
          }
          $user = User::find($id);
          if($user){
               $data = [
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'password' => $request->get('password')
                  ];
     
                  User::where('id',$id)->update($data);
                  return redirect()->route('users.index');
          }
          return redirect()->back();
         }
     
}
