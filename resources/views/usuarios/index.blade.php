@extends('adminlte::page')

@section('title', 'Mensajes')

@section('content')

<h3 class="alert-success text-center"> Bienvenido al modulo de usuarios</h3>

<table class="table table-striped table-hover text-center">    
    <thead>
        <tr>
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
                <td></td>           
               
            </tr>
                    
        @endforeach
    
    </tbody>
</table>

@endsection