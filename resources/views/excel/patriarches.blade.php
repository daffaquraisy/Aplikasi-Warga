
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
                        <th><b>RT</b></th>
                        <th><b>RW</b></th>
                        <th><b>Status Bantuan</b></th>
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
                        <td>{{$p->status}}</td>   
                        <td>{{$p->pendidikan}}</td>
                        <td>{{$p->pekerjaan}}</td>
                        <td>{{$p->agama}}</td>
                        <td>{{$p->rt}}</td> 
                        <td>{{$p->rw}}</td>
                        <td>{{$p->status_bantuan}}</td>
  
                    </tr>    
                    @endforeach
                    
                      
                    </tbody>
                  </table>