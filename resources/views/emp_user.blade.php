@extends('layouts.app')

@section('content')
<div class="container">
<form action="delete/{{$cur_res->u_id}}" enctype="multipart/form-data" method="post">
    @csrf
    <div class="row justify-content-center">
        <div class="row" allign="center">
            <div class="col3 p-5">
                <img src="/storage/{{($cur_res->img_path!='NULL') ? $cur_res->img_path: 'Images/srVlseUJgMZVGUsiYA6CLHzNK71YWyX7ZzMx8WxJ.png'}}" width="300" height="300"></img>
            </div>
                <div class="col6 pt-5">
                    <div class="pt-1">Name: {{$cur_res->name}}</div>
                    <div class="pt-1">Current Employer: {{$cur_res->org_name}}</div>
                    <div class="pt-1">Job Title: {{$cur_res->jobtitle}}</div>
                    <div class="pt-1 pb-2">Working From: {{$cur_res->fdate}}</div>
                    
                    @if(count($old_res)>0)
                    <div class="pt-1">Job History: </div>
                    @endif
                    @php
                    $i = 1
                    @endphp
                    @foreach($old_res as $job)
                        <div> {{$i++}}) Company Name: {{$job->org_name}} <div>          
                        <div class="pl-3"> Start Date: {{$job->fdate}}</div>
                        <div class="pl-3 pb-2"> End Date: {{$job->edate}}</div>
                    @endforeach
                </div>
            </div>
        </div>
        </br>
                <center><button class="btn btn-danger " > Delete this user</button><center>
    </div>
 

</form>
</div>
@endsection
