@extends('layouts.admin')

@section('main-content')
<div class="content-wrapper">
<br>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Secciones</div>

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
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#create">Crear Sección</button>

                <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                  <div class="modal-dialog" role="document">

                    <div class="modal-content">

                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Crear Secciones</h4>
                      </div>

                      <div class="modal-body">
                        <form action="{{ route('secciones.add')}}" method="POST">
                          @csrf
                          <div class="form-group">
                            <label for="nombre_seccion" class="col-sm-4 control-label">Nombre</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control"  name="nombre_seccion" value="{{old('nombre_seccion')}}" required>
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
                        <th>Sección</th> 
                        <th>Editar</th>
                        <th>Eliminar</th>
                      </tr>
                    </thead>

                    <tfoot> 
                      <tr>
                        <th>Sección</th> 
                        <th>Editar</th>
                        <th>Eliminar</th>
                      </tr>
                    </tfoot>

                    <tbody>
                      @foreach($sec as $Seccion)
                        <tr>
                          <td>
                            {{$Seccion->nombre_seccion}}
                          </td> 

                          <td>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#edit{{$Seccion->id}}"><i class="far fa-edit"></i>
                            </button>
                          </td>

                          <div class="modal fade" id="edit{{$Seccion->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel">Editar Secciones</h4>
                                </div>

                                <div class="modal-body">
                                  <form action="{{route('secciones.update',$Seccion->id)}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                      <label for="">Sección</label>
                                      <input  type="text" class="form-control @error('nombre_seccion') is-invalid @enderror" name="nombre_seccion" value="{{old('nombre_seccion', $Seccion->nombre_seccion)}}" required autocomplete="nombre_seccion" autofocus>
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
                            <a href="/secciones/{{$Seccion->id}}/destroy" class='far fa-trash-alt' style='font-size:24px;color:red' title="Eliminar" onclick="return confirm('Estas seguro que desea eliminar la sección?')">
                            </a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>   
                 
                  {{$sec -> render() }}

                </div>
    
            @endif
                
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
   
@endsection





