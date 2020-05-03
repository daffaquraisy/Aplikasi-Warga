@extends("layouts.global")

@section("title") Create Information @endsection

@section("content")

<div class="col-md-12">

    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('informations.store')}}" method="POST">

        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-weight-bold" for="title">Judul</label>
                    <input value="{{old('title')}}" class="form-control {{$errors->first('title') ? 'is-invalid' : ''}}" placeholder="Masukan judul berita" type="title" name="title" id="title" />
                </div>
                <div class="invalid-feedback">
                    {{$errors->first('title')}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-weight-bold" for="image">Gambar</label>
                    <input id="image" name="image" type="file" class="form-control {{$errors->first('image') ? 'is-invalid' : ''}}">
                </div>
                <div class="invalid-feedback">
                    {{$errors->first('image')}}
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="font-weight-bold" for="desckripsi">Deskripsi</label>
            <textarea id="desc" class="form-control" name="desc" rows="10" cols="50"></textarea>
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