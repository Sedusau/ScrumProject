@extends('adminlte::page')

@section('title', 'Editar Rol')

@section('content_header')
    <h1>Editar Rol</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        {{ session('info') }}
    </div>
@endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($role, ['route'=>['roles.update', $role],'method'=> 'put']) !!}

            @include('rol.partials.form')

            {!! Form::submit('Actualizar Rol',['class'=>'btn btn-primary']) !!}
            {!! Form::Close() !!}
        </div>
    </div>
@stop

