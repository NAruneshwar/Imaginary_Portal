@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <a href="/new_emp/create">Add new employee details </a>
    </div>
    @foreach($all_users as $eachuser)
    <div class="row justify-content-left">
        <div class="row" allign="center">
            <div class="col3 p-5">
               <a href="/emp_users/{{$eachuser->u_id}}">
                    <img src="/storage/{{($eachuser->img_path!='NULL') ? $eachuser->img_path: 'Images/srVlseUJgMZVGUsiYA6CLHzNK71YWyX7ZzMx8WxJ.png'}}" width="200" height="200"></img>
                </a>
            </div>
            <div class="col6 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                <div class="pt-1">Name: {{$eachuser->name}}</div>
                
                </div>
                <div class="pt-1">Current Employer: {{$eachuser->org_name}}</div>
                <div class="pt-1">Job Title: {{$eachuser->jobtitle}}</div>   
                <div class="pt-1">Working From: {{$eachuser->fdate}}</div> 
                <div class="pt-4">
                <a href="/emp_users/{{$eachuser->u_id}}/edit">edit the details </a>    
                </div>         
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
