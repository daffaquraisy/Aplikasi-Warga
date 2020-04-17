@extends("layouts.global")

@section("title") Daftar Kepala Keluarga @endsection
@section("content")

<h1 class="p-0">Daftar Kepala Keluarga</h1>

@if(session('success'))
<div class="alert alert-success mt-3">
    {{session('success')}}
</div>
@endif

<div class="row mb-3">
    <div class="col-md-12 text-right">
        <a href="{{route('patriarches.create')}}" class="btn btn-primary">Tambah Kepala Keluarga</a>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <form action="{{route('patriarches.index')}}">
            <div class="input-group mb-3">
                <input value="{{Request::get('keyword')}}" name="keyword" class="form-control col-md-10" type="text"
                    placeholder="Cari nama kepala keluarga..." />
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
                <thead>
                    <tr>
                        <th><b>#</b></th>
                        <th><b>Nama</b></th>
                        <th><b>Nomor Kartu Keluarga</b></th>
                        <th><b>Action</b></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($patriarches as $patriarch)
                    <tr>
                        <td>{{$nomor++}}</td>
                        <td>{{$patriarch->nama}}</td>
                        <td>{{$patriarch->nomor_kk}}</td>


                        <td>
                            <a class="btn btn-info text-white btn-sm"
                                href="{{route('patriarches.edit', [$patriarch->id])}}">Edit</a>


                            <form onsubmit="return confirm('Delete this patriarch permanently?')" class="d-inline"
                                action="{{route('patriarches.destroy', [$patriarch->id ])}}" method="POST">
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
                            {{$patriarches->appends(Request::all())->links()}}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
