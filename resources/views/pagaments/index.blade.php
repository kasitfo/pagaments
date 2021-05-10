@extends('layouts.app')

@section('content')

<h2 style="color: blue">Pagaments</h2>

@if (count($pagaments) > 0)
<table class="table">
    <thead>
        <th scope="col">Titol</th>
        <th scope="col">Descripció</th>
        <th scope="col">Preu</th>
        <th scope="col">Data d'inici</th>
        <th scope="col">Data de fi</th>
        <th scope="col">Categoria</th>
        <th scope="col">Compte</th>
        <th scope="col">Estat</th>
        <th scope="col">Accions</th>
    </thead>
    <tbody> 
        @foreach($pagaments as $pagament)
        <tr>
            <td>{{$pagament->titol}}</td>
            <td>{!!$pagament->descripcio!!}</td>
            <td>{{$pagament->preu}}</td>
            <td>{{$pagament->data_inici}}</td>
            <td>{{$pagament->data_fi}}</td>
            <td>{{$pagament->categoria()->categoria}}</td>
            <td>{{$pagament->compte()->compte}}</td>
            <td>{{$pagament->estat}}</td>
            <td>
                <a href="edit/{{$pagament->id}}" alt="Editar curs"><i class="fas fa-pencil-alt"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>   
</table>
@else

<p>No hi ha pagaments a mostrar</p>

@endif

<a href="create" class="btn btn-primary">Afegir Pagament</a>

@endsection