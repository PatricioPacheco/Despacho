@extends('layouts.admin')

@section('main-content')
<div class="content-wrapper">
<br>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Proveedores</div>

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
              @if (session('status'))
                <div class="alert alert-success" role="alert">
                  {{ session('status') }}
                </div>
              @endif

              <div class="card-body d-flex justify-content-between align-items-center">
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#create">Crear Proveedor</button>

                <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                  <div class="modal-dialog" role="document">

                    <div class="modal-content">

                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Crear Proveedores</h4>
                      </div>

                      <div class="modal-body">
                        <form action="{{ route('proveedores.add')}}" method="POST">
                          @csrf
                          <div class="form-group">
                            <label for="nombre_proveedor" class="col-sm-4 control-label">Nombre</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control"  name="nombre_proveedor" value="{{old('nombre_proveedor')}}" required>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="direccion_proveedor" class="col-sm-4 control-label">Dirección</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="direccion_proveedor" value="{{old('direccion_proveedor')}}" required>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="email_proveedor" class="col-sm-4 control-label">Email</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" name="email_proveedor" value="{{old('email_proveedor')}}" required>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="numero_proveedor" class="col-sm-4 control-label">Teléfono/Celular</label>
                            <div class="col-sm-10">
                              <input type="number" class="form-control" name="numero_proveedor" value="{{old('numero_proveedor')}}" required>
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
                        <th>Nombre</th>
                        <th>Direccion</th>  
                        <th>Email</th>
                        <th>Teléfono</th>  
                        <th>Editar</th>
                        <th>Eliminar</th>
                      </tr>
                    </thead>

                    <tfoot> 
                      <tr>
                        <th>Nombre</th>
                        <th>Direccion</th>  
                        <th>Email</th>
                        <th>Teléfono</th>  
                        <th>Editar</th>
                        <th>Eliminar</th>
                      </tr>
                    </tfoot>

                    <tbody>
                      @foreach($prv as $Proveedor)
                        <tr>
                          <td>
                            {{$Proveedor->nombre_proveedor}}
                          </td> 

                          <td>
                            {{$Proveedor->direccion_proveedor}}
                          </td>

                          <td>
                            {{$Proveedor->email_proveedor}}
                          </td>  

                          <td>
                            0{{$Proveedor->numero_proveedor}}
                          </td> 

                          <td>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#edit{{$Proveedor->id}}"><i class="far fa-edit"></i>
                            </button>
                          </td>

                          <div class="modal fade" id="edit{{$Proveedor->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel">Editar Proveedor</h4>
                                </div>

                                <div class="modal-body">
                                  <form action="{{route('proveedores.update',$Proveedor->id)}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                      <label for="">Nombre</label>
                                      <input  type="text" class="form-control @error('nombre_proveedor') is-invalid @enderror" name="nombre_proveedor" value="{{old('nombre_proveedor', $Proveedor->nombre_proveedor)}}" required autocomplete="nombre_proveedor" autofocus>
                                    </div>

                                    <div class="form-group">
                                      <label for="">Direccion</label>
                                      <input  type="text" class="form-control @error('direccion_proveedor') is-invalid @enderror" name="direccion_proveedor" value="{{old('direccion_proveedor', $Proveedor->direccion_proveedor)}}" required autocomplete="direccion_proveedor" autofocus>
                                    </div>

                                    <div class="form-group">
                                      <label for="">Email</label>
                                      <input  type="email" class="form-control @error('email_proveedor') is-invalid @enderror" name="email_proveedor" value="{{old('email_proveedor', $Proveedor->email_proveedor)}}" required autocomplete="email_proveedor" autofocus>
                                    </div>

                                    <div class="form-group">
                                      <label for="">Número</label>
                                      <input  type="number" class="form-control @error('numero_proveedor') is-invalid @enderror" name="numero_proveedor" value="{{old('numero_proveedor', $Proveedor->numero_proveedor)}}" required autocomplete="numero_proveedor" autofocus>
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
                            <a href="/proveedores/{{$Proveedor->id}}/destroy" class='far fa-trash-alt' style='font-size:24px;color:red' title="Eliminar" onclick="return confirm('Estas seguro que desea eliminar el proveedor?')">
                            </a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>   
                 
                  {{$prv -> render() }}

                </div>
    
            @endif
                
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
   
@endsection





