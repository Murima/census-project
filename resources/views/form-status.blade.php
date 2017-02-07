@extends('dashboard-official')

@section('title', 'Create Tasklists')
@section('content_header')
    <h1>Form Status</h1>
@stop

@section('content')

    <div class="panel panel-info">
        <div class="panel-heading ">
            <span class="glyphicon glyphicon-eye-open"></span>
            View Tasks

            <a type="submit" class="btn btn-success" style="margin-left: 10px;" href="#">

                <i class="fa phpdebugbar-fa-paperclip" style="margin-right: 5px"></i>
                Assign
            </a>
        </div>


        <div class="panel-body">

            <table class="table table-striped table-hover table-condensed">
                <thead>
                <tr>
                    <th>Enumerator ID</th>
                    <th>Ward</th>
                    <th>Location</th>
                    <th>Task ID</th>
                    <th>Task Date</th>
                    <th>Date submitted</th>
                    <th>Status</th>
                    <th>Actions</th>
                    <th></th>
                </tr>
                </thead>
            </table>
        </div>

    </div>
@endsection