@extends('adminlte::page')

@section('title', 'Nueva Definicion')

@section('content_header')
    <h1>Nueva Definicion</h1>
    <link rel="shortcut icon" href={{ asset('image/scrum-1.svg') }} type="image/x-icon">
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{route('definiciones.store')}}" method="POST">
            @csrf
           

            <div class="form-group">
                <label for="tarea">Tarea :</label>
                <input name="tarea" class="form-control" placeholder="Ingrese la tarea" type="text">
            
                @error('tarea')
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