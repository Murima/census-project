<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::to('css/AdminLTE.css') }}">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <script  src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js')  }}" ></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{ asset('js/bootstrap.min.js') }}"> </script>

    <link rel="stylesheet" href="{{ URL::to('css/skins/skin-red.css') }}">
    <!-- jQuery UI 1.11.4 -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Include Required Prerequisites -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
{{--
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
--}}

<!-- Include Date Range Picker -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">
    <!-- header -->
@include('includes.dashboard.dashboard-header')

<!-- side-bar -->
@include('includes.dashboard.dashboard-sidebar')


<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Admin Dashboard
                <small>Edit User</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content" style="min-height: 600px" >

            <!-- Your Page Content Here -->
            @yield('content')

            <div class="panel panel-info">
                <div class="panel-heading ">
                    <span class="glyphicon glyphicon-user"></span>
                    Edit user
                    <div class="panel-btn">
                        <a class="btn btn-sm btn-info" href="{{route('view-users')}}">
                            <span class="glyphicon glyphicon-eye-open"></span>
                            view users
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <!-- small box -->
                    @if(Storage::disk('local')->has($user->firstname.'-'.$user->id.'.jpg'))
                        <div class="col-md-5 panel panel-warning" style="float:right; outline: 1px solid orange;">
                            <div class="panel-heading ">
                                <span class="glyphicon glyphicon-file"></span>
                                Profile Image
                            </div>

                            <h4 style="text-underline: dash-dot-dot-heavy">User Image</h4>
                            <img src="{{ route('user-image', ['filename'=>$user->firstname.'-'.$user->id.'.jpg']) }}" alt="">

                            <form class="form-horizontal" style="float: right;">
                                <div class="row">
                                    <label class="control-label col-md-4" for="firstname">Name:</label>
                                    <div class="col-md-3">
                                        <p class="form-control-static">{{$user->firstname}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="control-label col-md-4" for="firstname">Role:</label>
                                    <div>
                                        @if($user->is_official)
                                            <p class="form-control-static">Census Official</p>
                                        @else
                                            <p class="form-control-static">Enumerator</p>
                                        @endif
                                    </div>
                                </div>


                            </form>
                        </div>
                    @endif
                <!-- ./col -->

                    <!--Edit official-->

                    @if(count($errors)>0)

                        <div class="row">
                            <div class="col-md-6">

                                <ul>
                                    @foreach( $errors->all() as $error)
                                        <li class="text-danger">
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    @endif

                    <div class="col-md-6">
                        <!--display success message-->
                        @if(Session::has('alert-success'))
                            @foreach(['success'] as $msg)
                                @if(Session::has('alert-').$msg)
                                    <div class="alert alert-{{ $msg }} alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <p > {{ Session::get('alert-' . $msg) }}</p>
                                    </div>
                                @endif
                            @endforeach

                        @endif

                        {{Form::open(array( 'action'=> array('UserController@editUser', $user->id), 'method' =>'put', 'enctype'=>'multipart/form-data')) }}

                        <div class="form-group" {{ $errors->has('firstname') ? 'has-error':'' }}>
                            <label for="firstname"> First Name</label>
                            <input class="form-control" name="firstname" type="text" id="firstname" value="{{$user->firstname}}">

                        </div>

                        <div class="form-group" {{ $errors->has('lastname') ? 'has-error':'' }}>
                            <label for="lastname"> Last Name</label>
                            <input class="form-control" name="lastname" type="text" id="lastname" value="{{$user->lastname}}">

                        </div>

                        <div class="form-group" {{ $errors->has('ID') ? 'has-error':'' }}>
                            <label for="ID"> ID</label>
                            <input class="form-control" name="ID" type="text" id="ID" value="{{$user->id}}">

                        </div>

                        <div class="form-group" {{ $errors->has('email') ? 'has-error':'' }}>
                            <label for="email"> Email</label>
                            <input class="form-control" name="email"  type="text" placeholder="email"  id="email"
                                   aria-describedby="basic-addon1" value="{{$user->email}}">

                        </div>

                        <div class="form-group">
                            <label for="Password"> Password</label>
                            <input class="form-control" name="password" type="password" id="password" value="">

                        </div>

                        <div class="form-group" {{ $errors->has('county') ? 'has-error':'' }}>
                            <label for="county"> County</label>
                            <input class="form-control" name="county" type="text" id="county" value="{{$user->county}}">

                        </div>
                        <div class="form-group" {{ $errors->has('phoneno') ? 'has-error':'' }}>
                            <label for="phoneno"> Phone No</label>
                            <input class="form-control" name="phoneno" type="text" id="phoneno" value="{{$user->phone_number}}">

                        </div>
                        <div class="form-group" {{ $errors->has('ward') ? 'has-error':'' }}>
                            <label for="ward"> Ward</label>
                            <input class="form-control" name="ward" type="text" id="ward" value="{{$user->ward}}">

                        </div>
                        @if($user->is_enumerator)
                            <div class="form-group"  {{ $errors->has('phone_number') ? 'has-error':'' }}>
                                <label for="county"> Phone Number </label>
                                <input class="form-control" name="phone_number" type="text" id="phone_number" value="{{$user->phone_number}}">

                            </div>

                            <div class="form-group" >
                                <label for="county">Head Office</label>
                                <input class="form-control" name="headoffice" type="text" id="headoffice" value="{{$user->headoffice}}">

                            </div>


                            <div class="form-group" >
                                <label for="county">Reports To</label>
                                <input class="form-control" name="reportsto" type="text" id="reportsto" value="{{$user->reportsto}}">

                            </div>

                            <div class="form-group" >
                                <label for="county">Supervisor Phone Number</label>
                                <input class="form-control" name="supervisor_phone" type="text" id="supervisor_phone" value="{{$user->supervisor_phone}}">

                            </div>
                            <div class="form-group" {{ $errors->has('ward') ? 'has-error':'' }}>
                                <label for="county"> Ward</label>
                                <input class="form-control" name="ward" type="text" id="ward" value="{{$user->ward}}">

                            </div>
                        @endif

                        <div class="form-group">
                            <label for="image">Image (only .jpg)</label>
                            <input type="file" name="image" class="form-controol" id="image">

                        </div>

                        <button type="submit" class="btn-success">
                            <i class="fa phpdebugbar-fa-download" style="margin-right: 5px"></i>Edit
                        </button>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">

                        {{ Form::close() }}
                    </div>
                    <!--/Register official-->
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- footer -->
    @include('includes.dashboard.dashboard-footer')

</div>
<!-- ./wrapper -->


<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous">
</script>
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ URL::to('css/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
