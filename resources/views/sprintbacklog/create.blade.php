@extends('adminlte::page')

@section('title', 'Nuevo Sprint')

@section('content_header')
    <h1>Nueva Sprint</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{route('sprintbackloges.store')}}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control">
                @error('nombre')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            
            </div>
            
            
            <div class="form-group">
                <label for="tiempo_programado">Tiempo Programado: (SEMANAS)</label>
                <input type="number" name="tiempo_programado" class="form-control">
                
                @error('tiempo_programado')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="objetivo">Objetivo:</label>
                <textarea name="objetivo" class="form-control"></textarea>
            
                @error('objetivo')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            
            </div>
            <div class="form-group">
                <label for="fecha_inicio">Fecha Inicio:</label>
                <input type="date" name="fecha_inicio" class="form-control">
            
                @error('fecha_inicio')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            
            </div>

            <div class="form-group">
                <label for="fecha_finalizacion">Fecha Finalización:</label>
                <input type="date" name="fecha_finalizacion" class="form-control">
                
                @error('fecha_finalizacion')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            
             <!-- Agrega campos para las tareas -->
             <div class="form-group">
                <label for="tareas">Tareas:</label>
                <div id="tareas">
                    <!-- Campo de tarea (puedes duplicar este bloque según sea necesario) -->
                    <div class="tarea">
                        <input type="text" name="tareas[0][nombre]" placeholder="Nombre de la tarea" class="form-control">
                        <input type="text" name="tareas[0][tipo]" placeholder="Tipo de tarea" class="form-control">
                        <input type="text" name="tareas[0][responsable]" placeholder="Responsable de la tarea" class="form-control">
                        <input type="number" name="tareas[0][estimacion]" placeholder="Estimación de la tarea" class="form-control">              
                        <br>
                        <br>
                    </div>
                </div>
                 <!-- Botón para agregar más campos de tarea dinámicamente -->
                 <button type="button" onclick="agregarTarea()" class="btn btn-success mt-2">Agregar Tarea</button>
                </div>
    
                <button type="submit" class="btn btn-primary">Crear Sprint Backlog</button>

        </form>
        
    </div>
</div>

 <!-- Script para agregar campos de tarea dinámicamente -->
 <script>
    let numeroTareas = 1;

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