@extends('layouts.global')
@section('title') Detail patriarch @endsection
@section('content')

<div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-6">
                    <b>Nama:</b> <br />
                    {{$patriarche->nama}}

                    <br><br>

                    <b>Nomor Kartu Keluarga:</b><br>
                    {{$patriarche->nomor_kk}}

                    <br>
                    <br>

                    <b>Nomor Induk Kependudukan:</b><br>
                    {{$patriarche->nik}}

                    <br>
                    <br>

                    <b>No Hp:</b> <br>
                    {{$patriarche->no_hp}}


                    <br>
                    <br>

                    <b>Tempat, Tanggal Lahir:</b> <br>
                    {{$patriarche->tempat_lahir}}, {{$patriarche->tanggal_lahir}}
                </div>
                <div class="col-md-6">
                    <b>Status:</b> <br>
                    {{$patriarche->status}}
                    <br> <br>

                    <b>Agama:</b> <br>
                    {{$patriarche->agama}}
                    <br> <br>

                    <b>Pendidikan:</b> <br>
                    {{$patriarche->pendidikan}}
                    <br> <br>

                    <b>Pekerjaan:</b> <br>
                    {{$patriarche->pekerjaan}}
                    <br> <br>
                    
                    <b>RT, RW:</b> <br>
                    {{$patriarche->rt}}, {{$patriarche->rw}}
                </div>
            </div>
            <a href="{{route('patriarches.index')}}" class="btn btn-danger mb-3"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
        </div>
    </div>
</div>

@endsection