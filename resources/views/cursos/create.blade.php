@extends('layouts.app')

@section('content')

<h2 style="color: blue">Cursos</h2>

<form method="POST" action="create">
    @csrf
    <div class="form-group row">
        <label class="col-lg-1">Curs :</label>
        <input type="text" placeholder="Introduïx el curs..." name="curs" required>
    </div> 
    <div class="form-group row">
        <input type="submit" class="btn btn-primary" value="Enviar">
    </div>
</form>

@endsection