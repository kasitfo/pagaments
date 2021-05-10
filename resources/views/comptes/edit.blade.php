@extends('layouts.app')

@section('content')

<h2 style="color: blue">Comptes</h2>

<form method="POST" action="/comptes/edit">
    @csrf
    <input type="hidden" name="id" value="{{$compte->id}}">
    <div class="form-group row">
        <label class="col-lg-2">Compte :</label>
        <input type="text" name="compte" value="{{$compte->compte}}" required>
    </div>
    <div class="form-group row">
        <label class="col-lg-2">Fuc :</label>
        <input type="text" name="fuc" value="{{$compte->fuc}}" required>
    </div>
    <div class="form-group row">
        <label class="col-lg-2">Clau :</label>
        <input type="text" name="clau" value="{{$compte->clau}}" required>
    </div> 
    <div class="form-group row">
        <input type="submit" class="btn btn-primary" value="Enviar">
    </div>
</form>

@endsection

@section('postscripts')

<script>

    $( document ).ready(function() {
        document.title = "Comptes | Edit";
    });

</script>
    
@endsection