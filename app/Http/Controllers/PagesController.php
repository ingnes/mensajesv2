<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // declaro una propiedad protegida
    // protected $request;
    
    // // Le paso x parametro al constructor una instancia de la clase Request    
    // public function __construct(Request $request) {
        
    //     // a la propiedad protegida definida antes, le asigno la instancia de la clase Request que le paso x parametro
    //     // de esta forma  a traves del $this voy a tener acceso a toda la funcionalidad de la clase request
    //     // el $this hace referencia al pageController, es un objeto o una instancia del PageController
    //     $this->request = $request;
    // }

    
    function home() {
       return view('home');
    //    return response('Esta es una respuesta del servidor',201)
    //                  ->header('X-TOKEN','secret')
    //                  ->header('X-TOKEN2','secret2')
    //                  ->cookie('X-COOKIE','cookie');
    }

    function contact() {
        return view('contactos');
    }

    function saludos($nombre = 'Invitado') {

        $html = '<h2>Esto me lo ingresa el usuario por formulario</h2>'; // supongamos que me lo ingresan x formulario
        $script = '<script> alert("script ejecutado"); </script>'; // supongamos que me lo ingresan x formulario
        $consolas = 
        [
        //     "Play Station 4",
        //     "XBox One",
        //     "Wii U"
        ];
        return view('saludos', compact('nombre','html','script','consolas')); 

    }

    function docu() {        
       
        return view('docu');
    }

    // function mensaje() {

    //     // return 'Procesando el mensaje...';
    //     return $this->request->all();
    // }


    //La otra forma es pasarle la instancia de Request directamente al metodo
    //Esto es util si solo vamos a utilizar la clase request en este metodo
    //Laravel automaricamentre resolvera la clase y se la asignara a la variable $request
    function mensaje(Request $request) {

        $this->validate($request, [
            'nombre' => 'required',
            'email' => 'required|email',
            'mensaje' => 'required|min:5|max:250'
        ]);
        
        //return $request->all();

        $data = $request->all();
        // return response()->json(['data'=>$data], 201);
        //return redirect('/');
        //return redirect()->route('saludos');
        return back()->with('info','formulario enviado correctamente');

    }
    
}
