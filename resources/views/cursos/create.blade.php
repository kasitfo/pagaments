@extends('layouts.app')

@section('content')

<div class='container'>
    <form method="POST" action="cursos">
        <div class="form-group row">
            <label class="col-lg-4">Curs :</label>
            <input type="text" name="curs" placeholder="Introdueïx el curs">
        </div>
    </form>
</div>

@endsection