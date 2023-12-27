@extends('adminlte::page')

@section('title', 'Edcion de Mensajes')

@section('content_header')
    <h2 class="alert-success">Bienvenido a mensajes 😎✉</h2>
@stop

@section('content')

<h4 class="alert alert-info"> Edicion de mensaje</h4>

@if (Session()->has('info'))
<div class="alert alert-success"> {{ Session('info') }}</div>
@endif

 <form action="{{ route('mensajes.update',$mensaje->id)}}" method="POST">
    {!!method_field('PUT')!!}
    {!! csrf_field() !!}

      <div class="form-group">
        <label class="form-label" for="nombre">Nombre </label>
        <input class="form-control col-xs-4 col-md-4" type="text" name="nombre" id="nombre" value="{{ $mensaje->nombre }}">
        <span class="error">{{$errors->first('nombre')}}</span>
      </div>
      
      <div class="form-group">
        <label class="form-label" for="email">Email </label>
        <input class="form-control col-xs-4 col-md-4" type="email" id="email" name="email" value="{{$mensaje->email }}">
        <span class="error"> {{$errors->first('email') }}</span>                   
      </div>

      <div class="form-group">
        <label class="form-label" for="mensaje">Mensaje</label>
        <textarea class="form-control col-xs-6 col-md-6" style="resize:none;"
         name="mensaje" id="mensaje" cols="30" rows="5"> {{ $mensaje->mensaje }}</textarea>
        <span class="error">{{$errors->first('mensaje')}}</span>                           
      </div>

      <button type="submit" class="btn btn-success btn-md">Actualizar</button>
      
 </form>

@endsection