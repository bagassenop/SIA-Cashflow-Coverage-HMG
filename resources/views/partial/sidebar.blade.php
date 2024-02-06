<!-- Brand Logo -->
<div class="logo" style="height:60px; background-color:white">
    <a class="sidebar-brand brand-logo" href="/">
        <img class="mt-2" src="/img/pt-hasura.png" style="max-width: 100% ; background-color:white;" alt="logo" />
    </a>
</div>

<!-- Sidebar -->
<div class="sidebar mt-2">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a class="d-block">{{ auth()->user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
  with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="/dashboard" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p> Dashboard </p>
                </a>
            </li>
            @if (Auth::user()->isAdmin())
                <li class="nav-item has-treeview"> <!--menu-open-->
                    <a class="nav-link"> <!-- active -->
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Data Master
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/akun" class="nav-link">
                                <i class="fa fa-book nav-icon"></i>
                                <p>Data Akun</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/aktivitas" class="nav-link"> <!-- active -->
                                <i class="fa fa-certificate nav-icon"></i>
                                <p>Data Aktivitas</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
     <a href="/admin" class="nav-link">
      <i class="fa fa-user nav-icon"></i>
      <p>Data Admin</p>
     </a>
    </li> -->
                        <!-- <li class="nav-item">
     <a href="/user" class="nav-link">
      <i class="fa fa-user-circle nav-icon"></i>
      <p>Data User</p>
     </a>
    </li> -->
                    </ul>
                </li>

                <li class="nav-item has-treeview"> <!--menu-open-->
                    <a class="nav-link"> <!-- active -->
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Laporan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/report-arus-kas/monthly" class="nav-link">
                                <i class="fa fa-angle-double-right nav-icon"></i>
                                <p> Arus Kas Bulanan </p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="/report-arus-kas" class="nav-link">
                                <i class="fa fa-angle-double-right nav-icon"></i>
                                <p> Arus Kas Tahunan</p>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item">
					<a href="/report-laba-rugi" class="nav-link">
						<i class="fa fa-credit-card nav-icon"></i>
						<p> Laba Rugi </p>
					</a>
				</li>

				<li class="nav-item">
					<a href="/report-neraca" class="nav-link">
						<i class="fa fa-balance-scale nav-icon"></i>
						<p> Neraca </p>
					</a>
				</li> --}}
                    </ul>
                </li>

                {{-- <li class="nav-item has-treeview"> <!--menu-open-->
                    <a class="nav-link"> <!-- active -->
                        <i class="nav-icon fas fa-stream"></i>
                        <p>
                            Rasio
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/liquiditas" class="nav-link">
                                <i class="fa fa-water nav-icon"></i>
                                <p> Liquiditas </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/cashflow-coverage" class="nav-link">
                                <i class="fa fa-money-bill-wave nav-icon"></i>
                                <p> Cashflow Coverage </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/perputaran-piutang" class="nav-link">
                                <i class="fa fa-hand-holding-usd nav-icon"></i>
                                <p> Perputaran Piutang </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="/prediksi" class="nav-link">
                        <i class="nav-icon fas fa-atom"></i>
                        <p> Prediksi </p>
                    </a>
                </li> --}}
            @endif
            @if (Auth::user()->isBasic())
                <li class="nav-item">
                    <a href="/laba-rugi" class="nav-link">
                        <i class="fa fa-credit-card nav-icon"></i>
                        <p> Laba Rugi </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/neraca" class="nav-link">
                        <i class="fa fa-balance-scale nav-icon"></i>
                        <p> Neraca </p>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
