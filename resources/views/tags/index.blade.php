@extends('adminlte::page')

@section('title', 'Etiquetas')

@section('content_header')
    <h1 class="text-center alert alert-info">Modulo de Etiquetas</h1>
@stop

@section('content')

@if (Session()->has('info'))
    <div class="alert alert-success"> {{Session('info')}}</div>
@endif

<table class="table table-striped table-hover text-center">    
    <thead>
        <tr class="table-info">
            <th>ID</th>
            <th>Nombre</th>            <
            <th>Descripcion</th>
            <th>Acciones</th>
                       
        </tr>
    </thead>

    <tbody>       

        @foreach ($tags as $t)
            <tr>
                <td>{{ $t->id }}</td>
                <td>{{ $t->name }}</td>                
                <td>{{ $t->descripcion }}</td>                
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('tags.show',$t->id)}}">Ver</a>
                    <a class="btn btn-warning btn-sm" href="{{ route('tags.edit',$t->id)}}">Editar</a>
                    <form action="{{ route('tags.destroy',$t->id)}}" method="post" class="d-inline">
                        {!!method_field('DELETE')!!}
                        {!! csrf_field() !!}
                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                    </form>                 
                   
                </td>           
               
            </tr>
                    
        @endforeach
    
    </tbody>
</table>

@endsection