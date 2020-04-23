
                <table >
                    <thead>
                      <tr>
                        <th><b>No</b></th>
                        <th><b>Nama</b></th>
                        <th><b>Kepala Keluarga</b></th>
                        <th><b>Nomor KK</b></th>
                        <th><b>Tanggal Lahir</b></th>
                        <th><b>Nomor Hp</b></th>
                        <th><b>RT</b></th>
                        <th><b>RW</b></th>
                        <th><b>Status Perkawinan</b></th>
                        <th><b>Status Penduduk</b></th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach ($residents as $r)
                    <tr>
                        <td>{{$nomor++}}</td>
                        <td>{{$r->nama}}</td>
                        <td>{{$r->patriarches->nama}}</td> 
                        <td>{{$r->patriarches->nomor_kk}}</td>
                        <td>{{$r->tanggal_lahir}}</td>
                        <td>{{$r->no_telp}}</td> 
                        <td>{{$r->rt}}</td> 
                        <td>{{$r->rw}}</td> 
                        <td>{{$r->status_perkawinan}}</td>
                        <td>{{$r->status_kependudukan}}</td> 
                    </tr>    
                    @endforeach
                    
                      
                    </tbody>
                  </table>