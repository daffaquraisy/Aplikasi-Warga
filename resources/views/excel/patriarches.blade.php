
                <table >
                    <thead>
                      <tr>
                        <th><b>No</b></th>
                        <th><b>Nama</b></th>
                        <th><b>Nomor KK</b></th>
                        <th ><b>Tanggal Lahir</b></th>
                        <th><b>Nomor Hp</b></th>
                        <th><b>Status</b></th>
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
                            &middot; {{$l}} 
                            @endforeach
                        </td>   
  
                    </tr>    
                    @endforeach
                    
                      
                    </tbody>
                  </table>