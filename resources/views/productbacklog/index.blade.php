@extends('adminlte::page')

@section('title', 'Produc Backlog')

@section('content_header')
    <h1>Product Backlog</h1>
@stop

@section('content')

@if (session('success'))
<div class="alert alert-success">
    <strong>{{ session('success') }}</strong>
</div>
@endif

<div class="card-header">
    @can('productbackloges.create')
    <a href="{{ route('productbackloges.create') }}" class="btn btn-primary">Nueva Tarea</a>

    @endcan
    
</div>
    <div class="card">
        <div class="card-body">
            
            <table class="table table-striped">
                <thead>
                    
                    <tr>
                        <th>ID</th>
                        <th>ROL</th>
                        <th>CARACTERISTICAS</th>
                        <th>RAZON</th>
                        <th>PRIORIDAD</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <TBody>
                    @foreach ($productbackloges as $product_backlog)
                        <tr>
                            <td>{{ $product_backlog->id }}</td>
                            <td>{{ $product_backlog->rol }}</td>
                            <td>{{ $product_backlog->caracteristica }}</td>  
                            <td>{{ $product_backlog->razon }}</td>   
                            <td>{{ $product_backlog->prioridad }}</td>                          
                            <td width="15px">
                                @can('productbackloges.edit')
                                <a href="{{ route('productbackloges.edit',$product_backlog) }}" class="btn btn-primary btn-sm">Editar</a>

                                @endcan
                            </td>
                            <td width="15px">
                               @can('productbackloges.destroy')
                               <form action="{{ route('productbackloges.destroy',$product_backlog) }}" method="POST">
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
