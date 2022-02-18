@extends('adminlte::page')

@section('title', 'Tiet')

@section('content_header')
<a href="{{route('orden_produccion.create')}}" class="btn btn-primary float-right"><i class="fas fa-user-plus"></i> Nueva orden</a>

    <h1 class="text-lg ml-2"><i class="far fa-address-book"></i>Listado de ordenes</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
     @livewire('orden-produccion') 
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop