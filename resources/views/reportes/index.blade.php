@extends('adminlte::page')

@section('title', 'Tiet')

@section('content_header')
@stop

@section('content')
     @livewire('reportes.reporte-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop