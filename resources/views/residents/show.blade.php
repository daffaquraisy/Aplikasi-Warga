@extends('layouts.global')
@section('title') Detail penduduk @endsection
@section('content')

<div class="card">
    <div class="col-md-12">
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <b>Nama:</b>
                        {{$resident->nama}}
                    </div>
                    <div class="row">
                        <b>Kepala Keluarga:</b>
                        {{$resident->patriarches->nama}}                
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <b>Nomor Kartu Keluarga:</b>
                        {{$resident->patriarches->nomor_kk}}                    
                    </div>
                    <div class="row">
                        <b>RT:</b>
                        {{$resident->rt}}                    
                    </div>
                </div>
            </div>

            <br><br>

            <b>Nomor Kartu Induk:</b> <br>
            {{$resident->nik}}

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

            <b>Tempat Lahir:</b> <br>
            {{$resident->tempat_lahir}}
            <br> <br>

            <b>Agama:</b> <br>
            {{$resident->agama}}
            <br> <br>

            <b>Pendidikan:</b> <br>
            {{$resident->pendidikan}}
            <br> <br>

            <b>Pekerjaan:</b> <br>
            {{$resident->pekerjaan}}
            <br> <br>


            <a href="{{route('residents.index')}}" class="btn btn-primary">Kembali</a>



        </div>
    </div>
</div>

@endsection