@extends("layouts.global")

@section("title") Create Kepala Keluarga @endsection

@section("content")

<div class="col-md-12">

    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('patriarches.store')}}" method="POST">

        <h4><i class="fas fa-plus-circle"></i> | Tambah Kepala Keluarga</h4>
        <hr>
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-weight-bold" for="nama">Nama</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input value="{{old('nama')}}" class="form-control {{$errors->first('nama') ? 'is-invalid': ''}}"
                        placeholder="Masukan nama" type="text" name="nama" id="nama">
                        </div>
                </div>
                <div class="form-control-feedback text-danger">
                    {{$errors->first('nama')}}
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="nomor_kk">Nomor Kartu Keluarga</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-id-card"></i></div>
                            </div>
                            <input value="{{old('nomor_kk')}}" class="form-control {{$errors->first('nomor_kk') ? 'is-invalid': ''}}"
                            placeholder="Masukan nomor kartu keluarga" type="number" name="nomor_kk" id="nomor_kk" />
                        </div>
                </div>
                <div class="form-control-feedback text-danger">
                    {{$errors->first('nomor_kk')}}
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

                <div class="form-group">
                    <label class="font-weight-bold" for="rt">RT</label>
                    <input value="{{old('rt')}}" class="form-control {{$errors->first('rt') ? 'is-invalid': ''}}"
                        placeholder="00" type="number" name="rt" id="rt" />
                </div>
                <div class="form-control-feedback text-danger">
                    {{$errors->first('rt')}}
                </div>

                <div class="form-group mt-5">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    <a href="{{route('residents.index')}}" class="btn btn-danger"><i class="fas fa-close"></i> Batal</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-weight-bold" for="no_hp">Nomor Hp</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-mobile-alt"></i></div>
                            </div>
                            <input value="{{old('no_hp')}}" class="form-control {{$errors->first('no_hp') ? 'is-invalid': ''}}"
                                placeholder="Masukan nomor hp" type="number" name="no_hp" id="no_hp" />
                        </div>
                </div>
                <div class="form-control-feedback text-danger">
                    {{$errors->first('no_hp')}}
                </div>
                
                <div class="form-group">
                    <label class="font-weight-bold" for="">Status</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-exclamation-circle"></i></div>
                            </div>
                            <select class="form-control" id="status" name="status">
                                <option>-- Silahkan pilih satu --</option>
                                <option class="{$errors->first('status') ? 'is-invalid' : '' }}"  type="checkbox" name="status" id="Hidup" value="Hidup">Hidup</option>
                                <option class="{$errors->first('status') ? 'is-invalid' : '' }}"  type="checkbox" name="status" id="Wafat" value="Wafat">Wafat</option>
                                <option class="{$errors->first('status') ? 'is-invalid' : '' }}"  type="checkbox" name="status" id="Pindah" value="Pindah">Pindah</option>
                            </select>
                        </div>
                </div>
                <div class="form-control-feedback text-danger">
                    {{$errors->first('status')}}
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
                <div class="form-group">
                    <label class="font-weight-bold" for="agama">Status Bantuan</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-heart"></i></div>
                            </div>
                            <select class="form-control" id="status_bantuan" name="status_bantuan">
                                <option>-- Silahkan pilih satu --</option>
                                <option class="{$errors->first('status_bantuan') ? 'is-invalid' : '' }}"  type="checkbox" name="status_bantuan" id="Menerima" value="Menerima">Menerima</option>
                                <option class="{$errors->first('status_bantuan') ? 'is-invalid' : '' }}"  type="checkbox" name="status_bantuan" id="Belum Menerima" value="Belum Menerima">Belum Menerima</option>
                            </select>
                        </div>
                </div>  
                
            </div>
        </div>
        
    </form>

</div>
@endsection