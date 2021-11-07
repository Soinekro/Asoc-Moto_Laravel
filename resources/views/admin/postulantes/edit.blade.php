@extends('adminlte::page')
@section('title', 'Postulantes')

@section('content_header')
    <h1>Postulante : {{$postulante->user->name}}</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-warning">
            {{ session('info') }}
        </div>
    @endif
       <form action="{{route('admin.postulantes.update',$postulante)}}" method="POST" >
        @csrf
        @include('admin.postulantes.partials.postulante')
        <button class="btn btn-success float-right" type="submit">Editar Postulante</button>
    </form>
@stop

@section('js')

@endsection
