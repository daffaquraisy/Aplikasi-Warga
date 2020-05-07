@extends('layouts.global')
@section('title') Detail user @endsection
@section('content')

<div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <div class="row ml-1">
                <h5><i class="fas fa-user"></i> Detail Kepala Keluarga</h5>
            </div>
            <hr>
            <div class="row mb-3">
                <div class="col-md-12">
                    <b>Nama:</b><br>
                    {{$user->name}}

                    <br>
                    <br>

                    <b>Email:</b><br>
                    {{$user->email}}

                    <br>
                    <br>

                    <b>Nomor Handphone:</b><br>
                    {{$user->phone}}

                    <br>
                    <br>

                    <b>Status</b><br>
                    {{$user->status}}

                    <br>
                    <br>

                    <b>Roles</b><br>
                    @foreach (json_decode($user->roles) as $role)
                        {{$role}} 
                    @endforeach
                </div>
            </div>
            <a href="{{route('users.index')}}" class="btn btn-danger mb-3"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
        </div>
    </div>
</div>

@endsection