@extends('adminlte::page')

@section('title', 'Tiet')

@section('content_header')
    
@stop

@section('content')
 @livewire('reportes.reporte-usuarios',[ 'usuario' => $usuario]) 
@stop

@section('css')

@stop

@section('js')

@stop