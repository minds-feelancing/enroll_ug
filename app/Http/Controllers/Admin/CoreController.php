<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\SchoolSearch;
use App\Models\SchoolCategory;
use Illuminate\Http\Request;
use App\Services\SearchManager;
use Illuminate\Support\Facades\DB;

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


        public function login(Request $request){

            $id = $request->query('id');
            //dd($id);

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


        public function schoolNameCheck(Request $request)
        {

            //all empty
            if(is_null($request->school_name)&&is_null($request->school_category)&&is_null($request->school_check)){
                return redirect()->back()->with('error','Search for the school');
                //dd($related_schools);
            }
            //all Isnotempty
            elseif(!is_null($request->school_name)&&!is_null($request->school_category)&&!is_null($request->school_check)){

                $related_schools=SearchManager::SearchSchoolAll($request);

                //dd($related_schools);

            }
            //school type is empty
            elseif(!is_null($request->school_name)&&!is_null($request->school_category)&&is_null($request->school_check)){

                $related_schools=SearchManager::SearchSchoolType($request);
                //dd($related_schools);

            }
             //school category is empty
             elseif(!is_null($request->school_name)&&is_null($request->school_category)&&!is_null($request->school_check)){

                $related_schools=SearchManager::SearchSchoolCategory($request);
                //dd($related_schools);
            }

             //school category and school type is empty
             elseif(!is_null($request->school_name)&&is_null($request->school_category)&&is_null($request->school_check)){

                $related_schools=SearchManager::SearchSchoolName($request);
                //dd($related_schools);
            }

            //school type only
            elseif(is_null($request->school_name)&&is_null($request->school_category)&&!is_null($request->school_check)){

                $related_schools=SearchManager::ShowSchoolType($request);
                //dd($related_schools);
            }

             //school category only
             elseif(is_null($request->school_name)&&!is_null($request->school_category)&&is_null($request->school_check)){

                $related_schools=SearchManager::ShowSchoolCategory($request);
                //dd($related_schools);
            }

             //school category and school type
             elseif(is_null($request->school_name)&&!is_null($request->school_category)&&!is_null($request->school_check)){

                $related_schools=SearchManager::ShowSchoolCategoryAndType($request);
                //dd($related_schools);
            }


            $clientip = request()->ip();
            SchoolSearch::create([
                'key_word' =>$request->school_name,
                'category'=>$request->school_category,
                'school_type'=>$request->school_check,
                'ip_address'=>$clientip,
                'user'=>auth()->check()? auth()->user()->id:'GUEST'
            ]);

            //dd($related_schools);


            return view('website.page_school',['related_schools'=>$related_schools]);
        }

        public function searchSchool($id){
            //Sdd($id);
            $theSchool = School::where('id',$id)
            ->get()->first();

            return view('website.searched_school',['theSchool'=>$theSchool]);
        }

        public function checkLoginStatus()
        {
            return response()->json(['loggedIn' => auth()->check()]);
        }

        public function SignUp(){

            return view('register');
        }

        public function confirmPassword(Request $request)
        {
            $password = $request->input('password');
            $confirmPassword = $request->input('confirmPassword');
            //dd($password);
            if ($password != $confirmPassword) {
                return "failure";
            }
            return "success";
        }

        public function checkEmail(Request $request)
        {
            //dd($request->email);


            $emailExists = DB::table('users')
            ->where('email', $request->email)
            ->exists();

            if ($emailExists) {
                return response()->json(['error' => 'Email already exists']);
            }

            return response()->json(['success' => 'Email is available']);
        }

}
