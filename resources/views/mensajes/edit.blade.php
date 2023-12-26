@extends('adminlte::page')

@section('title', 'Mensajes')

@section('content_header')
    <h2 class="alert-success">Bienvenido a mensajes 😎✉</h2>
@stop

@section('content')

<h2 class="mt-10 bg-gradient-to-r from-indigo-400 to-green-600 bg-clip-text 
text-center text-4xl font-extrabold text-transparent sm:text-xl"> Edicion de mensaje</h2>

 <form action="{{ route('mensajes.update',$mensaje->id)}}" method="POST" class="text-center">
    {!!method_field('PUT')!!}
    {!! csrf_field() !!}
      <label class="font-boldr" for="nombre">Nombre </label>
      <input class="block mx-auto" type="text" name="nombre" value="{{ old('nombre') }}">
      <span class="error">{{$errors->first('nombre')}}</span>
      

      <label class="font-bold" for="email">Email </label>
      <input class="block mx-auto" type="email" name="email" value="{{ old('email') }}">
      <span class="error"> {{$errors->first('email') }}</span>                   
      

      <label class="font-bold" for="mensaje">Mensaje</label>
      <textarea class="block mx-auto" style="resize:none;" name="mensaje" cols="30" rows="5" value="{{ old('mensaje') }}"></textarea>
      <span class="error">{{$errors->first('mensaje')}}</span>                           

      <button type="submit" class="mt-5 block rounded bg-blue-500 px-3 py-1 text-white mx-auto">Enviar</button>
 </form>

@endsection