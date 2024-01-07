@extends('adminlte::page')

@section('title', 'Mensajes')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

@endsection

@section('content_header')
    <h1 class="text-center alert alert-info">Bienvenido a mensajes 😎✉</h1>
@stop

@section('content')

@if (Session()->has('success'))
    <h3 class="alert alert-success text-center"> {{ Session('success') }}</h3>
@endif

@if (Session()->has('failed'))
    <h3 class="alert alert-danger text-center"> {{ Session('failed') }}</h3>
@endif


    {{-- <div>
        <a href="{{url('mensajes-exportar')}}">Exportar</a> 
        {{-- <a href="{{url('mensajes-importar')}}">Importar</a>   </div>    --}}
    

{{-- <div>
    <form action="{{url('mensajes-importar')}}" method="post" enctype="multipart/form-data" >
        {!! csrf_field() !!}
        <input type="file" name="file">
        <button type="submit">Importar</button>   
    </form>

</div> --}}



{{-- <div class="row float-right mx-1 mt-2">
    <a href="{{route('mensajes.pdf')}}" target="_blank" class="btn btn-danger btn-sm mr-2 mb-2"> <i class="fa fa-file-pdf"></i> PDF</a>
</div> --}}

{{-- {{ dd($mensajes) }} --}}

<div class="row mb-1 mx-3 justify-content-end">
    <a href="{{route('mensajes.create')}}" class="btn btn-success btn-sm mr-2 mb-2"> <i class="fa fa-plus"></i> Nuevo Mensaje</a>
</div> 

<div class="card">   

    <div class="card-body">

        @if ($mensajes->count())      
        
            <table id="mensajes" class="table table-striped table-bordered table-hovered">
    
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Mensaje</th>
                        <th>Notas</th>
                        <th>Etiquetas</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
    
                @foreach($mensajes as $m)
                    <tr>
                        <td>{{ $m->nombre }}</td>
                        <td>{{ $m->email }}</td>
                        <td>{{ $m->mensaje }}</td>
                        <td>{{ $m->notes->pluck('body')->implode(' - ')}}</td>
                        <td>{{ $m->tags->pluck('name')->implode(', ')}}  </td>
                        <td> 
                            <a href="{{route('mensajes.show',$m->id)}}" title="ver" class="btn btn-info btn-xs"> <i class="fa fa-eye"></i></a>
                            <a href="{{route('mensajes.edit',$m->id)}}" title="editar" class="btn btn-success btn-xs"><i class="fa fa-pen"></i></a>
                            <form action="{{route('mensajes.destroy',$m->id)}}" method="POST" class="d-inline">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>
                            </form>                    
    
                        </td>
                        
                    </tr>
                @endforeach
            </table>
        
        @else
            <table class="table tabke-bordered table-stripped">
                <tbody>
                    <tr> No hay mensajes cargados </tr>
                </tbody>
            </table>
        
        @endif

    </div>


</div>


@endsection

@section('js')

<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"> </script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

<script>    

jQuery(document).ready(function () 
    { 
        new DataTable('#mensajes', {
            responsive: true,
            autoWidth:false,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-AR.json',
            },
           
        });

        
    
    });


</script>



@endsection