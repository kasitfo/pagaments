@extends('layouts.app')

@section('content')

<h2 style="color: blue">Comptes</h2>

@if (count($comptes) > 0)
<table class="table">
    <thead>
        <th scope="col">Compte</th>
        <th scope="col">Fuc</th>
        <th scope="col">Clau</th>
        <th scope="col">Accions</th>
    </thead>
    <tbody> 
        @foreach($comptes as $compte)
        <tr>
            <td>{{$compte->compte}}</td>
            <td>{{$compte->fuc}}</td>
            <td>{{$compte->clau}}</td>
            <td>
                <a href="edit/{{$compte->id}}" alt="Editar compte"><i class="fas fa-pencil-alt"></i></a>
                <a href="delete/{{$compte->id}}" alt="Borrar compte"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>   
</table>
@else

<p>No hi ha comptes a mostrar</p>

@endif

<a href="create" class="btn btn-primary">Afegir curs</a>

@endsection