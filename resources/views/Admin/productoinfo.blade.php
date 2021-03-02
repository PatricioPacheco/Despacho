@extends('layouts.admin')

@section('main-content')
<div class="content-wrapper">
<br>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Informacion de Producto</div>

              

                <div class="card-body">
                    @if (session('warning'))
                        <div class="alert alert-success">
                            {{ session('warning') }}
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
  
                    <strong>Producto: </strong><br>
                    <br><p>
                       <strong>Nombre Producto: </strong>{{$prod->nombre_producto}}<br>
                       <strong>Codigo de Producto: </strong>{{$prod->codigo_producto}}<br>
                       <strong>Peso Producto: </strong>{{$prod->peso_producto}} kg<br>
                       <strong>stock Producto: </strong>{{$prod->stock_producto}} unidades<br>
                       <strong>Fecha de ingreso de Producto: </strong>{{$prod->fecha_ingreso}}<br>
                       <strong>Fecha de caducidad de Producto: </strong> {{$prod->fecha_caducidad}}<br>
                       <strong>Observacion de Producto: </strong>{{$prod->observacion_producto}}<br>
</p>
                       <br>
                    <strong>Datos: </strong><br>
                    <br><p>
                       <strong>Nombre de Proveedor:</strong> {{$prod->nombre_proveedor}}<br>
                       <strong>Categoria: </strong>{{$prod->nombre_categoria}}<br>
                       <strong>Seccion: </strong>{{$prod->nombre_seccion}}<br>
                       <strong>Nivel: </strong>{{$prod->nombre_nivel}}<br>
                       <strong>Estante: </strong>{{$prod->nombre_estante}}<br>
</p>
           
            <div align="center">
              <input type="button" class="btn btn-primary pull right" value="Ir a Productos" onClick="history.go(-1);">   
            </div>
            
        </div>
    </div>
    </div>
    </div>
    </div>

@endsection





