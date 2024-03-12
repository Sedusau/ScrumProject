@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')


@if (session('info'))
<div class="alert alert-success">
    <strong>{{ session('info') }}</strong>
</div>
@endif

<div class="card">
    <div class="card-body">



        <h2 class="h5">Listado de roles</h2>
        {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'put']) !!}
        <label for="tarea">Nombre :</label>
                <input name="name" value="{{$user->name}}" class="form-control"  type="text">
            
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

        <label for="tarea">email :</label>
                <input name="email" value="{{$user->email}}" class="form-control"  type="text">
            
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
        @foreach ($roles as $role)
            <div>
                <label> 
                    
                    {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                    {{ $role->name }}
                </label>
            </div>
        @endforeach

        {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary mt-2']) !!}
        <button type="button" class="btn btn-primary mt-2">
            <a href="{{ url()->previous() }}" style="color: white; text-decoration: none;">Volver</a>
        </button>
        {!! Form::close() !!}
    </div>
</div>
@stop


