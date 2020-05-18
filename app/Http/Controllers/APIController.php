<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function api_call(){
        $cur_res = \DB::table('emp_users')->get();
        $old_res = \DB::table('past_histories')->get();
        return (['cur_res' => $cur_res,
            'old_res'=>$old_res]);
    }
}
