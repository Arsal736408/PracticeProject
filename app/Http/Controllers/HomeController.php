<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Info;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function test()
        {

            return view('testhome');
        }
    
        public function submit(Request $request)
        {

            //return view('testhome');

            //print_r($req->input());
            $messsages = array(
                'name.min'=>'Name Should be Greater than 3 Characters',
                'email.regex'=>'The email is invalid.',
                'gender.required'=>'Please Select Gender'
            );

            $validate = $request->validate([
                'name' => ['required', 'string', 'min:3'],
                'email' => ['required', 'string', 'max:50','regex:/^[a-z0-9](\.?[a-z0-9_-]){0,}@[a-z0-9-]+\.([a-z]{1,6}\.)?[a-z]{2,6}$/'],
                'gender' => ['required', 'string']
            ],$messsages);

            $Info = new Info;
            $Info->name = $request->name;
            $Info->email = $request->email;
            $Info->gender = $request->gender;
            $Info->save();
            //return date('Y-m-d', strtotime($request->birthday));
        
             

             return view('testhome');
        }

        public function retrivedata()
        {
            
            $data = Info::all()->toArray();
            return view('retrivedata', compact('data'));

        }
}
