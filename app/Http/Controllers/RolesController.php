<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rol = new Role;
       
        return view('roles.create', compact('rol'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'display_name' => 'required'            
        ]);
        
        // $rol = new Role;
        // $rol->name = $request->name;
        // $rol->display_name = $request->display_name;
        // $rol->description = $request->description;
        // $rol->save();

        Role::create($request->all());

        return redirect()->back()->with('info','Rol agregado');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rol = Role::findorFail($id);

        return view('roles.show',compact('rol'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rol = Role::findorFail($id);

        return view('roles.edit', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'display_name' => 'required'                      
        ]);

        $rol = Role::findorFail($id);

        $rol->update($request->all());

        return redirect()->back()->with('info','Rol actualizado');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rol = Role::findorFail($id)->delete();

        return redirect()->back()->with('info','Rol eliminado');
    }

    public function cambiaEstado($id) { 
        
        $active = !Role::findorFail($id)->active;      

        Role::findorFail($id)->update([
            'active' => $active
        ]);

        return redirect()->back();
    }
}
