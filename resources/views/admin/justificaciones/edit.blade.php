@extends('adminlte::page')
@section('title', 'Eventos')

@section('content_header')
    <h1>Evento : {{$evento->name_evento}}</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-warning">
            {{ session('info') }}
        </div>
    @endif
       <form action="{{route('admin.justificaciones.update',$evento)}}" method="POST" >
        @csrf
        @include('admin.justificaciones.partials.justificacion')
        <button class="btn btn-success float-right" type="submit">Editar Justificacion</button>
    </form>
@stop

@section('js')

@endsection
