<style>        
    .text-bg-orange {
        --bs-bg-opacity: 1;
        background-color: #ff7300ff !important;
        color: #ffffffff !important;
    }
    .btn-logistica{
        --bs-bg-opacity: 1;
        background-color: #bf00ffff !important;
        color: #ffffffff !important;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="inicio">
    <div class="sidebar-brand-icon rotate-n-1">
        <img class="sidebar-card-illustration mb-2" href="" src="img/undraw_rocket.svg" width="40" alt="Logo">
    </div>
</a>
<!-- Heading -->
<div class="sidebar-heading">
    <span class="badge text-xl-white">Opciones</span>
</div>
<!-- Divider -->
<hr class="sidebar-divider my-2 alert-light">

<li class="nav-item">
    <a class="nav-link" href="seguimiento_actividades">
        <i class="fas fa-fw fa-list text-gray-400"></i>
        <span>Seguimiento actividades</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="pendientes">
        <i class="fas fa-fw fa-hourglass-half text-warning"></i>
        <span>Actividades por Vencer</span>
    </a>
</li>
<hr class="sidebar-divider my-0 alert-light">
<li class="nav-item">
    <a class="nav-link" href="sol_logistica">
        <i class="fas fa-fw fa-car text-gray-400"></i>
        <span>Solicitudes Logistica</span>
    </a>
</li>
<hr class="sidebar-divider my-0 alert-light">
<li class="nav-item">
    <a class="nav-link" href="verActividadesPlaneadas">
        <i class="fas fa-fw fa-calendar text-gray-400"></i>
        <span>Actividades planeadas</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="verActividades">
        <i class="fas fa-fw fa-calendar text-gray-400"></i>
        <span>Actividades planeadas SCOT</span>
    </a>
</li>
<hr class="sidebar-divider my-0 alert-light">
<li class="nav-item">
    <a class="nav-link" href="grafica_planeacion">
        <i class="fas fa-fw fa-chart-bar text-gray-400"></i>
        <span>Resumen por Área</span>
    </a>
</li>

<hr class="sidebar-divider my-0 alert-light">
<li class="nav-item">
    <a class="nav-link" href="Manual Planeacion.pdf" target="_blank">
        <i class="fas fa-fw fa-book text-gray-400"></i>
        <span>Manual de usuario</span>
    </a>
</li>

<li class = "nav-item">
    <a class = "nav-link" href = "#" data-toggle = "modal" data-target = "#logoutModalN">
        <i class = "fas fa-sign-out-alt text-gray-100"></i>
        Salir
    </a>
</li>

<hr class="sidebar-divider my-1 alert-light">

<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button> 
</div>
</ul>