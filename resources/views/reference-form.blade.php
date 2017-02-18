@extends('adminlte::page')
@section('title', 'Reference form')


@section('content_header')
    <h1>Referenced Form</h1>
@stop

@section('content')
    @if(Route::is('decline-form'))
        <div class="panel panel-warning">
            @else
                <div class="panel panel-success">

                    @endif

                    <div class="panel-heading">
                        <div class="container-fluid">
                            <div class="row less-gutter">
                                <div class="col-md-11">
                                    @if(Route::is('decline-form'))
                                        <span class="glyphicon glyphicon-filter"></span> Decline Form
                                    @else
                                        <span class="glyphicon glyphicon-filter"></span> Confirm Form
                                    @endif
                                </div>
                                <div class="col-md-1">
                                    <a class="btn btn-sm btn-primary pull-right" href="#" onclick="window.history.back();return false;"
                                       alt="previous page" title="back">
                                        <span class="glyphicon glyphicon-backward"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="container col-md-6">
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
                            @if(Route::is('decline-form'))
                                {{ Form::open(array('route' => array('decline-form',$submittedDetails->status_id), 'method'=>'put')) }}
                            @else
                                {{ Form::open(array('route' => array('accept-form',$submittedDetails->status_id), 'method'=>'put')) }}

                            @endif
                        <div class="form-group row">
                            <label for="ward" class="col-sm-2 col-form-label">Ward</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ward" name="ward" value="{{$ward}}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="locationass" class="col-sm-2 col-form-label">Location Assigned</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="locationass" name="locationass" value="{{$assignedDetails->task_name}}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="locationsub" class="col-sm-2 col-form-label">Location Submitted</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="locationsub" name="locationsub" value="{{$submittedDetails->location}}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="time" class="col-sm-2 col-form-label">Date Assigned</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="time" name="time" value="{{$assignedDetails->date}}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="time" class="col-sm-2 col-form-label">Date Submitted</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="time" name="time" value="{{$submittedDetails->date}}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="time" class="col-sm-2 col-form-label">Time Submitted</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="time" name="time" value="{{$submittedDetails->time}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">

                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    @if(Route::is('decline-form'))
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-thumbs-down" style="margin-right: 5px"></i>Decline
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-info">
                                            <i class="fa fa-thumbs-up" style="margin-right: 5px"></i>Confirm
                                        </button>
                                    @endif
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">

                            {{Form::close()}}
                        </div>
                    </div>
@endsection