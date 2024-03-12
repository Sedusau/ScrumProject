@extends('adminlte::page')

@section('title', 'Nueva Tarea')

@section('content_header')
    <h1>Nueva Tarea</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{route('productbackloges.store')}}" method="POST">
            @csrf

            <div class="form-group">
                <label for="rol">Rol :</label>
                <input name="rol" class="form-control" placeholder="Ingrese el rol" type="text">
            
                @error('rol')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            
            </div>
            
            
            <div class="form-group">
                <label for="caracteristica">Caracteristica:</label>
                <textarea name="caracteristica" class="form-control" placeholder="Ingrese la caracteristica"></textarea>
                
                @error('caracteristica')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="razon">Razon :</label>
                <input name="razon" class="form-control" placeholder="Ingrese la Razon" type="textarea">
            
                @error('razon')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            
            </div>
            <div class="form-group">
                <label for="prioridad">Prioridad :</label>
                <input name="prioridad" class="form-control" placeholder="Ingrese la Prioridad" type="text">
            
                @error('prioridad')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            
            </div>
           
            <button type="submit" class="btn btn-primary">
                Crear Tarea
            </button>
            <button type="button" class="btn btn-primary">
                <a href="{{ url()->previous() }}" style="color: white; text-decoration: none;">Volver</a>
            </button>

        </form>
        
    </div>
</div>
@stop