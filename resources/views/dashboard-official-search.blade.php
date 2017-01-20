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
        </div>
    </form>

    <div class="container">
        @if(isset($details))
            <p> The Search results for your query <b> {{ $query }} </b> are :</p>
            <h2> Enumerator Details</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>ID</th>
                    <th>Ward</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($details as $user)
                    <tr>
                        <td>{{$user->lastname}}</td>
                        <td>{{$user->firstname}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->id}}</td>
                        <td>{{$user->ward}}</td>
                        <td><a href="{{ route('assign-task', ['id'=>$user->id])}}" class="btn btn-success btn-sm " role="button">
                                <i class="fa fa-paperclip"  style="margin-right: 2px"></i>Assign</a>
                        </td>
                        <td><a href="{{ route('assign-task', ['id'=>$user->id])}}" class="btn btn-info btn-sm " role="button">
                                <i class="fa fa-pencil"  style="margin-right: 2px"></i>Edit</a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @elseif(isset($message))
            <p> {{$message}} </p>
        @endif


    </div>
@stop