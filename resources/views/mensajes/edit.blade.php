@extends('adminlte::page')

@section('title', 'Edcion de Mensajes')

@section('content')

<h4 class="alert alert-warning col-12 col-md-12 col-sm-12 col-lg-12"> Edicion de mensaje</h4>

<div class="row mx-1 mt-2">
  <div class="ml-auto">
    <button type="button" class="btn btn-success btn-sm mr-2 mb-2 showModal"
    data-bs-toggle="modal" data-bs-target="#modalAddNote"> <i class="fa fa-plus"></i> Nueva Nota</button>
  </div>
</div>


@if (Session()->has('info'))
<div class="alert alert-success"> {{ Session('info') }}</div>
@endif


<form action="{{ route('mensajes.update',$mensaje->id)}}" method="POST"> 
    {!!method_field('PUT')!!}
    {!! csrf_field() !!}    

     <div class="row">

      <div class="col-12 col-md-4 col-sm-4 col-lg-4">
          <h5 class="alert alert-info">Mensaje 📧</h5>
          <div class="form-group">
            <label class="form-label" for="nombre">Nombre </label>
            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ $mensaje->nombre }}">
            @if ($errors->first('nombre'))
              <span class="alert alert-danger btn btn-sm">{{$errors->first('nombre')}}</span>
            @endif
          </div>
          
          <div class="form-group">
            <label class="form-label" for="email">Email </label>
            <input class="form-control" autocomplete="true" type="email" id="email" name="email" value="{{$mensaje->email }}">
            @if ($errors->first('email'))
              <span class="alert alert-danger btn btn-sm"> {{$errors->first('email') }}</span> 
            @endif                  
          </div>
      
          <div class="form-group">
            <label class="form-label" for="mensaje">Mensaje</label>
            <textarea class="form-control" style="resize:none;"
              name="mensaje" id="mensaje" cols="30" rows="5"> {{ $mensaje->mensaje }}</textarea>
              @if ($errors->first('mensaje'))
              <span class="alert alert-danger btn btn-sm">{{$errors->first('mensaje')}}</span> 
            @endif                          
          </div>
    
      </div>

      <div class="col-12 col-md-4 col-sm-4 col-lg-4">
            <h5 class="alert alert-info">Etiquetas 🏷</h5>
            <div class="row">           
              @foreach ($tags as $tag )                
                  <div class="checkbox mb-10 pb-2 col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <input type="checkbox" name="tags[]" id="tags_{{$tag->id}}" {{ $mensaje->tags->pluck('id')->contains($tag->id) ? 'checked' : 'none' }} value="{{$tag->id}}">
                      {{ $tag->name}}
                  </div>
              @endforeach
              @if ($errors->first('tags'))
                  <span class="alert alert-danger btn btn-sm"> {{$errors->first('tags') }}</span> 
              @endif
            </div>
      </div>

      <div class="col-12 col-md-4 col-sm-4 col-lg-4">
         <h5 class="alert alert-info"> Notas 🗒</h5>
          @forelse ($mensaje->notes as $nota)
            <div class="row mt-2 mx-1">
               <textarea name="notes[{{$nota->id}}]" id="nota_{{$nota->id}}" cols="30" rows="5" style="resize:none"> {{ $nota->body }}</textarea>
            </div>
                          
          @empty
              <h5 class="alert alert-warning bold">No hay notas cargadas</h5>
          @endforelse


      </div>

     </div>

     <div class="col-12 col-md-12 col-sm-12 col-lg-12 text-center">

       <button type="submit" class="btn btn-success btn-md">Actualizar</button>

     </div>
      
</form>

@include('notas.create', ['mensaje' => $mensaje])

@endsection

@section('js')

<script type="text/javascript">

    jQuery(document).ready(function () 
    { 

      $('body').on('click', '.showModal', function () {
        $('#modalAddNote').modal('show');
      });
      
      $('body').on('click', '.closeModal', function () {
        $('#frmAddNote')[0].reset();
        $('#modalAddNote').modal('hide');
      });
    
    });
  
</script>

   
@stop



