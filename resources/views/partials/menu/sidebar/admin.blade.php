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
    Data
</div>

<!-- Nav Item - Provinces Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProvinces" aria-expanded="true" aria-controls="collapseProvinces">
        <i class="fas fa-fw fa-chess-rook"></i>
        <span>Provinces</span>
    </a>
    <div id="collapseProvinces" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="collapse-inner rounded">
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
        <div class="collapse-inner rounded">
            <h6 class="collapse-header">Incidences menu:</h6>
            <a class="collapse-item" href="{{ url('admin/incidence') }}">All incidences</a>
            <a class="collapse-item" href="{{ url('admin/incidence/create') }}">Create new</a>
            <a class="collapse-item" href="{{ url('admin/incidence/bulk/create') }}">Bulk create</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    People
</div>

<!-- Nav Item - Users Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
        <i class="fas fa-fw fa-users"></i>
        <span>Users</span>
    </a>
    <div id="collapseUsers" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="collapse-inner rounded">
            <h6 class="collapse-header">Users list:</h6>
            <a class="collapse-item" href="{{ url('admin/user') }}">All users</a>
            <a class="collapse-item" href="{{ url('admin/user/create') }}">Create new</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Resources
</div>

<!-- Nav Item - External URL Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLinks" aria-expanded="true" aria-controls="collapseLinks">
        <i class="fas fa-fw fa-external-link-alt"></i>
        <span>External links</span>
    </a>
    <div id="collapseLinks" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="collapse-inner rounded">
            <h6 class="collapse-header">External URLs:</h6>
            <a class="collapse-item" href="{{ url('admin/url') }}">All links</a>
            <a class="collapse-item" href="{{ url('admin/url/create') }}">Create new</a>
        </div>
    </div>
</li>

<!-- Nav Item - News items Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNews" aria-expanded="true" aria-controls="collapseNews">
        <i class="fas fa-fw fa-cog"></i>
        <span>News</span>
    </a>
    <div id="collapseNews" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="collapse-inner rounded">
            <h6 class="collapse-header">News items:</h6>
            <a class="collapse-item" href="{{ url('admin/news') }}">All news</a>
            <a class="collapse-item" href="{{ url('admin/news/create') }}">Create new</a>
        </div>
    </div>
</li>
