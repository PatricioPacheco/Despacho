@extends('layouts.admin')

@section('main-content')
<div class="content-wrapper">
<br>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Usuarios</div>

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
              <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#edit">Crear Usuario</button>
              <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel">Crear Usuarios</h4>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('usuarios.add')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="name" class="col-sm-4 control-label">Nombres</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control"  name="name" value="{{old('name')}}" required>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label for="email" class="col-sm-4 control-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control"  name="email" value="{{old('email')}}"  required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="phone" class="col-sm-4 control-label">Teléfono/Celular</label>
                          <div class="col-sm-10">
                            <input type="phone" class="form-control"  name="phone" value="{{old('phone')}}"  required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="password" class="col-sm-4 control-label">Contraseña</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" value="{{old('password')}}">
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-sm-6">
                            <select class="custom-select" name="role" hidden>
                              <option value=1>Empleado</option>
                            </select>
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
                      <th>Email</th>
                      <th>Teléfono</th>
                      <th>Rol</th>    
                      <th>Fecha</th> 
                      <th>Editar</th>                          
                      <th>Eliminar</th>                          
                    </tr>
                  </thead>

                  <tfoot> 
                    <tr>
                      <th>Nombre</th>
                      <th>Email</th>
                      <th>Teléfono</th>
                      <th>Rol</th> 
                      <th>Fecha</th>    
                      <th>Editar</th>                          
                      <th>Eliminar</th>                                     
                    </tr>
                  </tfoot>

                  <tbody>
                    @foreach($users as $User)
                      <tr>
                        <td>
                          {{$User->name}}
                        </td> 
                        <td>
                          {{$User->email}}
                        </td>
                        <td>
                          0{{$User->phone}}
                        </td>
                        <td>
                          @if ($User->role ==0)
                            Administrador
                          @endif
                          @if ($User->role ==1)
                            Empleado
                          @endif
                        </td>
                        <td>
                          {{$User->created_at}}
                        </td>
                        <td>
                          <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#edit{{$User->id}}">
                          <i class="far fa-edit"></i></button>
                        </td>

                        <div class="modal fade" id="edit{{$User->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Editar Usuarios</h4>
                              </div>
                              <div class="modal-body">
                                <form action="{{route('usuarios.update',$User->id)}}" method="POST">
                                  @csrf
                                  <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input  type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name', $User->name)}}" required autocomplete="name" autofocus>
                                  </div>
                                  <div class="form-group">
                                    <label for="">Email</label>
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email', $User->email)}}" required autocomplete="email" readonly autofocus>
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
                          <a href="/usuarios/{{$User->id}}/eliminar" class='far fa-trash-alt' style='font-size:24px;color:red' title="Desactivar" onclick="return confirm('Estas seguro que deseas Eliminar?')"></a>
                        </td>
                      </tr>
                      
                    @endforeach
                  </tbody>
                </table>   
                 
                {{$users -> render() }}

              </div>
    
            @endif
                
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
   
@endsection





