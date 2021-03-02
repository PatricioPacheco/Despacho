@extends('layouts.admin')

@section('main-content')
<div class="content-wrapper">
<br>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Clientes</div>

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
        
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif


              <div class="card-body d-flex justify-content-between align-items-center">
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#create">Crear Cliente</button>

                <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                  <div class="modal-dialog" role="document">

                    <div class="modal-content">

                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Crear Clientes</h4>
                      </div>

                      <div class="modal-body">
                        <form action="{{ route('clientes.add')}}" method="POST">
                          @csrf

                          <h5>Datos Cliente</h5>

                          <div class="form-row">

                          <div class="form-group col-md-6">
                            <label for="primer_nombre_cliente" >Primer Nombre</label>
                            
                              <input type="text" class="form-control" name="primer_nombre_cliente" value="{{old('primer_nombre_cliente')}}" required>
                           
                          </div>

                          <div class="form-group col-md-6">
                            <label for="segundo_nombre_cliente" >Segundo Nombre</label>
                           
                              <input type="text" class="form-control" name="segundo_nombre_cliente" value="{{old('segundo_nombre_cliente')}}" required>
                            
                          </div>
                        </div>

                        <div class="form-row">

                          <div class="form-group col-md-6">
                            <label for="primer_apellido_cliente" >Primer Apellido</label>
                            
                              <input type="text" class="form-control" name="primer_apellido_cliente" value="{{old('primer_apellido_cliente')}}" required>
                           
                          </div>

                          <div class="form-group col-md-6">
                            <label for="segundo_apellido_cliente" >Segundo Apellido</label>
                         
                              <input type="text" class="form-control" name="segundo_apellido_cliente" value="{{old('segundo_apellido_cliente')}}" required>
                           
                          </div>
                          </div>



                          <div class="form-row">

                          <div class="form-group col-md-6">
                            <label for="email_cliente" >Email</label>
                          
                              <input type="email" class="form-control" name="email_cliente" value="{{old('email_cliente')}}" required>
                            
                          </div>

                          <div class="form-group col-md-6">
                            <label for="numero_cliente" >Número</label>
                            
                              <input type="number" class="form-control" name="numero_cliente" value="{{old('numero_cliente')}}" required>
                          
                          </div>
                          </div>

                          <h5>Dirección Cliente</h5>

                          <div class="form-group">
                            <label for="calle_principal_direccion" >Calle Principal</label>
                            
                              <input type="text" class="form-control" name="calle_principal_direccion" value="{{old('calle_principal_direccion')}}" required>
                            
                          </div>

                          <div class="form-group">
                            <label for="calle_secundaria_direccion" >Calle Secundaria</label>
                            
                              <input type="text" class="form-control" name="calle_secundaria_direccion" value="{{old('calle_secundaria_direccion')}}" required>
                            
                          </div>

                          <div class="form-row">

                         <div class="form-group col-md-3">
                            <label for="numero_direccion" >Número Casa</label>
                         
                              <input type="text" class="form-control" name="numero_direccion" value="{{old('numero_direccion')}}" required>
                         
                          </div>

                          <div class="form-group col-md-9">
                            <label for="referencia_direccion" >Referencia</label>
                           
                              <input type="text" class="form-control" name="referencia_direccion" value="{{old('referencia_direccion')}}" required>
                         
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
                <table class="table table-striped table-bordered  file-export " id="table" width="100%" cellspacing="0">
                    <thead> 
                      <tr>
                        <th>Cliente</th>  
                        
                        <th>Email</th>
                        <th>Número</th>
                        <th>Calle Principal</th>
                        <th>Calle Secundaria</th>
                        <th>Número Casa</th>
                        <th>Referencia</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                      </tr>
                    </thead>

                    <tfoot> 
                      <tr>
                        <th>Cliente</th>  
                      
                        <th>Email</th>
                        <th>Número</th>
                        <th>Calle Principal</th>
                        <th>Calle Secundaria</th>
                        <th>Número Casa</th>
                        <th>Referencia</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                      </tr>
                    </tfoot>

                    <tbody>
                      @foreach($cli as $Cliente)
                        <tr>
                          <td>
                            {{$Cliente->primer_nombre_cliente}} {{$Cliente->segundo_nombre_cliente}} {{$Cliente->primer_apellido_cliente}} {{$Cliente->segundo_apellido_cliente}}
                          </td>

              

                          <td>
                            {{$Cliente->email_cliente}}
                          </td>

                          <td>
                            0{{$Cliente->numero_cliente}}
                          </td>

                          <td>
                            {{$Cliente->calle_principal_direccion}}
                          </td>

                          <td>
                            {{$Cliente->calle_secundaria_direccion}}
                          </td> 

                          <td>
                            {{$Cliente->numero_direccion}}
                          </td>

                          <td>
                            {{$Cliente->referencia_direccion}}
                          </td> 

                          <td>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#edit{{$Cliente->id}}"><i class="far fa-edit"></i>
                            </button>
                          </td>

                          <div class="modal fade" id="edit{{$Cliente->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel">Editar Cliente</h4>
                                </div>

                                <div class="modal-body">
                                  <form action="{{route('clientes.update',$Cliente->id)}}" method="POST">
                                    @csrf

                                    <h5> Datos Cliente </h5>

                                    <div class="form-row">

                                    <div class="form-group col-md-6">
                                      <label for="">Primer Nombre</label>
                                      <input  type="text" class="form-control @error('primer_nombre_cliente') is-invalid @enderror" name="primer_nombre_cliente" value="{{old('primer_nombre_cliente', $Cliente->primer_nombre_cliente)}}" required autocomplete="primer_nombre_cliente" autofocus>
                                    </div>

                                    <div class="form-group col-md-6">
                                      <label for="">Segundo Nombre</label>
                                      <input  type="text" class="form-control @error('segundo_nombre_cliente') is-invalid @enderror" name="segundo_nombre_cliente" value="{{old('segundo_nombre_cliente', $Cliente->segundo_nombre_cliente)}}" required autocomplete="segundo_nombre_cliente" autofocus>
                                    </div>
                                    </div> 


                                    <div class="form-row">

                                    <div class="form-group col-md-6">
                                      <label for="">Primer Apellido</label>
                                      <input  type="text" class="form-control @error('primer_apellido_cliente') is-invalid @enderror" name="primer_apellido_cliente" value="{{old('primer_apellido_cliente', $Cliente->primer_apellido_cliente)}}" required autocomplete="primer_apellido_cliente" autofocus>
                                    </div>

                                    <div class="form-group col-md-6">
                                      <label for="">Segundo Apellido</label>
                                      <input  type="text" class="form-control @error('segundo_apellido_cliente') is-invalid @enderror" name="segundo_apellido_cliente" value="{{old('segundo_apellido_cliente', $Cliente->segundo_apellido_cliente)}}" required autocomplete="segundo_apellido_cliente" autofocus>
                                    </div>

                                    </div>
                                    
                                    
                                    <div class="form-row">

                                    <div class="form-group col-md-6">
                                      <label for="">Email</label>
                                      <input  type="email" class="form-control @error('email_cliente') is-invalid @enderror" name="email_cliente" value="{{old('email_cliente', $Cliente->email_cliente)}}" required autocomplete="email_cliente" autofocus>
                                    </div>

                                    <div class="form-group col-md-6">
                                      <label for="">Número</label>
                                      <input  type="number" class="form-control @error('numero_cliente') is-invalid @enderror" name="numero_cliente" value="0{{old('numero_cliente', $Cliente->numero_cliente)}}" required autocomplete="numero_cliente" autofocus>
                                    </div>

                                    </div>


                                 

                                    <h5> Dirección Cliente </h5>

                                    <div class="form-group">
                                      <label for="">Calle Principal</label>
                                      <input  type="text" class="form-control @error('calle_principal_direccion') is-invalid @enderror" name="calle_principal_direccion" value="{{old('calle_principal_direccion', $Cliente->calle_principal_direccion)}}" required autocomplete="calle_principal_direccion" autofocus>
                                    </div>

                                    <div class="form-group">
                                      <label for="">Calle Secundaria</label>
                                      <input  type="text" class="form-control @error('calle_secundaria_direccion') is-invalid @enderror" name="calle_secundaria_direccion" value="{{old('calle_secundaria_direccion', $Cliente->calle_secundaria_direccion)}}" required autocomplete="calle_secundaria_direccion" autofocus>
                                    </div>

                                    <div class="form-row">

                                    <div class="form-group col-md-3">
                                      <label for="">Número Casa</label>
                                      <input  type="text" class="form-control @error('numero_direccion') is-invalid @enderror" name="numero_direccion" value="{{old('numero_direccion', $Cliente->numero_direccion)}}" required autocomplete="numero_cliente" autofocus>
                                    </div>

                                    <div class="form-group col-md-9">
                                      <label for="">Referencia</label>
                                      <input  type="text" class="form-control @error('referencia_direccion') is-invalid @enderror" name="referencia_direccion" value="{{old('referencia_direccion', $Cliente->referencia_direccion)}}" required autocomplete="referencia_direccion" autofocus>
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
                            <a href="/clientes/{{$Cliente->id}}/destroy" class='far fa-trash-alt' style='font-size:24px;color:red' title="Eliminar" onclick="return confirm('Estas seguro que desea eliminar el cliente?')">
                            </a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>   
                 
                  {{$cli -> render() }}

                </div>
                
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
   
@endsection





