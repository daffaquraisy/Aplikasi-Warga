@extends('layouts.global')
@section('title') Detail user @endsection
@section('content')

<div class="card">
    <div class="col-md-9">
        <div class="card-body">
            <div class="row mb-1">
                <div class="col-md-3 font-weight-bold">
                    Nama
                </div>
                <div class="col-md-6">: {{$user->name}}</div>
            </div>

            <div class="row mb-1">
                <div class="col-md-3 font-weight-bold">
                    Email
                </div>
                <div class="col-md-6">: {{$user->email}}</div>
            </div>

            <div class="row mb-1">
                <div class="col-md-3 font-weight-bold">
                    Nomor Handphone
                </div>
                <div class="col-md-6">: {{$user->phone}}</div>
            </div>

            <div class="row mb-1">
                <div class="col-md-3 font-weight-bold">
                    Status
                </div>
                <div class="col-md-6">: {{$user->status}}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">
                    Roles
                </div>
                <div class="col-md-6">: 
                    @foreach (json_decode($user->roles) as $role)
                        {{$role}} 
                    @endforeach
                </div>
            </div>

            <a href="{{route('users.index')}}" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
        </div>
    </div>
</div>

@endsection