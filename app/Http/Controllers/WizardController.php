<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class WizardController extends Controller
{

    public function SignUpStep1()
    {
        return view('register');
    }

    public function step2Store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'confirmPassword' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'phonenumber' => 'required',
        ]);
        //dd($request);

        $selected_school = session('school_id');
        //dd($selected_school);

        User::create([
            'email' =>$request->email,
            'password'=>Hash::make($request->password), 
            'firstName'=>$request->firstname,
            'lastName'=>$request->lastname,
            'phone_number'=>$request->phonenumber,
            'type'=>'ADMIN',
            'username'=>'Admin',
        ]);

        $user = User::where('email', $request->email)->firstOrFail();
        Auth::login($user);

        return redirect()->route('searched_school',$selected_school);
    }

}
