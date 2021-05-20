@extends('layouts.app')

@section('content')

<h2 style="color: blue">Cursos</h2>

@if (count($cursos) > 0)
<p>Imprimir CRUD de Cursos<a href="imprimir" alt="Imprimir curs"><i class="fas fa-print"></i></a>
<table class="table">
    <thead>
        <th scope="col">Curs</th>
        <th scope="col">Accions</th>
    </thead>
    <tbody> 
        @foreach($cursos as $curs)
        <tr>
            <td>{{$curs->curs}}</td>
            <td>
                <a href="edit/{{$curs->id}}" alt="Editar curs"><i class="fas fa-pencil-alt"></i></a>
                <a href="delete/{{$curs->id}}" alt="Borrar curs"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>   
</table>
@else

<p>No hi ha cursos a mostrar</p>

@endif

<a href="create" class="btn btn-primary">Afegir curs</a>

@endsection