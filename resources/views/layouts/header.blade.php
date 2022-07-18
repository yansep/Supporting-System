<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="/home" class="nav-link"><b>Home</a></b>
    </li>
    </ul>

    <!-- SEARCH FORM -->
    {{-- <form class="form-inline ml-3">
    <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
        </button>
        </div>
    </div>
    </form> --}}

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->

    <!-- Notifications Dropdown Menu -->

    <li>
        <form action="/logout" method="post"> <!-- Memanggil logout-->
            @csrf
          <button type="submit" class="nav-link px-3 bg-light border-0">
            <font size="4"> <b>LOGOUT</b> </font> </a>&nbsp;<i class="fas fa-door-open"
              style="color: rgb(0, 0, 0)"></i>
          </form>
    </li>
    </ul>
</nav>
