<?php
session_start();
if (isset($_SESSION['roles'])) {
    
    if ($_SESSION['roles'] == 'administrador') {

    
?>
<header class="header" id="header">
    <div class="header_toggle"><i class='bx bx-menu' id="header-toggle"></i></div>
    <div style="text-align: center; font-family: cursive; text-decoration: underline;"><h4>Polar Veterinaria - Pet shop</h4></div>
    <div class="header_img"><img src="Views/img/icon.jpg" alt=""></div>
</header>
<div class="l-navbar" id="nav-bar" style="background-color: #2981cf;">
    <nav class="nav">
        <div> <a href="inicio" class="nav_logo"><i class='bx bx-layer nav_logo-icon'></i><span class="nav_logo-name">Veterinaria Polar</span></a>
            <div class="nav_list"> <a href="frmConsultaVeterinaria" class="nav_link <?php if($_GET['action']=='frmConsultaVeterinaria'){print'active';}?>"><iconify-icon icon="map:veterinary-care" width="23" height="23"></iconify-icon><span class="nav_name">Consulta Veterinaria</span></a><a href="frmConsultaPeluqueria" class="nav_link <?php if($_GET['action']=='frmConsultaPeluqueria'){print'active';}?>"><iconify-icon icon="mdi:hair-dryer" width="23" height="23"></iconify-icon><span class="nav_name">Consulta Peluqueria</span></a> <a href="recordatorio" class="nav_link <?php if($_GET['action']=='recordatorio'){print'active';}?>"> <iconify-icon icon="ion:calendar-sharp" width="23" height="23"></iconify-icon> <span class="nav_name">Recordatorio</span> </a> <a href="index.php?action=frmUsuario&pagina=1" class="nav_link <?php if($_GET['action']=='frmUsuario'){print'active';}?>"> <iconify-icon icon="bx:user" width="23" height="23"></iconify-icon> <span class="nav_name">Usuario</span> </a> <!--<a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Files</span> </a>--><a href="index.php?action=frmMedicamento&pagina=1" class="nav_link <?php if($_GET['action']=='frmMedicamento'){print'active';}?>"><iconify-icon icon="game-icons:medicines" width="23" height="23"></iconify-icon><span class="nav_name">Medicamentos</span></a><a href="index.php?action=frmInsumo&pagina=1" class="nav_link <?php if($_GET['action']=='frmInsumo'){print'active';}?>"><iconify-icon icon="material-symbols:pet-supplies-outline" width="23" height="23"></iconify-icon><span class="nav_name">Insumos</span></a><a href="frmReporte" class="nav_link <?php if($_GET['action']=='frmReporte'){print'active';}?>"><i class='bx bx-bar-chart-alt-2 nav_icon'></i><span class="nav_name">Estadisticas</span></a></div>
        </div> <a href="salir" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
    </nav>
</div>
<?php
    }else{

    
?>
<header class="header" id="header">
    <div class="header_toggle"><i class='bx bx-menu' id="header-toggle"></i></div>
    <div style="text-align: center; font-family: cursive; text-decoration: underline;"><h4>Polar Veterinaria - Pet shop</h4></div>
    <div class="header_img"><img src="Views/img/icon.jpg" alt=""></div>
</header>
<div class="l-navbar" id="nav-bar" style="background-color: #2981cf;">
    <nav class="nav">
        <div> <a href="inicio" class="nav_logo"><i class='bx bx-layer nav_logo-icon'></i><span class="nav_logo-name">Veterinaria Polar</span></a>
            <div class="nav_list"> <a href="frmConsultaVeterinaria" class="nav_link <?php if($_GET['action']=='frmConsultaVeterinaria'){print'active';}?>"><iconify-icon icon="map:veterinary-care" width="23" height="23"></iconify-icon><span class="nav_name">Consulta Veterinaria</span></a><a href="frmConsultaPeluqueria" class="nav_link <?php if($_GET['action']=='frmConsultaPeluqueria'){print'active';}?>"><iconify-icon icon="mdi:hair-dryer" width="23" height="23"></iconify-icon><span class="nav_name">Consulta Peluqueria</span></a> <a href="recordatorio" class="nav_link <?php if($_GET['action']=='recordatorio'){print'active';}?>"> <iconify-icon icon="ion:calendar-sharp" width="23" height="23"></iconify-icon> <span class="nav_name">Recordatorio</span> </a> <!--<a href="#" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Bookmark</span> </a> <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Files</span> </a>--></div>
        </div> <a href="salir" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
    </nav>
</div>
<?php
    }
}
?>
