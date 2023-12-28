@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1 class="text-center alert alert-info">Modulo de Roles</h1>
@stop

@section('content')

@if (Session()->has('info'))
    <div class="alert alert-success"> {{Session('info')}}</div>
@endif

<table class="table table-striped table-hover text-center">    
    <thead>
        <tr class="table-info">
            <th>ID</th>
            <th>Nombre</th>
            <th>Rol Name</th>
            <th>Descripcion</th>
            <th>Acciones</th>
                       
        </tr>
    </thead>

    <tbody>       

        @foreach ($roles as $r)
            <tr>
                <td>{{ $r->id }}</td>
                <td>{{ $r->name }}</td>
                <td>{{ $r->display_name }}</td>
                <td>{{ $r->description }}</td>                
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('roles.show',$r->id)}}">Ver</a>
                    <a class="btn btn-warning btn-sm" href="{{ route('roles.edit',$r->id)}}">Editar</a>
                    <form action="{{ route('roles.destroy',$r->id)}}" method="post" class="d-inline">
                        {!!method_field('DELETE')!!}
                        {!! csrf_field() !!}
                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                    </form>
                   
                    <form action="{{ route('roles.estado',$r->id)}}" method="post" class="d-inline">
                        {!!method_field('PUT')!!}
                        {!! csrf_field() !!}
                        <button class="{{ $r->active ? 'btn btn-info btn-sm' : 'btn btn-danger btn-sm' }}" type="submit">{{ $r->active ? 'Activo' : 'Inactivo' }}</button>
                    </form>
                   
                </td>           
               
            </tr>
                    
        @endforeach
    
    </tbody>
</table>

@endsection