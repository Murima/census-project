@extends('adminlte::page')

@section('title', 'Census Official Dashboard')

@section('content_header')

    <div class="row">

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Dashboard</h3>

            </div>

            <div class="box-body" style="display: block; height: 250px ;background-color: rgba(218,202,200,0.55)">

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-tasks"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Tasks Left</span>
                            <span class="info-box-number">
                                @if(isset($tasks))
                                    {{$tasks->where('status', 'open')->count()}}
                                @endif
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Uploaded Forms</span>
                            <span class="info-box-number">
                                @if(isset($status))
                                    {{$status->count()}}
                                @endif
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-red">
                        <span class="info-box-icon"><i class="fa fa-thumbs-o-down"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Rejected Forms</span>
                            <span class="info-box-number">
                                @if(isset($status))
                                    {{$status->where('status', 'Rejected')->count()}}
                                @endif
                            </span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="progress-description">
                  </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
        </div>

    </div>

    <div class="panel panel-info">
        <div class="panel-heading ">
            <span class="glyphicon glyphicon-eye-open"></span>
            View References

        </div>


        <div class="panel-body">

            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th class="col-md-1">Referenced By</th>
                    <th>Location Submitted</th>
                    <th class="col-md-1">House No</th>
                    <th class="col-md-2">Form Category</th>
                    <th>Time</th>
                    <th>Reason Given</th>

                    <th>Actions</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(isset($references))

                    @for($i=0; $i<count($references); $i++)
                        @if($references[$i]->official_id == Auth::id())

                            <tr>
                                <td>{{$references[$i]->referenced_by}}</td>
                                <td>{{$formDetails[$i][0]->location}}</td>
                                <td>{{$formDetails[$i][0]->house_no}}</td>
                                <td>{{$formDetails[$i][0]->category}}</td>
                                <td>{{$formDetails[$i][0]->time}}</td>
                                <td>{{$rejectReason->getReason($references[$i]->status_id,$formDetails[$i][0]->reason_id)}}</td>
                                <td>
                                    <a class="btn btn-sm btn-danger" role="button"
                                       href="{{route('decline-form',['status_id'=>$references[$i]->status_id])}}">
                                        <span class="glyphicon glyphicon-ban-circle"></span>
                                        Decline
                                    </a>
                                    <a class="btn btn-sm btn-success" role="button"
                                       href="{{route('confirm-form',['status_id'=>$references[$i]->status_id])}}">
                                        <span class="glyphicon glyphicon-check"></span>
                                        Confirm
                                    </a>
                                </td>

                            </tr>
                        @endif

                    @endfor
                @endif
                </tbody>
            </table>
        </div>
    </div>

@stop
