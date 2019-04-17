<?php

namespace App\Traits;
use App\friendship;
trait Friendable
{

	public function test(){
		return 'hi';
	}
	public function addfriend($id){
        
        $Friendship = friendship::create([
            
            'requester' => $this->id, // who is logged in
            'user_request' => $id,
        ]);
        
        if($Friendship)
        {
            
            return $Friendship;
        }
        
        return 'failed';
                
    }
}
