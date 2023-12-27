@extends('adminlte::page')

@section('title', 'Ver Usuario')

@section('content')

<div class="card">
    <div class="card-title text-left alert alert-info">
         Ver usuario 👥
    </div>
    <div class="card-body">
       
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <table class="table table-striped table-hover table-bordered">
                    <tbody>
                        <tr> 
                            <td><strong>Nombre</strong></td>
                            <td> {{ $usuario->name }}</td>
                        </tr>

                        <tr> 
                            <td><strong>Email</strong></td>
                            <td> {{ $usuario->email }}</td>
                        </tr>

                        <tr> 
                            <td><strong>Activo</strong></td>
                            <td> {{ $usuario->active ? '✅' : '❌' }}</td>
                        </tr>

                        <tr> 
                            <td><strong>Roles</strong></td>
                            <td>
                                <ul> 
                                    @foreach ($usuario->roles as $rol)
                                        <li class="text-left">{{ $rol->display_name }}</li>                                        
                                    @endforeach
                                </ul>

                            </td>
                        </tr>

                    </tbody>
                </table>
               

            </div>

        </div>

    </div>
</div>

@endsection