@extends('adminlte::page')

@section('title', 'Editar usuario')

@section('content_header')
    <h2 class="alert alert-info">Edicion de perfil de usuario</h2>
@stop

@section('content')

@if (Session()->has('info'))
<div class="alert alert-success"> {{ Session('info') }}</div>
@endif

<form action="{{ route('usuarios.update',$usuario->id)}}" method="POST">
    {!!method_field('PUT')!!}
    {!! csrf_field() !!}

<div class="row">
     
    <div class="col-4 col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <h5 class="alert alert-info">Perfil 👤</h5>
        <div class="form-group">
            <label class="form-label" for="name">Nombre </label>
            <input class="form-control" type="text" name="name" id="name" value="{{ $usuario->name }}">
            <span class="error">{{$errors->first('name')}}</span>
        </div>
          
        <div class="form-group">
            <label class="form-label" for="email">Email </label>
            <input class="form-control" type="email" id="email" name="email" value="{{ $usuario->email }}">
            <span class="error"> {{$errors->first('email') }}</span>                   
        </div>       

    </div>

    <div class="col-4 col-xs-12 col-sm-6 col-md-4 col-lg-4 ">
        <h5 class="alert alert-info">Roles 👥</h5>
        <div class="row">           
            @foreach ($roles as $rol )                
                <div class="checkbox mb-10 pb-2 col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <input type="checkbox" name="roles[]" id="roles" {{ $usuario->roles->pluck('id')->contains($rol->id) ? 'checked' : 'none' }} value="{{$rol->id}}">
                    {{ $rol->display_name}}
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="col-8 text-center mt-5">
    <button type="submit" class="btn btn-success btn-md">Actualizar</button>
</div>

</form>





@endsection