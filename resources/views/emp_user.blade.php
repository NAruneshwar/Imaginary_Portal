@extends('layouts.app')

@section('content')
<div class="container">
<form action="delete/{{$cur_res->u_id}}" enctype="multipart/form-data" method="post">
    @csrf
    <div class="row justify-content-center">
        <div class="row" allign="center">
            <div class="col3 p-5">
                <img src="/storage/{{$cur_res->img_path}}" width="200" height="200"></img>
            </div>
                <div class="col6 pt-5">
                    <div class="pt-1">Name: {{$cur_res->name}}</div>
                    <div class="pt-1">Current Employer: {{$cur_res->org_name}}</div>
                    <div class="pt-1">Job Title: {{$cur_res->name}}</div>
                    
                    @foreach($old_res as $job)
                    
                        <div class="pt-1">Job History:
                            <div>Company Name: {{$job->org_name}} <div>          
                            <div class="pl-4">Start Date: {{$job->fdate}}</div>
                            <div class="pl-4">End Date: {{$job->edate}}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <button class="btn btn-danger " > Delete the current user</button>
    </div>
</form>
</div>
@endsection
