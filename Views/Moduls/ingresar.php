<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] ==  "loginInactivo") {
        print '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
          Su usuario se encuentra inactivo comunicarse con el administrador
        </div>
      </div>';
    }
    if ($_GET['action'] ==  "loginFallido") {
        print '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
          Usuario o Contraseña invalidos
        </div>
      </div>';
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 style="text-align: center;">Ingresar</h4>
            <br><br>
            <form method="post" class="form-control">
                <div class="col">
                    <label for="">MP</label>
                    <input type="text" class="form-control" name="mp" placeholder="Usuario">
                </div>
                <div class="col">
                    <label for="">Contraseña</label>
                    <input type="password" class="form-control" name="password" placeholder="Contraseña">
                </div>
                <br>
                <div class="col">
                    <button class="btn btn-primary" name="ingresar">Ingresar</button>
                </div>
                <br>
                <div class="col">
                    <a href="Views\pdf\Manual_usuario\Manual de usuario.pdf" download="" title="Manual de usuario"><img src="Views/img/pdf.png" width="50px" alt=""></a>
                </div>
            </form>
        </div>
        <div class="col-sm-1"></div>
    </div>
</div>
<?php
$ingresar = new ControladorLogin();
$ingresar->ingresarMedicoLoginControlador();
?>