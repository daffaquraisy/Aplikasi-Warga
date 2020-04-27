@extends('layouts.global')

@section('content')
<div class="container">

  <div class="row">
    <div class="col-md-12 text-center mb-4">
      <i class="fas fa-building font-1"></i>
      <i class="fas fa-building font-2"></i>
      <i class="fas fa-building font-3"></i>
    </div>
    <div class="col-md-12 mb-2">
      <h2 class="text-center">Selamat Datang {{ Auth::user()->name }} di Aplikasi Warga</h2>
      <p class="h5 text-center">Ayooo, cek data penduduk anda hari ini</p>
    </div>
  </div>

  <hr>

  <div class="row">
    <div class="col-md-4">
      <div class="widget-small primary coloured-icon"><i class="icon fas fa-user-tie fa-3x"></i>
        <div class="info">
          <h4>Jumlah Kepala Keluarga</h4>
          <p><b>{{$patriarches}}</b></p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="widget-small info coloured-icon"><i class="icon fas fa-user fa-3x"></i>
        <div class="info">
          <h4>Jumlah Penduduk</h4>
          <p><b>{{$residents}}</b></p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="widget-small danger coloured-icon"><i class="icon fas fa-users fa-3x"></i>
        <div class="info">
          <h4>Total Penduduk</h4>
          <p><b>{{$join}}</b></p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
