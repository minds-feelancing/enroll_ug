<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\SchoolCategory;
use Illuminate\Http\Request;

class CoreController extends Controller
{
    //

        public function home(){
            return view('website.index',['categories' => SchoolCategory::all(['id','name']) , 'schools' => School::paginate(30)]);
        }


        public function index(){

            $schools = School::all()->count();
            return view('index',['schools'=> $schools]);
        }


        public function login(){

            return view('login');
        }

        

        public function settings(){

            return view('settings');
        }


        public function support(){

            return view('support');
        }
        public function logs(){

            return view('logs');
        }


        public function applications(){

            return view('applications');
        }


        public function  authenticate(){

            $data =  request()->validate([
                'email'=>'required|email',
                'password' => 'required'
            ]);

            // dd($data);

            if(auth()->attempt($data)){

                request()->session()->regenerate();
                return redirect()->intended('/dashboard');
            }

            return back()->withErrors([
                'email' => 'The credentials you provided do not match any account'
            ]);

        }



        public function logout(){

            auth()->logout();
            request()->session()->regenerate();
            return redirect('/');


        }
}
