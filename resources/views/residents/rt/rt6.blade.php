@extends("layouts.global")

@section("title") Daftar Penduduk RT 6 @endsection
@section("content")

<h1 class="p-0">Daftar Penduduk RT 6</h1>
<hr>
   
<div class="row">
    <div class="col-md-6">
        <form action="{{route('residents.rt1')}}">
            <div class="input-group mb-3">
                <input value="{{Request::get('keyword')}}" name="keyword" class="form-control col-md-10" type="text"
                    placeholder="Cari nomor kartu keluarga..." />
                <div class="input-group-append">
                    <input type="submit" value="Filter" class="btn btn-primary btn-sm">
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
                <tr>
                    <th><b>#</b></th>
                    <th><b>Nama</b></th>
                    <th><b>Tempat, Tanggal Lahir</b></th>
                    <th><b>Status Kependudukan</b></th>
                    <th><b>Nomor KK</b></th>
                    <th><b>Aksi</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach($residents as $resident)
                <tr>
                    <td class="text-center">{{$nomor++}}</td>
                    <td>{{$resident->nama}}</td>
                    <td>{{$resident->tempat_lahir}}, {{$resident->tanggal_lahir}}</td>
                    <td>{{$resident->status_kependudukan}}</td>
                    <td>{{$resident->nomor_kk}}</td>
                    <td class="text-center">                         
                        <a href="{{route('residents.show', [$resident->id])}}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
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
@endsection