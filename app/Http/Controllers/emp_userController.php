<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class emp_userController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index($user)
    {
        $cur_res = \DB::table('emp_users')->where('u_id',$user)->first();
        // $user = emp_users::find($user);
        // dd($result);   
        // $result = \DB::table('emp_users')
        //             ->join('past_histories','emp_users.u_id','=','past_histories.u_id') 
        //             ->select('emp_users.name','emp_users.jobtitle','emp_users.fdate','past_histories.org_name','past_histories.fdate','past_histories.edate')
        //             ->get();
        $old_res = \DB::table('past_histories')->where('u_id',$user)->get();

          
        return view('emp_user', [
            'cur_res' => $cur_res,
            'old_res'=>$old_res]);

    }
    public function create()
    {
        return view('create_emp');
    }
    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'currentemployer' => 'required',
            'jobtitle' => 'required',
            'workingfrom' => 'required',
            'image' => ['required','image'],
        ]);

        $imagepath = request('image')->store('Images','public');

        $id = \DB::table('emp_users')->insertGetId(
            ['name' => $data['name'], 'jobtitle' => $data['jobtitle'], 
            'org_name' => $data['currentemployer'], 'fdate' => $data['workingfrom'],
            'img_path' => $imagepath ]
        );

        return redirect('/home');
    }
}
