<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="/dist/img/1.png" class="brand-image img-circle elevation-2">
        <span class="brand-text font-weight-light">RECRUITMENT SKU</span>
    </a>

          <!-- Sidebar -->
    <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
            @can('PGS')
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                <a href="#" class="d-block"><h5>HALLO, {{ auth()->user()->username }}</h5></a>
                </div>
            </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a class=
                        "nav-link {{ Request::is('home*') ? 'active' : '' }}"  href="/home">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link
                        {{ Request::is('dashboard/inputsku/create*') ? 'active' : '' }}"  href="/dashboard/inputsku/create" aria-current="page">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Input Data SKU</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link
                        {{ Request::is('dashboard/sku*') ? 'active' : '' }}"  href="/dashboard/sku">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Data SKU</p>
                        </a>
                    </li>
                    </ul>
                </nav>
            @endcan
                <!-- /.sidebar-menu -->


            @can('HR')
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                <a href="#" class="d-block"><h5>HALLO, {{ auth()->user()->username }}</h5></a>
                </div>
            </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a class=
                        "nav-link {{ Request::is('home*') ? 'active' : '' }}"  href="/home" aria-current="page">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link
                        {{ Request::is('dashboard/hr*') ? 'active' : '' }}"  href="/dashboard/hr">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Data SKU</p>
                        </a>
                    </li>
                </nav>
            @endcan

        @can('HR HEAD')
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                <a href="#" class="d-block"><h5>HALLO, {{ auth()->user()->username }}</h5></a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a class=
                    "nav-link {{ Request::is('home*') ? 'active' : '' }}"  href="/home" aria-current="page">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link
                    {{ Request::is('dashboard/hrhead*') ? 'active' : '' }}"  href="/dashboard/hrhead">
                    <i class="nav-icon fas fa-file"></i>
                    <p>Data SKU</p>
                    </a>
                </li>
            </nav>
        @endcan

        @can('GA HEAD')
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
            <a href="#" class="d-block"><h5>HALLO, {{ auth()->user()->username }}</h5></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a class=
                "nav-link {{ Request::is('home*') ? 'active' : '' }}"  href="/home" aria-current="page">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link
                {{ Request::is('dashboard/ga*') ? 'active' : '' }}"  href="/dashboard/ga">
                <i class="nav-icon fas fa-file"></i>
                <p>Data SKU</p>
                </a>
            </li>
        </nav>
    @endcan

    @can('CMA')
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                <a href="#" class="d-block"><h5>HALLO, {{ auth()->user()->username }}</h5></a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a class=
                    "nav-link {{ Request::is('home*') ? 'active' : '' }}"  href="/home" aria-current="page">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link
                    {{ Request::is('dashboard/cma*') ? 'active' : '' }}"  href="/dashboard/cma">
                    <i class="nav-icon fas fa-file"></i>
                    <p>Data SKU</p>
                    </a>
                </li>
            </nav>
        @endcan

    @can('ADMIN')
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
        <a href="#" class="d-block"><h5>HALLO, {{ auth()->user()->username }}</h5></a>
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a class=
            "nav-link {{ Request::is('home*') ? 'active' : '' }}"  href="/home" aria-current="page">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
            </p>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link
            {{ Request::is('dashboard/admin*') ? 'active' : '' }}"  href="/dashboard/admin">
            <i class="nav-icon fas fa-file"></i>
            <p>Data User</p>
            </a>
        </li>
    </nav>
    @endcan

    </div>
                <!-- /.sidebar -->



</aside>
<style type="text/css">
    .divider{
      width: 100%;
      height: 1px;
      background: #BBB;
      margin: 1rem 0;
    }
    .select2-selection.select2-selection--single{
      height: 40px;
    }
  </style>
