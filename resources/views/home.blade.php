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

  <div class="row">
    
    <div class="col-md-4">
      <div class="widget-small primary coloured-icon"><i class="icon fas fa-user-tie fa-3x"></i>
        <div class="info">
          <h4>Jumlah Kepala Keluarga RT 1</h4>
          <p><b>{{$p1}}</b></p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="widget-small info coloured-icon"><i class="icon fas fa-user fa-3x"></i>
        <div class="info">
          <h4>Jumlah Penduduk RT 1</h4>
          <p><b>{{$r1}}</b></p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="widget-small danger coloured-icon"><i class="icon fas fa-users fa-3x"></i>
        <div class="info">
          <h4>Total Penduduk <br>RT 1</h4>
          <p><b>{{$j1}}</b></p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    
    <div class="col-md-4">
      <div class="widget-small primary coloured-icon"><i class="icon fas fa-user-tie fa-3x"></i>
        <div class="info">
          <h4>Jumlah Kepala Keluarga RT 2</h4>
          <p><b>{{$p2}}</b></p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="widget-small info coloured-icon"><i class="icon fas fa-user fa-3x"></i>
        <div class="info">
          <h4>Jumlah Penduduk RT 2</h4>
          <p><b>{{$r2}}</b></p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="widget-small danger coloured-icon"><i class="icon fas fa-users fa-3x"></i>
        <div class="info">
          <h4>Total Penduduk <br>RT 2</h4>
          <p><b>{{$j2}}</b></p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    
    <div class="col-md-4">
      <div class="widget-small primary coloured-icon"><i class="icon fas fa-user-tie fa-3x"></i>
        <div class="info">
          <h4>Jumlah Kepala Keluarga RT 3</h4>
          <p><b>{{$p3}}</b></p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="widget-small info coloured-icon"><i class="icon fas fa-user fa-3x"></i>
        <div class="info">
          <h4>Jumlah Penduduk RT 3</h4>
          <p><b>{{$r3}}</b></p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="widget-small danger coloured-icon"><i class="icon fas fa-users fa-3x"></i>
        <div class="info">
          <h4>Total Penduduk <br>RT 3</h4>
          <p><b>{{$j3}}</b></p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    
    <div class="col-md-4">
      <div class="widget-small primary coloured-icon"><i class="icon fas fa-user-tie fa-3x"></i>
        <div class="info">
          <h4>Jumlah Kepala Keluarga RT 4</h4>
          <p><b>{{$p4}}</b></p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="widget-small info coloured-icon"><i class="icon fas fa-user fa-3x"></i>
        <div class="info">
          <h4>Jumlah Penduduk RT 4</h4>
          <p><b>{{$r4}}</b></p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="widget-small danger coloured-icon"><i class="icon fas fa-users fa-3x"></i>
        <div class="info">
          <h4>Total Penduduk <br>RT 4</h4>
          <p><b>{{$j4}}</b></p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    
    <div class="col-md-4">
      <div class="widget-small primary coloured-icon"><i class="icon fas fa-user-tie fa-3x"></i>
        <div class="info">
          <h4>Jumlah Kepala Keluarga RT 5</h4>
          <p><b>{{$p5}}</b></p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="widget-small info coloured-icon"><i class="icon fas fa-user fa-3x"></i>
        <div class="info">
          <h4>Jumlah Penduduk RT 5</h4>
          <p><b>{{$r5}}</b></p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="widget-small danger coloured-icon"><i class="icon fas fa-users fa-3x"></i>
        <div class="info">
          <h4>Total Penduduk <br>RT 5</h4>
          <p><b>{{$j5}}</b></p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    
    <div class="col-md-4">
      <div class="widget-small primary coloured-icon"><i class="icon fas fa-user-tie fa-3x"></i>
        <div class="info">
          <h4>Jumlah Kepala Keluarga RT 6</h4>
          <p><b>{{$p6}}</b></p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="widget-small info coloured-icon"><i class="icon fas fa-user fa-3x"></i>
        <div class="info">
          <h4>Jumlah Penduduk RT 6</h4>
          <p><b>{{$r6}}</b></p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="widget-small danger coloured-icon"><i class="icon fas fa-users fa-3x"></i>
        <div class="info">
          <h4>Total Penduduk <br>RT 6</h4>
          <p><b>{{$j6}}</b></p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    
    <div class="col-md-4">
      <div class="widget-small primary coloured-icon"><i class="icon fas fa-user-tie fa-3x"></i>
        <div class="info">
          <h4>Jumlah Kepala Keluarga RT 7</h4>
          <p><b>{{$p7}}</b></p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="widget-small info coloured-icon"><i class="icon fas fa-user fa-3x"></i>
        <div class="info">
          <h4>Jumlah Penduduk RT 7</h4>
          <p><b>{{$r7}}</b></p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="widget-small danger coloured-icon"><i class="icon fas fa-users fa-3x"></i>
        <div class="info">
          <h4>Total Penduduk <br>RT 7</h4>
          <p><b>{{$j7}}</b></p>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
