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

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

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
