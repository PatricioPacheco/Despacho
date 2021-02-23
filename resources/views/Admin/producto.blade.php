@extends('layouts.admin')

@section('main-content')
<div class="content-wrapper">
<br>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Productos</div>

                


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

                @if (auth()->user()->role ==0)
                
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                    <div class="card-body d-flex justify-content-between align-items-center">

                       <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#create">Crear Producto
                                     
                                    </button>

                                    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              
                                              <h4 class="modal-title" id="myModalLabel">Crear Producto</h4>
                                            </div>
                                            <div class="modal-body">

                                          

                                              <form action="{{ route('productos.add')}}" method="POST">
                                                @csrf
                                                
                                              <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                    <label for="nombre_producto" class="col-sm-10 control-label">Producto</label>
                                                    <div class="col-sm-10">
                                                            <input type="text" class="form-control"  name="nombre_producto" value="{{old('nombre_producto')}}" required>
                                                    </div>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                    <label for="codigo_producto" class="col-sm-10 control-label">Codigo</label>
                                                    <div class="col-sm-10">
                                                            <input type="text" class="form-control"  name="codigo_producto" value="{{old('codigo_producto')}}" required>
                                                    </div>
                                                    </div>

                                                    

                                                </div>


                                            <div class="form-row">


                                                  <div class="form-group col-md-6">
                                                      <label for="peso_producto" class="col-sm-10 control-label">Peso</label>
                                                      <div class="col-sm-10">
                                                              <input type="number" class="form-control"  name="peso_producto" value="{{old('peso_producto')}}" required>
                                                      </div>
                                                      </div>


                                                  
                                                      <div class="form-group col-md-6">
                                                        <label for="stock_producto" class="col-sm-10 control-label">Stock</label>
                                                        <div class="col-sm-10">
                                                                <input type="number" class="form-control"  name="stock_producto" value="{{old('stock_producto')}}" required>
                                                        </div>
                                                  </div>

                                              </div>

                                        <div class="form-row">

                                                  

                                                  <div class="form-group col-md-6">
                                                    <label for="nombre_producto" class="col-sm-10 control-label">Estado</label>
                                                    <div class="col-sm-10">
                                                    <select class="custom-select" name="estado_producto">
                                                              <option value = '' >-</option>
                                                              <option value = 'Disponible' >Disponible</option>
                                                              <option value = 'No Disponible' >No Disponible</option>
                                                      
                                                    </select>
                                                    </div>
                                                  </div>


                                                  <div class="form-group col-md-6">
                                                    <label for="observacion_producto" class="col-sm-10 control-label">Observacion</label>
                                                    <div class="col-sm-10">
                                                            <input type="text" class="form-control"  name="observacion_producto" value="{{old('observacion_producto')}}" required>
                                                    </div>
                                                  </div>

                                        </div>


                                               

                                          <div class="form-row">

                                          
                                              <div class="form-group col-md-6">
                                                <label for="rol" class="col-sm-10 control-label" >Categoria</label>
                                                <div class="col-sm-10">
                                                <select class="custom-select" name="categoria_id">
                                                  <option value = '' ></option>
                                                  @foreach($cat as $cate)
                                                        <option value = '{{$cate->id}}' >{{ $cate->nombre_categoria }}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                              </div>

                                            

                                            <div class="form-group col-md-6">
                                                <label for="rol" class="col-sm-10 control-label" >Proveedor</label>
                                                <div class="col-sm-10">
                                                <select class="custom-select" name="proveedor_id">
                                                  <option value = '' ></option>
                                                @foreach($provee as $proveedores)
                                                        <option value = '{{$proveedores->id}}' >{{ $proveedores->nombre_proveedor}}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>

                             

                                                
                                            </div>

                                            <div class="form-row">

                                                <div class="form-group col-md-4">
                                                    <label for="rol" class="col-sm-10 control-label" >Seccion</label>
                                                    <div class="col-sm-10">
                                                    <select class="custom-select" name="seccion_id">
                                                      <option value = '' ></option>
                                                    @foreach($secc as $seccion)
                                                            <option value = '{{$seccion->id}}' >{{ $seccion->nombre_seccion}}</option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                                                </div>



                                                <div class="form-group col-md-4">
                                                    <label for="rol" class="col-sm-10 control-label" >Estante</label>
                                                    <div class="col-sm-10">
                                                    <select class="custom-select" name="estante_id">
                                                      <option value = '' ></option>
                                                    @foreach($est as $estante)
                                                            <option value = '{{$estante->id}}' >{{ $estante->nombre_estante}}</option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                                                </div>



                                                <div class="form-group col-md-4">
                                                    <label for="rol" class="col-sm-10 control-label" >Niveles</label>
                                                    <div class="col-sm-10">
                                                    <select class="custom-select" name="nivel_id">
                                                      <option value = '' ></option>
                                                    @foreach($niv as $nivel) 
                                                            <option value = '{{$nivel->id}}' >{{ $nivel->nombre_nivel }}</option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                                            </div>

                                            </div>

                                            <div class="form-row">

                                            <div class="form-group col-md-6">
                                                    <label for="rol" class="col-sm-10 control-label" >Fecha de Ingreso</label>
                                                    <div class="col-sm-10">
                                                       <input class="form-control" type="date" name="fecha_ingreso">
                                                    </div>
                                            </div>


                                            <div class="form-group col-md-6">
                                                    <label for="rol" class="col-sm-10 control-label" >Fecha de caducidad</label>
                                                    <div class="col-sm-10">
                                                       <input class="form-control" type="date" name="fecha_caducidad">
                                                    </div>
                                            </div>

                                            </div>


                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                              <button type="submit" class="btn btn-primary">Crear</button>
                                            </div>
                                          </form> 


                                          </div>
                                        </div>
                                      </div>


                    </div>
                        <div class="table-responsive">  
                        <table class="table table-bordered" id="dataTable"  width="100%" cellspacing="0">
                           <thead > 
                            <tr >
                            <th>Producto(info.)</th>
                                <th>Codigo</th>
                                <th>Peso</th>
                                <th>Stock</th>
                                <th>Estado</th>
                                <th>Observacion</th>
                                <th>Fecha Ingreso</th>
                                <th>Fecha Caducidad</th>
                                <th>Editar</th>                          
                                <th>Eliminar</th>                           
                                
                            </tr>
                           </thead>
                           <tfoot > 
                            <tr >
                                <th>Producto(info.)</th>
                                <th>Codigo</th>
                                <th>Peso</th>
                                <th>Stock</th>
                                <th>Estado</th>
                                <th>Observacion</th>                              
                                <th>Ingreso</th>
                                <th>Caducidad</th>
                                <th>Editar</th>                          
                                <th>Eliminar</th>                            
                            </tr>
                           </tfoot>
                           <tbody>
                            @foreach($prod as $productos)
                               <tr>
                                   <td>
                                      <a href="/prod/{{$productos->id}}/info">{{$productos->nombre_producto}}</a>
                                   </td> 

                                   <td>
                                       {{$productos->codigo_producto}}
                                   </td> 

                                   <td>
                                       {{$productos->peso_producto}} kg
                                   </td> 

                                   <td>
                                       {{$productos->stock_producto}} uni
                                   </td> 

                                   <td>
                                       {{$productos->estado_producto}}
                                   </td> 

                                   <td>
                                       {{$productos->observacion_producto}}
                                   </td> 


                                   <td>
                                       {{$productos->fecha_ingreso}}
                                   </td> 

                                   <td>
                                       {{$productos->fecha_caducidad}}
                                   </td> 
                                   
                                

                                   <td>

                                   <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#edit{{$productos->id}}">
                                      <i class="far fa-edit"></i>
                                    </button>
                                   </td>

                                      <div class="modal fade" id="edit{{$productos->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              
                                              <h4 class="modal-title" id="myModalLabel">Editar Producto</h4>
                                            </div>
                                            <div class="modal-body">

                                          

                                              <form action="{{route('productos.update',$productos->id)}}" method="POST">
                                                @csrf

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                    <label for="nombre_producto" class="col-sm-10 control-label">Producto</label>
                                                    <div class="col-sm-10">
                                                            <input type="text" class="form-control"  name="nombre_producto" value="{{old('nombre_producto', $productos->nombre_producto)}}" required>
                                                    </div>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                    <label for="codigo_producto" class="col-sm-10 control-label">Codigo</label>
                                                    <div class="col-sm-10">
                                                            <input type="text" class="form-control"  name="codigo_producto" value="{{old('codigo_producto',$productos->codigo_producto)}}" required>
                                                    </div>
                                                    </div>       
                                                </div>


                                                <div class="form-row">


                                                  <div class="form-group col-md-6">
                                                      <label for="peso_producto" class="col-sm-10 control-label">Peso</label>
                                                      <div class="col-sm-10">
                                                              <input type="number" class="form-control"  name="peso_producto" value="{{old('peso_producto',$productos->peso_producto)}}" required>
                                                      </div>
                                                      </div>


                                                  
                                                      <div class="form-group col-md-6">
                                                        <label for="stock_producto" class="col-sm-10 control-label">Stock</label>
                                                        <div class="col-sm-10">
                                                                <input type="number" class="form-control"  name="stock_producto" value="{{old('stock_producto',$productos->stock_producto)}}" required>
                                                        </div>
                                                  </div>

                                              </div>



                                              <div class="form-row">

                                                  

                                                  <div class="form-group col-md-6">
                                                    <label for="nombre_producto" class="col-sm-10 control-label">Estado</label>
                                                    <div class="col-sm-10">
                                                    <select class="custom-select" name="estado_producto">
                                                              <option value = '' ></option>
                                                              <option value = 'Disponible' >Disponible</option>
                                                              <option value = 'No Disponible' >No Disponible</option>
                                                      
                                                    </select>
                                                    </div>
                                                  </div>


                                                  <div class="form-group col-md-6">
                                                    <label for="observacion_producto" class="col-sm-10 control-label">Observacion</label>
                                                    <div class="col-sm-10">
                                                            <input type="text" class="form-control"  name="observacion_producto" value="{{old('observacion_producto',$productos->observacion_producto)}}" required>
                                                    </div>
                                                  </div>

                                        </div>


                                               

                                          <div class="form-row">

                                          
                                              <div class="form-group col-md-6">
                                                <label for="rol" class="col-sm-10 control-label" >Categoria</label>
                                                <div class="col-sm-10">
                                                <select class="custom-select" name="categoria_id">
                                                  <option value = '' ></option>
                                                  @foreach($cat as $cate)
                                                        <option value = '{{$cate->id}}' >{{ $cate->nombre_categoria }}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                              </div>

                                            

                                            <div class="form-group col-md-6">
                                                <label for="rol" class="col-sm-10 control-label" >Proveedor</label>
                                                <div class="col-sm-10">
                                                <select class="custom-select" name="proveedor_id">
                                                  <option value = '' ></option>
                                                @foreach($provee as $proveedores)
                                                        <option value = '{{$proveedores->id}}' >{{ $proveedores->nombre_proveedor}}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>

                             

                                                
                                            </div>

                                            <div class="form-row">

                                                <div class="form-group col-md-4">
                                                    <label for="rol" class="col-sm-10 control-label" >Seccion</label>
                                                    <div class="col-sm-10">
                                                    <select class="custom-select" name="seccion_id">
                                                      <option value = '' ></option>
                                                    @foreach($secc as $seccion)
                                                            <option value = '{{$seccion->id}}' >{{ $seccion->nombre_seccion}}</option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                                                </div>



                                                <div class="form-group col-md-4">
                                                    <label for="rol" class="col-sm-10 control-label" >Estante</label>
                                                    <div class="col-sm-10">
                                                    <select class="custom-select" name="estante_id">
                                                      <option value = '' ></option>
                                                    @foreach($est as $estante)
                                                            <option value = '{{$estante->id}}' >{{ $estante->nombre_estante}}</option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                                                </div>



                                                <div class="form-group col-md-4">
                                                    <label for="rol" class="col-sm-10 control-label" >Niveles</label>
                                                    <div class="col-sm-10">
                                                    <select class="custom-select" name="nivel_id">
                                                      <option value = '' ></option>
                                                    @foreach($niv as $nivel) 
                                                            <option value = '{{$nivel->id}}' >{{ $nivel->nombre_nivel }}</option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                                            </div>

                                            </div>

                                            <div class="form-row">

                                            <div class="form-group col-md-6">
                                                    <label for="rol" class="col-sm-10 control-label" >Fecha de Ingreso</label>
                                                    <div class="col-sm-10">
                                                       <input class="form-control" type="date" name="fecha_ingreso" value="{{old('fecha_ingreso',$productos->fecha_ingreso)}}">
                                                    </div>
                                            </div>


                                            <div class="form-group col-md-6">
                                                    <label for="rol" class="col-sm-10 control-label" >Fecha de caducidad</label>
                                                    <div class="col-sm-10">
                                                       <input class="form-control" type="date" name="fecha_caducidad" value="{{old('fecha_caducidad',$productos->fecha_caducidad)}}">
                                                    </div>
                                            </div>

                                            </div>



                                              
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                              <button type="submitt" class="btn btn-primary">Editar</button>
                                            </div>
                                          </form> 


                                          </div>
                                        </div>
                                      </div>

                                   <td>
                                   <a href="/prod/{{$productos->id}}/destroy" class='far fa-trash-alt' style='font-size:24px;color:red' title="Desactivar" onclick="return confirm('Estas seguro que deseas Eliminar?')"></a>
                                   </td>


                               </tr>
                              @endforeach
                           </tbody>
                    </table>   
                 
                  {{$prod -> render() }}

                </div>
    
                    @endif
                
            </div>
            
        </div>
    </div>
    </div>
    </div>
    </div>

 

@endsection





