@extends('adminlte::page')

@section('title', 'Lista de Definiciones Iniciales')

@section('content_header')
    <h1>Lista de Definiciones Iniciales</h1>
@stop

@section('content')
<link rel="shortcut icon" href={{ asset('image/scrum-1.svg') }} type="image/x-icon">
@if (session('success'))
<div class="alert alert-success">
    <strong>{{ session('success') }}</strong>
</div>
@endif

<div class="card-header">
@can('definiciones.create')
    <a href="{{ route('definiciones.create') }}" class="btn btn-primary">Nueva Definicion Inicial </a>
  
@endcan    
</div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TAREAS</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <TBody>
                    @foreach ($definiciones as $definicion)
                        <tr>
                            <td>{{ $definicion->id }}</td>
                            <td>{{ $definicion->tarea }}</td>
                            <td width="15px">
                                @can('definiciones.edit')
                                <a href="{{ route('definiciones.edit',$definicion) }}" class="btn btn-primary btn-sm">Editar</a>

                                @endcan
                            </td>
                            <td width="15px">
                               @can('definiciones.destroy')
                               <form action="{{ route('definiciones.destroy',$definicion) }}" method="POST">
                                @method('delete')
                                @csrf
                                <input type="submit" value="Eliminar" class="btn btn-danger btn-sm">
                        
                        </form>
                               @endcan
                            </td>
                        </tr>
                    @endforeach
                </TBody>
            </table>
        </div>
    </div>
@stop
