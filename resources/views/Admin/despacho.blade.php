@extends('layouts.admin')

@section('main-content')
<div class="content-wrapper">
<br>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>


    <link rel="stylesheet" href="{{ asset('css/ol2/theme/default/style.css') }}" type="text/css"/>

    <!-- Dependencies: JQuery and OpenLayer API should be loaded first -->
    <script src="{{ asset('js/jquery-1.7.2.min.js') }}"></script>
    <script src="{{ asset('js/OpenLayers.js') }}"></script>

    <!-- CSS and JS for our code -->
    <script src="{{ asset('js/jquery-position-picker.debug.js') }}"></script>


<style>
		#map{
			margin: 20px;
		}
	</style>


<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Información de Despacho</div>


                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                     @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                <div class="card-body">
                  <form action="{{ route('despacho.add',$emp2->idprod)}}" method="POST">
                        @csrf

                        <div class="form-row">
                                                    <div class="form-group col-md-4" hidden>
                                                    <label for="nombre_producto" class="col-sm-10 control-label">ID</label>
                                                    <div class="col-sm-10">
                                                            <input type="text" class="form-control"  name="empaquetado_id" value="{{old('empaquetado_id',$emp2->idempaque)}}" required>
                                                    </div>
                                                    </div>

                                                    <div class="form-group col-md-4" >
                                                    <label for="nombre_producto" class="col-sm-10 control-label">Orden de Empaquetado</label>
                                                    <div class="col-sm-10">
                                                            <input type="text" class="form-control" readonly  name="orden_empaque" value="{{old('orden_empaque',$emp2->orden_empaque)}}" required>
                                                    </div>
                                                    </div>

                                                    <div class="form-group col-md-4" hidden>
                                                    <label for="producto_id" class="col-sm-10 control-label">ID</label>
                                                    <div class="col-sm-10">
                                                            <input type="text" class="form-control"  name="producto_id" value="{{old('producto_id',$emp2->idprod)}}" required>
                                                    </div>
                                                    </div>
                                                    

                                                    <div class="form-group col-md-4" hidden>
                                                    <label for="Estado_emp" class="col-sm-10 control-label">ID</label>
                                                    <div class="col-sm-10">
                                                            <input type="text" class="form-control"  name="Estado_emp" value="1" required>
                                                    </div>
                                                    </div>
                              </div>

                              <div class="form-row">
                                                    

                                                    

                                                    <div class="form-group col-md-4">
                                                    <label for="nombre_producto" class="col-sm-10 control-label">Stock de Producto</label>
                                                    <div class="col-sm-10">
                                                            <input type="text" class="form-control" readonly  name="stock" value="{{old('stock_producto',$emp2->stock_producto)}}" required>
                                                    </div>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                    <label for="nombre_producto" class="col-sm-10 control-label">Cantidad de Producto</label>
                                                    <div class="col-sm-10">
                                                            <input type="text" class="form-control" readonly  name="cantidad_producto" value="{{old('cantidad_producto',$emp2->cantidad_producto)}}" required>
                                                    </div>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                    <label for="nombre_producto" class="col-sm-10 control-label">Stock al realizar despacho</label>
                                                    <div class="col-sm-10">
                                                            <input type="text" class="form-control" readonly  name="stock_producto" value="{{old('stock_actual',$emp2->stock_producto - $emp2->cantidad_producto)}}" required>
                                                    </div>
                                                    </div>
                              </div>



                         <div class="form-row">

                        <div class="form-group col-md-4">
                                                    <label for="rol" class="col-sm-10 control-label" >Cliente</label>
                                                    <div class="col-sm-10">
                                                    <select class="custom-select" name="cliente_id" required>
                                                      <option value = '' ></option>
                                                    @foreach($cli as $cliente)
                                                            <option value = '{{$cliente->id}}' >{{$cliente->primer_nombre_cliente}} {{$cliente->segundo_nombre_cliente}} {{$cliente->primer_apellido_cliente}} {{$cliente->primer_apellido_cliente}}</option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                         </div>


                        <div class="form-group col-md-4">
                                                    <label for="rol" class="col-sm-10 control-label" >Transporte</label>
                                                    <div class="col-sm-10">
                                                    <select class="custom-select" name="transporte_id" required>
                                                      <option value = '' ></option>
                                                    @foreach($trs as $transporte)
                                                            <option value = '{{$transporte->id}}' >{{ $transporte->empresa_transporte}}-{{ $transporte->tipo_transporte}}</option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                         </div>

                         </div>

                         
                         <div class="form-group">
                        <label>Mapa (Utilizando el puntero rojo señale su ubicación exacta) <i class="fas fa-map-marker-alt"></i></label>
                            <fieldset class="gllpLatlonPicker">
                                <div class="gllpMap" style="height: 300px; width: 100%; "></div>
                                <input type="hidden" name="desp_latitude" class="gllpLatitude" value="-0.18457106498244402"/>
                                <input type="hidden" name="desp_longitude" class="gllpLongitude" value="-78.46872953212898"/>
                                <input type="hidden" name="zoom" class="gllpZoom" value="8"/>
                            </fieldset>
                        </div>
                      

                        
                
                      

                        <div class="form-group row mb-0">

                            <div class="col-md-6 offset-md-4">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th><button type="submit" class="btn btn-primary">Guardar</button>
                                                
                                                </th>

                                            <th>
                                            <input type="button" class="btn btn-primary pull right" value="Volver" onClick="history.go(-1);">

                                            </th>

                                        </tr>


                                    </thead>
                                </table>
                            </div>

                        </div>
                    </form>

                  
            
        </div>				
    </div>
</div>
</div>



@endsection





