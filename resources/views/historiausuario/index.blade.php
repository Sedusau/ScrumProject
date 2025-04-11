@extends('adminlte::page')

@section('title', 'Historia Usuario')

@section('content_header')
    <h1>Historia Usuarios</h1>
@stop

@section('content')

@if (session('success'))
<div class="alert alert-success">
    <strong>{{ session('success') }}</strong>
</div>
@endif

<div class="card-header">
    @can('historiausuarios.create')
    <a href="{{ route('historiausuarios.create') }}" class="btn btn-primary">Nueva historia de Usuario</a>

    @endcan
    
</div>
    <div class="card">
        <div class="card-body">
            
            <table class="table table-striped">
                <thead>
                    
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>PRIORIDAD</th>
                        <th>PROGRAMADOR</th>
                        <th>COMO</th>
                        <th>QUIERO</th>
                        <th>PARA</th>
                        <th>DESCRIPCION</th>
                        <th>OBSERVACIONES</th>
                        <th>CRITERIOS DE ACEPTACION</th>
                      <!--  <th>SENTIMIENTOS</th> -->
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <TBody>
                    @foreach ($historiausuarios as $historiausuario)
                        <tr>
                            <td>{{ $historiausuario->id }}</td>
                            <td>{{ $historiausuario->nombre }}</td>
                            <td>{{ $historiausuario->prioridad }}</td>  
                            <td>{{ $historiausuario->programador }}</td>   
                            <td>{{ $historiausuario->como }}</td>
                            <td>{{ $historiausuario->quiero }}</td>  
                            <td>{{ $historiausuario->para }}</td>  
                            <td>{{ $historiausuario->descripcion }}</td>  
                            <td>{{ $historiausuario->observaciones }}</td>
                            <td>{{ $historiausuario->criterioaceptacion }}</td> 
                           <!-- <td>{{-- $historiausuario->sentimiento --}}</td> -->  
                            <td width="15px">
                                @can('historiausuarios.edit')
                                <a href="{{ route('historiausuarios.edit',$historiausuario) }}" class="btn btn-primary btn-sm">Editar</a>

                                @endcan
                            </td>
                            <td width="15px">
                               @can('historiausuarios.destroy')
                               <form action="{{ route('historiausuarios.destroy',$historiausuario) }}" method="POST">
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
