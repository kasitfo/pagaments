@extends('layouts.app')

@section('content')

<form method="POST" action="/cursos/edit">
    @csrf
    <input type="hidden" name="id" value="{{$curs->id}}">
    <div class="form-group row">
        <label class="col-lg-1">Curs :</label>
        <input type="text" name="curs" value="{{$curs->curs}}">
    </div> 
    <div class="form-group row">
        <input type="submit" class="btn btn-primary" value="Enviar">
    </div>
</form>

@endsection