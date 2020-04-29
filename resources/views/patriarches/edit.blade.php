@extends('layouts.global')
@section('title') Edit Kepala Keluarga @endsection

@section('content')
<div class="col-md-12">

    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('patriarches.update', [$patriarche->id])}}"
        method="POST">
        @csrf

        <h4><i class="fas fa-edit"></i> | Mengedit {{ $patriarche->nama }}</h4>
        <hr>

        <input type="hidden" value="PUT" name="_method">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-weight-bold" for="nama">Nama</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input value="{{old('nama') ? old('nama') : $patriarche->nama}}" class="form-control {{$errors->first('nama') ? 'is-invalid': ''}}"
                        placeholder="Masukan nama" type="text" name="nama" id="nama">
                        </div>
                </div>
                <div class="invalid-feedback">
                    {{$errors->first('nama')}}
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="nomor_kk">Nomor Kartu Keluarga</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-id-card"></i></div>
                            </div>
                            <input value="{{old('nomor_kk') ? old('nomor_kk') : $patriarche->nomor_kk}}" class="form-control {{$errors->first('nomor_kk') ? 'is-invalid': ''}}"
                            placeholder="Masukan nomor kartu keluarga" type="number" name="nomor_kk" id="nomor_kk" />
                        </div>
                </div>
                <div class="invalid-feedback">
                    {{$errors->first('nomor_kk')}}
                </div>
                
                <div class="form-group">
                    <label class="font-weight-bold" for="nik">Nomor Induk Kependudukan</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-id-card-alt"></i></div>
                            </div>
                            <input value="{{old('nik') ? old('nik') : $patriarche->nik}}" class="form-control {{$errors->first('nik') ? 'is-invalid': ''}}"
                            placeholder="Masukan nomor kartu kependudukan" type="number" name="nik" id="nik" />
                        </div>
                </div>
                <div class="invalid-feedback">
                    {{$errors->first('nik')}}
                </div>
                
                <div class="form-group">
                    <label class="font-weight-bold" for="tempat_lahir">Tempat Lahir</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-city"></i></div>
                            </div>
                            <input value="{{old('tempat_lahir') ? old('tempat_lahir') : $patriarche->tempat_lahir}}" class="form-control {{$errors->first('tempat_lahir') ? 'is-invalid': ''}}"
                            placeholder="Masukan tempat lahir" type="text" name="tempat_lahir" id="tempat_lahir" />
                        </div>
                </div>
                <div class="invalid-feedback">
                    {{$errors->first('tempat_lahir')}}
                </div>
                
                <div class="form-group">
                    <label class="font-weight-bold" for="tanggal_lahir">Tanggal Lahir</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                            </div>
                            <input value="{{old('tanggal_lahir') ? old('tanggal_lahir') : $patriarche->tanggal_lahir}}" class="form-control {{$errors->first('tanggal_lahir') ? 'is-invalid': ''}}"
                                placeholder="Masukan tanggal lahir" type="date" name="tanggal_lahir" id="tanggal_lahir" />        
                        </div>
                </div>
                <div class="invalid-feedback">
                    {{$errors->first('tanggal_lahir')}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-weight-bold" for="no_hp">Nomor Hp</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-mobile-alt"></i></div>
                            </div>
                            <input value="{{old('no_hp') ? old('no_hp') : $patriarche->no_hp}}" class="form-control {{$errors->first('no_hp') ? 'is-invalid': ''}}"
                                placeholder="Masukan nomor hp" type="number" name="no_hp" id="no_hp" />
                        </div>
                </div>
                <div class="invalid-feedback">
                    {{$errors->first('no_hp')}}
                </div>
                
                <div class="form-group">
                    <label class="font-weight-bold" for="">Status</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-exclamation-circle"></i></div>
                            </div>
                            <select class="form-control" id="status" name="status[]">
                                <option >-- Pilih Status --</option>
                                <option {{$patriarche->status == in_array('Hidup',json_decode($patriarche->status)) ? "selected" : ""}} class="{$errors->first('status') ? 'is-invalid' : '' }}"  type="checkbox" name="status[]" id="Hidup" value="Hidup">Hidup</option>
                                <option {{$patriarche->status == in_array('Wafat',json_decode($patriarche->status)) ? "selected" : ""}} class="{$errors->first('status') ? 'is-invalid' : '' }}"  type="checkbox" name="status[]" id="Wafat" value="Wafat">Wafat</option>
                                <option {{$patriarche->status == in_array('Pindah',json_decode($patriarche->status)) ? "selected" : ""}} class="{$errors->first('status') ? 'is-invalid' : '' }}"  type="checkbox" name="status[]" id="Pindah" value="Pindah">Pindah</option>
                            </select>
                        </div>
                </div>
                <div class="invalid-feedback">
                    {{$errors->first('status')}}
                </div>        

                <div class="form-group">
                    <label class="font-weight-bold" for="pekerjaan">Pekerjaan</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
                            </div>
                            <input value="{{old('pekerjaan') ? old('pekerjaan') : $patriarche->pekerjaan}}" class="form-control {{$errors->first('pekerjaan') ? 'is-invalid': ''}}"
                                placeholder="Masukan pekerjaan" type="text" name="pekerjaan" id="pekerjaan" />
                        </div>
                </div>
                <div class="invalid-feedback">
                    {{$errors->first('pekerjaan')}}
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="pendidikan">Pendidikan</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-university"></i></div>
                            </div>
                            <input value="{{old('pendidikan') ? old('pendidikan') : $patriarche->pendidikan}}" class="form-control {{$errors->first('pendidikan') ? 'is-invalid': ''}}"
                                placeholder="Masukan pendidikan" type="text" name="pendidikan" id="pendidikan" />
                        </div>
                </div>
                <div class="invalid-feedback">
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
                                <option value="Islam" @if($patriarche->agama == 'Islam') selected @endif>Islam</option>
                                <option value="Kristen Katolik"  @if($patriarche->agama == 'Kristen Katolik') selected @endif>Kristen Katolik</option>
                                <option value="Kristen Protestan" @if($patriarche->agama == 'Kristen Protestan') selected @endif>Kristen Protestan</option>
                                <option value="Buddha"  @if($patriarche->agama == 'Buddha') selected @endif>Buddha</option>
                                <option value="Hindu"  @if($patriarche->agama == 'Hindu') selected @endif>Hindu</option>
                                <option value="Konghucu"  @if($patriarche->agama == 'Konghucu') selected @endif>Konghucu</option>
                            </select>
                        </div>
                </div>
                <div class="invalid-feedback">
                    {{$errors->first('agama')}}
                </div>    
            </div>
        </div>
        
        <a href="{{ route('patriarches.index') }}" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
    </form>
        
@endsection