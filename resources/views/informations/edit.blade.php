@extends('layouts.global')
@section('title') Edit Information @endsection

@section('content')
<div class="col-md-8">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('informations.update', [$information->id])}}"
        method="POST">
        @csrf

        <input type="hidden" value="PUT" name="_method">

        
        <label for="title">Title</label>
        <input value="{{old('title') ? old('title') : $information->title}}"
            class="form-control {{$errors->first('title') ? "is-invalid" : ""}}" placeholder="information@title.com" type="text"
            name="title" id="title" />
        <div class="invalid-feedback">
            {{$errors->first('title')}}
        </div>
        <br>

        <label for="image">Gambar</label>
        <br>
        @if($information->image)
        <img src="{{asset('storage/'.$information->image)}}" width="120px" />
        <br>
        @else
        Tidak ada gambar
        @endif
        <br>
        <input id="image" name="image" type="file" class="form-control">
        <small class="text-muted">Kosongkan jika tidak ingin mengubah
            Gambar</small>

        <hr class="my-4">

        <label for="desckripsi">Deskripsi</label>


        <textarea id="desc" class="form-control" name="desc" rows="10" cols="50">{{old('desc') ? old('desc') : $information->desc}}</textarea>
        
        <div class="invalid-feedback">
            {{$errors->first('desc')}}
        </div>

        <br>



        <input class="btn btn-primary" type="submit" value="Simpan" />
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