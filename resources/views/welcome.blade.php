@extends('layouts.master')



@section('title')
    Welcome

@endsection

@section('content')
<h2> Sign In </h2>
    <div class="row">

        <div class="col-md-6">

            <form action="{{ route('signup') }} " method="post">

                <div class="form-group">
                    <label for="firstname"> First Name</label>
                    <input class="form-control" name="firstname" type="text" id="firstname">

                </div>

                <div class="form-group">
                    <label for="lastname"> Last Name</label>
                    <input class="form-control" name="lastname" type="text" id="lastname">

                </div>

                <div class="form-group">
                    <label for="ID"> ID</label>
                    <input class="form-control" name="ID" type="text" id="ID">

                </div>

                <div class="form-group">
                    <label for="email"> Email</label>
                    <input class="form-control" name="email" type="text" id="email">

                </div>

                <div class="form-group">
                    <label for="county"> County</label>
                    <input class="form-control" name="county" type="text" id="county">

                </div>

                <button type="submit" class="btn-primary"> Submit </button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">

            </form>
        </div>
    </div>

@endsection


