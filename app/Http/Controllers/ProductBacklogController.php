<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductBacklog;

class ProductBacklogController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:productbackloges.index')->only('index');
        $this->middleware('can:productbackloges.create')->only('create','store');
        $this->middleware('can:productbackloges.edit')->only('edit','update');
        $this->middleware('can:productbackloges.destroy')->only('destroy');


    }
   
    public function index()
    {
        $productbackloges = ProductBacklog::orderBy('created_at', 'asc')->get();
        return view('productbacklog.index', compact('productbackloges'));
    }

  
    public function create()
    {
      
        $productbackloges = new ProductBacklog();
        return view('productbacklog.create', compact('productbackloges'));
    }

    public function store(Request $request)
    {
       
        $productbackloges = ProductBacklog::create($request->all());

        return redirect()->route('productbackloges.index')
            ->with('success', 'Tarea creada existosamente');
    }

    public function show(string $id)
    {
        //
    }

   
    public function edit(ProductBacklog $productbacklog)
    {
        return view('productbacklog.edit', compact('productbacklog'));
    }

  
    public function update(Request $request, ProductBacklog $productbacklog)
    {   
       
        $productbacklog->update($request->all());

        return redirect()->route('productbackloges.index', $productbacklog)->with('info', 'Tarea Actualizado');
    }
    
    
  
    public function destroy(ProductBacklog $productbacklog)
    {
    

        $productbacklog->delete();
        return redirect()->route('productbackloges.index')->with('success', 'El rol se elimino con exito');
    }

}
