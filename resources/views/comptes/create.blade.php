@extends('layouts.app')

@section('content')

<h2>Comptes</h2>

<form method="POST" action="create">
    @csrf
    <div class="form-group row">
        <label class="col-lg-2">Compte :</label>
        <input type="text" placeholder="Introdueïx el compte..." name="compte" required>
    </div>
    <div class="form-group row">
        <label class="col-lg-2">Fuc :</label>
        <input type="text" placeholder="Introdueïx el fuc..." name="fuc" required>
    </div>
    <div class="form-group row">
        <label class="col-lg-2">Clau :</label>
        <input type="text" placeholder="Introdueïx la clau..." name="clau" required>
    </div>
    <div class="form-group row">
        <input type="submit" class="btn btn-primary" value="Enviar">
    </div>
</form>

@endsection