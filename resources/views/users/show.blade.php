@extends('layouts.global')
@section('title') Detail user @endsection
@section('content')

<div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <b>Nama:</b> <br />
            {{$user->name}}

            <br><br>

            <b>Email:</b><br>
            {{$user->email}}

            <br>
            <br>

            <b>No Hp:</b> <br>
            {{$user->phone}}


            <br>
            <br>

            <b>Status</b> <br>
            {{$user->status}}


            <br>
            <br>

            <b>Roles:</b> <br>
            @foreach (json_decode($user->roles) as $role)
            &middot; {{$role}} <br>
            @endforeach
        </div>
    </div>
</div>

@endsection