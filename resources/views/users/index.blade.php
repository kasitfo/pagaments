@extends('layouts.app')

@section('content')

<h2 style="color: blue">Usuaris</h2>

@if (count($users) > 0)
<p>Imprimir CRUD de Usuaris<a href="imprimir" alt="Imprimir curs"><i class="fas fa-print"></i></a>
<table class="table">
    <thead>
        <th scope="col">Nom</th>
        <th scope="col">Correu</th>
        <th scope="col">Perfil</th>
        @if(Auth::user()->perfil === 1)        
        <th scope="col">Accions</th>
        @endif
    </thead>
    <tbody> 
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->perfil === 1 ? 'Administrador' : 'Normal'}}</td>
            <td>
                @if(Auth::user()->perfil === 1)
                <a href="edit/{{$user->id}}" alt="Editar usuari"><i class="fas fa-pencil-alt"></i></a>
                <a href="delete/{{$user->id}}" alt="Borrar usuari"><i class="fas fa-trash-alt"></i></a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>   
</table>
@else

<p>No hi ha usuaris a mostrar</p>

@endif

@if(Auth::user()->perfil === 1)
<a href="create" class="btn btn-primary">Afegir usuari</a>
@endif

@endsection