@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row" allign="center">
            <div class="col3 p-5">
                <img src="/images/tom.jpg" width="200" height="200"></img>
            </div>
            <div class="col6 pt-5">
                <div class="pt-1">Name: {{$cur_res->name}}</div>
                <div class="pt-1">Current Employer: {{$cur_res->org_name}}</div>
                <div class="pt-1">Job Title: {{$cur_res->name}}</div>
                
                @foreach($old_res as $item)
                { ?>
                    <div class="pt-1">Job History:
                        <div>Company Name: {{$item->org_name}} <div>          
                        <div class="pl-4">Start Date: {{$item->fdate}}</div>
                        <div class="pl-4">End Date: {{$item->edate}}</div>
                    </div>
                @foreach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
