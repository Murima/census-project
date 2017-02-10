@extends('dashboard-official')

@section('title', 'Reject Forms')
@section('content_header')
    <h1>Form Status</h1>
@stop

@section('content')
    <div class="panel panel-info">

        <div class="panel-heading">
            <div class="container-fluid">
                <div class="row less-gutter">
                    <div class="col-md-11">
                        <span class="glyphicon glyphicon-filter"></span> Reject Form
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

            {{ Form::open(array('route' => array('reject-form',$formDetails->task_id, $formDetails->house_no), 'method'=>'put')) }}
            <div class="form-group row">
                <label for="location" class="col-sm-2 col-form-label">Location Submitted</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="location" name="location" value="{{$formDetails->location}}" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="taskID" class="col-sm-2 col-form-label">House No</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="houseNo" name="houseNo" value="{{$formDetails->house_no}}" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label">Form Category</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="category" name="category" value="{{$formDetails->category}}" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="time" class="col-sm-2 col-form-label">Time Submitted</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="time" name="time" value="{{$formDetails->time}}" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="reason" class="col-sm-2 col-form-label">Reason Rejected</label>
                <div class="col-sm-10">
                    {{ Form::select('reason',$rejectOptions,Input::old('reason'),['class'=>'form-control'] )}}
                </div>
            </div>
            <div class="form-group row">
                <label for="talkedto" class="col-sm-2 col-form-label">Talked to</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="talkedto" name="talkedto" value="">
                </div>
            </div>

            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-thumbs-down" style="margin-right: 5px"></i>Reject
                    </button>
                </div>
            </div>
            <input type="hidden" name="_token" value="{{ Session::token() }}">

            {{Form::close()}}
        </div>
    </div>
@endsection