@extends('adminlte::page')

@section('title', 'Editar usuario')

@section('content_header')
    <h2 class="alert alert-info">Edicion de perfil de usuario</h2>
@stop

@section('content')

<h4 class="alert alert-info">Perfil 👨‍🎓</h4>

 <form action="{{ route('usuarios.update',$usuario->id)}}" method="POST">
    {!!method_field('PUT')!!}
    {!! csrf_field() !!}
    <div class="form-group">
        <label class="form-label" for="name">Nombre </label>
        <input class="form-control col-xs-4 col-md-4" type="text" name="name" id="name" value="{{ $usuario->name }}">
        <span class="error">{{$errors->first('name')}}</span>
    </div>
      
    <div class="form-group">
        <label class="form-label" for="email">Email </label>
        <input class="form-control col-xs-4 col-md-4" type="email" id="email" name="email" value="{{ $usuario->email }}">
        <span class="error"> {{$errors->first('email') }}</span>                   
    </div>    

    <button type="submit" class="btn btn-success btn-md">Actualizar</button>
 </form>

@endsection