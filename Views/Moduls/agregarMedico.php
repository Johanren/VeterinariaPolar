<?php
$lisRol = new ControladorRol();
$resRol = $lisRol->listarRolControlador();
if (isset($_GET['action'])) {
    if ($_GET['action'] ==  "falloContrasenaMedico") {
        print '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
          Contraseña invalida
        </div>
      </div>';
    }
}
if ($_SESSION['roles'] != "administrador") {
	echo '<script>window.location="inicio"</script>';
}
?>
<h4 style="text-align: center;">Agregar Medico</h4>
<br><br>
<div class="form-control">
    <div class="contrainer">
        <form action="" method="post">
            <div class="row">
                <div class="col">
                    <label for="">Nombre Medico</label>
                    <input type="text" name="medico" required id="" class="form-control">
                </div>
                <div class="col">
                    <label for="">MP Medico</label>
                    <input type="text" maxlength="10" required name="MP" id="" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label>Estado</label>
                    <select class="form-control" name="activo" required>
                        <option value="">Seleccione....</option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </div>
                <div class="col">
                    <label>Rol</label>
                    <select class="form-control" name="rol" required>
                        <option value="">Seleccione....</option>
                        <?php
                        foreach ($resRol as $key => $value) {
                        ?>
                            <option value="<?php echo $value['idRol'] ?>"><?php echo $value['roles'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="">Contraseña Medico</label>
                    <input type="password" required name="password" id="password" class="form-control" maxlength="10" onkeyup='check();'>
                </div>
                <div class="col">
                    <label for="">Contraseña Medico Confirmacion</label>
                    <input type="password" required name="password1" id="confirm_password" class="form-control" maxlength="10" onkeyup='check();'>
                </div>
                <span id='message'></span>
            </div>
            <br>
            <button class="btn btn-primary" name="agregarMedico">Agregar Medico</button>
        </form>
    </div>
</div>
<br>
<a href="index.php?action=frmUsuario&pagina=1" class="btn btn-primary">Volver</a>
<?php
$regisMedico = new ControladorMedico();
$regisMedico->registrarMedicoControlador();
?>