@extends('layouts.app')

@section('content')

<h2 style="color: blue">Cursos</h2>

<form method="POST" action="/cursos/edit">
    @csrf
    <input type="hidden" name="id" value="{{$curs->id}}">
    <div class="form-group row">
        <label class="col-lg-1">Curs :</label>
        <input type="text" name="curs" value="{{$curs->curs}}" required>
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