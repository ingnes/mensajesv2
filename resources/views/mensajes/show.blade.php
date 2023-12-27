@extends('adminlte::page')

@section('title', 'Ver mensaje')

@section('content')

<div class="card">
    <div class="card-title text-left alert alert-info">
         Ver mensaje ✉
    </div>
       
    <div class="card-body">
       
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <table class="table table-striped table-hover table-bordered">
                    <tbody>
                        <tr> 
                            <td><strong>Nombre</strong></td>
                            <td> {{ $mensaje->nombre }}</td>
                        </tr>

                        <tr> 
                            <td><strong>Email</strong></td>
                            <td> {{ $mensaje->email }}</td>
                        </tr>

                        <tr> 
                            <td><strong>Cuerpo del mensaje</strong></td>
                            <td> {{ $mensaje->mensaje }}</td>
                        </tr>                       

                    </tbody>
                </table>
               

            </div>

        </div>

    </div>
</div>

@endsection