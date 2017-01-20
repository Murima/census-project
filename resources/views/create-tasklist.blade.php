@extends('dashboard-official')

@section('title', 'Create Tasklists')
@section('content_header')
    <h1>Task List</h1>
@stop

@section('content')

    <div class="panel panel-info">
        <div class="panel-heading ">
            <span class="glyphicon glyphicon-edit"></span>
            Assign Task
        </div>

        <div class="panel-body">

            @if(Storage::disk('local')->has($user->firstname.'-'.$user->id.'.jpg'))
                <div class="col-md-4" style="float:right;">
                    <img src="{{ route('user-image', ['filename'=>$user->firstname.'-'.$user->id.'.jpg']) }}" alt="">

                    <form class="form-horizontal">
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

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="ward">Ward:</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{$user->ward}}</p>
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="ward">Tasks done:</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">1</p>
                            </div>

                        </div>
                    </form>

                </div>
            @endif

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
                <form action="{{route('assign-task',[$user->id])}}" method="post">
                    <div class="form-group row">
                        <label for="taskID" class="col-sm-2 col-form-label">Task ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="task_id" name="task_id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="enumeratorID" class="col-sm-2 col-form-label">Enumerator ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="enumerator_id" name="enumerator_id" value="{{ $user->id }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Location" class="col-sm-2 col-form-label">Location</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="location" name="location" placeholder="Estate">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Duration" class="col-sm-2 col-form-label">Duration</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="duration" name="duration" placeholder="Hrs">
                        </div>
                    </div>

                    <fieldset class="form-group row">
                        <legend class="col-form-legend col-sm-2">Status</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="open" checked>
                                    Task is open
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="closed">
                                    Task is closed
                                </label>
                            </div>
                            <div class="form-check disabled">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="disabled" disabled>
                                    Pending..
                                </label>
                            </div>
                        </div>
                    </fieldset>


                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa phpdebugbar-fa-download" style="margin-right: 5px"></i>Submit
                            </button>
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">

                </form>
            </div>
        </div>
    </div>
@stop