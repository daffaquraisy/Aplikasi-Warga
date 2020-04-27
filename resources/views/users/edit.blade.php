@extends('layouts.global')
@section('title') Edit User @endsection

@section('content')
<div class="col-md-8">
    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('users.update', [$user->id])}}"
        method="POST">
        @csrf

        <input type="hidden" value="PUT" name="_method">
        
        <div class="form-group">
            <label class="font-weight-bold" for="email">Email</label>
            <input value="{{old('email') ? old('email') : $user->email}}"
                class="form-control {{$errors->first('email') ? 'is-invalid' : ''}}" placeholder="user@email.com" type="text"
                name="email" id="email" />
        </div>
        <div class="invalid-feedback">
            {{$errors->first('email')}}
        </div>

        <div class="form-group">
            <label class="font-weight-bold" for="name">Nama</label>
            <input value="{{old('name') ? old('name') : $user->name}}"
                class="form-control {{$errors->first('name') ? 'is-invalid' : ''}}" placeholder="Nama" type="text"
                name="name" id="name" />
        </div>
        <div class="invalid-feedback">
            {{$errors->first('name')}}
        </div>

        <div class="form-group">
            <label class="font-weight-bold" for="phone">No Hp</label>
            <input value="{{$user->phone}}" class="form-control" placeholder="No Hp" type="text" name="phone" id="phone" />
        </div>

        <div class="form-group">
            <label>Status</label>
            <div class="animated-radio-button">
                <label>
                    <input value="ACTIVE" type="radio" id="ACTIVE" name="status" {{$user->status == 'ACTIVE' ? 'checked' : ''}}><span class="label-text">Aktif</span>
                </label>
            </div>

            <div class="animated-radio-button">
                <label>
                    <input value="INACTIVE" type="radio" id="INACTIVE" name="status" {{$user->status == 'INACTIVE' ? 'checked' : ''}}><span class="label-text">Tidak Aktif</span>
                </label>
            </div>
        </div>
        
        <div class="form-group">
            <label class="font-weight-bold" for="">Roles</label>
            <select class="form-control" id="roles" name="roles[]">
                <option {{$user->roles == in_array('Pak RT 1',json_decode($user->roles)) ? "selected" : ""}} class="{$errors->first('roles') ? 'is-invalid' : '' }}"  type="checkbox" name="roles[]" id="Pak RT 1" value="Pak RT 1">Pak RT 1</option>

                <option {{$user->roles == in_array('Pak RT 2',json_decode($user->roles)) ? "selected" : ""}} class="{$errors->first('roles') ? 'is-invalid' : '' }}"  type="checkbox" name="roles[]" id="Pak RT 2" value="Pak RT 2">Pak RT 2</option>

                <option {{$user->roles == in_array('Pak RT 3',json_decode($user->roles)) ? "selected" : ""}} class="{$errors->first('roles') ? 'is-invalid' : '' }}"  type="checkbox" name="roles[]" id="Pak RT 3" value="Pak RT 3">Pak RT 3</option>

                <option {{$user->roles == in_array('Pak RT 4',json_decode($user->roles)) ? "selected" : ""}} class="{$errors->first('roles') ? 'is-invalid' : '' }}"  type="checkbox" name="roles[]" id="Pak RT 4" value="Pak RT 4">Pak RT 4</option>

                <option {{$user->roles == in_array('Pak RT 5',json_decode($user->roles)) ? "selected" : ""}} class="{$errors->first('roles') ? 'is-invalid' : '' }}"  type="checkbox" name="roles[]" id="Pak RT 5" value="Pak RT 5">Pak RT 5</option>

                <option {{$user->roles == in_array('Pak RT 6',json_decode($user->roles)) ? "selected" : ""}} class="{$errors->first('roles') ? 'is-invalid' : '' }}"  type="checkbox" name="roles[]" id="Pak RT 6" value="Pak RT 6">Pak RT 6</option>

                <option {{$user->roles == in_array('Pak RT 7',json_decode($user->roles)) ? "selected" : ""}} class="{$errors->first('roles') ? 'is-invalid' : '' }}"  type="checkbox" name="roles[]" id="Pak RT 7" value="Pak RT 7">Pak RT 7</option>
            </select>
        </div>

        <a href="{{ route('users.index') }}" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>

    </form>
</div>
@endsection