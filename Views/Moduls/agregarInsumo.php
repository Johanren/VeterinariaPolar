<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] ==  "falloAgregarInsumo") {
        print '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
          Insumo ya esta registrado
        </div>
      </div>';
    }
}
if ($_SESSION['roles'] != "administrador") {
    echo '<script>window.location="inicio"</script>';
}
?>
<h1 style="text-align: center;">Agregar Insumo</h1>
<br><br>
<div class="container">
    <form action="" method="post">
        <div class="row">
            <div class="col">
                <label for="">Insumo</label>
                <input type="text" name="insumo" required placeholder="Nombre del Insumo" class="form-control">
            </div>
            <div class="col">
                <label for="">Cantidad</label>
                <input type="number" name="cantidad" required placeholder="Cantidad" class="form-control">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <button name="agregarInsumo" class="btn btn-primary">Agregar Insumo</button>
            </div>
        </div>
</div>
</form>
</div>
<?php
$regsitra = new ControladorInsumo();
$regsitra->registrarInsumoControlador();
?>