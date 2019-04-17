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

                    profile is here!
                    <hr>
                    <img src="{{ url('/public/img')}}/{{ Auth::user()->pic}}" width="80px" height="80px"><br>
                    <a href="{{url('/changeimage')}}">Change Photo</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection