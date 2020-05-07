@extends('layouts.global')
@section('title') Detail penduduk @endsection
@section('content')

<div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <div class="row ml-1">
                <h5><i class="fas fa-users"></i> Detail Penduduk</h5>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-md-6">
                    <b>Nama:</b><br>
                    {{$resident->nama}}

                    <br>
                    <br>

                    <b>Kepala Keluarga:</b><br>
                    {{$resident->patriarches->nama}}

                    <br>
                    <br>

                    <b>Nomor Kartu Keluarga:</b><br>
                    {{$resident->patriarches->nomor_kk}}

                    <br>
                    <br>

                    <b>Nomor Induk Kependudukan:</b><br>
                    {{$resident->nik}}

                    <br>
                    <br>

                    <b>RT / RW:</b><br>
                    {{$resident->rt}} / {{$resident->rw}}

                    <br>
                    <br>

                    <b>Nomor Handphone:</b><br>
                    {{$resident->no_telp}}

                    <br>
                    <br>

                    <a href="{{route('residents.index')}}" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                </div>
                <div class="col-md-6">
                    <b>Tempat, Tanggal Lahir:</b><br>
                    {{$resident->tempat_lahir}}, {{$resident->tanggal_lahir}}

                    <br>
                    <br>

                    <b>Status Perkawinan:</b><br>
                    {{$resident->status_perkawinan}}

                    <br>
                    <br>

                    <b>Agama:</b><br>
                    {{$resident->agama}}

                    <br>
                    <br>

                    <b>Pendidikan:</b><br>
                    {{$resident->pendidikan}}

                    <br>
                    <br>

                    <b>Pekerjaan:</b><br>
                    {{$resident->pekerjaan}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection