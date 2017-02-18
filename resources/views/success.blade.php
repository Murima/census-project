@extends('layouts.master')
<div class="alert alert-success">

    <strong>Success!</strong>
    @if(isset($numberofEvents))
        {{ $numberofEvents }}
    @endif
</div>
