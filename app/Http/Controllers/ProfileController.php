<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Profile;
use App\friendship;

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
    public function request($slug){

    	 $uid = Auth::user()->id;
        $allUsers2 = DB::table('profiles')
       					 ->rightJoin('friendships', 'friendships.requester','=', 'profiles.user_id',)
       					 ->where('friendships.id', '=', $uid)->get();

        $allUsers = DB::table('friendships')
                        ->rightJoin('users', 'users.id', '=', 'friendships.requester')
                        ->where('status', '=', Null)
                        ->where('friendships.user_request', '=', $uid)->get();

    	return view('profile.request', compact('allUsers','allUsers2'))->with('data', Auth::user()->profile);
    }
    public function accept($name,$id){

    	$uid = Auth::user()->id;
        $check= friendship::where('requester', $id)
                ->where('user_request', $uid)
                ->first();
        if ($check) {
            // echo "yes, update here";
            $update= DB::table('friendships')
                    ->where('user_request', $uid)
                    ->where('requester', $id)
                    ->update(['status' => 1]);


    				if ($update) {
    					return back()->with('msg','You are now friend '.$name);
    				}
    				else{
    					return back()->with('msg','You are now friend with '.$name);
    				}
    		}

    }
}

