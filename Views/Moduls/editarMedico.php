<?php
$lisRol = new ControladorRol();
$resRol = $lisRol->listarRolControlador();

$conMedico = new ControladorMedico();
$resMedico = $conMedico->consultarMedicoControlador();
if ($_SESSION['roles'] != "administrador") {
	echo '<script>window.location="inicio"</script>';
}
?>
<h1 style="text-align: center;">Editar Medico</h1>
<br><br>
<div class="form-control">
    <form method="post">
        <div class="row">
            <div class="col">
                <input type="hidden" name="idMedico" value="<?php echo $resMedico[0]['idMedico']?>">
                <label>Medico</label>
                <input type="text" disabled class="form-control" value="<?php echo $resMedico[0]['medico']?>">
            </div>
            <div class="col">
                <label>MP</label>
                <input type="text" disabled class="form-control" value="<?php echo $resMedico[0]['MP']?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Estado</label>
                <select class="form-control" name="activo">
                    <option value="">Seleccione....</option>
                    <option value="Activo" <?php if($resMedico[0]['activo'] == 'Activo'){echo 'selected';}?>>Activo</option>
                    <option value="Inactivo" <?php if($resMedico[0]['activo'] == 'Inactivo'){echo 'selected';}?>>Inactivo</option>
                </select>
            </div>
            <div class="col">
                <label>Rol</label>
                <select class="form-control" name="rol">
                    <option value="">Seleccione....</option>
                    <?php
                    foreach ($resRol as $key => $value) {
                    ?>
                    <option value="<?php echo $value['idRol']?>" <?php if($resMedico[0]['idRol'] == $value['idRol']){echo 'selected';}?>><?php echo $value['roles']?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <br>
        <button class="btn btn-primary" name="actualizarMedico">Actualizar</button>
    </form>
</div>
<?php
$actMedico = new ControladorMedico();
$actMedico->ActualizarMedicoControlador();
?>