@extends('layouts.global')

@section('content')
<div class="container">

  @if(session('success'))
  <div class="alert alert-success mt-3">
      {{session('success')}}
  </div>
  @endif
  
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

        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon"><i class="icon fas fa-users fa-3x"></i>
              <div class="info">
                <h4>Total</h4>
                <p><b>{{$join}}</b></p>
              </div>
            </div>
          </div>

        
      </div>
</div>
@endsection
