<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Tag;
use Carbon\Carbon;
use App\Exports\MessagesExport;
use App\Imports\MessagesImport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;


class MessagesController extends Controller
{
    
    public function __construct() {

        $this->middleware('auth', ['except' => ['create','store']]);
    }


    public function index()
    {
       //obtenemos los mensajes de la bd con sus relaciones
        $mensajes = Message::with(['user','tags','notes'])->get(); 
        
      // Asignamos la cabecera al datable
       $heads = [
        'Nombre',
        'Email',
        'Mensaje',
        'Notas',
        'Etiquetas',
        'Acciones',
       ];

       $data = [
        'mensajes' => $mensajes,
        'heads'    => $heads,
       ];

       //return view('mensajes.index', compact('mensajes'));
       return view('mensajes.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mensajes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
       if (auth()->guest()) {

        $this->validate($request, [
            'nombre' => 'required',
            'email' => 'required|email',
            'mensaje' => 'required|min:5|max:250'
        ]);

       } else {

        $this->validate($request, [                    
            'mensaje' => 'required|min:5|max:250'
        ]);


       }      
        
       
       $mensaje = new Message;       

       if (auth()->guest()) {
        $mensaje->nombre = $request->nombre;
        $mensaje->email = $request->email;
       } else {
        $mensaje->nombre = auth()->user()->name;
        $mensaje->email = auth()->user()->email;
        $mensaje->user_id = auth()->user()->id;
       }
       
       $mensaje->mensaje = $request->mensaje;       
       $mensaje->save();

       return redirect()->back()->with('info','El mensaje fue enviado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mensaje = Message::with(['tags'])->findorFail($id);

        return view('mensajes.show', compact('mensaje'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mensaje = Message::with(['tags','notes'])->findorFail($id);      

        $tags = Tag::all();

        return view('mensajes.edit',compact('mensaje','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {            
          
        $this->validate($request, [
            'nombre' => 'required',
            'email' => 'required|email',
            'mensaje' => 'required|min:5|max:250'
        ]);
       
       $mensaje = Message::with(['notes'])->findorFail($id);

    //    dd($mensaje);                                   
       $mensaje->update($request->all());

       //actualizo en tabla pivote taggable       
       $mensaje->tags()->sync($request->tags); 
       
      //actualizo en notas     
       foreach ($mensaje->notes as $nota){     
        
            foreach ($request->notes as $key => $value) {
                
                if ($key === $nota->id) {
                    $nota->update(['body' => $value]);
                }
            }
        
       }

       return redirect()->back()->with('info','Mensaje actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Message::findorFail($id)->delete();

        return redirect()->route('mensajes.index');
    }
    
    public function pdf() {

        $mensajes = Message::all();
        
        $pdf = Pdf::loadView('mensajes.pdf', compact('mensajes'));

        return $pdf->stream();

    }
    
    public function export() {
        return Excel::download(New MessagesExport,'mensajes.xlsx');
    }

    // public function import() {        
       
    //     $path = "/imports/";
    //     $files = Storage::disk('local')->files($path);         

    //     if ($files) {
    //         //obtengo todos los archivos en storage/app/imports
    //         foreach ($files as $file) :                                 
    //             // Importar el archivo utilizando la clase MessagesImport
    //             try{
    //                 Excel::import(new MessagesImport, $file);  
    //             }
    //             catch (\Maatwebsite\Excel\Validators\ValidationException $e) {

    //                 // dd($file);

    //                 $failures = $e->failures();   
    //                 // dd($failures);  
    //                 foreach ($failures as $failure) {
                        
    //                     $filename = pathinfo($file, PATHINFO_FILENAME);                       

    //                     $error = [
    //                         'archivo' => basename($file),
    //                         'fila' => $failure->row(),  // row that went wrong
    //                         'columna' => $failure->attribute(), // either heading key (if using heading row concern) or column index
    //                         'error' => $failure->errors(), // Actual error messages from Laravel validator
    //                         'valores' =>  $failure->values() // The values of the row that has failed.
    //                     ];

    //                     Storage::disk('local')->put('failed/'.$filename.'.txt', json_encode($error));
    //                 }

    //             }
                         

    //         endforeach;
    //     }        

    //     // // Redirigir con un mensaje de éxito
    //      return redirect()->back()->with('success', 'Datos importados con éxito!');
    // }


    public function import(Request $request) {        
               
        // dd(request()->file('file'));
        
        if (!request()->file('file')) {
            return redirect()->back()->with('failed' ,'Error en importacion, por favor seleccione archivo a importar');
        }

        $tipo = 'success';
        $mensaje = 'Datos importados con éxito!';


        try{

            $file = request()->file('file');
            // dd($file);
            // Importar el archivo utilizando la clase MessagesImport
            Excel::import(new MessagesImport, request()->file('file'));
       
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {

            $failures = $e->failures();     
            foreach ($failures as $failure) {

                $originalname = $file->getClientOriginalName();    
                $filename = pathinfo($originalname, PATHINFO_FILENAME);                       

                    $error = [
                        'archivo' => $originalname,
                        'fila' => $failure->row(),  // row that went wrong
                        'columna' => $failure->attribute(), // either heading key (if using heading row concern) or column index
                        'error' => $failure->errors(), // Actual error messages from Laravel validator
                        'valores' =>  $failure->values() // The values of the row that has failed.
                    ];

                    Storage::disk('local')->put('failed/'.$filename.'.txt', json_encode($error));

                   $tipo = 'failed';
                   $mensaje = 'Hubo un error en la importacion, chequear el archivo de logs';
               
            }
          
            
        }

        catch (\Exception $e) {
                 $originalname = $file->getClientOriginalName();    
                 $filename_exception = pathinfo($originalname, PATHINFO_FILENAME);
                 $error =  $e->getMessage();
                 Storage::disk('local')->put('failed/'.$filename_exception.'.txt', json_encode($error));
        }                        
         
        // Redirigir con un mensaje de éxito
        return redirect()->back()->with($tipo, $mensaje);
    }   

}
