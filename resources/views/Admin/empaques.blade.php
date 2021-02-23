@extends('layouts.admin')

@section('main-content')
<div class="content-wrapper">
<br>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Empaques</div>

                


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

                       <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#edit">Crear Empaques
                                     
                                    </button>

                                    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              
                                              <h4 class="modal-title" id="myModalLabel">Crear Empaques</h4>
                                            </div>
                                            <div class="modal-body">

                                          

                                              <form action="{{ route('empaques.add')}}" method="POST">
                                                @csrf
                                                
                                                <div class="form-group">
                                                <label for="orden_empaque" class="col-sm-10 control-label">Orden de empaquetado</label>
                                                <div class="col-sm-10">
                                                        <input type="text" class="form-control"  name="orden_empaque" value="{{old('orden_empaque')}}" required>
                                                </div>
                                                </div>

                                                <div class="form-group">

                                                <label for="name" class="col-sm-10 control-label">Producto (Elegir su producto)</label>
                                                <div class="col-sm-10">
                                                    <select class="custom-select" id="producto_id" name="producto_id">

                                                  <option value="0" data-codigo="" data-peso="" data-stock="" selected disabled>--Seleccione Producto--</option>
                                                  @foreach($prod as $producto) 
                                                            <option value ='{{$producto->id}}' data-codigo='{{$producto->codigo_producto}}' data-peso='{{$producto->peso_producto}}' data-stock='{{$producto->stock_producto}}'>{{ $producto->nombre_producto }}</option>
                                                        @endforeach
                                                                                                  
                                                  </select>
                                                  </div>
                                                </div>

                                               
                                                <div class="form-row">
                                                  <input id="id" class="form-control" type="text" placeholder="id" hidden/>


                                                <div class="form-group col-md-6">
                                                <label for="name" class="col-sm-10 control-label">Codigo Producto</label>
                                                <div class="col-sm-10">

                                                  <input id="codigo" class="form-control" type="text" placeholder="codigo" disabled/>

                                                  </div>
                                                </div>

                                                <div class="form-group col-md-6">
                                                <label for="name" class="col-sm-10 control-label">Nombres Producto</label>
                                                <div class="col-sm-10">
                                                  <input id="nombre" class="form-control" type="text" placeholder="nombre" disabled/>

                                                  </div>
                                                </div>

                                                </div>

                                                <div class="form-row">

                                                <div class="form-group col-md-6">
                                                <label for="name" class="col-sm-10 control-label">Peso Producto (KG)</label>
                                                <div class="col-sm-10">
                                                  <input id="peso" class="form-control" type="text" placeholder="peso" disabled/>

                                                  </div>
                                                </div>

                                                <div class="form-group col-md-6">
                                                <label for="name" class="col-sm-10 control-label">Stock Producto (unidades)</label>
                                                <div class="col-sm-10">
                                                  <input id="stock" class="form-control" type="text" placeholder="stock" disabled/>

                                                  </div>
                                                </div>

                                                </div>


                                                <div class="form-group">
                                                <label for="cantidad_producto" class="col-sm-4 control-label">Cantidad</label>
                                                <div class="col-sm-10">
                                                        <input type="number" class="form-control"  name="cantidad_producto" value="{{old('cantidad_producto')}}" required>
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
                                <th>Nombres</th>
                                <th>Cantidad</th>
                                <th>Eliminar</th>
                                                        
                                
                            </tr>
                           </thead>

                           <tfoot > 
                            <tr >
                                <th>Nombres</th>
                                <th>Cantidad</th>   
                                <th>Eliminar</th>                   
                                
                            </tr>
                           </tfoot>
                           <tbody>
                            @foreach($emp as $Empaques)
                               <tr>
                                   <td>
                                       {{$Empaques->orden_empaque}}
                                   </td> 
                                   <td>
                                        {{$Empaques->cantidad_producto}}
                                   </td>

                                   <td>
                            <a href="/empaques/{{$Empaques->id}}/destroy" class='far fa-trash-alt' style='font-size:24px;color:red' title="Eliminar" onclick="return confirm('Estas seguro que desea eliminar el estante?')">
                            </a>
                          </td>

                               </tr>
                              @endforeach
                           </tbody>
                    </table>   
                 
                  {{$emp -> render() }}

                </div>
    
                    @endif
                
            </div>
            
        </div>
    </div>
    </div>
    </div>
    </div>


<script>
    document.getElementById('producto_id').onchange = function() {
      /* Referencia al option seleccionado */
      var mOption = this.options[this.selectedIndex];
      /* Referencia a los atributos data de la opción seleccionada */
      var mData = mOption.dataset;

      /* Referencia a los input */
      var id = document.getElementById('id');
      var elCodigo = document.getElementById('codigo');
      var nombre = document.getElementById('nombre');
      var peso = document.getElementById('peso');
      var stock = document.getElementById('stock');
      
      /* Asignamos cada dato a su input*/
      id.value = this.value;
      elCodigo.value = mData.codigo;
      nombre.value = mOption.text; /*Se usará el valor que se muestra*/
      peso.value = mData.peso;
      stock.value = mData.stock;
    };
</script>
   
@endsection





