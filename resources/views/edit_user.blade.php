@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/emp_users/{{$cur_res->u_id}}/update" enctype="multipart/form-data" method="post">
    @csrf
    @method('PATCH')
    <center><H2> Edit the details of user </H2></center>

        <div class="row" allign="center" >
            <div class="col-3 p-5">
                <img src="/storage/{{$cur_res->img_path}}" width="300" height="300"></img>
            </div>
        <div class="col-8 pt-5">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="name" class="col-md-5 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                        name="name" value="{{ $cur_res->name }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="currentemployer" class="col-md-5 col-form-label text-md-right">{{ __('Current Employer') }}</label>

                    <div class="col-md-6">
                        <input id="currentemployer" type="text" class="form-control @error('currentemployer') is-invalid @enderror" 
                        name="currentemployer" value="{{ $cur_res->org_name }}" required autocomplete="currentemployer" autofocus>

                        @error('currentemployer')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="jobtitle" class="col-md-5 col-form-label text-md-right">{{ __('Job Title') }}</label>

                    <div class="col-md-6">
                        <input id="jobtitle" type="text" class="form-control @error('jobtitle') is-invalid @enderror" 
                        name="jobtitle" value="{{ $cur_res->jobtitle }}" required autocomplete="jobtitle" autofocus>

                        @error('jobtitle')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="workingfrom" class="col-md-5 col-form-label text-md-right">{{ __('Working From') }}</label>

                    <div class="col-md-6">
                        <input id="workingfrom" type="number" min= "1900" max = "2020" class="form-control @error('workingfrom') is-invalid @enderror" 
                        name="workingfrom" value="{{ $cur_res->fdate }}" required autocomplete="workingfrom" autofocus>

                        @error('workingfrom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            @php
                $index = 0;
            @endphp
            @foreach($old_res as $job)
                @php
                    $index++;
                @endphp
            <div class="col-8 offset-2">

                <div class="form-group row">
                    <label for="workingfrom" class="col-md-5 col-form-label text-md-right">{{ __('Previous Company') }}</label>

                    <div class="col-md-6">
                        <input id="workingfrom" type="text" class="form-control @error('workingfrom') is-invalid @enderror" 
                        name="previousemployer{{strval($index)}}" value="{{$job->org_name}}" required autocomplete="workingfrom" autofocus>

                        @error('workingfrom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="workingfrom" class="col-md-5 col-form-label text-md-right">{{ __('Job Title') }}</label>

                    <div class="col-md-6">
                        <input id="workingfrom" type="text" class="form-control @error('workingfrom') is-invalid @enderror" 
                        name="jobtitle{{strval($index)}}" value="{{$job->jobtitle}}" required autocomplete="workingfrom" autofocus>

                        @error('workingfrom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="workingfrom" class="col-md-5 col-form-label text-md-right">{{ __('Start Date') }}</label>

                    <div class="col-md-6">
                        <input id="workingfrom" type="number" min= "1900" max = "2020" class="form-control" 
                        name="workingfrom{{strval($index)}}" value="{{$job->fdate}}" required autocomplete="workingfrom" autofocus>

                        @error('workingfrom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="workingfrom" class="col-md-5 col-form-label text-md-right">{{ __('End Date') }}</label>

                    <div class="col-md-6">
                        <input id="workingfrom" type="number" min= "1900" max = "2020" class="form-control @error('workingfrom') is-invalid @enderror" 
                        name="workedtill{{strval($index)}}" value="{{$job->edate}}" required autocomplete="workingfrom" autofocus>
                        @error('workingfrom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            @endforeach

            <div class="row col-8 offset-5">
                <label for="image" class="col-md-5 col-form-label">Upload Image (Optional)</label>
                <input type="file" value="{{$cur_res->img_path}}" class= "form-control-file" id="image" name="image">

                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $image }}</strong>
                    </span>
                @enderror
            </div>
            <input type="hidden" id ="counter" name="counter" value = "{{$index}}"></div>

            <div class="row pt-5 col-8 offset-5">
            <button class="btn btn-primary "> Edit the current user</button>
            </div>
        </div>

    </form>
  
</div>
@endsection
