@extends('layouts.app')

@section('content')

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{Auth::user()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p style="text-align: center;"><b > Edit Profile</b></p>
                    <hr>
                    <div class="row">
                    	<div class="col-md-4 col-sm-12">
                    		<img src="{{ url('/public/img')}}/{{ Auth::user()->pic}}" width="200px" height="200px"style="margin-bottom: 15px;"><br>
                    		
                    	</div>
                    	<div class="col-md-8 col-sm-12">
                    		<header><h3>About</h3></header>
                    		<span >{{$data->about }}</span><br>

                    		<h3>Adress</h3>

                    		<p><span class="glyphicon glyphicon-map-marker"></span>{{$data->city }},{{$data->country }}</p>
                    	</div>
                    </div>
                    <hr>
                    <h3>Change Picture</h3>
                    		<hr>
                            {!! Form::open(['url'=>'/uploadphoto','enctype'=>'multipart/form-data'])!!}
                    
                        <input type="hidden" name="token" value="{{ csrf_token()}}"> 
                        <input type="file" name="pic" class="form-control" style="margin-bottom: 10px; padding: 5px;">
                        
                        <input type="submit" name="btn" class="btn btn-success">
                         {!! Form::close() !!}
                    <div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne" align="center">
      <h5 class="mb-0">
        <button class="btn btn-primary" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="text-align: center;">
          Edit Profile
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
       
             {!! Form::open(['url'=>'/updateprofile','enctype'=>'multipart/form-data'])!!}
             <div class="form-group">
    					<label for="exampleFormControlTextarea1">About</label>
   					 <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="about">{{$data->about }}</textarea>
 						 </div>
 						  <div class="form-group">
   						 <label for="exampleFormControlInput1">City</label>
    					<input type="text" class="form-control" id="exampleFormControlInput1" name="city" value="{{$data->city }}">
 						 </div>

 						  <div class="form-group">
   						 <label for="exampleFormControlInput1">Country</label>
    					<input type="text" class="form-control" id="exampleFormControlInput1" name="country" value="{{$data->country }}">
 						 </div>      
 						 <input type="submit"  class="btn btn-success">
 						     {!! Form::close() !!}
      </div>
    </div>
  </div></div></div></div></div></div></div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection