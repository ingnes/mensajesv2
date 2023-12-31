@extends('adminlte::page')

@section('title', 'Editar usuario')

@section('content_header')
    <h2 class="alert alert-info col-12 col-xs-8 col-sm-8 col-md-8 col-lg-8">Edicion de perfil de usuario</h2>
@stop

@section('content')

@if (Session()->has('info'))
<div class="alert alert-success"> {{ Session('info') }}</div>
@endif

<form action="{{ route('usuarios.update',$usuario->id)}}" method="POST">
    {!!method_field('PUT')!!}
    {!! csrf_field() !!}

<div class="row">
     
    <div class="col-12 col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <h5 class="alert alert-info">Perfil 👤</h5>
        <div class="form-group">
            <label class="form-label" for="name">Nombre </label>
            <input class="form-control" type="text" name="name" id="name" value="{{ $usuario->name }}">
            @if ($errors->first('name'))
            <span class="alert alert-danger btn btn-sm">{{$errors->first('name')}}</span>
            @endif
        </div>
          
        <div class="form-group">
            <label class="form-label" for="email">Email </label>
            <input class="form-control" type="email" id="email" name="email" value="{{ $usuario->email }}">
            @if ($errors->first('email'))
                <span class="alert alert-danger btn btn-sm"> {{$errors->first('email') }}</span>  
            @endif                 
        </div>       

    </div>

    <div class="col-12 col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
        <h5 class="alert alert-info">Roles 👥</h5>
        <div class="row">           
            @foreach ($roles as $rol )                
                <div class="checkbox mb-10 pb-2 col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <input type="checkbox" name="roles[]" id="roles" {{ $usuario->roles->pluck('id')->contains($rol->id) ? 'checked' : 'none' }} value="{{$rol->id}}">
                    {{ $rol->display_name}}
                </div>
            @endforeach
             @if ($errors->first('roles'))
                <span class="alert alert-danger btn btn-sm"> {{$errors->first('roles') }}</span> 
            @endif
        </div>
    </div>
</div>

<div class="col-12 col-xs-8 col-sm-8 col-md-8 col-lg-8 text-center mt-5">
    <button type="submit" class="btn btn-success btn-md">Actualizar</button>
</div>

</form>





@endsection