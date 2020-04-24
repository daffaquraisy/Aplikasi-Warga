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

        <label for="nik">Nomor Induk Kependudukan</label>
        <input value="{{old('nik') ? old('nik') : $patriarche->nik}}"
            class="form-control {{$errors->first('nik') ? "is-invalid" : ""}}" placeholder="Masukan nomor induk kependudukan" type="text"
            name="nik" id="nik" />
        <div class="invalid-feedback">
            {{$errors->first('nik')}}
        </div>

        <br>

        <label for="tempat_lahir">Tempat Lahir</label>

        <input value="{{old('tempat_lahir') ? old('tempat_lahir') : $patriarche->tempat_lahir}}"
        class="form-control {{$errors->first('tempat_lahir') ? "is-invalid" : ""}}" placeholder="Masukan tempat lahir" type="text"
        name="tempat_lahir" id="tempat_lahir" />

        <div class="invalid-feedback">
            {{$errors->first('tempat_lahir')}}
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

        <label for="pekerjaan">Pekerjaan</label>

        <input value="{{old('pekerjaan') ? old('pekerjaan') : $patriarche->pekerjaan}}"
        class="form-control {{$errors->first('pekerjaan') ? "is-invalid" : ""}}" placeholder="Masukan pekerjaan" type="text"
        name="pekerjaan" id="pekerjaan" />

        <div class="invalid-feedback">
            {{$errors->first('pekerjaan')}}
        </div>
        
        <br>

        <label for="pendidikan">Pendidikan</label>

        <input value="{{old('pendidikan') ? old('pendidikan') : $patriarche->pendidikan}}"
        class="form-control {{$errors->first('pendidikan') ? "is-invalid" : ""}}" placeholder="Masukan pendidikan" type="text"
        name="pendidikan" id="pendidikan" />

        <div class="invalid-feedback">
            {{$errors->first('pendidikan')}}
        </div>
        
        <br>

        <label for="">Agama</label>
        <br>
        

        <select class="form-control" id="agama" name="agama">
            <option >-- Pilih Status --</option>

            <option value="Islam" @if($patriarche->agama == 'Islam') selected @endif>Islam</option>
            <option value="Kristen Katolik"  @if($patriarche->agama == 'Kristen Katolik') selected @endif>Kristen Katolik</option>
            <option value="Kristen Protestan" @if($patriarche->agama == 'Kristen Protestan') selected @endif>Kristen Protestan</option>
            <option value="Buddha"  @if($patriarche->agama == 'Buddha') selected @endif>Buddha</option>
            <option value="Hindu"  @if($patriarche->agama == 'Hindu') selected @endif>Hindu</option>
            <option value="Konghucu"  @if($patriarche->agama == 'Konghucu') selected @endif>Konghucu</option>

        </select>
        <br>



        <input class="btn btn-primary" type="submit" value="Simpan" />
    </form>
</div>

@endsection