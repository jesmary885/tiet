@extends('adminlte::page')

@section('title', 'Tiet')

@section('content_header')
    
@stop

@section('content')
 @livewire('reportes.reporte-ordenes',[ 'fecha_inicio' => $fecha_inicio, 'fecha_fin' => $fecha_fin]) 
@stop

@section('css')

@stop

@section('js')

@stop