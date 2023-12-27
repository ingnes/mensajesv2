@extends('adminlte::page')

@section('title', 'Error')

@section('content')

<div class="card">
    <div class="card-title text-left alert alert-info">
           Error de aplicacion
    </div>
       
    <div class="card-body">
       
        <div class="row">      
            <div class="alert alert-danger"> No tiene permisos para realizar la accion solicitada</div>
        </div>       

    </div>
</div>

@endsection