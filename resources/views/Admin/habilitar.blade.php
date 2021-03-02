@extends('layouts.admin')

@section('main-content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Habilitar Usuarios</div>

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

              <div class="table-responsive"> 
                <table class="table table-striped table-bordered  file-export " id="table" width="100%" cellspacing="0">
                    <thead> 
                      <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>                             
                        <th>Borrado el</th>
                        <th>Habilitar</th>                          
                      </tr>
                    </thead>

                    <tfoot> 
                      <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>                             
                        <th>Borrado el</th>
                        <th>Habilitar</th>                          
                      </tr>
                    </tfoot>
                     
                    <tbody>
                      @foreach($userss as $User)
                        <tr>
                          <td>
                            {{$User->name}}
                          </td> 
                          <td>
                            {{$User->email}}
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
                            {{$User->deleted_at}}
                          </td>
                          <td>
                            <a href="/habilitar/{{$User->id}}/rest" class="far fa-calendar-plus" title="Desactivar" style='font-size:24px;color:green' title="Habilitar" onclick="return confirm('Estas seguro que deseas Habilitar?')"></a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>   
                 
                  {{$userss -> render() }}

                </div>

            @endif
                
          </div>
        </div>
      </div>
    </div>

@endsection





