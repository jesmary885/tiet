@extends('adminlte::page')

@section('title', 'Tiet')

@section('content_header')
    @livewire('admin.create-suplidores',['accion' => 'create'])
    <h1 class="text-lg ml-2"><i class="far fa-address-book"></i> Listado de Suplidores</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
     @livewire('admin.admin-suplidores') 
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop