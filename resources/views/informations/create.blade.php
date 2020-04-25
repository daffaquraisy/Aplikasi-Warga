@extends("layouts.global")

@section("title") Create Information @endsection

@section("content")

<div class="col-md-8 mt-2">

    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif

    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('informations.store')}}" method="POST">

        @csrf

        <label for="title">Judul</label>

        <input value="{{old('title')}}" class="form-control {{$errors->first('title') ? "is-invalid": ""}}"
            placeholder="Masukan judul berita" type="title" name="title" id="title" />

        <div class="invalid-feedback">
            {{$errors->first('title')}}
        </div>

        <br>

        <label for="image">Gambar</label>
        <br>
            <input id="image" name="image" type="file" class="form-control {{$errors->first('image') ? "is-invalid" : ""}}">

            <div class="invalid-feedback">
                {{$errors->first('image')}}
            </div>

        <hr class="my-3">

        <label for="desckripsi">Deskripsi</label>


        <textarea id="desc" class="form-control" name="desc" rows="10" cols="50"></textarea>
        
        <div class="invalid-feedback">
            {{$errors->first('desc')}}
        </div>
        
        <br>

        

        <input class="btn btn-primary" type="submit" value="Save">

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