@extends('layouts.global')
@section('title') Detail penduduk @endsection
@section('content')

<div class="card">
    <div class="col-md-10">
        <div class="card-body">
            <div class="row mb-1">
                <div class="col-md-4 font-weight-bold">
                    Nama
                </div>
                <div class="col-md-6">
                    : {{$resident->nama}}
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-md-4 font-weight-bold">
                    Kepala Keluarga
                </div>
                <div class="col-md-6">
                    : {{$resident->patriarches->nama}}
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-md-4 font-weight-bold">
                    Nomor Kartu Keluarga
                </div>
                <div class="col-md-6">
                    : {{$resident->patriarches->nomor_kk}}
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-md-4 font-weight-bold">
                    Nomor Induk Kependudukan
                </div>
                <div class="col-md-6">
                    : {{$resident->nik}}
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-md-4 font-weight-bold">
                    RT / RW
                </div>
                <div class="col-md-6">
                    : {{$resident->rt}} / {{$resident->rw}}
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-md-4 font-weight-bold">
                    Nomor Handphone
                </div>
                <div class="col-md-6">
                    : {{$resident->no_telp}}
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-md-4 font-weight-bold">
                    Tempat, Tanggal lahir
                </div>
                <div class="col-md-6">
                    : {{$resident->tempat_lahir}}, {{$resident->tanggal_lahir}}
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-md-4 font-weight-bold">
                    Status Perkawinan
                </div>
                <div class="col-md-6">
                    : {{$resident->status_perkawinan}}
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-md-4 font-weight-bold">
                    Agama
                </div>
                <div class="col-md-6">
                    : {{$resident->agama}}
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-md-4 font-weight-bold">
                    Pendidikan
                </div>
                <div class="col-md-6">
                    : {{$resident->pendidikan}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 font-weight-bold">
                    Pekerjaan
                </div>
                <div class="col-md-6">
                    : {{$resident->pekerjaan}}
                </div>
            </div>
            
            <a href="{{route('residents.index')}}" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
        </div>
    </div>
</div>

@endsection