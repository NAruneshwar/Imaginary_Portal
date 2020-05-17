@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/new_emp" enctype="multipart/form-data" method="post">
    @csrf
        <div class="row col-8 offset-4 pb-3">
        <H1>Enter details of new employee</H1></div>
        <div class="col-8 offset-2">
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                    name="currentemployer" value="{{ old('currentemployer') }}" required autocomplete="currentemployer" autofocus>

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
                    name="jobtitle" value="{{ old('jobtitle') }}" required autocomplete="jobtitle" autofocus>

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
                <label for="workingfrom"  class="col-md-4 col-form-label text-md-right">{{ __('workingfrom') }}</label>

                <div class="col-md-6">
                    <input id="workingfrom" min= "1900" max = "2020" type="number" class="form-control @error('workingfrom') is-invalid @enderror" 
                    name="workingfrom" value="{{ old('workingfrom') }}" required autocomplete="workingfrom" autofocus>

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
            <input type="file", class= "form-control-file" id="image" name="image">

            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $image }}</strong>
                </span>
            @enderror
        </div>
        <div class="row pt-5 col-8 offset-5">
        <div id = "btn1" class="btn btn-secondary " onClick = "add_past();"> Add past experience</div>
        <button class="btn btn-primary "> Add the new user</button>
        </div>
        <div>

        <div>
    </form>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
function add_past()
{    
    alert("Hi");
}

</script>