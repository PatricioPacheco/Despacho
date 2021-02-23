@extends('layouts.admin')

@section('main-content')
<div class="content-wrapper">
<br>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Categoria (Administrador)</div>

                


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

                       <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#create">Crear Categoria
                                     
                                    </button>

                                    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              
                                              <h4 class="modal-title" id="myModalLabel">Crear Categoria</h4>
                                            </div>
                                            <div class="modal-body">

                                          

                                              <form action="{{ route('categoria.add')}}" method="POST">
                                                @csrf
                                                
                                                <div class="form-group">
                                                <label for="nombre_categoria" class="col-sm-4 control-label">Categoria</label>
                                                <div class="col-sm-10">
                                                        <input type="text" class="form-control"  name="nombre_categoria" value="{{old('nombre_categoria')}}" required>
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
                                <th class="table-secondary">Nombre Categoria</th>
                                <th class="table-secondary">Editar</th>                          
                                <th class="table-secondary">Eliminar</th>                          
                                
                            </tr>
                           </thead>

                           <tfoot > 
                            <tr >
                            <th class="table-secondary">Nombre Categoria</th>
                            <th class="table-secondary">Editar</th>                          
                            <th class="table-secondary">Eliminar</th>                          
                                
                            </tr>
                           </tfoot>
                           <tbody>
                            @foreach($cat as $Categoria)
                               <tr>
                                   <td>
                                       {{$Categoria->nombre_categoria}}
                                   </td> 
                                   
                                

                                   <td>

                                   <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#edit{{$Categoria->id}}">
                                      <i class="far fa-edit"></i>
                                    </button>
                                   </td>

                                      <div class="modal fade" id="edit{{$Categoria->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              
                                              <h4 class="modal-title" id="myModalLabel">Editar Usuarios</h4>
                                            </div>
                                            <div class="modal-body">

                                          

                                              <form action="{{route('categoria.update',$Categoria->id)}}" method="POST">
                                                @csrf


                                                <div class="form-group">
                                                  <label for="">Nombre</label>
                                                  <input  type="text" class="form-control @error('nombre_categoria') is-invalid @enderror" name="nombre_categoria" value="{{old('nombre_categoria', $Categoria->nombre_categoria)}}" required autocomplete="nombre_categoria" autofocus>
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
                                   <a href="/categoria/{{$Categoria->id}}/eliminar" class='far fa-trash-alt' style='font-size:24px;color:red' title="Desactivar" onclick="return confirm('Estas seguro que deseas Eliminar?')"></a>
                                   </td>


                               </tr>
                              @endforeach
                           </tbody>
                    </table>   
                 
                  {{$cat -> render() }}

                </div>
    
                    @endif
                
            </div>
            
        </div>
    </div>
    </div>
    </div>
    </div>
   
@endsection





