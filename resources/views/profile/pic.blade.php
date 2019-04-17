@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-4">
            <div class="card" >
                    <div class="card-header">
                             Profile
                    </div>
                    <ul class="list-group list-group-flush">
                    <ul class="list-group list-group-flush">
                
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <hr>
                    <div class="card-img">
                    <img src="{{ url('/public/img')}}/{{ Auth::user()->pic}}" width="200px" height="200px" style="border-radius: 50%;margin-left: 20px;"><br>
                </div>
                    <br>
                    <div class="card-header"><b>{{Auth::user()->name }}</b><br>
                        
                    </div>
                    <div class="card-body">
                        <span >{{$data->about }}</span><br>
                        <p>Adress : <span>{{$data->city }},{{$data->country }}</span></p>
                    </div>
                    <hr>
                    
                    <a href="{{url('/editprofile')}}" class="btn btn-primary"><span>Edit Profile</span></a>


                   


               
             
                    </ul>
                </ul>
         </div>
            
        </div>
        <div class="col-md-6">
            <div class="card-body" style="padding: 0px;">
                    <div class="form-group">
         <label for="exampleFormControlTextarea1">Example textarea</label>
         <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
       </div>
         </div>
            
        </div>

 </div>



</div>

@endsection