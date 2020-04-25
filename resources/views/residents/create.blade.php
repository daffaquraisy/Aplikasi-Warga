@extends("layouts.global")

@section("title") Create Penduduk @endsection

@section("content")

<div class="col-md-8 mt-2">

    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif

    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('residents.store')}}" method="POST">

        @csrf

        <label for="nama">Nama</label>

        <input value="{{old('nama')}}" class="form-control {{$errors->first('nama') ? "is-invalid": ""}}"
            placeholder="Masukan nama" type="text" name="nama" id="nama" />

        <div class="invalid-feedback">
            {{$errors->first('nama')}}
        </div>

        <br>

        <label for="nik">Nomor Induk Kependudukan</label>

        <input value="{{old('nik')}}" class="form-control {{$errors->first('nik') ? "is-invalid": ""}}"
            placeholder="Masukan nomor kartu kependudukan" type="number" name="nik" id="nik" />

        <div class="invalid-feedback">
            {{$errors->first('nik')}}
        </div>
        
        <br>

        <label for="rt">RT</label>

        <input value="{{old('rt')}}" class="form-control {{$errors->first('rt') ? "is-invalid": ""}}"
            placeholder="00" type="number" name="rt" id="rt" />

        <div class="invalid-feedback">
            {{$errors->first('rt')}}
        </div>

        <br>

        <label for="rt">Status Perkawinan</label>


        <select class="form-control" id="status_perkawinan" name="status_perkawinan">
            <option>-- Silahkan pilih satu --</option>
            <option class="{$errors->first('status_perkawinan') ? 'is-invalid' : '' }}"  type="checkbox" name="status_perkawinan" id="Menikah" value="Menikah">Menikah</option>
            <option class="{$errors->first('status_perkawinan') ? 'is-invalid' : '' }}"  type="checkbox" name="status_perkawinan" id="Belum Menikah" value="Belum Menikah">Belum Menikah</option>
        </select>

        <div class="invalid-feedback">
            {{$errors->first('status_perkawinan')}}
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

        <label for="no_telp">Nomor Hp</label>

        <input value="{{old('no_telp')}}" class="form-control {{$errors->first('no_telp') ? "is-invalid": ""}}"
            placeholder="Masukan nomor hp" type="number" name="no_telp" id="no_telp" />

        <div class="invalid-feedback">
            {{$errors->first('no_telp')}}
        </div>
        
        <br>

        <label for="nomor_kk">Nomor Kartu Keluarga</label><br>
        <select name="patriarch_id" multiple id="nomor_kk" class="form-control">
        </select>
        <br> <br>

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

@section('footer-scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    $('#nomor_kk').select2({
        maximumSelectionLength: 1,
        ajax: {
            url: '/ajax/residents/search',
            processResults: function (data) {
                return {
                    results: data.map(function (item) {
                        return {
                            id: item.id,
                            text: item.nomor_kk,
                        }
                    })
                }
            }
        }
    });
</script>
@endsection