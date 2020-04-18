@extends("layouts.global")

@section("title") Create Kepala Keluarga @endsection

@section("content")

<div class="col-md-8 mt-2">

    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif

    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('patriarches.store')}}" method="POST">

        @csrf

        <label for="nama">Nama</label>

        <input value="{{old('nama')}}" class="form-control {{$errors->first('nama') ? "is-invalid": ""}}"
            placeholder="Masukan nama" type="text" name="nama" id="nama" />

        <div class="invalid-feedback">
            {{$errors->first('nama')}}
        </div>

        <br>

        <label for="nomor_kk">Nomor Kartu Keluarga</label>

        <input value="{{old('nomor_kk')}}" class="form-control {{$errors->first('nomor_kk') ? "is-invalid": ""}}"
            placeholder="Masukan nomor kartu keluarga" type="number" name="nomor_kk" id="nomor_kk" />

        <div class="invalid-feedback">
            {{$errors->first('nomor_kk')}}
        </div>
        
        <br>

        <label for="tanggal_lahir">Tanggal Lahir</label>

        <input value="{{old('tanggal_lahir')}}" class="form-control {{$errors->first('tanggal_lahir') ? "is-invalid": ""}}"
            placeholder="Masukan tanggal lahir" type="date" name="tanggal_lahir" id="tanggal_lahir" />

        <div class="invalid-feedback">
            {{$errors->first('tanggal_lahir')}}
        </div>
        
        <br>

        

        <input class="btn btn-primary" type="submit" value="Save">

    </form>

</div>
@endsection