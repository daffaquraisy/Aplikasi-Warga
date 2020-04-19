@extends('layouts.global')
@section('title') Detail patriarch @endsection
@section('content')

<div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <b>Nama:</b> <br />
            {{$patriarche->nama}}

            <br><br>

            <b>Nomor Kartu Keluarga:</b><br>
            {{$patriarche->nomor_kk}}

            <br>
            <br>

            <b>No Hp:</b> <br>
            {{$patriarche->no_hp}}


            <br>
            <br>

            <b>Tanggal Lahir:</b> <br>
            {{$patriarche->tanggal_lahir}}


            <br>
            <br>

            <b>Status:</b> <br>
            @foreach (json_decode($patriarche->status) as $s)
            &middot; {{$s}} <br>
            @endforeach
        </div>
    </div>
</div>

@endsection