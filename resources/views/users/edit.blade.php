@extends('layouts.app')

@section('content')

<h2 style="color: blue">Usuaris</h2>

<form method="POST" action="/users/edit">
    @csrf
    <input type="hidden" name="id" value="{{$user->id}}">
    <div class="form-group row">
        <label class="col-lg-2">Name :</label>
        <input type="text" name="name" value="{{$user->name}}" required>
    </div>
    <div class="form-group row">
        <label class="col-lg-2">Correu electrònic :</label>
        <input type="text" name="email" value="{{$user->email}}" required>
    </div>
    <div class="form-group row">
        <label class="col-lg-2">Contrasenya :</label>
        <input type="text" name="password" required>
    </div>
    <div class="form-group row">
        <label class="col-lg-2">Perfil :</label>
        <select name="perfil">
            <option value="0">Normal</option>
            <option value="1">Administrador</option>
        </select>
    </div>
    <div class="form-group row">
        <input type="submit" class="btn btn-primary" value="Enviar">
    </div>
</form>

@endsection