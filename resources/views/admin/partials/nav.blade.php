<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="https://www.regmurcia.com/servlet/integra.servlets.Imagenes?METHOD=VERIMAGEN_99108&nombre=RealMurciaFtbolClub1924-197_res_300.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSUGPyucoWyzhNf5pE4BVeQ2589GwxO6ZY9WXDM2NrCHasPcv6e&s" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                <p class="text-white">{{ auth()->user()->roles->first()->display_name }}</p>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ setActiveRoute('dashboard')}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Inicio
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link {{ setActiveRoute('admin.posts.index') }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Post
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.posts.index') }}"
                               class="nav-link {{ setActiveRoute('admin.posts.index') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ver todos los post</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            @if (request()->is('admin/posts/*'))
                                <a href="{{ route('admin.posts.index', '#create') }}"
                                   class="nav-link {{ request()->is('admin/posts/create') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Crear un post</p>
                                </a>
                            @else
                                <a href="#" class="nav-link {{ request()->is('admin/posts/create') ? 'active' : '' }}"
                                   data-toggle="modal" data-target="#crearPost">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Crear un post</p>
                                </a>
                            @endif
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link {{ setActiveRoute(['admin.users.*', 'admin.roles.*']) }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Usuarios
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link {{ setActiveRoute('admin.users.index') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ver todos los usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.users.create') }}"
                               class="nav-link {{ setActiveRoute('admin.users.create') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Crear un usuario</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link {{ setActiveRoute('admin.roles.*')}}">
                                <i class="nav-icon fas fa-address-card"></i>
                                <p>
                                    Roles
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.index') }}" class="nav-link {{ setActiveRoute('admin.roles.index') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ver todos los roles</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.create') }}"
                                       class="nav-link {{ setActiveRoute('admin.roles.create') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Crear un rol</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
