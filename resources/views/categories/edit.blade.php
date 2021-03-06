@extends('layouts.app')

@section('content')

<h2>Categories</h2>

<form method="POST" action="/categories/edit">
    @csrf
    <input type="hidden" name="id" value="{{$categoria->id}}">
    <div class="form-group row">
        <label class="col-lg-2">Categories :</label>
        <input type="text" name="categoria" value="{{$categoria->categoria}}" tabindex="1" required>
    </div>
    <div class="form-group row">
        <label class="col-lg-2">Curs :</label>
        <select name="curs_id" id="curs" tabindex="2">
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