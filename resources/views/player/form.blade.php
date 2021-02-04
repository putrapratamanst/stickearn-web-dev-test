@extends('layouts.main')

@section('content')



<center>
    <h2>Login/Register Game Player</h2>
</center>
<hr>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        {{ $error }}
        @endforeach
    </ul>

</div>
@endif

<div id="form-player">
    <center>
    {{ Form::open(array('url' => 'player/create', 'autocomplete'=>'off')) }}
        {{ Form::text('username', '', ['required',  'placeholder' => 'Please Input Username', 'minlength' => 5, 'class' => 'form-input']) }}
        {{ Form::password('password', ['required',  'placeholder' => 'Please Input Password', 'minlength' => 5, 'class' => 'form-input']) }}

        {{ Form::submit('Submit', ['class' => 'btn btn-stickearn', 'style' => 'margin:10px']) }}
        {{ Form::close() }}
    </center>

</div>

@endsection
