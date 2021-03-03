@extends('layouts.admin')

@section('main-content')

<div class="content-wrapper">
<br>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Acerca de</div>
<!-- Page Heading -->

                  <div class="card-profile-image mt-4">
                      <img src="{{ asset('images/logo.png') }}" alt="user-image">
                  </div>

                  <div class="card-body">

                      <div class="row">
                          <div class="col-lg-12 mb-1">
                              <div class="text-center">
                                  <h5 class="font-weight-bold">Sistema de Gestión de Productos</h5>
                              </div>
                          </div>
                      </div>

                      <hr>

                        @if (auth()->user()->role ==0)

                          <div class="row row-cols-1 row-cols-md-3 g-4">
                            <div class="col">
                              <div class="card">
                                <div class="card-body">
                                  <center><i class="far fa-user"></i></center>
                                  <h5 class="card-title">Usuarios</h5>
                                  <p class="card-text">Módulo para la administración de usuarios.</p>
                                  <p class="card-text">
                                    <small class="text-muted"><a class="collapse-item" href="{{ route('profile') }}"><span>{{ __('Ir a Perfil') }}</span></a></small>
                                    <br>
                                    <small class="text-muted"><a class="collapse-item" href="{{ route('usuarios') }}"><span>{{ __('Ir a Usuarios') }}</span></a></small>
                                    <br>
                                    <small class="text-muted"><a class="collapse-item" href="{{ route('usuarioshabilitar') }}"><span>{{ __('Ir a Habilitar usuarios') }}</span></a></small>
                                  </p>
                                </div>
                              </div>
                            </div>
                            <div class="col">
                              <div class="card">
                                <div class="card-body">
                                  <center><i class="fas fa-store"></i></center>
                                  <h5 class="card-title">Tienda</h5>
                                  <p class="card-text">Módulo para la administración del almacén.</p>

                                  <table>
                                    <td><small class="text-muted"><a class="collapse-item" href="{{ route('proveedores') }}"><span>{{ __('Ir a Proveedores') }}</span></a></small>
                                    <br>
                                    <small class="text-muted"><a class="collapse-item" href="{{ route('secciones') }}"><span>{{ __('Ir a Secciones') }}</span></a></small>
                                    <br>
                                    <small class="text-muted"><a class="collapse-item" href="{{ route('categoria') }}"><span>{{ __('Ir a Categorias') }}</span></a></small>
                                    <br></td>
                                    <td><small class="text-muted"><a class="collapse-item" href="{{ route('estantes') }}"><span>{{ __('Ir a Estantes') }}</span></a></small>
                                    <br>
                                    <small class="text-muted"><a class="collapse-item" href="{{ route('niveles') }}"><span>{{ __('Ir a Niveles') }}</span></a></small>
                                    <br>
                                    <small class="text-muted"><a class="collapse-item" href="{{ route('transportes') }}"><span>{{ __('Ir a Transportes') }}</span></a></small></td>
                                  </table> 
                                </div>
                              </div>
                            </div>
                            <div class="col">
                              <div class="card">
                                <div class="card-body">
                                  <center><i class="fas fa-chalkboard-teacher"></i></center>
                                  <h5 class="card-title">Clientes</h5>
                                  <p class="card-text">Módulo para la administración de clientes.</p>
                                  <p class="card-text">
                                    <small class="text-muted"><a class="collapse-item" href="{{ route('clientes') }}"><span>{{ __('Ir a Clientes') }}</span></a></small>
                                  </p>
                                </div>
                              </div>
                            </div>
                            <div class="col">
                              <div class="card">
                                <div class="card-body">
                                  <center><i class="fas fa-industry"></i></center>
                                  <h5 class="card-title">Productos</h5>
                                  <p class="card-text">Módulo para la administración de productos.</p>
                                  <p class="card-text">
                                    <small class="text-muted"><a class="collapse-item" href="{{ route('productos') }}"><span>{{ __('Ir a Productos') }}</span></a></small>
                                  </p>
                                </div>
                              </div>
                            </div>
                            <div class="col">
                              <div class="card">
                                <div class="card-body">
                                  <center><i class="fas fa-laptop-house"></i></center>
                                  <h5 class="card-title">Empaques</h5>
                                  <p class="card-text">Módulo para la administración de empaques.</p>
                                  <p class="card-text">
                                    <small class="text-muted"><a class="collapse-item" href="{{ route('empaques') }}"><span>{{ __('Ir a Empaques') }}</span></a></small>
                                  </p>
                                </div>
                              </div>
                            </div>
                            <div class="col">
                              <div class="card">
                                <div class="card-body">
                                  <center><i class="fas fa-sort-numeric-down"></i></center>
                                  <h5 class="card-title">Despachos</h5>
                                  <p class="card-text">Módulo para visualizar los despachos realizados.</p>
                                  <p class="card-text">
                                    <small class="text-muted"><a class="collapse-item" href="{{ route('despachos') }}"><span>{{ __('Ir a Despachos') }}</span></a></small>
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>

                        @elseif (auth()->user()->role ==1)

                          <div class="row row-cols-1 row-cols-md-3 g-4">
                            <div class="col">
                              <div class="card">
                                <div class="card-body">
                                  <center><i class="far fa-user"></i></center>
                                  <h5 class="card-title">Usuarios</h5>
                                  <p class="card-text">Módulo para la administración de usuarios.</p>
                                  <p class="card-text">
                                    <small class="text-muted"><a class="collapse-item" href="{{ route('profile') }}"><span>{{ __('Ir a Perfil') }}</span></a></small>
                                  </p>
                                </div>
                              </div>
                            </div>
                            <div class="col">
                              <div class="card">
                                <div class="card-body">
                                  <center><i class="fas fa-chalkboard-teacher"></i></center>
                                  <h5 class="card-title">Clientes</h5>
                                  <p class="card-text">Módulo para la administración de clientes.</p>
                                  <p class="card-text">
                                    <small class="text-muted"><a class="collapse-item" href="{{ route('clientes') }}"><span>{{ __('Ir a Clientes') }}</span></a></small>
                                  </p>
                                </div>
                              </div>
                            </div>
                            <div class="col">
                              <div class="card">
                                <div class="card-body">
                                  <center><i class="fas fa-industry"></i></center>
                                  <h5 class="card-title">Productos</h5>
                                  <p class="card-text">Módulo para la administración de productos.</p>
                                  <p class="card-text">
                                    <small class="text-muted"><a class="collapse-item" href="{{ route('productos') }}"><span>{{ __('Ir a Productos') }}</span></a></small>
                                  </p>
                                </div>
                              </div>
                            </div>
                            <div class="col">
                              <div class="card">
                                <div class="card-body">
                                  <center><i class="fas fa-laptop-house"></i></center>
                                  <h5 class="card-title">Empaques</h5>
                                  <p class="card-text">Módulo para la administración de empaques.</p>
                                  <p class="card-text">
                                    <small class="text-muted"><a class="collapse-item" href="{{ route('empaques') }}"><span>{{ __('Ir a Empaques') }}</span></a></small>
                                  </p>
                                </div>
                              </div>
                            </div>
                            <div class="col">
                              <div class="card">
                                <div class="card-body">
                                  <center><i class="fas fa-sort-numeric-down"></i></center>
                                  <h5 class="card-title">Despachos</h5>
                                  <p class="card-text">Módulo para visualizar los despachos realizados.</p>
                                  <p class="card-text">
                                    <small class="text-muted"><a class="collapse-item" href="{{ route('despachos') }}"><span>{{ __('Ir a Despachos') }}</span></a></small>
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endif
                      <hr>
                  </div>

@endsection
