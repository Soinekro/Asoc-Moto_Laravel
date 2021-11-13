@extends('adminlte::page')
@section('title', 'Roles')

@section('content_header')
    <h1>Crear Rol</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif
    <p>Crear Rol</p>
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.roles.store']) !!}
            @include('admin.roles.partials.form')
            {!! Form::submit('crear Rol', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

