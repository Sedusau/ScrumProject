@extends('adminlte::page')

@section('title', 'Nuevo Usuario')

@section('content_header')
    <h1>Nuevo Usuario</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{route('users.store')}}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nombre :</label>
                <input name="name" class="form-control" placeholder="Ingrese su nombre completo" type="text">
            
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            
            </div>
            
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input name="email" class="form-control" placeholder="Ingrese su email" type="email">
            
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input name="password" class="form-control" placeholder="Ingrese su contraseña" type="password">
            
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            
            </div>
           
            <button type="submit" class="btn btn-primary">
                Crear Usuario
            </button>
            <button type="button" class="btn btn-primary">
                <a href="{{ url()->previous() }}" style="color: white; text-decoration: none;">Volver</a>
            </button>

        </form>
        
    </div>
</div>
@stop

