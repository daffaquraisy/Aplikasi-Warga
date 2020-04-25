@extends('layouts.global')
@section('title') Berita @endsection
@section('content')

<div class="container">
    <div class="row">

        @foreach ($informations as $i)
        <div class="col-md-4">
            <div class="card">
                @if($i->image)
                <img class="card-img-top" src="{{asset('storage/'. $i->image)}}">
                @else
                Tidak ada gambar
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{$i->title}}</h5>
                    <p class="card-text">{!!$i->desc!!}</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted">Di upload pada tanggal, {{$i->date}}</small>
                  </div>
            </div>
        </div>
        @endforeach
        
    </div>
    <br>
    <div class="row">
        <div class="col-md-2">
            {{$informations->appends(Request::all())->links()}}
        </div>
    </div>
</div>



@endsection