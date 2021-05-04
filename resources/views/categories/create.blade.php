@extends('layouts.app')

@section('content')

<form method="POST" action="create">
    @csrf
    <div class="form-group row">
        <label class="col-lg-2">Categoria :</label>
        <input type="text" placeholder="Introduïx el curs..." name="categoria" required>
    </div>
    <div class="form-group row">
        <label class="col-lg-2">Curs :</label>
        <select name="curs_id" id="curs">
            @foreach ($cursos as $curs)
                <option value="{{$curs->id}}">{{$curs->curs}}</option>
            @endforeach
        </select>
    </div> 
    <div class="form-group row">
        <input type="submit" class="btn btn-primary" value="Enviar">
    </div>
</form>

@endsection