@extends('layouts.main')
@section('content')


<div class="container" style=" overflow-y: scroll;">
    <div class="card-header">
        <a href="/home" style="color:black">Dashboard Admin</a>
        <a href="/logout" class="float-right" onclick="return confirm('Are you sure to logout ?')">Logout</a>
    </div>
    <hr>
    <br>
    <div class="row">
        @foreach($lists as $list)
        <div class="col-md-4">
            <div class="card" style="background-color: #fef9f9;">
                <div class="card-body">
                    <a href="/result/admin/history/{{$list->id}}">{{ strtoupper($list->username) }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
