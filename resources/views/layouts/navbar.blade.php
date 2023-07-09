<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="/dist/img/1.png" class="brand-image img-circle elevation-2">
        <span class="brand-text font-weight-light">SUPPORTING SYSTEM</span>
    </a>

          <!-- Sidebar -->
    <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
            @if (auth()->user()->PGS())
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                    <a href="#" class="d-block"><h5>HALLO, {{ auth()->user()->username }}</h5></a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column"
                      data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a class="nav-link
                                {{ Request::is('home*') ? 'active' : '' }}"  href="/home" aria-current="page">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>



                        <li class="nav-item">
                            <a class="nav-link
                            {{ Request::is('files/index*') ? 'active' : '' }}"  href="/files" aria-current="page">
                            <i class="nav-icon fas fa-file"></i>
                            <p>DATA KONTRAKTOR</p>
                            </a>
                        </li>

                    </ul>
                </nav>
            @endif

            @if (auth()->user()->FA())
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                    <a href="#" class="d-block"><h5>HALLO, {{ auth()->user()->username }}</h5></a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column"
                      data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a class="nav-link
                                {{ Request::is('home*') ? 'active' : '' }}"  href="/home" aria-current="page">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link
                            {{ Request::is('dashboard/cma*') ? 'active' : '' }}"  href="/dashboard/cma">
                            <i class="nav-icon fas fa-file"></i>
                            <p>Data REC SKU</p>
                            </a>
                        </li>

                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link{{ Request::is('') ? 'active' : '' }}">
                              <i class="nav-icon fas fa-file"></i>
                              <p>
                                BA KONTRAKTOR
                                <i class="right fas fa-angle-left"></i>
                              </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a class="nav-link
                                    {{ Request::is('files/create*') ? 'active' : '' }}"  href="/files/create" aria-current="page">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>Input PDF</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link
                                    {{ Request::is('files/index*') ? 'active' : '' }}"  href="/files" aria-current="page">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>DATA BA KONTRAKTOR</p>
                                    </a>
                                </li>
                            </ul>
                        </li>



                    </ul>
                </nav>
            @endif


            @if (auth()->user()->isAdmin())
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                    <a href="#" class="d-block"><h5>HALLO, {{ auth()->user()->username }}</h5></a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column"
                    data-widget="treeview" role="menu" data-accordion="false">
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

                    <li class="nav-item">
                        <a class="nav-link
                        {{ Request::is('dashboard/PT*') ? 'active' : '' }}"  href="/dashboard/PT">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Data PT</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link
                        {{ Request::is('dashboard/estate*') ? 'active' : '' }}"  href="/dashboard/estate">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Data Estate</p>
                        </a>
                    </li>
                        <li class="nav-item">
                            <a class="nav-link
                            {{ Request::is('files/index*') ? 'active' : '' }}"  href="/files" aria-current="page">
                            <i class="nav-icon fas fa-file"></i>
                            <p>DATA</p>
                            </a>
                        </li>


                    </ul>
                </nav>
            @endif
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
