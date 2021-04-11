<?php

namespace App\Http\Controllers;

use App\Friends;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    //

    public function store($id) {
        $friend = Friends::friendship($id);
        if (!empty($friend)) {
            Friends::where('user_id',$id)->orWhere('friend_id',$id)->delete();
        }else{
            Friends::create([
                'friend_id'=>$id,
                'user_id'=>auth()->user()->id
            ]);
        }
        return back();
    }
}
