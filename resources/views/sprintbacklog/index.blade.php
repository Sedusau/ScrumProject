@extends('adminlte::page')

@section('title', 'Sprint Backlog')

@section('content_header')
    <h1>Sprint Backlog</h1>
@stop

@section('content')

@if (session('success'))
<div class="alert alert-success">
    <strong>{{ session('success') }}</strong>
</div>
@endif

<div class="card-header">
    @can('productbackloges.create')
    <a href="{{ route('sprintbackloges.create') }}" class="btn btn-primary">Nuevo Sprint</a>

    @endcan
    
</div>
    <div class="card">
        <div class="card-body">
            
            <table class="table table-striped">
                <thead>
                    
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>TIEMPO PROGRAMADO</th>
                        <th>OBJETIVO</th>
                        <th>FECHA DE INICIO</th>
                        <th>FECHA DE FINALIZACION</th>
                        <th colspan="3"></th>
                    </tr>
                </thead>
                <TBody>
                    @foreach ($sprintbackloges as $sprint_backlog)
                        <tr>
                            <td>{{ $sprint_backlog->id }}</td>
                            <td>{{ $sprint_backlog->nombre }}</td>
                            <td>{{ $sprint_backlog->tiempo_programado }}</td>  
                            <td>{{ $sprint_backlog->objetivo }}</td>
                            <td>{{ $sprint_backlog->fecha_inicio }}</td>      
                            <td>{{ $sprint_backlog->fecha_finalizacion }}</td>                          
                            <td width="15px">
                                @can('sprintbackloges.show')
                                <a href="{{ route('sprintbackloges.show',$sprint_backlog) }}" class="btn btn-primary btn-sm">Ver</a>

                                @endcan
                            </td>
                            <td width="15px">
                                @can('sprintbackloges.edit')
                                <a href="{{ route('sprintbackloges.edit',$sprint_backlog) }}" class="btn btn-primary btn-sm">Editar</a>

                                @endcan
                            </td>
                            <td width="15px">
                               @can('sprintbackloges.destroy')
                               <form action="{{ route('sprintbackloges.destroy',$sprint_backlog) }}" method="POST">
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