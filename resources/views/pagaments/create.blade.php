@extends('layouts.app')

@section('content')

<h2>Pagaments</h2>

<form method="POST" action="create">
    @csrf
    <div class="form-group row">
        <label class="col-lg-2">Titol :</label>
        <input type="text" placeholder="Introdueïx el títol..." name="titol" required>
    </div>
    <div class="form-group row">
        <label class="col-lg-2">Descripció :</label>
        <textarea rows="4" cols="50" name="descripcio" class="ckeditor" required></textarea>
    </div>
    <div class="form-group row">
        <label class="col-lg-2">Preu :</label>
        <input type="text" placeholder="Introdueïx el preu..." name="preu" min="1" required>
    </div>
    <div class="form-group row">
        <label class="col-lg-2">Data d'inici :</label>
        <input type="date" name="data_inici" required>
    </div>
    <div class="form-group row">
        <label class="col-lg-2">Data de fi :</label>
        <input type="date" name="data_fi" required>
    </div>
    <div class="form-group row">
        <label class="col-lg-2">Estat :</label>
        <input type="text" name="estat">
    </div>
    <div class="form-group row">
        <label class="col-lg-2">Categoria :</label>
        <select name="categoria_id" id="categoria">
            @foreach ($categories as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group row">
        <label class="col-lg-2">Compte :</label>
        <select name="compte_id" id="compte">
            @foreach ($comptes as $compte)
                <option value="{{$compte->id}}">{{$compte->compte}}</option>
            @endforeach
        </select>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif 
    <div class="form-group row">
        <input type="submit" class="btn btn-primary" value="Enviar">
    </div>
</form>

@endsection