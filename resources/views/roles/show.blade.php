@extends('adminlte::page')

@section('title', 'Ver Rol')

@section('content')

<div class="card">
    <div class="card-title text-left alert alert-info">
         Ver Rol 👥
    </div>
       
    <div class="card-body">
       
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <table class="table table-striped table-hover table-bordered">
                    <tbody>
                        <tr> 
                            <td><strong>Nombre</strong></td>
                            <td> {{ $rol->name }}</td>
                        </tr>

                        <tr> 
                            <td><strong>Alias</strong></td>
                            <td> {{ $rol->display_name }}</td>
                        </tr>

                        <tr> 
                            <td><strong>Descripcion</strong></td>
                            <td> {{ $rol->description }}</td>
                        </tr>

                        <tr> 
                            <td><strong>Activo</strong></td>
                            <td> {{ $rol->active ? '✅' : '❌' }}</td>
                        </tr>                        

                    </tbody>
                </table>
               

            </div>

        </div>

    </div>
</div>

@endsection