<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Profile;

class ProfileController extends Controller
{
    public function index($slug){

    	return view('profile.pic')->with('data', Auth::user()->profile);
    }
    public function changeimage(){

    	return view('profile.pic')->with('data', Auth::user()->profile);
    }

    public function uploadphoto(Request $request){

    	$file = $request->file('pic');
        $filename = $file->getClientOriginalName();
        $path = 'public/img';
        $file->move($path, $filename);
        $user_id = Auth::user()->id;
        DB::table('users')->where('id', $user_id)->update(['pic' => $filename]);
        
        //return view('profile.index');
        return back();
    }
    public function editprofile(){
    	return view('profile.editprofile')->with('data', Auth::user()->profile);

    }
    public function updateprofile(Request $request){
    	$user_id = Auth::user()->id;
    	DB::table('profiles')->where('user_id',$user_id)->update($request->except('_token'));
        //return view('profile.index');
        return back();
    }
    public function findfriend($slug){

    	  $uid = Auth::user()->id;
        $allUsers = DB::table('profiles')
        ->leftJoin('users', 'users.id', '=', 'profiles.user_id')
        ->where('users.id', '!=', $uid)->get();
        return view('profile.findfriend', compact('allUsers'))->with('data', Auth::user()->profile);
    }
     public function addfriend($id) {
        Auth::user()->addfriend($id);
        return back();
    }
}

