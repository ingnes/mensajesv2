<?php

namespace App\Http\Controllers;
use App\Models\Note;
use App\Models\Message;

use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $nota = new Note;

        // return view('notas.create')->with('nota',$nota);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $mensaje= Message::with('notes')->findorFail($request->idMensaje);

    //    dd($request->all());
       
       $mensaje->notes()->create($request->all());

       return redirect()->back()->with('info', 'Nota agregada al mensaje exitosamente');

       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
