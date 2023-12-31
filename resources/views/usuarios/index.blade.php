@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1 class="text-center alert alert-info">Modulo de usuarios</h1>
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
            <th>Email</th>
            <th>Rol</th>
            <th>Acciones</th>
                       
        </tr>
    </thead>

    <tbody>       

        @foreach ($users as $u)
            <tr>
                <td>{{ $u->id }}</td>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>
                    <ul>
                        @foreach ($u->roles as $rol) 
                        <li class="text-left"> {{  $rol->display_name }} </li>                    
                        @endforeach
                    </ul>
                </td> 
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('usuarios.show',$u->id)}}">Ver</a>
                    <a class="btn btn-warning btn-sm" href="{{ route('usuarios.edit',$u->id)}}">Editar</a>
                    <form action="{{ route('usuarios.destroy',$u->id)}}" method="post" class="d-inline">
                        {!!method_field('DELETE')!!}
                        {!! csrf_field() !!}
                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                    </form>
                   
                    <form action="{{ route('usuarios.estado',$u->id)}}" method="post" class="d-inline">
                        {!!method_field('PUT')!!}
                        {!! csrf_field() !!}
                        <button class="{{ $u->active ? 'btn btn-info btn-sm' : 'btn btn-danger btn-sm' }}" type="submit">{{ $u->active ? 'Activo' : 'Inactivo' }}</button>
                    </form>
                   
                </td>           
               
            </tr>
                    
        @endforeach
    
    </tbody>
</table>

@endsection