   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
    <div class="sidebar-brand-icon">
        
        <img src="../img/iconos/logo.gif" width="70px" alt="">
    </div>
    <div class="sidebar-brand-text mx-3">DentistApp</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="home.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>HOME</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<?php
if(!empty($result)){
    echo '
    <!-- Heading -->
<div class="sidebar-heading">
    Opciones
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Paciente</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones:</h6>
            <a class="collapse-item" href="vista.php?opcion=pacientes">Lista</a>
            <a class="collapse-item" href="#" data-toggle="modal" data-target="#NuevoPacienteModal">Nuevo</a>
            <a class="collapse-item" href="cards.html">Estado de Cuenta</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Consultorio</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Consultorio:</h6>
            <a class="collapse-item" href="vista.php?opcion=consultorios">Lista</a>
            <a class="collapse-item" href="#" data-toggle="modal" data-target="#NuevoConsultorioModal">Nuevo</a>
            
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">


<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link " href="vista.php?opcion=perfil"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Perfil</span>
    </a>
    
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
';
}

?>
</ul>
<!-- End of Sidebar -->