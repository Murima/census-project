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
                <small>Register Census Officials</small>
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
                    register official
                    <div class="panel-btn" style="margin-top: 5px;">
                        <a class="btn btn-sm btn-info" href="{{route('view-users')}}">
                            <span class="glyphicon glyphicon-eye-open"></span>
                            view users
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <!-- Registered users widget -->
                    <div class="col-lg-3 col-xs-6" style="float:right">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3></h3>
                                @if(isset($user))
                                    <h3>{{ $user }}</h3>
                                @endif

                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <!-- /Registered users widget -->

                    <!--Register official-->

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

                        <form action="{{ route('register-official') }} " method="post" enctype="multipart/form-data">

                            <div class="form-group" {{ $errors->has('firstname') ? 'has-error':'' }}>
                                <label for="firstname"> First Name</label>
                                <input class="form-control" name="firstname" type="text" id="firstname">

                            </div>

                            <div class="form-group" {{ $errors->has('lastname') ? 'has-error':'' }}>
                                <label for="lastname"> Last Name</label>
                                <input class="form-control" name="lastname" type="text" id="lastname">

                            </div>

                            <div class="form-group" {{ $errors->has('ID') ? 'has-error':'' }}>
                                <label for="ID"> ID</label>
                                <input class="form-control" name="ID" type="text" id="ID">

                            </div>

                            <div class="form-group" {{ $errors->has('email') ? 'has-error':'' }}>
                                <label for="email"> Email</label>
                                <input class="form-control" name="email"  type="text" placeholder="email"  id="email"
                                       aria-describedby="basic-addon1">

                            </div>

                            <div class="form-group">
                                <label for="Password"> Password</label>
                                <input class="form-control" name="password" type="password" id="password">

                            </div>

                            <div class="form-group" {{ $errors->has('county') ? 'has-error':'' }}>
                                <label for="county"> County</label>
                                <input class="form-control" name="county" type="text" id="county">

                            </div>

                            <div class="form-group">
                                <label for="image">Image (only .jpg)</label>
                                <input type="file" name="image" class="form-controol" id="image">

                            </div>

                            <button type="submit" class="btn-success">
                                <i class="fa phpdebugbar-fa-download" style="margin-right: 5px"></i>Submit
                            </button>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">

                        </form>

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
