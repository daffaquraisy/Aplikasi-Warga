@extends("layouts.global")

@section("title") Daftar Penduduk RT 2 @endsection
@section("content")

   <h1 class="p-0">Daftar Penduduk RT 2</h1>

   
<div class="row">
    <div class="col-md-6">
        <form action="{{route('residents.rt2')}}">
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
            <thead>
                <tr>
                    <th><b>#</b></th>
                    <th><b>Nama</b></th>
                    <th><b>RW</b></th>
                    <th><b>RT</b></th>
                    <th><b>Tanggal Lahir</b></th>
                    <th><b>Status Kependudukan</b></th>
                    <th><b>Nomor KK</b></th>
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