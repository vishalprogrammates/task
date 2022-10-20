<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class Usercontroller extends Controller
{
    public function add_user(Request $request)
    {
        
        request()->validate(
            [
                'name' => 'required|regex:/^[a-zA-Z]+$/u',                
                'phone' => 'required|digits:10|unique:users',
                'password' => 'required|min:8',  
                'confirm_password' => 'same:password',                    
            ],
            [
                'name.required' => ' Name is required.',                
                'phone.required' => 'Phone is required.',
                'password.required' => 'Password is required.',
            ]
        );

        $name = $request->name;
        $phone = $request->phone;
        $password = Hash::make($request->password);
       
       
        $add = DB::table('users')->insert([

            'type' => 2,
            'name' => $name,
            'phone' => $phone,
            
            'password' => $password,
            'updated_at' => NOW(),
            'created_at' => NOW()

        ]);
        
        if($add){
            return redirect('/')->with('success', 'Staff added sucessfully!!');
               }    
    }
    public function login()
    {   
         return view('login');
    }

    public function loggedin(Request $request)
    {
      
    request()->validate(  
        [               
            'phone' => 'required|digits:10',
            'password' => 'required',
        ],
    );

    $phone = $request->phone;     
    $password = $request->password;
    if (Auth::attempt(['phone' => $phone, 'password' => $password, 'type' => 2])) {

        return redirect('/dashboard');

    }else{        
        return back()->with('error', 'Incorrect id or password !');
    }

    }
    public function dashboard()
    {
        $users = DB::table('users')->get();
        
        return view('dashboard',compact('users'));
    }

    public function logout(){
        session()->flush();
        return redirect('/login');
    }

    public function search(Request $request)
    {
        $name=$request->input('name');
       
        $users_one =  DB::table('users');
        $users_lead =  $users_one;
       
        
        if(!is_null($name)) {
            $users_lead =  $users_one->where(function($q) use ($name) {
                $q->where('users.name', 'like', '%'.$name.'%');
                });

               
            }

            $users = $users_lead->orderBy('users.id', 'DESC')->paginate(10);
       


            return view('/dashboard',  compact('users'));
          

    }

}
