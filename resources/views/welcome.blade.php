@extends('layouts.master')



@section('title')
    Welcome

@endsection

@section('content')
    <h2> Sign Up </h2>

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
    <div class="row">

        <div class="col-md-6">

            <form action="{{ route('signup') }} " method="post">

                <div class="form-group" {{ $errors->has('firstname') ? 'has-error':'' }}>
                    <label for="firstname"> First Name</label>
                    <input class="form-control" name="firstname" type="text" id="firstname">

                </div>

                <div class="form-group" {{ $errors->has('lastname') ? 'has-error':'' }}>
                    <label for="lastname"> Last Name</label>
                    <input class="form-control" name="lastname" type="text" id="lastname">

                </div>

                <div class="form-group" {{ $errors->has('ID') ? 'has-error':'' }}>
                    <label for="ID"> ID</label>
                    <input class="form-control" name="ID" type="text" id="ID">

                </div>

                <div class="form-group" {{ $errors->has('email') ? 'has-error':'' }}>
                    <label for="email"> Email</label>
                    <input class="form-control" name="email"  type="text" placeholder="email"  id="email"
                    aria-describedby="basic-addon1">

                </div>

                <div class="form-group">
                    <label for="Password"> Password</label>
                    <input class="form-control" name="password" type="password" id="password">

                </div>

                <div class="form-group" {{ $errors->has('county') ? 'has-error':'' }}>
                    <label for="county"> County</label>
                    <input class="form-control" name="county" type="text" id="county">

                </div>

                <button type="submit" class="btn-primary"> Submit </button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">

            </form>
        </div>
    </div>

@endsection


