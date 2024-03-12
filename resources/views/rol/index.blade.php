@extends('adminlte::page')

@section('title', 'Listado de Roles')

@section('content_header')
    <h1>Listado de Roles</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        {{ session('info') }}
    </div>
@endif

<div class="card-header">
@can('roles.create')
<a href="{{ route('roles.create') }}" class="btn btn-primary">Nuevo Rol</a>

@endcan    
</div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ROLE</th>
                        <th colpan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td width="10px">
                                @can('roles.edit')
                                <a href="{{ route('roles.edit',$role) }}" class="btn btn-sm btn-primary">Editar</a>

                                @endcan
                            </td>
                            <td width="10px">
                                @can('roles.destroy')
                                <form action="{{ route('roles.destroy',$role) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
