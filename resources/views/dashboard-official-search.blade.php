@extends('adminlte::page')

@section('title', 'Create Tasks')

@section('content_header')
    <h1>Task List</h1>
@stop

@section('content')

    <form action="{{  route('official/search-user') }}" method="POST" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" name="search-user"  placeholder="Search users">

            <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>

            <div class="col-sm-10">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="open" checked>
                        Task is open
                    </label>

                    <label class="form-check-label" style="margin-left: 10px">
                        <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="open">
                        Task is closed
                    </label>
                </div>

            </div>
        </div>
    </form>


    <div class="container">

        @if(isset($details))
            <p> The Search results for your query <b> {{ $query }} </b> are :</p>
            <h4> Enumerator Details</h4>
            <div class="panel panel-info">
                <div class="panel-heading ">
                    <span class="glyphicon glyphicon-edit"></span>
                    Results
                </div>

                <div class="panel-body">
                    <table class="table table-striped success">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>ID</th>
                            <th>Ward</th>
                            <th>Tasks Open</th>
                            <th>Action</th>

                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($details as $user)

                            <tr>
                                <td>{{$user->lastname}}</td>
                                <td>{{$user->firstname}}</td>
                                <td>{{$user->id}}</td>
                                <td>{{$user->ward}}</td>
                                <td>{{$status[$user->id]}}</td>

                                <td><a href="{{ route('assign-task', ['id'=>$user->id])}}" class="btn btn-success btn-sm " role="button">
                                        <i class="fa fa-paperclip"  style="margin-right: 2px"></i>Assign</a>
                                </td>
                                <td><a href="{{ route('view-tasks', ['id'=>$user->id])}}" class="btn btn-info btn-sm " role="button">
                                        <i class="fa fa-eye"  style="margin-right: 2px"></i>View</a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @elseif(isset($message))
                        <p> {{$message}} </p>
                </div>
            </div>

        @else
            <h4> Enumerator Details</h4>
            <div class="panel panel-info" style="margin-top: 30px;">
                <div class="panel-heading ">
                    <span class="glyphicon glyphicon-edit"></span>
                    Results
                </div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>ID</th>
                            <th>Ward</th>
                            <th>Tasks Open</th>
                            <th>Action</th>

                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)

                            <tr>
                                <td>{{$user->lastname}}</td>
                                <td>{{$user->firstname}}</td>
                                <td>{{$user->id}}</td>
                                <td>{{$user->ward}}</td>
                                <td>{{$status[$user->id]}}</td>

                                <td><a href="{{ route('assign-task', ['id'=>$user->id])}}" class="btn btn-success btn-sm " role="button">
                                        <i class="fa fa-paperclip"  style="margin-right: 2px"></i>Assign</a>
                                </td>
                                <td><a href="{{ route('view-tasks', ['id'=>$user->id])}}" class="btn btn-info btn-sm " role="button">
                                        <i class="fa fa-eye"  style="margin-right: 2px"></i>View</a>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>

@stop