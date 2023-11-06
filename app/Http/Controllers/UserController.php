<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Specialist;
use App\Models\User;
use App\Models\Userdetails;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

        public function create()
        {
            $user = null;
            $userDetails = null;
            $roles = Role::pluck('name', 'name')->all();
            $userRole = 'Select';
            $specialists = Specialist::all();
            $experiences = Experience::pluck('experience', 'experience')->all();
            return view('admin.users.createuser', compact('user', 'userDetails', 'roles', 'userRole', 'specialists', 'experiences'));
        }

        public function show()
        {
            $users = User::all();
            return view('admin.users.userlist', compact('users'));
        }

        public function store(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'user_name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
                'mobile_number' => 'required|digits:10',
                'gender' => 'required',
                'role' => 'required|in:Doctor,Patient',
                'experience' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->route('create')
                    ->withInput()
                    ->withErrors($validator)
                    ->with('error', 'There was an error while creating the user.');
            }

            $user = new User();
            $user->user_name = $request->input('user_name');
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            $user->mobile_number = $request->input('mobile_number');
            $user->gender = strtolower($request->input('gender'));
            $user->assignRole($request->input('role'));
            $user->save();

            if ($request->role === 'Doctor') {
                $userDetails = new Userdetails();
                $userDetails->user_id = $user->id;
                $userDetails->specialist = $request->input('specialist');
                $userDetails->clinic_name = $request->input('clinic_name');
                $userDetails->consultation_fee = $request->input('consultation_fee');
                $userDetails->experience = $request->input('experience');
                $userDetails->address = $request->input('address');
                $userDetails->save();
            }

            return redirect()->route('userlist')->with('success', 'User created successfully');
        }

        public function edit($id)
        {
            $user = User::find($id);

            if (!$user) {
                return redirect()->route('userlist')->with('error', 'User not found');
            }

            $userDetails = Userdetails::where('user_id', $user->id)->first();
            $roles = Role::pluck('name', 'name')->all();
            $userRole = $user->role;
            $userRole = $user->getRoleNames()->first();
            $specialists = Specialist::all();
            $experiences = Experience::pluck('experience', 'experience')->all();

            return view('admin.users.createuser', compact('user', 'userDetails', 'roles', 'userRole', 'specialists', 'experiences'));
        }


        public function update(Request $request, $id)
        {
            $user = User::find($id);
    
            if (!$user) {
                return redirect()->route('userlist')->with('error', 'User not found');
            }
    
            $request->validate([
                'user_name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6',
                'mobile_number' => 'required|digits:10',
                'gender' => 'required',
                'role' => 'required|in:Doctor,Patient', 
                'experience' => 'required|string',
            ]);
    
            $user->user_name = $request->input('user_name');
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            $user->mobile_number = $request->input('mobile_number');
            $user->gender = $request->input('gender');
            $user->syncRoles([$request->input('role')]);
            $user->save();
    
            if ($request->role === 'Doctor') {
                $userDetails = Userdetails::where('user_id', $id)->first();
                if (!$userDetails) {
                    $userDetails = new Userdetails();
                    $userDetails->user_id = $id;
                }
    
                $userDetails->specialist = $request->input('specialist');
                $userDetails->clinic_name = $request->input('clinic_name');
                $userDetails->consultation_fee = $request->input('consultation_fee');
                $userDetails->experience = $request->input('experience');
                $userDetails->address = $request->input('address');
                $userDetails->save();
            }
    
            return redirect()->route('userlist')->with('success', 'User updated successfully');
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
}
