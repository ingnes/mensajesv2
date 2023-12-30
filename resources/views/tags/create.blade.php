@extends('adminlte::page')

@section('title', 'Crear Etiqueta')

@section('content_header')
    <h1 class=" col-6 alert alert-info">Nueva Etiqueta</h1>
@stop


@section('content')

    @if (Session()->has('info'))
        <div class="alert alert-success">{{ Session('info')}}</div>
    @endif

    <form action="{{ route('tags.store') }}" method="POST">        
        {!! csrf_field() !!}             
    @include('tags.fields', ['tag' => $tag, 'btnText'=> 'Grabar'])
    </form>

@endsection