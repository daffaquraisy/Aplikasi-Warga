@extends('layouts.global')
@section('title') Edit Kepala Keluarga @endsection

@section('content')
<div class="col-md-8">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('patriarches.update', [$patriarche->id])}}"
        method="POST">
        @csrf

        <input type="hidden" value="PUT" name="_method">

        
        <label for="nama">Nama</label>
        <input value="{{old('nama') ? old('nama') : $patriarche->nama}}"
            class="form-control {{$errors->first('nama') ? "is-invalid" : ""}}" placeholder="Masukan nama" type="text"
            name="nama" id="nama" />
        <div class="invalid-feedback">
            {{$errors->first('nama')}}
        </div>
        <br>

        <label for="nomor_kk">Nomor Kartu Keluarga</label>
        <input value="{{old('nomor_kk') ? old('nomor_kk') : $patriarche->nomor_kk}}"
            class="form-control {{$errors->first('nomor_kk') ? "is-invalid" : ""}}" placeholder="Masukan nomor kartu keluarga" type="text"
            name="nomor_kk" id="nomor_kk" />
        <div class="invalid-feedback">
            {{$errors->first('nomor_kk')}}
        </div>

        <br>



        <input class="btn btn-primary" type="submit" value="Simpan" />
    </form>
</div>

<script src="{{asset('ckeditor/ckeditor.js')}}"></script>

<script>
    var desc = document.getElementById("desc");
      CKEDITOR.replace(desc,{
      language:'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
  </script>
@endsection