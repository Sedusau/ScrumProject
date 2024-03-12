@extends('adminlte::page')

@section('title', 'Editar Sprint')

@section('content_header')
    <h1>Editar Sprint</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('sprintbackloges.update', $sprint->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control" value="{{ $sprint->nombre }}">
                @error('nombre')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            
            </div>
            
            <div class="form-group">
                <label for="tiempo_programado">Tiempo Programado: (SEMANAS)</label>
                <input type="number" name="tiempo_programado" class="form-control" value="{{ $sprint->tiempo_programado }}">
                
                @error('tiempo_programado')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="objetivo">Objetivo:</label>
                <textarea name="objetivo" class="form-control">{{ $sprint->objetivo }}</textarea>
            
                @error('objetivo')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            
            </div>
            <div class="form-group">
                <label for="fecha_inicio">Fecha Inicio:</label>
                <input type="date" name="fecha_inicio" class="form-control" value="{{ $sprint->fecha_inicio }}">
            
                @error('fecha_inicio')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            
            </div>

            <div class="form-group">
                <label for="fecha_finalizacion">Fecha Finalización:</label>
                <input type="date" name="fecha_finalizacion" class="form-control" value="{{ $sprint->fecha_finalizacion }}">
                
                @error('fecha_finalizacion')
                <small class="text-danger">{{ $message }}</small>
            @enderror

            <!-- Agregar campos para las tareas (puedes utilizar un bucle para mostrar todas las tareas existentes) -->
            <div class="form-group">
                <label for="tareas">Tareas:</label>
                <div id="tareas">
                    @foreach ($sprint->tareas as $index => $tarea)
                        <div class="tarea">
                            <input type="text" name="tareas[{{ $index }}][nombre]" placeholder="Nombre de la tarea" class="form-control" value="{{ $tarea->nombre }}">
                            <input type="text" name="tareas[{{ $index }}][tipo]" placeholder="Tipo de tarea" class="form-control" value="{{ $tarea->tipo }}">
                            <input type="text" name="tareas[{{ $index }}][responsable]" placeholder="Responsable de la tarea" class="form-control" value="{{ $tarea->responsable }}">
                            <input type="number" name="tareas[{{ $index }}][estimacion]" placeholder="Estimación de la tarea" class="form-control" value="{{ $tarea->estimacion }}">
                            <br>
                            <br>
                        </div>
                    @endforeach
                </div>

                <!-- Botón para agregar más campos de tarea dinámicamente -->
                <button type="button" onclick="agregarTarea()" class="btn btn-success mt-2">Agregar Tarea</button>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Sprint Backlog</button>

        </form>
        
    </div>
</div>

<!-- Script para agregar campos de tarea dinámicamente -->
<script>
    let numeroTareas = {{ count($sprint->tareas) }}; // Asegurarse de que el número de tareas inicial refleje las tareas existentes en el sprint

    function agregarTarea() {
        numeroTareas++;

        const nuevaTarea = document.createElement('div');
        nuevaTarea.className = 'tarea';

        nuevaTarea.innerHTML = `
            <input type="text" name="tareas[${numeroTareas}][nombre]" placeholder="Nombre de la tarea" class="form-control">
            <input type="text" name="tareas[${numeroTareas}][tipo]" placeholder="Tipo de tarea" class="form-control">
            <input type="text" name="tareas[${numeroTareas}][responsable]" placeholder="Responsable de la tarea" class="form-control">
            <input type="number" name="tareas[${numeroTareas}][estimacion]" placeholder="Estimación de la tarea" class="form-control">
            <br>
            <br>
        `;

        document.getElementById('tareas').appendChild(nuevaTarea);
    }
</script>
@stop

