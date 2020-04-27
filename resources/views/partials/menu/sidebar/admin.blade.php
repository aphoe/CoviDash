<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="{{ url('admin') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Location
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProvinces" aria-expanded="true" aria-controls="collapseProvinces">
        <i class="fas fa-fw fa-chess-rook"></i>
        <span>Provinces</span>
    </a>
    <div id="collapseProvinces" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="py-2 collapse-inner rounded">
            <h6 class="collapse-header">Provinces:</h6>
            <a class="collapse-item" href="{{ url('admin/province') }}">All provinces</a>
            <a class="collapse-item" href="{{ url('admin/province/create') }}">Create new</a>
        </div>
    </div>
</li>

<!-- Nav Item - Incidences Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseIncidences" aria-expanded="true" aria-controls="collapseIncidences">
        <i class="fas fa-fw fa-briefcase-medical"></i>
        <span>Incidences</span>
    </a>
    <div id="collapseIncidences" class="collapse" aria-labelledby="headingIncidences" data-parent="#accordionSidebar">
        <div class="py-2 collapse-inner rounded">
            <h6 class="collapse-header">Incidences menu:</h6>
            <a class="collapse-item" href="{{ url('admin/incidence') }}">All incidences</a>
            <a class="collapse-item" href="{{ url('admin/incidence/create') }}">Create new</a>
            <a class="collapse-item" href="{{ url('admin/incidence/bulk/create') }}">Create bulk</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Addons
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item active">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item active" href="blank.html">Blank Page</a>
        </div>
    </div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
</li>
