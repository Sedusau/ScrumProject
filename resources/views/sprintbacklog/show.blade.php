@extends('adminlte::page')

@section('title', 'Detalles del Sprint Backlog')

@section('content_header')
    <h1>Detalles del Sprint Backlog</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h5>Tareas:</h5>
            <ul>
                @foreach($sprint->tareas as $index => $tarea)
                    <li>
                        <strong>Tarea {{ $index + 1 }}:</strong>
                        <ul>
                            <li><strong>Nombre:</strong> {{ $tarea['nombre'] }}</li>
                            <li><strong>Tipo:</strong> {{ $tarea['tipo'] }}</li>
                            <li><strong>Responsable:</strong> {{ $tarea['responsable'] }}</li>
                            <li><strong>Estimación:</strong> {{ $tarea['estimacion'] }}</li>
                            <li><strong>Estado:</strong>
                                @if($tarea['estado'] === 'pendiente')
                                    <span style="color: yellow;">{{ $tarea['estado'] }}</span>
                                @elseif($tarea['estado'] === 'finalizado')
                                    <span style="color: red;">{{ $tarea['estado'] }}</span>
                                @else
                                    {{ $tarea['estado'] }}
                                @endif
                            </li>
                        </ul>

                        <!-- Agregar formulario con un campo select para cambiar el estado -->
                        <form action="{{ route('sprintbackloges.updateEstado', ['id' => $sprint->id, 'tareaId' => $index]) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('PATCH')

                            <label for="estado">Cambiar Estado:</label>
                            <select name="estado" id="estado" class="form-control" required>
                                <option value="pendiente" {{ $tarea['estado'] === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="finalizado" {{ $tarea['estado'] === 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                            </select>

                            <button class="btn btn-primary btn-sm" type="submit">
                                Actualizar Estado
                            </button>
                        </form>
                    </li>
                @endforeach
            </ul>

            <a href="{{ route('sprintbackloges.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
@stop

