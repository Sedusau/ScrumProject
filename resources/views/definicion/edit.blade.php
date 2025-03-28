@extends('adminlte::page')

@section('title', 'Editar Definicion')

@section('content_header')
    <h1>Editar Definicion</h1>
    <link rel="shortcut icon" href={{ asset('image/scrum-1.svg') }} type="image/x-icon">
@stop

@section('content')
<div class="card">
    <div class="card-body">


        <form action="{{route('definiciones.update', $definicion)}}" method="POST">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="tarea">Tarea :</label>
                <input name="tarea" value="{{$definicion->tarea}}" class="form-control"  type="text">
            
                @error('tarea')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            
            </div>
            
            
            

          
            <button type="submit" class="btn btn-primary">
                Actualizar Definicion
            </button>
            <button type="button" class="btn btn-primary">
                <a href="{{ url()->previous() }}" style="color: white; text-decoration: none;">Volver</a>
            </button>

        </form>
        
    </div>
</div>
@stop


