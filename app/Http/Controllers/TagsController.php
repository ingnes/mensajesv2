<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();    

        //return view('mensajes.index', compact('mensajes'));
        return view('tags.index')->with('tags',$tags);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tag = new Tag;
        return view('tags.create')->with('tag',$tag);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {               
        $this->validate($request, [
            'name' => 'required|unique:tags,name',
            'descripcion' => 'max:255'           
        ]);       
        
        Tag::create($request->all());
        // $tag->name = $request->name;
        // $tag->descripcion = $request->descripcion;
        // $tag->save();

        return redirect()->back()->with('info','Eiqueta creada con exito');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tag = Tag::findorFail($id);

        return view('tags.show')->with('tag',$tag);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag = Tag::findorFail($id);

        return view('tags.edit')->with('tag',$tag);
        
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:tags,name,'.$id,
            'descripcion' => 'max:255'           
        ]);
        
        $tag = Tag::findorFail($id);
        $tag->update($request->all());
        
        return redirect()->back()->with('info','Etiqueta actualizada');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tag::findorFail($id)->delete();
        
        return redirect()->back()->with('info','Etiqueta eliminada');
    }
}
