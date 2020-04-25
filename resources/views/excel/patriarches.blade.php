
                <table >
                    <thead>
                      <tr>
                        <th><b>No</b></th>
                        <th><b>Nama</b></th>
                        <th><b>Nomor KK</b></th>
                        <th><b>NIK</b></th>
                        <th><b>Tanggal Lahir</b></th>
                        <th><b>Tempat Lahir</b></th>
                        <th><b>Nomor Hp</b></th>
                        <th><b>Status</b></th>
                        <th><b>Pendidikan</b></th>
                        <th><b>Pekerjaan</b></th>
                        <th><b>Agama</b></th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach ($patriarches as $p)
                    <tr>
                        <td>{{$nomor++}}</td>
                        <td>{{$p->nama}}</td>
                        <td>{{$p->nomor_kk}}</td>
                        <td>{{$p->nik}}</td> 
                        <td>{{$p->tanggal_lahir}}</td>
                        <td>{{$p->tempat_lahir}}</td>
                        <td>{{$p->no_hp}}</td>
                        <td>
                            @foreach (json_decode($p->status) as $l)
                            &middot; {{$l}} 
                            @endforeach
                        </td>   
                        <td>{{$p->pendidikan}}</td>
                        <td>{{$p->pekerjaan}}</td>
                        <td>{{$p->agama}}</td>
  
                    </tr>    
                    @endforeach
                    
                      
                    </tbody>
                  </table>