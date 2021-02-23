@extends('layouts.app3')

@section('content')
<div class="content-wrapper">
<br>

  
 <link rel="stylesheet" type="text/css" href="{{ asset('css/estilosCard.css') }}" >


<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<div class="row">
     <div class=".col-6 .col-md-4">

      <div class="card1" >
        <div class="card-header">Estudiantes</div>
                            @if (session('success'))
                                  <div class="alert alert-success">
                                      {{ session('success') }}
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


        <p class="card-text">Matricular Estudiante</p>

        {!! Form::open(['url'=>'/AddUser', 'method' =>'GET', 'class'=>'navbar navbar-light bg-light pull-right form-inline' ,'role'=>'search']) !!}
                    {!! Form::text('names',null, ['class'=>'form-control mr-sm-2', 'placeholder'=> 'Buscar por nombre']) !!}
                    <div class="card-body d-flex justify-content-between align-items-center">
                      
                       <button class="btn btn-primary" align="right" type="submit"> <i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>

                   
                    {!! Form::close() !!}

                    <div class="table-responsive"> 
                      <table class="table"> 

                        <thead class="thead-light"> 
                            <br>
                            <tr >           
                                <th>Estudiante</th>
                                <th>Matricular</th> 
            
                            </tr>
                           </thead>

                           <tbody>

                            @foreach($users as $user)
                            <tr>

                              <td>
                                  {{$user->name}}
                                </td>


                                  <td>

                                   <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addUser{{$user->id}}">
                                      <i class="far fa-edit"></i>
                                    </button>
                                   </td>

                                   <div class="modal fade" id="addUser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              
                                              <h4 class="modal-title" id="myModalLabel">Clase a Matricular</h4>
                                            </div>
                                            <div class="modal-body">

                                          

                                              <form action="{{route('clases.matricula',$user->id)}}" method="POST">
                                                @csrf

                                                         <div class="form-group">
                                                          <label for="">Estudiante:</label>
                                                          {{$user->name}}
                                                          <input id="est" type="text" class="form-control @error('name') is-invalid @enderror" name="est" value="{{old('name', $user->id)}}" required autocomplete="est" hidden readonly autofocus>
                                                        </div>


                                                          <div class="form-group ">
                                                               <label for="class" >Clase</label>
                                                        
                                                            <select id="class" class="form-control" name="class">
                                                              <option value="">---Clase---</option>
                                                               @foreach($class as $Class)
                                                                
                                                                <option value="{{$Class->id}}">{{$Class->nombre}}</option>

                                                                @endforeach
                                                            </select>
                                                       
                                                          </div>

                                      
                                            
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                              <button type="submit" class="btn btn-primary">Matricular</button>
                                            </div>
                                          </form> 


                                          </div>
                                        </div>
                                      </div>

                                      </div>
 
                             </tr>
                              @endforeach

                          </tbody>

                          </table>

                           {{$users -> render() }}
                    </div> 

              </div> 
        </div> 
    </div> 


    <div class="col-sm-8" >
    <div class="card2" >
       <div class="card-header">Estudiantes Matriculados</div>
      <div class="card-body">
        
        <p class="card-text">lista con estudiantes matriculados.</p>




  <div class="table-responsive">  

            <table border="0" width="100%" cellpadding="5" cellspacing="5">

            <tr>

          <td width="50%">

           <table class="table" >
            <thead class="thead-light"> 

             <tr >
                             <th>Estudiante</th>
                           
                             <th>Clase Asig</th>
                              
 
                        </tr>

                        </thead>

                        <tbody>

            @foreach($usr as $Class)
                               <tr>
                                   <td>
                                   {{$Class->name}}
                                   </td> 
                                  
                                   <td>
                                   {{$Class->nombre}}
                                   </td>
                                   
                              
                              @endforeach
                            
                                   </tr>

                                   </tbody>

           </table>

           

          </td> 

          <td width="50%">

           <table class="table" >
            <thead class="thead-light"> 

             <tr >

                <th>Editar</th>
                                
                              <th>Eliminar</th>

 
                        </tr>

                        </thead>

                        <tbody>

           @foreach($est as $Classt)
                               <tr>

                                

                                  <td>

                                   <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#editM{{$Classt->id}}">
                                      <i class="far fa-edit"></i>
                                    </button>
                                   </td>

                                      <div class="modal fade" id="editM{{$Classt->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              
                                              <h4 class="modal-title" id="myModalLabel">Editar Matricula</h4>
                                            </div>
                                            <div class="modal-body">

                                          

                                              <form action="{{route('matriculas.update',$Classt->id)}}" method="POST">
                                                @csrf

                                                 <div class="form-group">
                                                  
                                                
                                                  <input id="est" type="text" class="form-control @error('name') is-invalid @enderror" name="est" value="{{old('name', $Classt->id)}}" required autocomplete="est" hidden readonly autofocus>
                                                </div>


                                               <div class="form-group ">
                                        <label for="class" >Clase</label>
                                        
                                            <select id="class" class="form-control" name="class">
                                              <option value="">---Clase---</option>
                                               @foreach($class as $Class)
                                                
                                                <option value="{{$Class->id}}">{{$Class->nombre}}</option>

                                                @endforeach
                                            </select>

                                       
                                    </div>

                                              
                                              
                                      
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                              <button type="submit" class="btn btn-primary">Editar</button>
                                            </div>
                                          </form> 


                                          </div>
                                        </div>
                                      </div>
                                  
                                 

                                    

                                   

                                   <td>

                                    <a href="/AddUser/{{$Classt->id}}" class='far fa-trash-alt' style='font-size:24px;color:red' title="Desactivar" onclick="return confirm('Estas seguro que deseas Eliminar?')"></a>

                              @endforeach

                                   </td> 
                                   
                                   </tr>

                                   </tbody>

           </table>

          </td>

         </tr>

        </table>

        {{$usr -> render() }}



            
                </div> 


        </div> 
    </div>
</div> 



  </div> 
</div>

@include('sweetalert::alert')
@endsection



