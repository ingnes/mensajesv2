@extends('adminlte::page')

@section('title', 'Editar Rol')

@section('content_header')
    <h1 class="text-center alert alert-info">Bienvenido a mensajes 😎✉</h1>
@stop


@section('content')    

    @if (Session()->has('info'))
    <div class="alert alert-success">{{ Session('info')}}</div>
    @endif

    <form action="{{route('roles.update',$rol->id)}}" method="post">
        {!!method_field('PUT')!!}
        {!! csrf_field() !!}    
        @include('roles.fields', ['rol' => $rol, 'btnText' => 'Actualizar'])
    </form>

@endsection