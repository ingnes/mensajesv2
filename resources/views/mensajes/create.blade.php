<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mensajes</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        
        <!-- Bootstrap -->
            <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])      
       
    </head>
    <body>
        <div class="card">
            @if (Route::has('login'))
                <div class="card-title mx-auto">
                        @auth
                            <a href="{{ route('mensajes.index')}}">Mensajes </a>
                        @else
                            <a href="{{ route('login') }}" >Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                </div>
            @endif

            <div class="card-body">              

                <div class="row">
                    @if (Session()->has('failed'))
                        <h4 class="alert alert-danger text-center"> {{ session('failed') }}</h4>                         
                    @endif

                    @if (Session()->has('info'))
                        <h4 class="alert alert-success text-center"> {{ session('info') }}</h4>
                    @endif
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 mx-auto">                       

                        <div class="panel panel-warning">
                            <div class="panel-heading">                              
                            </div>

                            <div class="panel-body"> 
                                
                                @if (!session()->has('info') && !session()->has('failed') )
                                    
                                    <h3 class="alert alert-info text-center">Escribeme</h3>
        
                                    <form action="{{ route('mensajes.store')}}" method="POST" class="text-center">
                                        {!! csrf_field() !!}
            
                                        @if (auth()->guest())
            
                                            <div class="form-group">
                                                <label class="form-label" for="nombre">Nombre </label>
                                                <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"/>
                                                @if ($errors->first('nombre'))
                                                    <span class="alert alert-danger btn btn-sm">{{$errors->first('nombre')}}</span> 
                                                @endif                              
                                            </div>
            
                                            <div class="form-group">
            
                                                <label class="form-label" for="email">Email </label>
                                                <input class="form-control" autocomplete="true" type="email" name="email" id="email" value="{{ old('email') }}"/>
                                                @if ($errors->first('email'))
                                                    <span class="alert alert-danger btn btn-sm"> {{$errors->first('email') }}</span>
                                                @endif
            
                                            </div> 
                                            
                                        @else  

                                                <div class="row">
                                                    {{-- <label for="Usuario" class="form-label"> Usuario</label>
                                                    <select name="" id="" class="form-control" placeholder="Seleccione un usuario">
                                                        
                                                    </select> --}}

                                                    <x-adminlte-select2 name="recipient_id" label="usuario" label-class="text-lightblue"
                                                    igroup-size="lg" data-placeholder="Seleccione un usuario...">
                                                    <x-slot name="prependSlot">
                                                        <div class="input-group-text bg-gradient-info">
                                                            <i class="fas fa-car-side"></i>
                                                        </div>
                                                    </x-slot>
                                                    <option/>
                                                     @foreach ($users as $user)
                                                     <option value="{{$user->id}}">{{$user->name}}</option>
                                                     @endforeach                                            
                                                </x-adminlte-select2>
                                                </div>
                                    
                                        @endif 
                                        
                                        <div class="form-group">
            
                                            <label class="form-label" for="mensaje">Mensaje</label>
                                            <textarea style="resize:none;" class="form-control" name="mensaje" id="mensaje" cols="30" rows="5"> {{ old('mensaje') }}</textarea>
                                            @if ($errors->first('mensaje'))
                                                <span class="alert alert alert-danger btn btn-sm">{{$errors->first('mensaje')}}</span>
                                            @endif
            
                                        </div>
            
            
                                        <button type="submit" class="btn btn-primary btn-lg mt-5">Enviar</button>
                                    </form>
                                    
                                @endif           
              
                            </div>
                        </div>

                    </div>
                </div>
               
            </div>
        </div>
    </body>
</html>
