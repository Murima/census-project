@extends('dashboard-official')

@section('title', 'Create Tasklists')
@section('content_header')
    <h1>Form Status</h1>
@stop

@section('content')

    <div class="panel panel-info">
        <div class="panel-heading ">
            <span class="glyphicon glyphicon-eye-open"></span>
            View Status

        </div>


        <div class="panel-body">

            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th class="col-md-1">Enumerator ID</th>
                    <th>Ward</th>
                    <th class="col-md-1">Location Assigned</th>
                    <th class="col-md-2">Date Assigned </th>
                    <th>Date submitted</th>
                    <th>Location Submitted</th>

                    <th class="col-md-2">Status</th>
                    <th>Actions</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @for($i=0; $i<count($users); $i++)


                    <tr id="rowID" class="success">

                        <td>{{ $users[$i][0]->id}}</td>
                        <td>{{ $users[$i][0]->ward}}</td>

                        <td>{{$taskList[$i][0]->task_name}}</td>

                        <td>{{$taskList[$i][0]->date}}</td>

                        <td>{{$formStatus[$i]->date}}</td>
                        <td>{{$formStatus[$i]->location}}</td>

                        @if($formStatus[$i]->status=="Accepted")
                            <td>
                                <span id="tdID" class="label label-success">
                                Accepted
                                </span>
                            </td>

                        @else
                            <td>
                                    <span id="tdID"  class='label label-danger'>
                                Rejected</span>

                            </td>
                        @endif

                        @if($formStatus[$i]->status=="Accepted")
                            <td>
                                <a class="btn btn-sm btn-danger"
                                   href="{{
                                       route('reject-form',['task_id'=>$formStatus[$i]->task_id
                                       , 'house_no'=>$formStatus[$i]->house_no
                                       ])
                                       }}">
                                    <span class="glyphicon glyphicon-thumbs-down"></span>
                                    Reject
                                </a>
                            </td>
                        @else
                            <td>
                                <a class="btn btn-sm btn-info accept-specimen" href="javascript:void(0)">
                                    <span class="glyphicon glyphicon-thumbs-up"></span>
                                    Accept
                                </a>
                            </td>
                        @endif


                    </tr>

                @endfor
                </tbody>
            </table>
        </div>

    </div>
@endsection