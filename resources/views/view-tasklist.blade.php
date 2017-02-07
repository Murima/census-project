@extends('dashboard-official')

@section('title', 'Create Tasklists')
@section('content_header')
    <h1>Task List</h1>
@stop

@section('content')

    <div class="panel panel-info">
        <div class="panel-heading ">
            <span class="glyphicon glyphicon-eye-open"></span>
            View Tasks

            <a type="submit" class="btn btn-success" style="margin-left: 10px;" href="{{ route('assign-task',['id'=>$user->id])}}">

                <i class="fa phpdebugbar-fa-paperclip" style="margin-right: 5px"></i>
                Assign
            </a>
        </div>
        @if(Storage::disk('local')->has($user->firstname.'-'.$user->id.'.jpg'))
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

            <div class="col-md-4" style="float:left;">
                <img src="{{ route('user-image', ['filename'=>$user->firstname.'-'.$user->id.'.jpg']) }}" alt="">

                <form class="form-horizontal" style="float: right;">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="firstname">Name:</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{$user->firstname}}</p>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-1" for="ID">ID:</label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{$user->id}}</p>
                        </div>

                    </div>

                </form>


            </div>
        @endif

        <div class="panel-body">


        <!--show the task list -->
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Task Name</th>
                    <th>Task ID</th>
                    <th>Enumerator ID</th>
                    <th>Task Duration</th>
                    <th>Status</th>
                    <th>Action</th>

                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)

                    <tr>
                        <td>{{$task->task_name}}</td>
                        <td>{{$task->task_id}}</td>
                        <td>{{$task->enumerator_id}}</td>
                        <td>{{$task->task_duration}}</td>
                        <td>{{$task->status}}</td>

                        <td><a href="{{ route('edit-task',['id'=>$task->enumerator_id,'task_id'=>$task->task_id]) }}" class="btn btn-success btn-sm " role="button">
                                <i class="fa phpdebugbar-fa-edit"  style="margin-right: 2px"></i>Edit</a>
                        </td>
                        <td><a href="{{ route('delete-task', ['task_id'=>$task->task_id, 'id'=>$user->id])}}" class="btn btn-danger btn-sm " role="button">
                                <i class="fa phpdebugbar-fa-trash"  style="margin-right: 2px"></i>Delete</a>

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection