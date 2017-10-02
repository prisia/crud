<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Extensions\MongoSessionStore;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Hash;
use App\user;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = user::paginate(5);

        return view('home')->with('user',$user);
    }

    public function add(){
        return view('add');
    }

    public function store(Request $request){
        $data = $request->input();
        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        );

        $validator = Validator::make($data, $rules);

        if($validator->fails()){
            return Redirect::to('/home/add')
                ->withErrors($validator);
        } else {
            $user = new user;
            $user->name       = $data['name'];
            $user->gender     = $data['gender'];
            $user->email      = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->save();

            // redirect
            Session::flash('message', 'Successfully created a new user!');
            return Redirect::to('home');
        }
    }

    public function edit($id)
    {
        $user = user::find($id);
        return view('edit')->with('user',$user);
    }


    public function update($id,Request $request)
    {
        $user = user::find($id);
        $data = $request->input();

        $rules = array(
            'email'      => 'email',
        );

        // echo dd($data);exit();
        $validator = Validator::make($request->input(), $rules);
        if($validator->fails()){
            return Redirect::to('/home/edit/'.$id)
                ->withErrors($validator);
            // dd($validator);exit();
        } else {

            $user->name       = isset($data['name']) ? $data['name']: $user->name ;
            $user->email      = isset($data['email']) ? $data['email'] :$user->email;
            $user->gender     = isset($data['gender']) ? $data['gender'] :$user->gender;
            $user->save();

            // redirect
            // Session::flash('message', 'Successfully updated user!');
            return Redirect::to('home');
        }
        return view('edit')->with('user',$user);
    }

    public function delete($id)
    {
        $user = user::find($id);
        // echo dd($user);
        if(Auth::user()->id != $id){
            $user->delete();
            Session::flash('message', 'Successfully Deleted');
            return Redirect::to('home');
        } else {
            Session::flash('message', 'You Cannot Delete A logged User');
            return Redirect::to('home');
        }
    }
}
