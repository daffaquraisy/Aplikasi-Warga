@extends('layouts.global')
@section('title') Trashed Residents @endsection
@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="row mb-3">
            <div class="col-md-12 text-right">
                <a href="{{route('residents.index')}}" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                <a href="{{route('residents.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah penduduk</a>
           </div>
        </div>

        <div class="row">
            <div class="col-md-5">
                <form action="{{route('residents.trash')}}">
                    <div class="input-group mb-3">
                        <input value="{{Request::get('keyword')}}" name="keyword" class="form-control col-md-10" type="text"
                            placeholder="Cari berdasarkan nama..." />
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-search"></i> Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive mt-3">
                <table id="basic-datatables" class="table table-bordered">
                    <thead class="bg-primary text-white text-center">
                        <tr class="font-weight-bold">
                            <td>#</td>
                            <td>NIK</td>
                            <td width="30%">Nama</td>
                            <td>Tempat, Tanggal Lahir</td>
                            <td>Status Kependudukan</td>
                            <td>Nomor KK</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>        
                        @foreach($residents as $resident)
                        <tr>
                            <td class="text-center">{{$nomor++}}</td>
                            <td>{{$resident->nik}}</td>
                            <td>{{$resident->nama}}</td>
                            <td>{{$resident->tempat_lahir}}, {{$resident->tanggal_lahir}}</td>
                            <td>{{$resident->status_kependudukan}}</td>
                            <td>{{$resident->patriarches->nomor_kk}}</td>
        
                            <td>
                                <form method="POST" action="{{route('residents.restore', [$resident->id])}}" class="d-inline">
                                    @csrf
                                    <input type="submit" value="Restore" class="btn btn-success btn-sm" />

                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan=10>
                                {{$residents->appends(Request::all())->links()}}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection