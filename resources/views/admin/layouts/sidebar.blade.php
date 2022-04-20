<div class="page-wrap">
                <div class="app-sidebar colored">
                    <div class="sidebar-header">
                        <a class="header-brand" href="{{ url('dashboard')}}">
                            <div class="logo-img">
                               <img src="{{asset('template/src/img/brand-white.svg')}}" class="header-brand-img" alt="lavalite"> 
                            </div>
                            <span class="text">Mi-Padel</span>
                        </a>
                        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                    </div>
                    
                    <div class="sidebar-content">
                        <div class="nav-container">
                            <nav id="main-menu-navigation" class="navigation-main">
                               <!--  <div class="nav-lavel">Navigation</div>
                                <div class="nav-item active">
                                    <a href="{{url('dashboard')}}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                </div> -->
                               <!--  <div class="nav-item">
                                    <a href="pages/navbar.html"><i class="ik ik-menu"></i><span>Navigation</span> <span class="badge badge-success">New</span></a>
                                </div> -->
                                @if(auth()->check()&& auth()->user()->role->name === 'admin')
                                <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Menu Pistas</span> <span class="badge badge-danger"></span></a>
                                    <div class="submenu-content">
                                    <a href="{{route('pistas.create')}}" class="menu-item">Crear Pista</a>
                                        <a href="{{route('pistas.index')}}" class="menu-item">Ver Pistas</a>
                                    
                                    </div>
                                </div>
                                @endif

                                  @if(auth()->check()&& auth()->user()->role->name === 'admin')
                                   <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Horario de citas</span> <span class="badge badge-danger"></span></a>
                                    <div class="submenu-content">
                                        <a href="{{route('citas.create')}}" class="menu-item">Crear citas</a>
                                        <a href="{{route('citas.index')}}" class="menu-item">Comprobar</a>
                                        <a href="{{route('todas')}}" class="menu-item">Todas por pista</a>
                                       
                                    </div>
                                </div>
                                @endif
                              
                                @if(auth()->check()&& auth()->user()->role->name === 'admin')
                                   <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Usuarios</span> <span class="badge badge-danger"></span></a>
                                    <div class="submenu-content">
                                        <a href="{{route('usuarios')}}" class="menu-item">Reservas hoy</a>
                                        <a href="{{route('all.reservas')}}" class="menu-item">Todas las reservas</a>
                                        
                                       
                                    </div>
                                </div>
                                @endif
                                <div class="nav-item active">
                                    <a onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" href="{{ route('logout') }}"><i class="ik ik-power dropdown-icon"></i><span>Logout</span></a>
                                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>