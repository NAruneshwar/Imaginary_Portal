<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class emp_userController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function user_details($user)
    {
        $cur_res = \DB::table('emp_users')->where('u_id',$user)->first();
        // dd($result);       
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
            'image' => ['image'],
        ]);
        if(isset($data["image"]))
        {
            $imagepath = request('image')->store('Images','public');

            $id = \DB::table('emp_users')->insertGetId(
                ['name' => $data['name'], 'jobtitle' => $data['jobtitle'], 
                'org_name' => $data['currentemployer'], 'fdate' => $data['workingfrom'],
                'img_path' => $imagepath ]
            );
        }   
        else{
            $imagepath="NULL";
            $id = \DB::table('emp_users')->insertGetId(
                ['name' => $data['name'], 'jobtitle' => $data['jobtitle'], 
                'org_name' => $data['currentemployer'], 'fdate' => $data['workingfrom'],
                'img_path' => $imagepath]);

        }
        return redirect('/home');
    }

    public function edit_user($user)
    {   
        $cur_res = \DB::table('emp_users')->where('u_id',$user)->first();
        $old_res = \DB::table('past_histories')->where('u_id',$user)->get();
        return view('edit_user', [
            'cur_res' => $cur_res,
            'old_res'=>$old_res]);

    }

    public function update($user)
    {
        $data = request()->validate([
            'name' => 'required',
            'currentemployer' => 'required',
            'jobtitle' => 'required',
            'workingfrom' => 'required',
            'image' => ['image'],
        ]);

        if(isset($data["image"]))
        {
            $imagepath = request('image')->store('Images','public');
                
            $updated = \DB::table('emp_users')
                ->where('u_id', $user)
                ->update(['name'=>$data['name'],
                            'org_name'=>$data['currentemployer'],
                            'jobtitle'=>$data['jobtitle'],
                            'fdate'=>$data['workingfrom'],
                            'img_path'=>$imagepath
                            ]);
        }
        else{
            $updated = \DB::table('emp_users')
                ->where('u_id', $user)
                ->update(['name'=>$data['name'],
                            'org_name'=>$data['currentemployer'],
                            'jobtitle'=>$data['jobtitle'],
                            'fdate'=>$data['workingfrom']
                            ]);
        }

        return redirect('/home');
    }
}
