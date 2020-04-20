@extends('layouts.global')
@section('title') Detail penduduk @endsection
@section('content')

<div class="col-md-8">
    <div class="card">
        <div class="card-body">

            <b>Nama:</b> <br />
            {{$resident->nama}}

            <br><br>

            <b>Kepala Keluarga:</b> <br>
            {{$resident->patriarches->nama}}

            <br> <br>

            <b>Nomor Kartu Keluarga:</b> <br>
            {{$resident->patriarches->nomor_kk}}

            <br> <br>

            <b>RT:</b><br>
            {{$resident->rt}}

            <br>
            <br>

            <b>RW:</b><br>
            {{$resident->rw}}

            <br>
            <br>

            <b>No Hp:</b> <br>
            {{$resident->no_telp}}


            <br>
            <br>

            <b>Tanggal Lahir:</b> <br>
            {{$resident->tanggal_lahir}}


            <br>
            <br>

            <b>Status Perkawinan:</b> <br />
            {{$resident->status_perkawinan}}

            <br><br>

            <b>Status Penduduk:</b> <br />
            {{$resident->status_kependudukan}}

            <br><br>

            <a href="{{route('residents.index')}}" class="btn btn-primary">Kembali</a>



        </div>
    </div>
</div>

@endsection