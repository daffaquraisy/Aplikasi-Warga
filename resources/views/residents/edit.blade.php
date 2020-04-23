@extends('layouts.global')
@section('title') Edit Kepala Keluarga @endsection

@section('content')
<div class="col-md-8">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('residents.update', [$resident->id])}}"
        method="POST">
        @csrf

        <input type="hidden" value="PUT" name="_method">

        
        <label for="nama">Nama</label>
        <input value="{{old('nama') ? old('nama') : $resident->nama}}"
            class="form-control {{$errors->first('nama') ? "is-invalid" : ""}}" placeholder="Masukan nama" type="text"
            name="nama" id="nama" />
        <div class="invalid-feedback">
            {{$errors->first('nama')}}
        </div>
        <br>

        <label for="rt">RT</label>
        <input value="{{old('rt') ? old('rt') : $resident->rt}}"
            class="form-control {{$errors->first('rt') ? "is-invalid" : ""}}" placeholder="00" type="text"
            name="rt" id="rt" />
        <div class="invalid-feedback">
            {{$errors->first('rt')}}
        </div>

        <br>

        <label for="rw">RW</label>
        <input value="{{old('rw') ? old('rw') : $resident->rw}}"
            class="form-control {{$errors->first('rw') ? "is-invalid" : ""}}" placeholder="00" type="text"
            name="rw" id="rw" />
        <div class="invalid-feedback">
            {{$errors->first('rw')}}
        </div>

        <br>

        <label for="tanggal_lahir">Tanggal Lahir</label>

        <input value="{{old('tanggal_lahir') ? old('tanggal_lahir') : $resident->tanggal_lahir}}"
        class="form-control {{$errors->first('tanggal_lahir') ? "is-invalid" : ""}}" placeholder="Masukan tanggal lahir" type="date"
        name="tanggal_lahir" id="tanggal_lahir" />

        <div class="invalid-feedback">
            {{$errors->first('tanggal_lahir')}}
        </div>
        
        <br>

        <label for="no_telp">Nomor hp</label>
        <input value="{{old('no_telp') ? old('no_telp') : $resident->no_telp}}"
            class="form-control {{$errors->first('no_telp') ? "is-invalid" : ""}}" placeholder="Masukan nomor hp" type="number"
            name="no_telp" id="no_telp" />
        <div class="invalid-feedback">
            {{$errors->first('no_telp')}}
        </div>

        <br>

        <label for="">Status Perkawinan</label>
        <br>
        

        <select class="form-control" id="status_perkawinan" name="status_perkawinan">
            <option >-- Pilih Status --</option>

            <option value="Menikah" @if($resident->status_perkawinan == 'Menikah') selected @endif>Menikah</option>
            <option value="Belum Menikah"  @if($resident->status_perkawinan == 'Belum Menikah') selected @endif>Belum Menikah</option>

        </select>
        <br>

        <label for="">Status Kependudukan</label>
        <br>

        <select class="form-control" id="status_kependudukan" name="status_kependudukan">
            <option >-- Pilih Status --</option>

            <option value="Menetap" @if($resident->status_kependudukan == 'Menetap') selected @endif>Menetap</option>
            <option value="Pindah"  @if($resident->status_kependudukan == 'Pindah') selected @endif>Pindah</option>
            <option value="Wafat"  @if($resident->status_kependudukan == 'Wafat') selected @endif>Wafat</option>

        </select>
        <br>

        <label for="nomor_kk">Nomor Kartu Keluarga</label>
        <br>
        <select multiple selected="selected" class="form-control" name="patriarch_id" id="nomor_kk">
            @foreach ($patriarches as $id => $nomor_kk)
                @if (old('patriarch_id', $resident->patriarch_id) == $id)
                    <option value="{{$id}}" selected>{{$nomor_kk}}</option>
                @else
                <option value="{{$id}}">{{$nomor_kk}}</option>
                @endif
            @endforeach
        </select>

<br>
<br>
        <input class="btn btn-primary" type="submit" value="Simpan" />
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