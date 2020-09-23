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
                <div class="form-control-feedback text-danger">
                    {{$errors->first('title')}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-weight-bold" for="image">Gambar</label>
                    <input id="image" name="image" type="file" class="form-control {{$errors->first('image') ? 'is-invalid' : ''}}">
                </div>
                <div class="form-control-feedback text-danger">
                    {{$errors->first('image')}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="font-weight-bold">Lokasi</label>
                    <input value="{{old('lokasi')}}" class="form-control {{$errors->first('lokasi') ? 'is-invalid' : ''}}" placeholder="Masukan lokasi" type="text" name="lokasi" id="searchmap" autofocus="autofocus" />
                    <small id="map" class="form-text text-muted">Search your location.</small>

                    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div id="map-canvas" style="width: 1000px; height: 400px;"></div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-weight-bold" for="title">Latitude</label>
                    <input value="{{old('lat')}}" class="form-control {{$errors->first('lat') ? 'is-invalid' : ''}}" type="text" name="lat" id="lat" />
                </div>
                <div class="form-control-feedback text-danger">
                    {{$errors->first('lat')}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-weight-bold" for="title">Longitude</label>
                    <input value="{{old('lng')}}" class="form-control {{$errors->first('lng') ? 'is-invalid' : ''}}" type="text" name="lng" id="lng" />
                </div>
                <div class="form-control-feedback text-danger">
                    {{$errors->first('lng')}}
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="font-weight-bold" for="desckripsi">Deskripsi</label>
            <textarea id="desc" class="form-control" name="desc" rows="10" cols="50"></textarea>
        </div>
        <div class="form-control-feedback text-danger">
            {{$errors->first('desc')}}
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        <a href="{{ route('informations.index') }}" class="btn btn-danger"><i class="fas fa-close"></i> Batal</a>
    </form>

</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMSly_JNrqkrUVsx6gqD1qSCVkIyhfsE8&libraries=places" type="text/javascript"></script>
<script>
    var map = new google.maps.Map(document.getElementById('map-canvas'), {
        center: {
            lat: -6.595,
            lng: 106.8
        },
        zoom:15
    });

    var marker = new google.maps.Marker({
        position: {
            lat: -6.595,
            lng: 106.8
        },
        map:map,
        draggable:true
    });

    var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));

    google.maps.event.addListener(searchBox, 'places_changed',function() {
        var places = searchBox.getPlaces();
        var bounds = new google.maps.LatLngBounds();
        var i,place;

        for(i=0; place=places[i];i++){
  			bounds.extend(place.geometry.location);
			  marker.setPosition(place.geometry.location); //set marker position new...
		  }
	
  		map.fitBounds(bounds);
  		map.setZoom(15);
    });

    google.maps.event.addListener(marker,'position_changed',function(){
		var lat = marker.getPosition().lat();
		var lng = marker.getPosition().lng();
		$('#lat').val(lat);
		$('#lng').val(lng);
	});



</script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
    var desc = document.getElementById("desc");
        CKEDITOR.replace(desc,{
        language:'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
</script>
@endsection