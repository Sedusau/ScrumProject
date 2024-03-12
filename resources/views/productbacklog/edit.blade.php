@extends('adminlte::page')

@section('title', 'Editar Taera')

@section('content_header')
    <h1>Editar Tarea</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">


        <form action="{{route('productbackloges.update', $productbacklog)}}" method="POST">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="rol">Rol :</label>
                <input name="rol" class="form-control" value="{{$productbacklog->rol}}" type="text">
            
                @error('rol')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            
            </div>
            
            
            <div class="form-group">
                <label for="caracteristica">Caracteristica:</label>
                <textarea name="caracteristica" class="form-control"> {{$productbacklog->caracteristica}}</textarea>
                
                @error('caracteristica')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="razon">Razon :</label>
                <input name="razon" class="form-control" value="{{$productbacklog->razon}}" type="text">
            
                @error('razon')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            
            </div>
            <div class="form-group">
                <label for="prioridad">Prioridad :</label>
                <input name="prioridad" class="form-control" value="{{$productbacklog->prioridad}}" type="text">
            
                @error('prioridad')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            
            </div>
            
            
            

          
            <button type="submit" class="btn btn-primary">
                Actualizar Tarea
            </button>
            <button type="button" class="btn btn-primary">
                <a href="{{ url()->previous() }}" style="color: white; text-decoration: none;">Volver</a>
            </button>

        </form>
        
    </div>
</div>
@stop