@extends('adminlte::page')

@section('title', 'Editar Historia de Usuario')

@section('content_header')
    <h1>Editar Historia de Usuario</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{route('historiausuarios.update', $historiausuario)}}" method="POST">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="nombre">Nombre :</label>
                <input name="nombre" class="form-control" value="{{$historiausuario->nombre}}" type="text">
            
                @error('nombre')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            
            </div>
            <div class="form-group">
                <label for="prioridad">Prioridad :</label>
                <input name="prioridad" class="form-control" value="{{$historiausuario->prioridad}}" type="text">
            
                @error('prioridad')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            
            </div>
            <div class="form-group">
                <label for="programador">Programador :</label>
                <input name="programador" class="form-control" value="{{$historiausuario->programador}}" type="text">
            
                @error('programador')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            
            </div>
            
            <div class="form-group">
                <label for="como">Como :</label>
                <textarea name="como"  class="form-control">{{$historiausuario->como}}</textarea>
                
                @error('como')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="quiero">Quiero :</label>
                <textarea name="quiero"  class="form-control">{{$historiausuario->quiero}}</textarea>
                
                @error('quiero')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="para">Para :</label>
                <textarea name="para" class="form-control">{{$historiausuario->para}}</textarea>
                
                @error('para')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="descripcion">Descripcion :</label>
                <textarea name="descripcion"  class="form-control">{{$historiausuario->descripcion}}</textarea>
                
                @error('descripcion')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="observaciones">Observaciones :</label>
                <textarea name="observaciones"  class="form-control">{{$historiausuario->observaciones}}</textarea>
                
                @error('observaciones')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="criterioaceptacion">Criterios de Aceptacion :</label>
                <textarea name="criterioaceptacion"  class="form-control">{{$historiausuario->criterioaceptacion}}</textarea>
                
                @error('criterioaceptacion')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                 <!-- Mostrar el sentimiento 
            <p><strong>Sentimiento:</strong>  {{-- $historiausuario->sentimiento --}}</p> -->
            </div>


           
            <button type="submit" class="btn btn-primary">
                Actualizar Historia de Usuario
            </button>
            <button type="button" class="btn btn-primary">
                <a href="{{ url()->previous() }}" style="color: white; text-decoration: none;">Volver</a>
            </button>

        </form>
        
    </div>
</div>
@stop