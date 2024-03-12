@extends('adminlte::page')

@section('title', 'Lista de Usuarios')

@section('content_header')
    <h1>Lista de Usuarios</h1>
@stop

@section('content')

@if (session('success'))
<div class="alert alert-success">
    <strong>{{ session('success') }}</strong>
</div>
@endif

<div class="card-header">
    @can('users.create')
    <a href="{{ route('users.create') }}" class="btn btn-primary">Nuevo Usuario</a>

    @endcan
    
</div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>EMAIL</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <TBody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>                         
                            <td width="15px">
                                @can('users.edit')
                                <a href="{{ route('users.edit',$user) }}" class="btn btn-primary btn-sm">Editar</a>

                                @endcan
                            </td>
                            <td width="15px">
                               @can('users.destroy')
                               <form action="{{ route('users.destroy',$user) }}" method="POST">
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


