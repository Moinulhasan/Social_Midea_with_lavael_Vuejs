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
        <div class="card col-md-8">
            <div class="panel-body">
                <p style="margin-top: 8px;"><b>{{Auth::user()->name }}</b></p>
                <hr>
                @if( session()->has('msg'))
                                 <p class="alert alert-success">
                                 	{{session()->get('msg')}}
                                 </p>
                               
                          
                       @endif
                    <div class=" col-sm-12 col-md-12">
                       

                        <div class="row" align="center" >
                             @foreach($allUsers as $uList)
                            <div class="card col-md-5 "style="margin-left: 8px;margin-top: 10px;">
                                <div class="card-img">
                                	 <h3 style="margin:0px;"><a href="{{url('/profile')}}/{{$uList->slug}}">
                                  {{ucwords($uList->name)}}</a></h3>
                                <img src="{{url('/public/img')}}/{{$uList->pic}}"
                                width="100px" height="100px" style="border-radius: 50%;margin-left: 20px;padding: 5px;"/>
                                </div>
                                <div class="col-md-7 " align="center">
                               
                               
                                @foreach($allUsers2 as $uList2)

                                 <p>About :{{($uList2->city)}}</p>
                                <p>About :{{($uList2->about)}}</p>

                                 @endforeach

                                 
                        <p>
                           	
                           	<a href="{{url('/unfriend') }}/{{$uList->id}}" class="btn btn-danger" style="text-align: center">Unfriend</a>
                          </p>
                                
                            </div>

                            </div>

                            
                @endforeach
                        </div>
                       
                    </div>




                </div>
            
        </div>

 </div>



</div>

@endsection