<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UsersController extends Controller
{
    
    public function __construct() {
        $this->middleware(['auth', 'roles'])->except('edit');
    }

    public function index()
    {
        $users = User::all()->sortBy('id');
       
        return view('usuarios.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = User::findorFail($id);

        return view('usuarios.show', compact('usuario'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = User::findorFail($id);
        $roles =  Role::all();     

        $this->authorize($usuario);
        
        return view('usuarios.edit', compact('usuario','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email'           
        ]);      
       
       $usuario = User::findorFail($id);
       $usuario->update($request->all());

       return redirect()->back()->with('info','Usuario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       User::findorFail($id)->delete();

       return redirect()->back()->with('info','Usuario eliminado');

    }

    public function cambiaEstado($id) { 
        
        $active = !User::findorFail($id)->active;      

        User::findorFail($id)->update([
            'active' => $active
        ]);

        return redirect()->back();
    }
   

}
