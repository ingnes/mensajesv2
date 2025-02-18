@extends('adminlte::page')

@section('title', 'Mensajes')

@section('content_header')
    <Example> </Example>
    <h1 class="text-center alert alert-info">Bienvenido a mensajes 😎✉</h1>
@stop

@section('content')

@if (Session()->has('success'))
    <h3 class="alert alert-success text-center"> {{ Session('success') }}</h3>
@endif

@if (Session()->has('failed'))
    <h3 class="alert alert-danger text-center"> {{ Session('failed') }}</h3>
@endif
  

<div class="row justify-content-end mb-2">
    <a href="{{route('mensajes.create')}}" class="btn btn-success btn-sm mr-2 mb-2"> <i class="fa fa-plus"></i> Nuevo Mensaje</a>
</div>

{{-- <div class="row float-right mx-1 mt-2">
    <a href="{{route('mensajes.pdf')}}" target="_blank" class="btn btn-danger btn-sm mr-2 mb-2"> <i class="fa fa-file-pdf"></i> PDF</a>
</div> --}}

{{-- {{ dd($mensajes) }} --}}

<div class="card">

    <div class="card-body">

        @if ($mensajes->count())       
        
            <x-adminlte-datatable id="mensajes" :heads="$heads" :config="$config" head-theme="dark" striped hoverable bordered with-buttons>
                @foreach($mensajes as $m)
                    <tr>
                        <td>{{ $m->created_at->format('d/m/Y') }}</td>
                        <td>{{ $m->recibido_por->name }}</td>
                        <td>{{ $m->recibido_por->email }}</td>
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
            </x-adminlte-datatable>
        
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