@extends('adminlte::page')

@section('title', 'Crear Rol')

@section('content_header')
    <h1>Crear Rol</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            {!! Form::open(['route'=>'roles.store']) !!}
               

            @include('rol.partials.form')



            {!! Form::submit('Crear Rol',['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}


        </div>
    </div>
@stop

