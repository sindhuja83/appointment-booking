<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Userdetails;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RegisterController extends Controller
{
    public function create()
    {
        return view('admin.register');
    }

    public function store(Request $request)
    {

        $request->validate([
            'user_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'mobile_number' => 'required|digits:10',
            'gender' => 'required',
            'role' => 'required',
        ]);

        $user = new User();
        $user->user_name = $request->input('user_name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->mobile_number = $request->input('mobile_number');
        $user->gender = $request->input('gender');
        $user->assignRole('Patient');
        $user->save(); 
        
        if ($request->role == 'Patient') {
            $request->validate([ 
                'address' => 'required',
            ]);

            $userDetails= new Userdetails();
               $userDetails->user_id = $user->id;
               $userDetails->address = $request->input('address');
               $userDetails->specialist = "null";
               $userDetails->clinic_name ="null";
               $userDetails->consultation_fee ="null";
               $userDetails->experience = "null";
               $userDetails->save(); 
           }
        return redirect()->back()->with('success', 'Patient Profile created successfully');
        } 


        public function update(Request $request, $id)
        {

        $rules = [
        'user_name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6',
        'mobile_number' => 'required|digits:10',
        'gender' => 'required',
        'role' => 'required',
        ];

        if ($request->role === 'Patient') {
        $rules['address'] = 'required';
        }

        $request->validate($rules);

        $user = User::find($id);

        if (!$user) {
        return redirect()->route('getLogin')->with('error', 'User not found');
        }

        $user->user_name = $request->input('user_name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->mobile_number = $request->input('mobile_number');
        $user->gender = $request->input('gender');
        $user->role = $request->input('role');
        $user->save();

        if ($request->role === 'Patient') {
        $userDetails = Userdetails::where('user_id', $id)->first();
        if (!$userDetails) {
        $userDetails = new Userdetails();
        $userDetails->user_id = $id;
        }
        $userDetails->address = $request->input('address');
        $userDetails->specialist = "null";
        $userDetails->clinic_name = "null";
        $userDetails->consultation_fee = "null";
        $userDetails->experience = "null";
        $userDetails->save();
        }

        return redirect()->route('')->with('success', 'User updated successfully');
        }
             
        public function edit($id)
        {
        $user = User::find($id);
        return view('admin.editregister', compact('user'));
        }
             
        public function destroy($id)
        {
        $user = User::find($id);
        if ($user) {
        $user->delete();
        return redirect()->route('userlist')->with('success', 'User deleted successfully');
        } else {
        return redirect()->route('userlist')->with('error', 'User not found');
        }
        }
                            
        public function getUsers()
        {
        $users = User::query();

        return DataTables::of($users)
        ->addColumn('actions', function ($user) {
        return '<a href="' . route('edituser', $user->id) . '" class="btn btn-primary btn-sm">Edit</a>
        <form action="' . route('deleteuser', $user->id) . '" method="post" style="display: inline;">
        ' . csrf_field() . '
        ' . method_field('DELETE') . '
        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this user?\')">Delete</button>
        </form>';
        })
        ->rawColumns(['actions'])
        ->make(true);
        }

        public function show()
        {
            $user = User::with('userdetails')->get();
            return view('user.home', compact('user'));
        }
      
        // public function login(){
        //     return view('user.login'); 
        //     }

            public function login()
            {
            if (auth('web')->check()) {
            return redirect()->route('homepage');
            }
            return view('user.login');
            }

        public function loggedin(Request $request)
        {
        $request->validate([
        'email' => 'required|email',
        'password' => 'required'
        ]);
        if (auth('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
        return redirect()->route('homepage')->with('success', 'Login Successful');
        } else {
        return redirect()->back()->with('error', 'Invalid credentials');
        }
        }

        
        public function userlogout()
        {
        auth()->logout();
        return redirect()->route('registerLogin')->with('success','You have been successfully logged out'); 
        }

}
