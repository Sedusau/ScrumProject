<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Aws\Comprehend\ComprehendClient;
use Aws\Signature\SignatureV4;

use App\Models\HistoriaUsuario;

class HistoriausuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:historiausuarios.index')->only('index');
        $this->middleware('can:historiausuarios.create')->only('create','store');
        $this->middleware('can:historiausuarios.edit')->only('edit','update');
        $this->middleware('can:historiausuarios.destroy')->only('destroy');


    }
   
    public function index()
    {
        $historiausuarios = HistoriaUsuario::orderBy('created_at', 'asc')->get();
        return view('historiausuario.index', compact('historiausuarios'));
    }

  
    public function create()
    {
      
        $historiausuarios = new Historiausuario();
        return view('historiausuario.create', compact('historiausuarios'));
    }

    public function store(Request $request)
    {
       
        $historiausuarios= Historiausuario::create($request->all());

        return redirect()->route('historiausuarios.index')
            ->with('success', 'Historia usuario creada existosamente');
    }

    public function show(string $id)
    {
        //
    }

   
    public function edit(HistoriaUsuario $historiausuario)
    {
        return view('historiausuario.edit', compact('historiausuario'));
    }

  
    public function update(Request $request, HistoriaUsuario $historiausuario)
    {   
    // Actualizar la historia de usuario con los datos del formulario
    $historiausuario->update($request->all());

  
    return redirect()->route('historiausuarios.index')->with('success', 'Historia de Usuario Actualizada');
}

    
  
    public function destroy(HistoriaUsuario $historiausuario)
    {
    

        $historiausuario->delete();
        return redirect()->route('historiausuarios.index')->with('success', 'Historia de Usuario se elimino con exito');
    }

}
