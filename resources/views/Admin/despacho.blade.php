@extends('layouts.admin')

@section('main-content')
<div class="content-wrapper">
<br>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Información de Despacho</div>

                <div class="card-body">
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

                    </div>


                <div class="card-body">
                  <form action="{{ route('despacho.add',$emp2->idempaque)}}" method="POST">
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
                                                            <input type="text" class="form-control" readonly  name="stock_producto" value="{{old('stock_producto',$emp2->stock_actual)}}" required>
                                                    </div>
                                                    </div>
                              </div>



                         <div class="form-row">

                        <div class="form-group col-md-4">
                                                    <label for="rol" class="col-sm-10 control-label" >Cliente</label>
                                                    <div class="col-sm-10">
                                                    <select class="custom-select" name="cliente_id">
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
                                                    <select class="custom-select" name="transporte_id">
                                                      <option value = '' ></option>
                                                    @foreach($trs as $transporte)
                                                            <option value = '{{$transporte->id}}' >{{ $transporte->empresa_transporte}}</option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                         </div>

                         </div>

                      

                        <div class="form-group row mb-0">

                            <div class="col-md-6 offset-md-4">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th><button type="submit" class="btn btn-primary"> Guardar</button>
                                                
                                                </th>

                                            <th>
                                            <input type="button" class="btn btn-primary pull right" value="volver" onClick="history.go(-1);">

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
</div>

   
@endsection





