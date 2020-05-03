@extends('layouts.global')
@section('title') Edit Information @endsection

@section('content')
<div class="col-md-12">

    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('informations.update', [$information->id])}}"
        method="POST">
        @csrf

        <input type="hidden" value="PUT" name="_method">

        <div class="row">
            @if($information->image)
                <img src="{{asset('storage/'.$information->image)}}" width="120px"/>
            @else
                Tidak ada gambar
            @endif
        </div>
        <br>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-weight-bold" for="title">Judul</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-align-center"></i></div>
                        </div>
                        <input value="{{old('title') ? old('title') : $information->title}}" class="form-control {{$errors->first('title') ? 'is-invalid' : ''}}" placeholder="information@title.com" type="text" name="title" id="title" />
                    </div>
                </div>
                <div class="invalid-feedback">
                    {{$errors->first('title')}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-weight-bold" for="image">Gambar</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-images"></i></div>
                        </div>
                        <input id="image" name="image" type="file" class="form-control">
                    </div>
                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengubah Gambar
                    </small>            
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="font-weight-bold" for="desckripsi">Deskripsi</label>
            <textarea id="desc" class="form-control" name="desc" rows="10" cols="50">{{old('desc') ? old('desc') : $information->desc}}</textarea>
        </div>
        <div class="invalid-feedback">
            {{$errors->first('desc')}}
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        <a href="{{ route('informations.index') }}" class="btn btn-danger"><i class="fas fa-close"></i> Batal</a>

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