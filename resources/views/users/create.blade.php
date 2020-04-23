@extends("layouts.global")

@section("title") Create User @endsection

@section("content")

<div class="col-md-8 mt-2">

    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif

    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('users.store')}}" method="POST">

        @csrf

        <label for="email">Email</label>

        <input value="{{old('email')}}" class="form-control {{$errors->first('email') ? "is-invalid": ""}}"
            placeholder="user@email.com" type="email" name="email" id="email" />

        <div class="invalid-feedback">
            {{$errors->first('email')}}
        </div>

        <br>

        
        <label for="name">Nama</label>

        <input value="{{old('name')}}" class="form-control {{$errors->first('name') ? "is-invalid": ""}}"
            placeholder="Nama" type="text" name="name" id="name">

        <div class="invalid-feedback">
            {{$errors->first('name')}}
        </div>
        <br>

        <label for="phone">No Hp</label>

        <input value="{{old('phone')}}" class="form-control {{$errors->first('phone') ? "is-invalid": ""}}"
            placeholder="Nomor Hp" type="text" name="phone" id="phone">

        <div class="invalid-feedback">
            {{$errors->first('phone')}}
        </div>
        <br>

        <label for="">Roles</label>
        <br>

        <select class="form-control" id="roles" name="roles[]">
            <option class="{$errors->first('roles') ? 'is-invalid' : '' }}"  type="checkbox" name="roles[]" id="Pak RT 1" value="Pak RT 1">Pak RT 1</option>
            <option class="{$errors->first('roles') ? 'is-invalid' : '' }}"  type="checkbox" name="roles[]" id="Pak RT 2" value="Pak RT 2">Pak RT 2</option>
            <option class="{$errors->first('roles') ? 'is-invalid' : '' }}"  type="checkbox" name="roles[]" id="Pak RT 3" value="Pak RT 3">Pak RT 3</option>
            <option class="{$errors->first('roles') ? 'is-invalid' : '' }}"  type="checkbox" name="roles[]" id="Pak RT 4" value="Pak RT 4">Pak RT 4</option>
            <option class="{$errors->first('roles') ? 'is-invalid' : '' }}"  type="checkbox" name="roles[]" id="Pak RT 5" value="Pak RT 5">Pak RT 5</option>
            <option class="{$errors->first('roles') ? 'is-invalid' : '' }}"  type="checkbox" name="roles[]" id="Pak RT 6" value="Pak RT 6">Pak RT 6</option>
            <option class="{$errors->first('roles') ? 'is-invalid' : '' }}"  type="checkbox" name="roles[]" id="Pak RT 7" value="Pak RT 7">Pak RT 7</option>
        </select>


        <div class="invalid-feedback">
            {{$errors->first('roles')}}
        </div>
        
        <br>

        <label for="password">Password</label>
        <br>
        <input class="form-control {{$errors->first('password') ? "is-invalid" : ""}}" placeholder="password"
            type="password" name="password" id="password">

        <div class="invalid-feedback">
            {{$errors->first('password')}}
        </div>

        <br>

        <label for="password_confirmation">Password Confirmation</label>
        <br>
        <input class="form-control {{$errors->first('password_confirmation') ? "is-invalid" : ""}}"
            placeholder="password confirmation" type="password" name="password_confirmation" id="password_confirmation">

        <div class="invalid-feedback">
            {{$errors->first('password_confirmation')}}
        </div>

        <br>

        

        <input class="btn btn-primary" type="submit" value="Save">

    </form>

</div>

@endsection