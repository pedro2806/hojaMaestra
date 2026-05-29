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
    <a class="nav-link" href="bienvenida.php">
        <i class="fas fa-fw fa-home text-gray-400"></i>
        <span>Inicio</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDocumentos"
        aria-expanded="true" aria-controls="collapseDocumentos">
        <i class="fas fa-fw fa-folder text-gray-400"></i>
        <span>Gestión de Docs</span>
    </a>
    <div id="collapseDocumentos" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones de Control:</h6>
            
            <a class="collapse-item" href="hojasmaestras.php">
                <i class="fas fa-file-alt mr-2 text-gray-400"></i> Ver Documentos
            </a>
            
            <a class="collapse-item" href="carga_documentos.php">
                <i class="fas fa-file-upload mr-2 text-gray-400"></i> Cargar Nuevo
            </a>
            
            <a class="collapse-item" href="historial_descargas.php">
                <i class="fas fa-history mr-2 text-gray-400"></i> Historial/Logs
            </a>
        </div>
    </div>
</li>

<li  class="nav-item">
    <a class="nav-link" href="documentos.php">
        <i class="fas fa-fw fa-file-alt text-gray-400"></i>
        <span>Crear IM o CC</span>
    </a>
</li>

<li  class="nav-item">
    <a class="nav-link" href="calculos.php">
        <i class="fas fa-fw fa-calculator text-gray-400"></i>
        <span>Cálculos</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="auditoria.php">
        <i class="fas fa-fw fa-clipboard-list text-gray-400"></i>
        <span>Auditoría</span>
    </a>
</li>

<hr class="sidebar-divider my-0 alert-light">

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