@extends('layouts.global')
@section('title') Trashed Residents @endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif

        <div class="row mb-3">
            <div class="col-md-12 text-right">
                <a href="{{route('residents.create')}}" class="btn btn-primary">Tambah penduduk</a>
           </div>
        </div>
        
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive mt-3">
                <table id="basic-datatables" class="table table-bordered">
                    <thead>
                        <tr>
                            <th><b>#</b></th>
                            <th><b>Nama</b></th>
                            <th><b>RW</b></th>
                            <th><b>RT</b></th>
                            <th><b>Status Kependudukan</b></th>
                            <th><b>Nomor KK</b></th>
                            <th><b>Action</b></th>
                        </tr>
                    </thead>
                    <tbody>
                
                        @foreach($residents as $resident)
                        <tr>
                            <td>{{$nomor++}}</td>
                            <td>{{$resident->nama}}</td>
                            <td>{{$resident->rw}}</td>
                            <td>{{$resident->rt}}</td>
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