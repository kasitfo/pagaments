@extends('layouts.app')

@section('content')

<h2 style="color: blue">Usuaris</h2>

<form method="POST" action="create">
    @csrf
    <div class="form-group row">
        <label class="col-lg-2">Nom :</label>
        <input type="text" name="name" required>
    </div>
    <div class="form-group row">
        <label class="col-lg-2">Correu Electrònic :</label>
        <input type="email" name="email" required>
    </div>
    <div class="form-group row">
        <label class="col-lg-2">Contrasenya :</label>
        <input type="text" minlength="8" name="password" required>
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