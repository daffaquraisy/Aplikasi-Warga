@extends("layouts.global")

@section("title") Daftar Pengguna @endsection
@section("content")

<h3 class="p-0"><i class="fas fa-users"></i> | Daftar Pengguna</h3>
<hr>

<div class="row mb-3">
    <div class="col-md-12 text-right">
        <a href="{{route('users.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah pengguna</a>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive mt-3">
        <table id="basic-datatables" class="table table-bordered">
            <thead class="bg-primary text-white text-center">
                <tr class="font-weight-bold">
                    <td>#</td>
                    <td>Email</td>
                    <td>Nama</td>
                    <td>Role</td>
                    <td>No Hp</td>
                    <td>Status</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
        
                @foreach($users as $user)
                <tr>
                    <td class="text-center">{{$nomor++}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->name}}</td>
        
                    <td>
                        @foreach (json_decode($user->roles) as $l)
                        
                        &middot; {{$l}} 
                        
                        <br>
                        @endforeach
                    </td>
                    <td>{{$user->phone}}</td>
                    <td>
                        @if($user->status == "ACTIVE")
                        <span class="badge badge-success">
                            {{$user->status}}
                        </span>
                        @else
                        <span class="badge badge-danger">
                            {{$user->status}}
                        </span>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-info text-white btn-sm" href="{{route('users.edit', [$user->id])}}"><i class="fas fa-edit"></i></a>
        
                        <a href="{{route('users.show', [$user->id])}}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                        
                        <form onsubmit="return confirm('Apa anda yakin untuk menghapus data ini?')" class="d-inline"
                            action="{{route('users.destroy', [$user->id ])}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
    
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan=10>
                        {{$users->appends(Request::all())->links()}}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
    </div>
  </div>
@endsection