@extends('adminlte::page')

@section('title', 'Nueva Historia de Usuario')

@section('content_header')
    <h1>Nueva Historia de Usuario</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{route('historiausuarios.store')}}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre :</label>
                <input name="nombre" class="form-control" placeholder="Ingrese el nombre de la historia de usuario" type="text">
            
                @error('nombre')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            
            </div>
            <div class="form-group">
                <label for="prioridad">Prioridad :</label>
                <input name="prioridad" class="form-control" placeholder="Ingrese la prioridad" type="text">
            
                @error('prioridad')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            
            </div>
            <div class="form-group">
                <label for="programador">Programador :</label>
                <input name="programador" class="form-control" placeholder="Ingrese el programador" type="text">
            
                @error('programador')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            
            </div>
            
            <div class="form-group">
                <label for="como">Como :</label>
                <textarea name="como" class="form-control""></textarea>
                
                @error('como')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="quiero">Quiero :</label>
                <textarea name="quiero" class="form-control""></textarea>
                
                @error('quiero')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="para">Para :</label>
                <textarea name="para" class="form-control""></textarea>
                
                @error('para')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="descripcion">Descripcion :</label>
                <textarea name="descripcion" class="form-control""></textarea>
                
                @error('descripcion')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="observaciones">Observaciones :</label>
                <textarea name="observaciones" class="form-control""></textarea>
                
                @error('observaciones')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="criterioaceptacion">Criterios de Aceptacion :</label>
                <textarea name="criterioaceptacion" class="form-control""></textarea>
                
                @error('criterioaceptacion')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


           
            <button type="submit" class="btn btn-primary">
                Crear Historia de Usuario
            </button>
            <button type="button" class="btn btn-primary">
                <a href="{{ url()->previous() }}" style="color: white; text-decoration: none;">Volver</a>
            </button>

        </form>
        
    </div>
</div>
@stop