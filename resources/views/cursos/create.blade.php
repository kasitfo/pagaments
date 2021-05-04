@extends('layouts.app')

@section('content')

<form method="POST" action="create">
    @csrf
    <div class="form-group row">
        <label class="col-lg-1">Curs :</label>
        <input type="text" placeholder="Introduïx el curs..." name="curs">
    </div> 
    <div class="form-group row">
        <input type="submit" class="btn btn-primary" value="Enviar">
    </div>
</form>

@endsection