@extends('layouts.app')

@section('content')
<style type="text/css">
    a:hover{
        text-decoration: none;
    }

</style>
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
                    <div class=" col-sm-12 col-md-12">
                       

                        <div class="row" style="padding: 5px;" >
                             @foreach($allUsers as $uList)
                            <div class="card col-md-5 "style="margin-left: 8px;margin-top: 10px;">
                                <div class="card-img">
                                    <h3 style="margin:0px;"><a href="{{url('/profile')}}/{{$uList->slug}}" >
                                  {{ucwords($uList->name)}}</a></h3>
                                <img src="{{url('/public/img')}}/{{$uList->pic}}"
                                width="100px" height="100px" style="border-radius: 50%;margin-left: 20px;padding: 5px;"/>
                                </div>
                                <div class="col-md-7 " align="center">
                                
                                <p><i class="fa fa-globe"></i> {{$uList->city}}  - {{$uList->country}}</p>
                                <?php 
                                    $check = DB::table('friendships')
                                        ->where('user_request','=',$uList->id)
                                        ->where('requester','=',Auth::user()->id)
                                        ->first();

                                        if ($check=='') {
                                            
                                    
                                ?>
                    <p><a href="{{url('/addfriend') }}/{{$uList->id}}" class="btn btn-primary" style="text-align: center">Add Friend</a></p>
                        <?php }else { ?>
                                <p style="color: green;">Request Sent</p>
                        <?php } ?>

                             <p style="text-align: center">{{$uList->about}}</p>
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