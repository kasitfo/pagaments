@extends('layouts.app')

@section('content')

<h2>Categories</h2>

@if (count($categories) > 0)
<table class="table">
    <thead>
        <th scope="col">Categories</th>
        <th scope="col">Curs</th>
        <th scope="col">Accions</th>
    </thead>
    <tbody> 
        @foreach($categories as $categoria)
        <tr>
            <td>{{$categoria->categoria}}</td>
            <td>{{$categoria->curs()->curs}}</td>
            <td>
                <a href="edit/{{$categoria->id}}" alt="Editar categoria"><i class="fas fa-pencil-alt"></i></a>
                <a href="delete/{{$categoria->id}}" alt="Borrar categoria"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>   
</table>
@else

    <p>No hi ha categories a mostrar</p>

@endif

<a href="create" class="btn btn-primary">Afegir categoria</a>

@endsection