@extends('adminlte::page')

@section('title', 'Graphs')

@section('content_header')
    <h1>Chart reports</h1>
@stop

@section('content')

    <div class='container-fluid'>
        <div class='row'>
            <div class='col-md-3'>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Population
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">By age distribution</a></li>
                        <li><a href="#">By sex and school attendance</a></li>
                        <li><a href="#">JavaScript</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <ul class="nav nav-pills" style="margin-top: 100px;">
            <li class="active"><a data-toggle="pill" href="#home">Bar Chart</a></li>
            <li><a data-toggle="pill" href="#menu1">Menu 1</a></li>
            <li><a data-toggle="pill" href="#menu2">Menu 2</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <h3>HOME</h3>
                <div id="chart-div" style="height: 500px;">

                </div>
            </div>
            <div id="menu1" class="tab-pane fade">
                <h3>Menu 1</h3>
                <p>Some content in menu 1.</p>
            </div>
            <div id="menu2" class="tab-pane fade">
                <h3>Menu 2</h3>
                <p>Some content in menu 2.</p>
            </div>
        </div>



        {{-- {{$lava->render('LineChart', 'MyStocks', 'chart-div')}}--}}

    </div>
@stop