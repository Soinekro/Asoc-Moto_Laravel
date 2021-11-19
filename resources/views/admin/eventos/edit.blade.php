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
       <form action="{{route('admin.eventos.update',$evento)}}" method="POST" >
        @csrf
        @include('admin.eventos.partials.evento')
        <button class="btn btn-success float-right" type="submit">Editar Postulante</button>
    </form>
@stop

@section('js')

@endsection
