@extends('adminlte::page')

@section('title', 'User Profile')

@section('content_header')
    <h1>User Profile</h1>
@stop

@section('content')

    <div class="row">

        <div class="col-md-30">

            @if(Storage::disk('local')->has($user->firstname.'-'.$user->id.'.jpg'))
                <div class="col-md-1 panel panel-warning"
                     style="float:left; outline: 1px solid orange; height: 600px; width: 100%;">

                    <div class="panel-heading ">
                        <span class="glyphicon glyphicon-user"></span>
                        Profile Image
                    </div>

                    <div class="col-md-2">
                        <img src="{{ route('user-image', ['filename'=>$user->firstname.'-'.$user->id.'.jpg']) }}" alt=""
                        >
                    </div>


                    <div class="col-lg-6 style=" style="margin-top: 1%;" >
                        <p class="view-striped"><strong>First Name</strong> &nbsp;&nbsp; {{$user->firstname}}</p>
                        <p class="view-striped"><strong>Last Name</strong> &nbsp;&nbsp; {{$user->lastname}}</p>
                        <p class="view-striped"><strong>ID</strong>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            {{$user->id}}</p>
                        <p class="view-striped"><strong>County</strong>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            {{$user->county}}</p>
                        <p class="view-striped"><strong>Ward</strong>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            {{$user->ward}}</p>
                        <p class="view-striped"><strong>Phone</strong>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            {{$user->phone_number}}</p>
                        {{ $errors->has('phoneno') ? 'has-error':'' }}
                        <p class="view-striped"><strong>Role</strong>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            @if($user->is_official==1)
                                Official
                            @endif

                        </p>
                        {{--<p class="view-striped"><strong>Name</strong>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            {{$user->firstname}}</p>--}}


                    </div>

                </div>

            @endif

        </div>

    </div>
@endsection