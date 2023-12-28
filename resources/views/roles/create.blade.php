@extends('adminlte::page')

@section('title', 'Crear Rol')

@section('content_header')
    <h1 class=" col-6 alert alert-info">Nuevo Rol</h1>
@stop


@section('content')

    @if (Session()->has('info'))
        <div class="alert alert-success">{{ Session('info')}}</div>
    @endif

    <form action="{{ route('roles.store') }}" method="POST">        
        {!! csrf_field() !!}             
    @include('roles.fields', ['rol' => $rol, 'btnText'=> 'Grabar'])
    </form>

@endsection