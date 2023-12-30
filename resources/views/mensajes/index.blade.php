@extends('adminlte::page')

@section('title', 'Roles')

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

<div>
     <a href="{{url('mensajes-exportar')}}">Exportar</a> 
     {{-- <a href="{{url('mensajes-importar')}}">Importar</a>       --}}
</div>

<div>
    <form action="{{url('mensajes-importar')}}" method="post" enctype="multipart/form-data" >
        {!! csrf_field() !!}
        <input type="file" name="file">
        <button type="submit">Importar</button>   
    </form>

</div>

<div class="row float-left mx-1 mt-2">
    <a href="{{route('mensajes.create')}}" class="btn btn-success btn-sm mr-2 mb-2"> <i class="fa fa-plus"></i> Nuevo Mensaje</a>
</div>

<div class="row float-right mx-1 mt-2">
    <a href="{{route('mensajes.pdf')}}" target="_blank" class="btn btn-danger btn-sm mr-2 mb-2"> <i class="fa fa-file-pdf"></i> PDF</a>
</div>

{{-- {{ dd($mensajes) }} --}}

@if ($mensajes->count())

    <table class="table table-striped table-hover text-center">    
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

        <tbody>       

            @foreach ($mensajes as $m)
                <tr>
                    <td>{{ $m->nombre }}</td>
                    <td>{{ $m->email }}</td>
                    <td>{{ $m->mensaje }}</td>
                    <td>{{ $m->notes->pluck('body')->implode(' - ')}}</td>
                    <td>{{ $m->tags->pluck('name')->implode(', ')}}  </td>
                    <td> 
                        <a href="{{route('mensajes.show',$m->id)}}">👁</a>
                        <a href="{{route('mensajes.edit',$m->id)}}">📗</a>
                        <form action="{{route('mensajes.destroy',$m->id)}}" method="POST" class="d-inline">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <button type="submit"> ❌ </button>
                        </form>                    

                    </td>
                </tr>
                        
            @endforeach
        
        </tbody>
    </table>

@else
    <table class="table tabke-bordered table-stripped">
        <tbody>
            <tr> No hay mensajes cargados </tr>
        </tbody>
    </table>

@endif

@endsection