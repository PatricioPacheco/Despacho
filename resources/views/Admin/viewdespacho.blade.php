@extends('layouts.admin')

@section('main-content')
<div class="container">


<link rel="stylesheet" href="{{ asset('css/ol2/theme/default/style.css') }}" type="text/css"/>

<!-- Dependencies: JQuery and OpenLayer API should be loaded first -->
<script src="{{ asset('js/jquery-1.7.2.min.js') }}"></script>
<script src="{{ asset('js/OpenLayers.js') }}"></script>

<!-- CSS and JS for our code -->
<script src="{{ asset('js/jquery-position-picker.debug.js') }}"></script>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Despachos</div>

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

              
                
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    

                        
                <div class="card-body">
                    <div class="table-responsive"> 
                        <table class="table table-striped table-bordered  file-export " id="table" width="100%" cellspacing="0">
                           <thead > 
                            <tr >
                                <th>N° Despacho</th>
                                <th>Cliente</th>
                                <th>Empaquetado</th>
                                <th>Producto</th>
                                <th>Transporte</th>
                                <th>Fecha despacho</th> 
                                <th>Direccion</th> 
                                <th>Borrar</th>                           
                                                        
                                
                            </tr>
                           </thead>

                           <tfoot > 
                            <tr >
                            
                                <th>N° Despacho</th>
                                <th>Cliente</th>
                                <th>Empaquetado</th>
                                <th>Producto</th>
                                <th>Transporte</th>
                                <th>Fecha despacho</th> 
                                <th>Direccion</th> 
                                <th>Borrar</th>                          
                                                       
                                                         
                                
                            </tr>
                           </tfoot>
                           <tbody>
                      @foreach($desp as $Despacho)
                        <tr>
                          <td>
                            {{$Despacho->despachoid}}
                          </td>

                          <td>
                            {{$Despacho->primer_nombre_cliente}} {{$Despacho->segundo_nombre_cliente}} {{$Despacho->primer_apellido_cliente}} {{$Despacho->segundo_apellido_cliente}}
                          </td> 

                          <td>
                            {{$Despacho->orden_empaque}}
                          </td>

                          <td>
                            {{$Despacho->nombre_producto}}
                          </td>

                          <td>
                            {{$Despacho->empresa_transporte}} - {{$Despacho->tipo_transporte}}
                          </td>

                         

                          <td>
                            {{$Despacho->despachofecha}}
                          </td>


                          <td>
                          
                            <!--<button type="button" style='font-size:24px;color:purple' data-toggle="modal" data-target="#edit{{$Despacho->despachoid}}"><i class="fas fa-eye"></i>
                            </button>-->
                            <a class="fas fa-eye" style='font-size:19px;color:blue' data-toggle="modal" data-target="#edit{{$Despacho->despachoid}}">
                            </a>
                          </td>

                          <div class="modal fade" id="edit{{$Despacho->despachoid}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel">Direccion Mapa</h4>
                                </div>

                                <div class="modal-body">
                                  <form action="" method="POST">
                                    @csrf
                            
                                    <div class="form-group col-md-4">
                                    <fieldset class="gllpLatlonPicker">
                                        <div class="gllpMap" style="height: 400px; width: 740px;" disabled></div>
                                        <input type="hidden" name="desp_latitude" class="gllpLatitude" value="{{old('desp_latitude',$Despacho->desp_latitude)}}"/>
                                        <input type="hidden" name="desp_longitude" class="gllpLongitude" value="{{old('desp_longitude',$Despacho->desp_longitude)}}"/>
                                        <input type="hidden" name="zoom" class="gllpZoom" value="{{old('zoom',$Despacho->zoom)}}"/>
                                    </fieldset>

                                    </div>
                                        

                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                            
                                    </div>
                                  </form> 
                                </div>
                              </div>
                            </div>
							</div>

                            

                          <td>
                            <a href="/despachos/{{$Despacho->despachoid}}/destroy" class='far fa-trash-alt' style='font-size:19px;color:red' title="Eliminar" onclick="return confirm('Estas seguro que desea eliminar el despacho?')">
                            </a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>   
                 

                </div>
                </div>

    
            
                
            </div>
        </div>
    </div>

</div>



@endsection





