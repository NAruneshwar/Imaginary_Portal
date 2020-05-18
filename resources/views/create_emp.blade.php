@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
        <div id="temp1">
            
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
            <div id = "btn1" class="btn btn-secondary "> Add past experience</div>
            <button class="btn btn-primary "> Add the new user</button>
            </div>
        <input type="hidden" id ="counter" name="counter" value = "0"></div>
    </form>
</div>
@endsection

<script>
$(document).ready(function(){
    var iter = 1;
  $("#btn1").click(function(){
    iter++;
    var extend ='<div>'+
            '<div class="col-8 offset-2">'+
                '<div class="form-group row">'+
                    '<label for="jobtitle" class="col-md-4 col-form-label text-md-right">{{ __('jobtitle') }}</label>'+
                    '<div class="col-md-6">'+
                        '<input id="jobtitle" type="text"  name="jobtitle'+(iter-1).toString()+'"  required autocomplete="jobtitle" autofocus>'+
                    '</div>'+
                '</div>'+
            '</div>'+
            '<div class="col-8 offset-2">'+
                '<div class="form-group row">'+
                    '<label for="workingfrom" class="col-md-4 col-form-label text-md-right">{{ __('workingfrom') }}</label>'+
                    '<div class="col-md-6">'+
                        '<input id="workingfrom" type="number" min= "1900" max = "2020" name="workingfrom'+(iter-1).toString()+'" required autocomplete="workingfrom" autofocus>'+
                    '</div>'+
                '</div>'+
            '</div>'+
            '<div class="col-8 offset-2">'+
                '<div class="form-group row">'+
                    '<label for="workedtill" class="col-md-4 col-form-label text-md-right">{{ __('workedtill') }}</label>'+
                    '<div class="col-md-6">'+
                        '<input id="workedtill" type="number" min= "1900" max = "2020" name="workedtill'+(iter-1).toString()+'" required autocomplete="workingfrom" autofocus>'+
                    '</div>'+
                '</div>'+
            '</div>'+
            '</div> <div id= "temp'+iter+'"</div>';
            var tag ='temp'+(iter-1).toString();
            document.getElementById(tag).innerHTML= extend;
            var count = document.getElementById('counter');
            count.value = (iter-1).toString();
        });
});

</script>