@extends('adminlte::page')

@section('title', 'Tiet')

@section('content_header')
    
@stop

@section('content')

{{-- <div class="flex bg-indigo-500 ">
  <h1 class="text-xl text-sky-600 font-bold mt-6">
    <i class="fas fa-columns"></i> Tablero 
  </h1>
  <p class="text-sm text-gray-600 font-semibold mt-10 ml-2">
    Panel de control
  </p>

</div> --}}


<div class="row mt-4">
  @can('ronurados.index')
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{$tipo_ranurados_cant}}</h3>

          <p>Tipos de ranurado</p>
        </div>
        <div class="icon">
          <i class="ion ion-filing"></i>
        </div>
        <a href="{{route('ronurados.index')}}" class="small-box-footer">Nuevo registro <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div> 
    @endcan
    <!-- ./col -->
    @can('orden_produccion.index')
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{$orden_produccion_cant}}</h3>

          <p>Ordenes de producción</p>
        </div>
        <div class="icon">
          <i class="ion ion-filing"></i>
        </div>
        <a href="{{route('orden_produccion.create')}}" class="small-box-footer">Nueva orden<i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    @endcan
    <!-- ./col -->
    @can('clientes.index')
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{$clientes_cant}}</h3>

          <p>Clientes registrados</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="{{route('clientes.index')}}" class="small-box-footer">Nuevo cliente <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    @endcan
    <!-- ./col -->
    @can('reporte.index')
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>Reportes</h3>
          <p>de tipos de ronurado</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="{{route('reporte.index')}}" class="small-box-footer">Ver reportes<i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    @endcan
    <!-- ./col -->
  </div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
