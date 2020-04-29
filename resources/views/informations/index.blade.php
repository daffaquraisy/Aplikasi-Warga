@extends("layouts.global")

@section("title") Daftar Berita @endsection
@section("content")

<h3 class="p-0"><i class="fas fa-info-circle"></i> | Daftar Informasi</h3>
<hr>

<div class="row mb-3">
    <div class="col-md-12 text-right">
        <a href="{{route('informations.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah berita</a>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <form action="{{route('informations.index')}}">
            <div class="input-group mb-3">
                <input value="{{Request::get('keyword')}}" name="keyword" class="form-control col-md-10" type="text"
                    placeholder="Cari judul berita..." />
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
                    <tr class="font-weight-bold">
                        <td>#</td>
                        <td>Judul</td>
                        <td>Deskripsi</td>
                        <td>Tanggal</td>
                        <td>Gambar</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($informations as $information)
                    <tr>
                        <td class="text-center">{{$nomor++}}</td>
                        <td>{{$information->title}}</td>
                        <td>{!! $information->desc !!}</td>
                        <td>{{$information->date}}</td>
                        <td class="text-center">
                            @if($information->image)
                            <img src="{{asset('storage/'.$information->image)}}" width="70px" />
                            @else
                            N/A
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-info text-white btn-sm" href="{{route('informations.edit', [$information->id])}}"><i class="fas fa-edit"></i></a>
                            <form onsubmit="return confirm('Apa anda yakin untuk menghapus data ini?')" class="d-inline"
                                action="{{route('informations.destroy', [$information->id ])}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan=10>
                            {{$informations->appends(Request::all())->links()}}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
