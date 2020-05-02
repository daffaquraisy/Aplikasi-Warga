@extends("layouts.global")

@section("title") Daftar Kepala Keluarga @endsection
@section("content")

<h3 class="p-0"><i class="fas fa-user"></i> | Daftar Kepala Keluarga</h3>
<hr>

<div class="row mb-3">
    <div class="col-md-12 text-right">
        <a href="{{route('patriarches.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Kepala Keluarga</a>
        <a href="{{route('export.excel.patriarches')}}" class="btn btn-primary"><i class="fas fa-file-excel-o"></i> Excel</a>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <form action="{{route('patriarches.index')}}">
            <div class="input-group mb-3">
                <input value="{{Request::get('keyword')}}" name="keyword" class="form-control col-md-10" type="text"
                    placeholder="Cari nama kepala keluarga..." />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Filter</button>
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
                        <td widtd="45%">Nama</td>
                        <td>Nomor Induk Kependudukan</td>
                        <td>Nomor Kartu Keluarga</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patriarches as $patriarch)
                    <tr>
                        <td class="text-center">{{$nomor++}}</td>
                        <td>{{$patriarch->nama}}</td>
                        <td>{{$patriarch->nik}}</td>
                        <td>{{$patriarch->nomor_kk}}</td>
                        <td class="text-center">
                            <a class="btn btn-info text-white btn-sm" href="{{route('patriarches.edit', [$patriarch->id])}}"><i class="fas fa-edit"></i></a>
                            <a href="{{route('patriarches.show', [$patriarch->id])}}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                            <form onsubmit="return confirm('Apa anda yakin untuk menghapus data ini?')" class="d-inline"
                                action="{{route('patriarches.destroy', [$patriarch->id ])}}" method="POST">
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
                            {{$patriarches->appends(Request::all())->links()}}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
