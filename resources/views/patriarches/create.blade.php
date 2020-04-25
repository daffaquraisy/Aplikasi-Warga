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

        <label for="nik">Nomor Induk Kependudukan</label>

        <input value="{{old('nik')}}" class="form-control {{$errors->first('nik') ? "is-invalid": ""}}"
            placeholder="Masukan nomor kartu kependudukan" type="number" name="nik" id="nik" />

        <div class="invalid-feedback">
            {{$errors->first('nik')}}
        </div>
        
        <br>

        <label for="tempat_lahir">Tempat Lahir</label>

        <input value="{{old('tempat_lahir')}}" class="form-control {{$errors->first('tempat_lahir') ? "is-invalid": ""}}"
            placeholder="Masukan tempat lahir" type="text" name="tempat_lahir" id="tempat_lahir" />

        <div class="invalid-feedback">
            {{$errors->first('tempat_lahir')}}
        </div>
        
        <br>

        <label for="tanggal_lahir">Tanggal Lahir</label>

        <input value="{{old('tanggal_lahir')}}" class="form-control {{$errors->first('tanggal_lahir') ? "is-invalid": ""}}"
            placeholder="Masukan tanggal lahir" type="date" name="tanggal_lahir" id="tanggal_lahir" />

        <div class="invalid-feedback">
            {{$errors->first('tanggal_lahir')}}
        </div>
        
        <br>

        <label for="no_hp">Nomor Hp</label>

        <input value="{{old('no_hp')}}" class="form-control {{$errors->first('no_hp') ? "is-invalid": ""}}"
            placeholder="Masukan nomor hp" type="number" name="no_hp" id="no_hp" />

        <div class="invalid-feedback">
            {{$errors->first('no_hp')}}
        </div>
        
        <br>

        <label for="">Status</label>
        <br>

        <select class="form-control" id="status" name="status[]">
            <option >-- Pilih Status --</option>
            <option class="{$errors->first('status') ? 'is-invalid' : '' }}"  type="checkbox" name="status[]" id="Hidup" value="Hidup">Hidup</option>
            <option class="{$errors->first('status') ? 'is-invalid' : '' }}"  type="checkbox" name="status[]" id="Wafat" value="Wafat">Wafat</option>
            <option class="{$errors->first('status') ? 'is-invalid' : '' }}"  type="checkbox" name="status[]" id="Pindah" value="Pindah">Pindah</option>
        </select>


        <div class="invalid-feedback">
            {{$errors->first('status')}}
        </div>
        
        <br>

        <label for="pekerjaan">Pekerjaan</label>

        <input value="{{old('pekerjaan')}}" class="form-control {{$errors->first('pekerjaan') ? "is-invalid": ""}}"
            placeholder="Masukan pekerjaan" type="text" name="pekerjaan" id="pekerjaan" />

        <div class="invalid-feedback">
            {{$errors->first('pekerjaan')}}
        </div>
        
        <br>

        <label for="pendidikan">Pendidikan</label>

        <input value="{{old('pendidikan')}}" class="form-control {{$errors->first('pendidikan') ? "is-invalid": ""}}"
            placeholder="Masukan pendidikan" type="text" name="pendidikan" id="pendidikan" />

        <div class="invalid-feedback">
            {{$errors->first('pendidikan')}}
        </div>
        
        <br>

        <label for="agama">Agama</label>

        <select class="form-control" id="agama" name="agama">
            <option>-- Silahkan pilih satu --</option>
            <option class="{$errors->first('agama') ? 'is-invalid' : '' }}"  type="checkbox" name="agama" id="Islam" value="Islam">Islam</option>
            <option class="{$errors->first('agama') ? 'is-invalid' : '' }}"  type="checkbox" name="agama" id="Kristen Katolik" value="Kristen Katolik">Kristen Katolik</option>
            <option class="{$errors->first('agama') ? 'is-invalid' : '' }}"  type="checkbox" name="agama" id="Kristen Protestan" value="Kristen Protestan">Kristen Protestan</option>
            <option class="{$errors->first('agama') ? 'is-invalid' : '' }}"  type="checkbox" name="agama" id="Buddha" value="Buddha">Buddha</option>
            <option class="{$errors->first('agama') ? 'is-invalid' : '' }}"  type="checkbox" name="agama" id="Hindu" value="Hindu">Hindu</option>
            <option class="{$errors->first('agama') ? 'is-invalid' : '' }}"  type="checkbox" name="agama" id="Konghucu" value="Konghucu">Konghucu</option>
        </select>

        <div class="invalid-feedback">
            {{$errors->first('agama')}}
        </div>

        <br>

        

        <input class="btn btn-primary" type="submit" value="Save">

    </form>

</div>
@endsection