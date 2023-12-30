@extends('adminlte::page')

@section('title', 'Editar etiqueta')

@section('content_header')
    <h1 class="text-center alert alert-info">Módulo de etiquetas 😎✉</h1>
@stop


@section('content')    

    @if (Session()->has('info'))
    <div class="alert alert-success">{{ Session('info')}}</div>
    @endif

    <form action="{{route('tags.update',$tag->id)}}" method="post">
        {!!method_field('PUT')!!}
        {!! csrf_field() !!}    
        @include('tags.fields', ['tag' => $tag, 'btnText' => 'Actualizar'])
    </form>

@endsection