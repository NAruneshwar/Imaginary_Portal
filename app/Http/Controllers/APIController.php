<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function api_call(){
        $cur_res = \DB::table('emp_users')->get();
        return (json_encode(['cur_res' => $cur_res]));
    }


    public function user_details($user){
        $cur_res = \DB::table('emp_users')->where('u_id',$user)->get();
        $old_res = \DB::table('past_histories')->where('u_id',$user)->get();
        return (json_encode(['cur_res' => $cur_res,
        'old_res'=>$old_res]));      

    }
}

