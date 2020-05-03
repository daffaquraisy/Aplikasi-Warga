@extends('layouts.global')
@section('title') Edit Kepala Keluarga @endsection

@section('content')
<div class="col-md-12">

    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('residents.update', [$resident->id])}}"
        method="POST">
        @csrf

        <input type="hidden" value="PUT" name="_method">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-weight-bold" for="nama">Nama</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input value="{{old('nama') ? old('nama') : $resident->nama}}" class="form-control {{$errors->first('nama') ? 'is-invalid': ''}}" placeholder="Masukan nama" type="text" name="nama" id="nama"/>
                        </div>
                </div>      
                <div class="invalid-feedback">
                    {{$errors->first('nama')}}
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="nik">Nomor Induk Kependudukan</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-id-card-alt"></i></div>
                            </div>
                            <input value="{{old('nik') ? old('nik') : $resident->nik}}" class="form-control {{$errors->first('nik') ? 'is-invalid': ''}}"
                            placeholder="Masukan nomor kartu kependudukan" type="number" name="nik" id="nik" />
                        </div>
                </div>
                <div class="invalid-feedback">
                    {{$errors->first('nik')}}
                </div>
                
                <div class="form-group">
                    <label class="font-weight-bold" for="rt">RT</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
                            </div>
                            <input value="{{old('rt') ? old('rt') : $resident->rt}}" class="form-control {{$errors->first('rt') ? 'is-invalid': ''}}"
                            placeholder="00" type="number" name="rt" id="rt" />
                        </div>
                </div>
                <div class="invalid-feedback">
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
                                <option class="{$errors->first('status_perkawinan') ? 'is-invalid' : '' }}"  type="checkbox" name="status_perkawinan" id="Menikah" value="Menikah" @if($resident->status_perkawinan == 'Menikah') selected @endif>Menikah</option>
                                <option class="{$errors->first('status_perkawinan') ? 'is-invalid' : '' }}"  type="checkbox" name="status_perkawinan" id="Belum Menikah" value="Belum Menikah" @if($resident->status_perkawinan == 'Belum Menikah') selected @endif>Belum Menikah</option>
                            </select>
                        </div>
                </div>
                <div class="invalid-feedback">
                    {{$errors->first('status_perkawinan')}}
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="tempat_lahir">Tempat Lahir</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-city"></i></div>
                            </div>
                            <input value="{{old('tempat_lahir') ? old('tempat_lahir') : $resident->tempat_lahir}}" class="form-control {{$errors->first('tempat_lahir') ? 'is-invalid': ''}}"
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
                            <input value="{{old('tanggal_lahir') ? old('tanggal_lahir') : $resident->tanggal_lahir}}" class="form-control {{$errors->first('tanggal_lahir') ? 'is-invalid': ''}}"
                            placeholder="Masukan tanggal lahir" type="date" name="tanggal_lahir" id="tanggal_lahir" />
                        </div>
                </div>
                <div class="invalid-feedback">
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
                            <input value="{{old('no_telp') ? old('no_telp') : $resident->no_telp}}" class="form-control {{$errors->first('no_telp') ? 'is-invalid': ''}}"
                            placeholder="Masukan nomor hp" type="number" name="no_telp" id="no_telp" />
                        </div>
                </div>
                <div class="invalid-feedback">
                    {{$errors->first('no_telp')}}
                </div>
                
                <div class="form-group">
                    <label class="font-weight-bold" for="nomor_kk">Nomor Kartu Keluarga</label>
                    <select name="patriarch_id" multiple id="nomor_kk" class="form-control">
                        @foreach ($patriarches  as $id => $nomor_kk)
                            @if (old('patriarch_id', $resident->patriarch_id) == $id)
                                <option value="{{$id}}" selected>{{$nomor_kk}}</option>
                            @else
                                <option value="{{$id}}">{{$nomor_kk}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="pekerjaan">Pekerjaan</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
                            </div>
                            <input value="{{old('pekerjaan') ? old('pekerjaan') : $resident->pekerjaan}}" class="form-control {{$errors->first('pekerjaan') ? 'is-invalid': ''}}"
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
                            <input value="{{old('pendidikan') ? old('pendidikan') : $resident->pendidikan}}" class="form-control {{$errors->first('pendidikan') ? 'is-invalid': ''}}"
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
                                <option value="Islam" @if($resident->agama == 'Islam') selected @endif>Islam</option>
                                <option value="Kristen Katolik"  @if($resident->agama == 'Kristen Katolik') selected @endif>Kristen Katolik</option>
                                <option value="Kristen Protestan" @if($resident->agama == 'Kristen Protestan') selected @endif>Kristen Protestan</option>
                                <option value="Buddha"  @if($resident->agama == 'Buddha') selected @endif>Buddha</option>
                                <option value="Hindu"  @if($resident->agama == 'Hindu') selected @endif>Hindu</option>
                                <option value="Konghucu"  @if($resident->agama == 'Konghucu') selected @endif>Konghucu</option>
                            </select>
                        </div>
                </div>
                <div class="invalid-feedback">
                    {{$errors->first('agama')}}
                </div>
                <br>
                <div class="form-group mt-2">
                    <button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    <a href="{{ route('residents.index') }}" class="btn btn-danger"><i class="fas fa-close"></i> Batal</a>
                </div>
            </div>
        </div>  

    </form>
</div>

@endsection

@section('footer-scripts')
<link href="{{asset('css/select2.min.css')}}" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    $('#nomor_kk').select2({
        ajax: {
            url: '/ajax/residents/search',
            processResults: function (data) {
                return {
                    results: data.map(function (item) {
                        return {
                            id: item.id,
                            text: item.nomor_kk
                        }
                    })
                }
            }
        }
    });
    </script>
@endsection