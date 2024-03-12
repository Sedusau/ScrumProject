<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SprintBacklog;
use Illuminate\Support\Facades\DB;


class SprintbacklogController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:sprintbackloges.index')->only('index');
        $this->middleware('can:sprintbackloges.create')->only('create','store');
        $this->middleware('can:sprintbackloges.edit')->only('edit','update');
        $this->middleware('can:sprintbackloges.destroy')->only('destroy');


    }
   
    public function index()
    {
        $sprintbackloges = SprintBacklog::orderBy('created_at', 'asc')->get();
        return view('sprintbacklog.index', compact('sprintbackloges'));
    }

  
    public function create()
    {
      
        return view('sprintbacklog.create');
    }

    public function store(Request $request)
    {
       
        $sprintBacklog = SprintBacklog::create($request->all());

        // Lógica para almacenar las tareas asociadas con el Sprint Backlog
        $tareasData = $request->input('tareas');
        foreach ($tareasData as $tareaData) {
            $sprintBacklog->tareas()->create($tareaData);
        }

        return redirect()->route('sprintbackloges.index')
            ->with('success', 'Sprint Backlog creado exitosamente');
    }

    public function show($id)
    {
        $sprint = SprintBacklog::findOrFail($id);

        return view('sprintbacklog.show', compact('sprint'));
    }

    public function updateEstado(Request $request, $id, $tareaId)
    {
       

        $sprint = SprintBacklog::findOrFail($id);

        // Asegúrate de que la tarea existe
        if ($tareaId < count($sprint->tareas)) {
            $tarea = $sprint->tareas[$tareaId];
            $nuevoEstado = $request->input('estado');

            // Verifica si el nuevo estado es válido ('pendiente' o 'finalizado')
            if ($nuevoEstado === 'pendiente' || $nuevoEstado === 'finalizado') {
                // Actualiza el estado de la tarea
                DB::table('tarea_sprints')
                    ->where('id', $tarea['id'])
                    ->update(['estado' => $nuevoEstado]);

                return redirect()
                    ->route('sprintbackloges.show', $sprint->id)
                    ->with('success', 'Estado de tarea actualizado exitosamente');
            } else {
                return redirect()
                    ->route('sprintbackloges.show', $sprint->id)
                    ->with('error', 'El estado proporcionado no es válido');
            }
        } else {
            return redirect()
                ->route('sprintbackloges.show', $sprint->id)
                ->with('error', 'La tarea especificada no existe');
        }
    }


   
    public function edit($id)
    {
  

        $sprint = SprintBacklog::findOrFail($id);

        return view('sprintbacklog.edit', compact('sprint'));
    }

  
    public function update(Request $request, $id)
    {
       

        $sprint = SprintBacklog::findOrFail($id);

        $sprint->update([
            'nombre' => $request->input('nombre'),
            'tiempo_programado' => $request->input('tiempo_programado'),
            'objetivo' => $request->input('objetivo'),
            'fecha_inicio' => $request->input('fecha_inicio'),
            'fecha_finalizacion' => $request->input('fecha_finalizacion'),
        ]);

        // Actualizar las tareas (puedes necesitar ajustar esto según tu estructura de datos)
        $sprint->tareas()->delete(); // Eliminar todas las tareas existentes

        if ($request->has('tareas') && is_array($request->input('tareas'))) {
            foreach ($request->input('tareas') as $tareaData) {
                $sprint->tareas()->create([
                    'nombre' => $tareaData['nombre'],
                    'tipo' => $tareaData['tipo'],
                    'responsable' => $tareaData['responsable'],
                    'estimacion' => $tareaData['estimacion'],
                ]);
            }
        }

        return redirect()->route('sprintbackloges.index')
            ->with('success', 'Sprint Backlog actualizado exitosamente');
    }
    
    
  
    public function destroy(SprintBacklog $sprintbacklog)
    {
    

        $sprintbacklog->delete();
        return redirect()->route('sprintbackloges.index')->with('success', 'Sprint se elimino con exito');
    }

}
