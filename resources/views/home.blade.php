@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row" allign="center">
            <div class="col3 p-5">
                <img src="/images/tom-2.jpg" width="200" height="200"></img>
            </div>
            <div class="col6 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="pt-1">Name: Arun</div>
                    <a style = "text-allign:right;" href="#">edit the details </a>
                </div>
                <div class="pt-1">Current Employer: SERC</div>
                <div class="pt-1">Job Title: GA</div>
                <div class="pt-1">Job History:
                    <div>Company Name: Winnou <div>          
                    <div class="pl-4">Start Date: May 2018</div>
                    <div class="pl-4">End Date: Dec 2019</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
