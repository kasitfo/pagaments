@extends('layouts.app')

@section('content')

<h2>Categories</h2>

<form method="POST" action="create">
    @csrf
    <div class="form-group row">
        <label class="col-lg-2">Categoria :</label>
        <input type="text" placeholder="Introdueïx la categoria..." name="categoria" required>
    </div>
    <div class="form-group row">
        <label class="col-lg-2">Curs :</label>
        <select name="curs_id" id="curs">
            @foreach ($cursos as $curs)
                <option value="{{$curs->id}}">{{$curs->curs}}</option>
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