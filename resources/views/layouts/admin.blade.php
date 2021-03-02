<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Laravel SB Admin 2">
    <meta name="author" content="Alejandro RH">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">-->

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png">


    <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>

  

  

<!-- Custom styles for this page -->
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">




<style>

#mapid { height: 180px; }

</style>

</head>
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
            <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-store"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Sistema</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{ __('Información') }}</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('profile') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>{{ __('Perfil') }}</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
    
        @if (auth()->user()->role ==0)

        <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
                    aria-expanded="true" aria-controls="collapseUser">
                    <i class="far fa-user"></i>
                    <span>Usuarios</span>
                </a>
                <div id="collapseUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('usuarios') }}">
                        <i class="fas fa-user-circle"></i>
                        <span>{{ __('Usuarios') }}</span>
                            </a>
                        <a class="collapse-item" href="{{ route('usuarioshabilitar')}}">
                        <i class="fas fa-users-cog"></i>
                        <span>{{ __('Habilitar Usuarios') }}</span>
                        </a>
                    </div>
                </div>
            </li>

        <!-- Nav Item - About -->


        <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-store"></i>
                    <span>Tienda</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
  
                        <a class="collapse-item" href="{{ route('proveedores') }}">
                            <i class="fas fa-people-arrows"></i>
                            <span>{{ __('Proveedores') }}</span>
                        </a>

                        <a class="collapse-item" href="{{ route('secciones') }}">
                            <i class="fas fa-ruler-horizontal"></i>
                            <span>{{ __('Secciones') }}</span>
                        </a>

                        <a class="collapse-item" href="{{ route('categoria') }}">
                            <i class="fas fa-warehouse"></i>
                            <span>{{ __('Categorias') }}</span>
                        </a>

                        <a class="collapse-item" href="{{ route('estantes') }}">
                            <i class="fas fa-pause"></i>
                            <span>{{ __('Estantes') }}</span>
                        </a>

                        <a class="collapse-item" href="{{ route('niveles') }}">
                            <i class="fas fa-server"></i>
                            <span>{{ __('Niveles') }}</span>
                        </a>

                        <a class="collapse-item" href="{{ route('transportes') }}">
                            <i class="fas fa-people-carry"></i>
                            <span>{{ __('Transportes') }}</span>
                        </a>  
                    </div>
                </div>
            </li>

        <li class="nav-item ">
            <a class="nav-link" href="{{ route('clientes') }}">
                <i class="fas fa-chalkboard-teacher"></i>
                <span>{{ __('Clientes') }}</span>
            </a>
        </li>
   

        <li class="nav-item ">
            <a class="nav-link" href="{{ route('productos') }}">
                <i class="fas fa-industry"></i>
                <span>{{ __('Productos') }}</span>
                </a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="{{ route('empaques') }}">
                <i class="fas fa-laptop-house"></i>
                <span>{{ __('Empaques') }}</span>
            </a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="{{ route('despachos') }}">
                <i class="fas fa-sort-numeric-down"></i>
                <span>{{ __('Despachos') }}</span>
            </a>
        </li>




        @else


        <li class="nav-item ">
            <a class="nav-link" href="{{ route('clientes') }}">
                <i class="fas fa-chalkboard-teacher"></i>
                <span>{{ __('Clientes') }}</span>
            </a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="{{ route('empaques') }}">
                <i class="fas fa-laptop-house"></i>
                <span>{{ __('Empaques') }}</span>
            </a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="{{ route('despachos') }}">
                <i class="fas fa-sort-numeric-down"></i>
                <span>{{ __('Despachos') }}</span>
            </a>
        </li>

        
       
        @endif

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                            <figure class="img-profile rounded-circle avatar font-weight-bold" data-initial="{{ Auth::user()->name[0] }}"></figure>
                        </a>
                        <!-- Dropdown - User Information -->
                       <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <!-- <a class="dropdown-item" href="{{ route('home') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Profile') }}
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Settings') }}
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Activity Log') }}
                            </a>-->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                @yield('main-content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <p><span>&copy;&nbsp;</span><span class="copyright-year"></span><span></span><span>&nbsp;</span><span>Todos los derechos reservados</span></p>
                    <p><span>&nbsp;</span><span>Elaborador por: Tnlgo. Patricio Javier Pacheco Astudillo</span></p>
                </div>
            </div>
        </footer>

        
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Listo para salir?') }}</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
            <div class="modal-footer">
                <button class="btn btn-link" type="button" data-dismiss="modal">{{ __('Cancelar') }}</button>
                <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>




    <script src="{{ asset('app-assets/vendors/js/switchery.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/datatable/dataTables.buttons.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/datatable/buttons.html5.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/datatable/buttons.print.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/datatable/vfs_fonts.js') }}"></script>

    <script src="{{ asset('app-assets/js/data-tables/dt-advanced-initialization.js') }}"></script>

</body>
</html>
