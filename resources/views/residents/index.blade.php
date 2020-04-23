@extends("layouts.global")

@section("title") Daftar Penduduk @endsection
@section("content")

   <h1 class="p-0">Daftar Penduduk</h1>

   @if(session('success'))
    <div class="alert alert-success mt-3">
        {{session('success')}}
    </div>
    @endif

<div class="row mb-3">
    <div class="col-md-12 mb-2 text-right">
        <a href="{{route('residents.create')}}" class="btn btn-primary">Tambah penduduk</a>
        <a class="btn btn-primary" href="{{route('residents.trash')}}">Trash</a>

   </div>

</div>



<div class="row">
    <div class="col-md-6">
        <form action="{{route('residents.index')}}">
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

<div class="row mb-3">
    <div class="col-md-12 text-left">
        <a href="{{route('export.pdf.residents')}}" class="btn btn-primary">PDF</a>
        <a href="{{route('export.excel.residents')}}" class="btn btn-primary">Excel</a>
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
                    <th><b>Tanggal Lahir</b></th>
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
                    <td>{{$resident->tanggal_lahir}}</td>
                    <td>{{$resident->status_kependudukan}}</td>
                    <td>{{$resident->nomor_kk}}</td>


                    <td>
                        <a class="btn btn-info text-white btn-sm" href="{{route('residents.edit', [$resident->id])}}">Edit</a>
        
                        <a href="{{route('residents.show', [$resident->id])}}" class="btn btn-primary btn-sm">Detail</a>
                        
                        <form onsubmit="return confirm('Apa anda yakin untuk menghapus data ini?')" class="d-inline"
                            action="{{route('residents.destroy', [$resident->id ])}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
        
                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
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