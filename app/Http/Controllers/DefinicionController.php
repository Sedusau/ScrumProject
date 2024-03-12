<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreDefinicionRequest;
use App\Models\Definicion;
use App\Http\Controllers\DB;

class DefinicionController extends Controller
{


    public function __construct()
    {
        $this->middleware('can:definiciones.index')->only('index');
        $this->middleware('can:definiciones.create')->only('create','store');
        $this->middleware('can:definiciones.edit')->only('edit','update');
        $this->middleware('can:definiciones.destroy')->only('destroy');


    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $definiciones = Definicion::orderBy('created_at', 'asc')->get();
        return view('definicion.index', compact('definiciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      
        $definicion = new Definicion();
        return view('definicion.create', compact('definicion'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDefinicionRequest $request)
    {
       
        $definicion = new Definicion();
        $definicion ->tarea=$request->input('tarea');
        $definicion ->usuario_id=auth()->id();
        $definicion->save();
       // $definicion = Definicion::create($request->all());

        return redirect()->route('definiciones.index')
            ->with('success', 'Tarea creada existosamente');
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
    public function edit($id)
    {
        $definicion = Definicion::find($id);
        return view('definicion.edit', compact('definicion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreDefinicionRequest $request, $id)
    {   
       
        $definicion = Definicion::find($id);
       
        
        $definicion ->tarea=$request->input('tarea');
          $definicion ->usuario_id = auth()->id();
       
        $definicion->save();
    
        // Guarda el modelo en la base de datos
      
       
       
        return redirect()->route('definiciones.index')
        ->with('success', 'Definicion Actualizada');
    }
    
    
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    
        $definicion = Definicion::find($id)->delete();

        return redirect()->route('definiciones.index')
            ->with('success', 'Definicion borrado existosamente');
    }
}
