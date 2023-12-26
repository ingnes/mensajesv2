@extends('adminlte::page')

@section('title', 'Mensajes')

@section('content_header')
    <h1 class="text-center alert alert-info">Bienvenido a mensajes 😎✉</h1>
@stop

@section('content')

@if (Session()->has('success'))
    <h3 class="alert alert-success text-center"> {{ Session('success') }}</h3>
@endif

@if (Session()->has('errors'))
    <h3 class="alert alert-danger text-center"> {{ Session('errors') }}</h3>
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

@if ($mensajes->count())

    <table class="table table-striped table-hover text-center">    
        <thead>
            <tr class="table-info">
                <th>Nombre</th>
                <th>Email</th>
                <th>Mensaje</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>       

            @foreach ($mensajes as $m)
                <tr>
                    <td>{{ $m->nombre }}</td>
                    <td>{{ $m->email }}</td>
                    <td>{{ $m->mensaje }}</td>
                    <td> 
                        <a href="{{route('mensajes.show',$m->id)}}">👁</a>
                        <a href="{{route('mensajes.edit',$m->id)}}">📗</a>
                        <form action="{{route('mensajes.destroy',$m->id)}}" method="POST" style="display:inline">
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