@extends('layouts.main')
@section('content')
<!-- 
<div class="preloader">
    <div class="loading">
        <img src="{{ asset('assets/images/logo.gif') }}">
    </div>
</div> -->

<h3 style="text-align: center;">Stickearn Web Developer Test </h3>
<h5 style="text-align: center;">(Word Scrambler)</h5>
<p style="text-align: center;">
    <img class="logo" src="{{ asset('assets/images/logo.jpg') }}" width="350" height="350">
    <span style=" font-family: 'Nunito Sans' ;font-size: 22px;">  <a href="/player/form" class="btn btn-dark blink">Press to Play</a> </span>  
</p>
<div class="dashboard-admin">
    <a href="/home">
        Dashboard Admin
    </a>
</div>

@endsection
