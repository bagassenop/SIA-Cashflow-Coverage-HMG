<!-- Left navbar links -->
<ul class="navbar-nav">
    <li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
    <a href="/" class="nav-link">Home</a>
    </li>
</ul>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">

    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="/logout">
        <i class="fas fa-lock mr-2"></i> Log Out
        <span class="badge badge-warning navbar-badge"></span>
    </a>
    {{-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <div class="dropdown-divider"></div>
            <form action="/logout" method="POST">
                @csrf
                <button class="dropdown-item" type="submit">

                    <span class="float-right text-muted text-sm"></span>
                </button>
            </form>
    </div> --}}
    </li>
</ul>
