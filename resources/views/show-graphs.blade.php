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
                        <li><a href="{{route('show-graph')}}">By Religion</a></li>
                        <li><a href="{{route('show-graph', ['category'=>'1'])}}">By Tribe</a></li>
                        <li><a href="{{route('show-graph', ['category'=>'2'])}}">By Type of Disability</a></li>
                        <li><a href="#">JavaScript</a></li>
                    </ul>

                </div>

                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Education
                        <span class="caret"></span></button>

                    <ul class="dropdown-menu">
                        <li><a href="{{route('show-graph', ['category'=>'3'])}}">By Education Status</a></li>
                    </ul>

                </div>

                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">Household
                        <span class="caret"></span></button>

                    <ul class="dropdown-menu">
                        <li><a href="{{route('show-graph', ['category'=>'4'])}}">By Tenure Status</a></li>


                    </ul>
                </div>
            </div>
        </div>

        <ul class="nav nav-pills" style="margin-top: 100px;">
            <li class="active"><a data-toggle="pill" href="#home">Charts</a></li>
            <li><a role="button" href="{{route('show-graph',['category'=>'1','type'=>'line'])}}">Line Chart</a></li>

        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <div id="chart-div" style="height: 600px;">

                    {!! $chart->render() !!}
                </div>
                {{--@linechart('Stocks', 'chart-div');--}}
                {{--@barchart('GenderDistribution', 'chart-div');--}}

            </div>
            <div id="menu1" class="tab-pane fade">
                <a href=
                   @if(Request::url()=='show-graph/1/line')
                           "{{route('show-graph',['category'=>1,'type'=>'donut'])}}"
                   @endif
                   class="btn btn-success btn-sm"></a>
                <i class="fa phpdebugbar-fa-refresh"  style="margin-right: 2px"></i>Refresh

                @if(Request::url()=='show-graph/1/line')
                <div id="chart-div" style="height: 800px; width: 500px;">

                    {!! $chart->render() !!}
                </div>
                @endif


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