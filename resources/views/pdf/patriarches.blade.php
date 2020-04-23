<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    

    {{-- <link rel="stylesheet" href="{{asset('css/mycss.css')}}"> --}}

    <title>Data Kepala Keluarga RW 2</title>
  </head>
  <body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg">
                <h3 class="mb-2">Data Kepala Keluarga RW 2</h3>
                <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead>
                      <tr>
                        <th style="width:1%"><b>#</b></th>
                        <th style="width: 100%"><b>Nama</b></th>
                        <th style="width: 50%"><b>Nomor KK</b></th>
                        <th style="width: 100%"><b>Tanggal Lahir</b></th>
                        <th style="width: 50%"><b>Nomor Hp</b></th>

                        <th style="width: 50%"><b>Status</b></th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach ($patriarches as $p)
                    <tr>
                        <td>{{$nomor++}}</td> 
                        <td>{{$p->nama}}</td>
                        <td>{{$p->nomor_kk}}</td> 
                        <td>{{$p->tanggal_lahir}}</td>
                        <td>{{$p->no_hp}}</td>
                        <td>
                            @foreach (json_decode($p->status) as $l)
                            {{$l}} 
                            @endforeach
                        </td>   
  
                    </tr>    
                    @endforeach
                    
                      
                    </tbody>
                  </table>
                </div>

            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>