@extends('layouts.main')
@section('content')

@include('layouts.navbar')
<div class="gameArea">
    <h3 style="color:navy">
        SCORE:<span id="score">0</span>
    </h3>
    <div id="form-player" class="form-player">
        <h5 style="text-align:center;padding-bottom: 27px;">GUESS THE WORD:
            <span id="scramble-word">(KATA)</span>
        </h5>
        <center>
            {{ Form::open(array('url' => 'player/create', 'id' => 'form-playground', 'autocomplete'=>'off')) }}
            {{ Form::text('guess_word', '', ['required']) }}

            {{ Form::submit('GUESS', ['id' => 'guess', 'class' => 'btn btn-stickearn', 'style' => 'margin:29px']) }}

            {{ Form::close() }}
        </center>
    </div>
    <div class="form-guess d-none">
        <h4 style="text-align:center;padding-bottom: 27px;">
            <span id="res_message"></span>
        </h4>
        <center>
            <button class="btn btn-stickearn" id="next">NEXT</a>
        </center>
    </div>
</div>
@endsection
