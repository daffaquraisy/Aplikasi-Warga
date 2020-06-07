@extends("layouts.global")

@section("title") Create Penduduk @endsection

@section("content")

<div class="col-md-12">

    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('residents.store')}}" method="POST">

        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-weight-bold" for="nama">Nama</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input value="{{old('nama')}}" class="form-control {{$errors->first('nama') ? 'is-invalid': ''}}" placeholder="Masukan nama" type="text" name="nama" id="nama"/>
                        </div>
                </div>      
                <div class="form-control-feedback text-danger">
                    {{$errors->first('nama')}}
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="nik">Nomor Induk Kependudukan</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-id-card-alt"></i></div>
                            </div>
                            <input value="{{old('nik')}}" class="form-control {{$errors->first('nik') ? 'is-invalid': ''}}"
                            placeholder="Masukan nomor kartu kependudukan" type="number" name="nik" id="nik" />
                        </div>
                </div>
                <div class="form-control-feedback text-danger">
                    {{$errors->first('nik')}}
                </div>
                
                <div class="form-group">
                    <label class="font-weight-bold" for="rt">RT</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
                            </div>
                            <input value="{{old('rt')}}" class="form-control {{$errors->first('rt') ? 'is-invalid': ''}}"
                            placeholder="00" type="number" name="rt" id="rt" />
                        </div>
                </div>
                <div class="form-control-feedback text-danger">
                    {{$errors->first('rt')}}
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="rt">Status Perkawinan</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-exclamation-circle"></i></div>
                            </div>
                            <select class="form-control" id="status_perkawinan" name="status_perkawinan">
                                <option>-- Silahkan pilih satu --</option>
                                <option class="{$errors->first('status_perkawinan') ? 'is-invalid' : '' }}"  type="checkbox" name="status_perkawinan" id="Menikah" value="Menikah">Menikah</option>
                                <option class="{$errors->first('status_perkawinan') ? 'is-invalid' : '' }}"  type="checkbox" name="status_perkawinan" id="Belum Menikah" value="Belum Menikah">Belum Menikah</option>
                            </select>
                        </div>
                </div>
                <div class="form-control-feedback text-danger">
                    {{$errors->first('status_perkawinan')}}
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="tempat_lahir">Tempat Lahir</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-city"></i></div>
                            </div>
                            <input value="{{old('tempat_lahir')}}" class="form-control {{$errors->first('tempat_lahir') ? 'is-invalid': ''}}"
                            placeholder="Masukan tempat lahir" type="text" name="tempat_lahir" id="tempat_lahir" />
                        </div>
                </div>
                <div class="form-control-feedback text-danger">
                    {{$errors->first('tempat_lahir')}}
                </div>    
                <div class="form-group">
                    <label class="font-weight-bold" for="tanggal_lahir">Tanggal Lahir</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                            </div>
                            <input value="{{old('tanggal_lahir')}}" class="form-control {{$errors->first('tanggal_lahir') ? 'is-invalid': ''}}"
                            placeholder="Masukan tanggal lahir" type="date" name="tanggal_lahir" id="tanggal_lahir" />
                        </div>
                </div>
                <div class="form-control-feedback text-danger">
                    {{$errors->first('tanggal_lahir')}}
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-weight-bold" for="no_telp">Nomor Hp</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-mobile-alt"></i></div>
                            </div>
                            <input value="{{old('no_telp')}}" class="form-control {{$errors->first('no_telp') ? 'is-invalid': ''}}"
                            placeholder="Masukan nomor hp" type="number" name="no_telp" id="no_telp" />
                        </div>
                </div>
                <div class="form-control-feedback text-danger">
                    {{$errors->first('no_telp')}}
                </div>
                
                <div class="form-group">
                    <label class="font-weight-bold" for="nomor_kk">Nomor Kartu Keluarga</label>
                    <select name="patriarch_id" multiple id="nomor_kk" class="form-control">
                    </select>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="pekerjaan">Pekerjaan</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
                            </div>
                            <input value="{{old('pekerjaan')}}" class="form-control {{$errors->first('pekerjaan') ? 'is-invalid': ''}}"
                            placeholder="Masukan pekerjaan" type="text" name="pekerjaan" id="pekerjaan" />
                        </div>
                </div>
                <div class="form-control-feedback text-danger">
                    {{$errors->first('pekerjaan')}}
                </div>
                
                <div class="form-group">
                    <label class="font-weight-bold" for="pendidikan">Pendidikan</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-university"></i></div>
                            </div>
                            <input value="{{old('pendidikan')}}" class="form-control {{$errors->first('pendidikan') ? 'is-invalid': ''}}"
                            placeholder="Masukan pendidikan" type="text" name="pendidikan" id="pendidikan" />
                        </div>
                </div>
                <div class="form-control-feedback text-danger">
                    {{$errors->first('pendidikan')}}
                </div>
                
                <div class="form-group">
                    <label class="font-weight-bold" for="agama">Agama</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-heart"></i></div>
                            </div>
                            <select class="form-control" id="agama" name="agama">
                                <option>-- Silahkan pilih satu --</option>
                                <option class="{$errors->first('agama') ? 'is-invalid' : '' }}"  type="checkbox" name="agama" id="Islam" value="Islam">Islam</option>
                                <option class="{$errors->first('agama') ? 'is-invalid' : '' }}"  type="checkbox" name="agama" id="Kristen Katolik" value="Kristen Katolik">Kristen Katolik</option>
                                <option class="{$errors->first('agama') ? 'is-invalid' : '' }}"  type="checkbox" name="agama" id="Kristen Protestan" value="Kristen Protestan">Kristen Protestan</option>
                                <option class="{$errors->first('agama') ? 'is-invalid' : '' }}"  type="checkbox" name="agama" id="Buddha" value="Buddha">Buddha</option>
                                <option class="{$errors->first('agama') ? 'is-invalid' : '' }}"  type="checkbox" name="agama" id="Hindu" value="Hindu">Hindu</option>
                                <option class="{$errors->first('agama') ? 'is-invalid' : '' }}"  type="checkbox" name="agama" id="Konghucu" value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                </div>
                <div class="form-control-feedback text-danger">
                    {{$errors->first('agama')}}
                </div>    

                <div class="form-group mt-5">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    <a href="{{route('residents.index')}}" class="btn btn-danger"><i class="fas fa-close"></i> Batal</a>
                </div>
            </div>
        </div>
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