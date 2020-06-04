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
    {   $data = request();
        // $data = request()->validate([
        //     'name' => 'required',
        //     'currentemployer' => 'required',
        //     'jobtitle' => 'required',
        //     'workingfrom' => 'required',
        //     'image' => ['image'],
        // ]);
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
            $imagepath="Images/srVlseUJgMZVGUsiYA6CLHzNK71YWyX7ZzMx8WxJ.png";
            $id = \DB::table('emp_users')->insertGetId(
                ['name' => $data['name'], 'jobtitle' => $data['jobtitle'], 
                'org_name' => $data['currentemployer'], 'fdate' => $data['workingfrom'],
                'img_path' => $imagepath]);

        }
        if($data['counter']>0){
            for($k=1;$k<=$data["counter"];$k++){
                $str = strval($k);
                $old_job = \DB::table('past_histories')->insertGetId(
                    ['u_id' => $id, 'org_name' => $data['previousemployer'.$str], 'jobtitle' => $data['jobtitle'.$str], 'fdate' => $data['workingfrom'.$str], 'edate' => $data['workedtill'.$str]
                    ]);
            }
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
        $data = request();
        // //$data = request()->validate([
        //     'name' => 'required',
        //     'currentemployer' => 'required',
        //     'jobtitle' => 'required',
        //     'workingfrom' => 'required',
        //     'image' => ['image'],
        // ]);
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
        $delete_old = \DB::table('past_histories')
                    ->where('u_id',$user)->delete();

        for ($k=1; $k<=$data['counter'];$k++){
            $str=strval($k);
            $past_updated = \DB::table('past_histories')
                ->where('u_id',$user)
                ->insertGetId(['u_id' => $user, 'org_name' => $data['previousemployer'.$str],
                         'jobtitle' => $data['jobtitle'.$str], 'fdate' => $data['workingfrom'.$str], 
                         'edate' => $data['workedtill'.$str]
                ]);
        }        

        for ($k=1; $k<=$data['counter2'];$k++){
            $str=strval($k);
            $past_updated = \DB::table('past_histories')
                ->where('u_id',$user)
                ->insertGetId(['u_id' => $user, 'org_name' => $data['previousemployernew'.$str],
                            'jobtitle' => $data['jobtitlenew'.$str], 'fdate' => $data['workingfromnew'.$str], 
                            'edate' => $data['workedtillnew'.$str]
                ]);
            }
        return redirect('/home');
    }

    public function delete($user)
    {   
        $deleted = \DB::table('emp_users')->where('u_id',$user)->delete();
        $deleted_old_jobs = \DB::table('past_histories')->where('u_id',$user)->delete();
        return redirect('/home');
    }
}
