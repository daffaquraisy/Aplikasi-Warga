@extends('layouts.global')
@section('title') Edit User @endsection

@section('content')
<div class="col-md-8">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('users.update', [$user->id])}}"
        method="POST">
        @csrf

        <input type="hidden" value="PUT" name="_method">

        
        <label for="email">Email</label>
        <input value="{{old('email') ? old('email') : $user->email}}"
            class="form-control {{$errors->first('email') ? "is-invalid" : ""}}" placeholder="user@email.com" type="text"
            name="email" id="email" />
        <div class="invalid-feedback">
            {{$errors->first('email')}}
        </div>
        <br>


        <label for="name">Nama</label>
        <input value="{{old('name') ? old('name') : $user->name}}"
            class="form-control {{$errors->first('name') ? "is-invalid" : ""}}" placeholder="Nama" type="text"
            name="name" id="name" />
        <div class="invalid-feedback">
            {{$errors->first('name')}}
        </div>
        <br>

        <label for="phone">No Hp</label>
        <input value="{{$user->phone}}" class="form-control" placeholder="No Hp" type="text"
            name="phone" id="phone" />
        <br>

        <label class="control-label">Status</label>
        <div class="form-check">
          <label class="form-check-label">
            <input {{$user->status == "ACTIVE" ? "checked" : ""}} value="ACTIVE"
            type="radio" class="form-check-label" id="ACTIVE" name="status"> 
            Active
          </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input {{$user->status == "INACTIVE" ? "checked" : ""}} value="INACTIVE"
                type="radio" class="form-check-label" id="INACTIVE" name="status"> 
                Tidak Active
              </label>
        </div>
        <br>
        
        <label for="">Roles</label>
        <br>

        <select class="form-control" id="roles" name="roles[]">
            <option {{$user->roles == in_array('Pak RT 1',json_decode($user->roles)) ? "selected" : ""}} class="{$errors->first('roles') ? 'is-invalid' : '' }}"  type="checkbox" name="roles[]" id="Pak RT 1" value="Pak RT 1">Pak RT 1</option>

            <option {{$user->roles == in_array('Pak RT 2',json_decode($user->roles)) ? "selected" : ""}} class="{$errors->first('roles') ? 'is-invalid' : '' }}"  type="checkbox" name="roles[]" id="Pak RT 2" value="Pak RT 2">Pak RT 2</option>

            <option {{$user->roles == in_array('Pak RT 3',json_decode($user->roles)) ? "selected" : ""}} class="{$errors->first('roles') ? 'is-invalid' : '' }}"  type="checkbox" name="roles[]" id="Pak RT 3" value="Pak RT 3">Pak RT 3</option>

            <option {{$user->roles == in_array('Pak RT 4',json_decode($user->roles)) ? "selected" : ""}} class="{$errors->first('roles') ? 'is-invalid' : '' }}"  type="checkbox" name="roles[]" id="Pak RT 4" value="Pak RT 4">Pak RT 4</option>

            <option {{$user->roles == in_array('Pak RT 5',json_decode($user->roles)) ? "selected" : ""}} class="{$errors->first('roles') ? 'is-invalid' : '' }}"  type="checkbox" name="roles[]" id="Pak RT 5" value="Pak RT 5">Pak RT 5</option>

            <option {{$user->roles == in_array('Pak RT 6',json_decode($user->roles)) ? "selected" : ""}} class="{$errors->first('roles') ? 'is-invalid' : '' }}"  type="checkbox" name="roles[]" id="Pak RT 6" value="Pak RT 6">Pak RT 6</option>

            <option {{$user->roles == in_array('Pak RT 7',json_decode($user->roles)) ? "selected" : ""}} class="{$errors->first('roles') ? 'is-invalid' : '' }}"  type="checkbox" name="roles[]" id="Pak RT 7" value="Pak RT 7">Pak RT 7</option>
        </select>
        <br>

        <input class="btn btn-primary" type="submit" value="Simpan" />
    </form>
</div>
@endsection