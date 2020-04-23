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

        <label for="tanggal_lahir">Tanggal Lahir</label>

        <input value="{{old('tanggal_lahir') ? old('tanggal_lahir') : $patriarche->tanggal_lahir}}"
        class="form-control {{$errors->first('tanggal_lahir') ? "is-invalid" : ""}}" placeholder="Masukan tanggal lahir" type="date"
        name="tanggal_lahir" id="tanggal_lahir" />

        <div class="invalid-feedback">
            {{$errors->first('tanggal_lahir')}}
        </div>
        
        <br>

        <label for="no_hp">Nomor hp</label>
        <input value="{{old('no_hp') ? old('no_hp') : $patriarche->no_hp}}"
            class="form-control {{$errors->first('no_hp') ? "is-invalid" : ""}}" placeholder="Masukan nomor hp" type="text"
            name="no_hp" id="no_hp" />
        <div class="invalid-feedback">
            {{$errors->first('no_hp')}}
        </div>

        <br>

        <label for="">Status</label>
        <br>
        

        <select class="form-control" id="status" name="status[]">
            <option >-- Pilih Status --</option>

            <option {{$patriarche->status == in_array('Hidup',json_decode($patriarche->status)) ? "selected" : ""}} class="{$errors->first('status') ? 'is-invalid' : '' }}"  type="checkbox" name="status[]" id="Hidup" value="Hidup">Hidup</option>

            <option {{$patriarche->status == in_array('Wafat',json_decode($patriarche->status)) ? "selected" : ""}} class="{$errors->first('status') ? 'is-invalid' : '' }}"  type="checkbox" name="status[]" id="Wafat" value="Wafat">Wafat</option>

            <option {{$patriarche->status == in_array('Pindah',json_decode($patriarche->status)) ? "selected" : ""}} class="{$errors->first('status') ? 'is-invalid' : '' }}"  type="checkbox" name="status[]" id="Pindah" value="Pindah">Pindah</option>
        </select>
        <br>



        <input class="btn btn-primary" type="submit" value="Simpan" />
    </form>
</div>

@endsection