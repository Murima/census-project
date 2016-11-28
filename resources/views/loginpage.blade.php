@extends('layouts.master');

@section('content')
<h2> Sign In</h2>
@if (count ($errors)>0)

    <div class="alert alert-danger">
<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>

    @endforeach
</ul>

    </div>
    @endif

    <div class="row">

        <div class="col-md-6">

            <form action="{{ route('signin') }} " method="post">

                <div class="form-group">
                    <label for="email"> Email </label>
                    <input class="form-control" name="email" type="text" id="email">

                </div>

                <div class="form-group">
                    <label for="password"> Password</label>
                    <input class="form-control" name="password" type="password" id="password">

                </div>

                <button type="submit" class="btn-primary"> Login </button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>

    @endsection
