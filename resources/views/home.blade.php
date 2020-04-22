@extends('layouts.global')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fas fa-user fa-3x"></i>
            <div class="info">
              <h4>Kepala Keluarga</h4>
              <p><b>{{$patriarches}}</b></p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fas fa-users fa-3x"></i>
            <div class="info">
              <h4>Penduduk</h4>
              <p><b>{{$residents}}</b></p>
            </div>
          </div>
        </div>

        
      </div>
</div>
@endsection
