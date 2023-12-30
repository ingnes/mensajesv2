@extends('adminlte::page')

@section('title', 'Ver Eriqueta')

@section('content')

<div class="card">
    <div class="card-title text-left alert alert-info">
         Ver Etiqueta 🏷
    </div>
       
    <div class="card-body">
       
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <table class="table table-striped table-hover table-bordered">
                    <tbody>
                        <tr> 
                            <td><strong>Nombre</strong></td>
                            <td> {{ $tag->name }}</td>
                        </tr>                        

                        <tr> 
                            <td><strong>Descripcion</strong></td>
                            <td> {{ $tag->descripcion }}</td>
                        </tr>                                          

                    </tbody>
                </table>
               

            </div>

        </div>

    </div>
</div>

@endsection