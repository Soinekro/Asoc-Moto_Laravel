@extends('adminlte::page')
@section('title', 'Socios')

@section('content_header')
    <h1>Socio : {{$socio->user->name}}</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-warning">
            {{ session('info') }}
        </div>
    @endif
       <form action="{{route('admin.socios.update',$socio)}}" method="POST" >
        @csrf
        @include('admin.socios.partials.socio')
        <button class="btn btn-success float-right" type="submit">Editar Socio</button>
    </form>
@stop
