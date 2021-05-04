@extends('layouts.app')

@section('content')

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

<a href="create" class="btn btn-primary">Afegir curs</a>

@endsection