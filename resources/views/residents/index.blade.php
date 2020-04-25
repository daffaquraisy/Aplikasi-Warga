@extends("layouts.global")

@section("title") Daftar Penduduk @endsection
@section("content")

    <h3 class="p-0">Data Penduduk</h3>
    <hr>
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{session('success')}}
        </div>
    @endif

<div class="row mb-3">
    <div class="col-md-12 mb-2 text-right">
        <a href="{{route('residents.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah penduduk</a>
        <a class="btn btn-primary" href="{{route('residents.trash')}}"><i class="fas fa-trash-alt"></i> Data Sampah</a>
        <a href="{{route('export.excel.residents')}}" class="btn btn-primary"><i class="fas fa-file-excel-o"></i> Import Excel</a>
   </div>
</div>


<div class="row">
    <div class="col-md-5">
        <form action="{{route('residents.index')}}">
            <div class="input-group mb-3">
                <input value="{{Request::get('keyword')}}" name="keyword" class="form-control col-md-10" type="text"
                    placeholder="Cari berdasarkan nomor kartu keluarga..." />
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
                    <td width="32%">Nama</td>
                    <td>Tanggal Lahir</td>
                    <td>Status Kependudukan</td>
                    <td>Nomor KK</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($residents as $resident)
                <tr>
                    <td class="text-center">{{$nomor++}}</td>
                    <td>{{$resident->nama}}</td>
                    <td>{{$resident->tanggal_lahir}}</td>
                    <td>{{$resident->status_kependudukan}}</td>
                    <td>{{$resident->nomor_kk}}</td>
                    <td class="text-center">
                        <a class="btn btn-info text-white btn-sm" href="{{route('residents.edit', [$resident->id])}}"><i class="fas fa-edit"></i></a>
                        <a href="{{route('residents.show', [$resident->id])}}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                        <form onsubmit="return confirm('Apa anda yakin untuk menghapus data ini?')" class="d-inline"
                            action="{{route('residents.destroy', [$resident->id ])}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
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
@endsection