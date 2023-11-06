<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{

         public function getLogin(){
         return view('admin.login'); 
         }


         public function postLogin(Request $request)
         {
         $request->validate([
         'email' => 'required|email',
         'password' => 'required'
         ]);

         if (auth('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
         return redirect()->route('dashboard')->with('success', 'Login Successful');
         } else {
         return redirect()->back()->with('error', 'Invalid credentials');
         }
         }


        public function logout()
        {
        auth()->logout();
        return redirect()->route('getLogin')->with('success','You have been successfully logged out'); 
        }

        
         public function dashboard()
         {
         return view('admin.dashboard');
         }
}
