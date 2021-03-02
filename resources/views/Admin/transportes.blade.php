@extends('layouts.admin')

@section('main-content')
<div class="content-wrapper">
<br>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Transportes</div>

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
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#create">Crear Transporte</button>

                <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                  <div class="modal-dialog" role="document">

                    <div class="modal-content">

                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Crear Transportes</h4>
                      </div>

                      <div class="modal-body">
                        <form action="{{ route('transportes.add')}}" method="POST">
                          @csrf
                          <div class="form-group">
                            <label for="empresa_transporte" class="col-sm-4 control-label">Empresa</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="empresa_transporte" value="{{old('empresa_transporte')}}" required>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="tipo_transporte" class="col-sm-4 control-label">Tipo</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="tipo_transporte" value="{{old('tipo_transporte')}}" required>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="numero_transporte" class="col-sm-4 control-label">Teléfono/Celular</label>
                            <div class="col-sm-10">
                              <input type="number" class="form-control" name="numero_transporte" value="{{old('numero_transporte')}}" required>
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
                        <th>Empresa</th>  
                        <th>Tipo</th>
                        <th>Teléfono</th>  
                        <th>Editar</th>
                        <th>Eliminar</th>
                      </tr>
                    </thead>

                    <tfoot> 
                      <tr>
                        <th>Empresa</th>  
                        <th>Tipo</th>
                        <th>Teléfono</th>  
                        <th>Editar</th>
                        <th>Eliminar</th>
                      </tr>
                    </tfoot>

                    <tbody>
                      @foreach($trs as $Transporte)
                        <tr>
                          <td>
                            {{$Transporte->empresa_transporte}}
                          </td>

                          <td>
                            {{$Transporte->tipo_transporte}}
                          </td>  

                          <td>
                            0{{$Transporte->numero_transporte}}
                          </td> 

                          <td>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#edit{{$Transporte->id}}"><i class="far fa-edit"></i>
                            </button>
                          </td>

                          <div class="modal fade" id="edit{{$Transporte->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel">Editar Transporte</h4>
                                </div>

                                <div class="modal-body">
                                  <form action="{{route('transportes.update',$Transporte->id)}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                      <label for="">Empresa</label>
                                      <input  type="text" class="form-control @error('empresa_transporte') is-invalid @enderror" name="empresa_transporte" value="{{old('empresa_transporte', $Transporte->empresa_transporte)}}" required autocomplete="empresa_transporte" autofocus>
                                    </div>

                                    <div class="form-group">
                                      <label for="">Tipo</label>
                                      <input  type="text" class="form-control @error('tipo_transporte') is-invalid @enderror" name="tipo_transporte" value="{{old('tipo_transporte', $Transporte->tipo_transporte)}}" required autocomplete="tipo_transporte" autofocus>
                                    </div>

                                    <div class="form-group">
                                      <label for="">Teléfono</label>
                                      <input  type="number" class="form-control @error('numero_transporte') is-invalid @enderror" name="numero_transporte" value="{{old('numero_transporte', $Transporte->numero_transporte)}}" required autocomplete="numero_transporte" autofocus>
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
                            <a href="/transportes/{{$Transporte->id}}/destroy" class='far fa-trash-alt' style='font-size:24px;color:red' title="Eliminar" onclick="return confirm('Estas seguro que desea eliminar el transporte?')">
                            </a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>   
                 
                  {{$trs -> render() }}

                </div>
    
            @endif
                
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
   
@endsection





