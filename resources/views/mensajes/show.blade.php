@extends('adminlte::page')

@section('title', 'Mensajes')

@section('content_header')
    <h1>Bienvenido a mensajes 😎✉</h1>
@stop

@section('content')

<h1> Mensaje de {{ $mensaje->nombre }} - {{ $mensaje->email }}</h1>
<p> <b> {{ $mensaje->mensaje }} </b></p>


@endsection