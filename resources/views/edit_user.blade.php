@extends('layouts.app')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@section('content')

<div class="container">
    <form action="/emp_users/{{$cur_res->u_id}}" enctype="multipart/form-data" method="post">
    @csrf
    @method('PATCH')
    <center><H2> Edit the details of user </H2></center>

        <div class="row" allign="center" >
            <div class="col-3 p-5">
                <img src="/storage/{{$cur_res->img_path}}" width="200" height="200"></img>
            </div>
        
        
        <div class="col-8 pt-5">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

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
                    <label for="currentemployer" class="col-md-4 col-form-label text-md-right">{{ __('currentemployer') }}</label>

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
                    <label for="jobtitle" class="col-md-4 col-form-label text-md-right">{{ __('jobtitle') }}</label>

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
                    <label for="workingfrom" class="col-md-4 col-form-label text-md-right">{{ __('workingfrom') }}</label>

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
           
            <div class="row col-8 offset-5">
                <label for="image" class="col-md-4 col-form-label">Upload Image (Optional)</label>
                <input type="file" value="{{$cur_res->img_path}}" class= "form-control-file" id="image" name="image">

                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $image }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row pt-5 col-8 offset-5">
            <div id = "btn1" class="btn btn-secondary " onClick = "add_past();"> Add past experience</div>
            <button class="btn btn-primary "> Edit the current user</button>
            </div>
            <tbody>
        </tbody>
        </div>
        
    </form>
  
</div>

@endsection

<script type="text/javascript">
    function add_past(){
        var extend = '<div>wtf</div>';
        
            $('tbody').append(extend);
    }    
</script>