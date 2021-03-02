@extends('layouts.admin')

@section('main-content')
<div class="content-wrapper">
<br>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Niveles</div>

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
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#create">Crear Nivel</button>

                <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                  <div class="modal-dialog" role="document">

                    <div class="modal-content">

                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Crear Niveles</h4>
                      </div>

                      <div class="modal-body">
                        <form action="{{ route('niveles.add')}}" method="POST">
                          @csrf
                          <div class="form-group">
                            <label for="nombre_nivel" class="col-sm-4 control-label">Nombre</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control"  name="nombre_nivel" value="{{old('nombre_nivel')}}" required>
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
                        <th>Nivel</th> 
                        <th>Editar</th>
                        <th>Eliminar</th>
                      </tr>
                    </thead>

                    <tfoot> 
                      <tr>
                        <th>Nivel</th> 
                        <th>Editar</th>
                        <th>Eliminar</th>
                      </tr>
                    </tfoot>

                    <tbody>
                      @foreach($lvl as $Nivel)
                        <tr>
                          <td>
                            {{$Nivel->nombre_nivel}}
                          </td> 

                          <td>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#edit{{$Nivel->id}}"><i class="far fa-edit"></i>
                            </button>
                          </td>

                          <div class="modal fade" id="edit{{$Nivel->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel">Editar Niveles</h4>
                                </div>

                                <div class="modal-body">
                                  <form action="{{route('niveles.update',$Nivel->id)}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                      <label for="">Nivel</label>
                                      <input  type="text" class="form-control @error('nombre_nivel') is-invalid @enderror" name="nombre_nivel" value="{{old('nombre_nivel', $Nivel->nombre_nivel)}}" required autocomplete="nombre_nivel" autofocus>
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
                            <a href="/niveles/{{$Nivel->id}}/destroy" class='far fa-trash-alt' style='font-size:24px;color:red' title="Eliminar" onclick="return confirm('Estas seguro que desea eliminar el nivel?')">
                            </a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>   
                 
                  {{$lvl -> render() }}

                </div>
    
            @endif
                
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
   
@endsection





