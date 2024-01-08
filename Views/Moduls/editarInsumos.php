<?php
$con = new ControladorInsumo();
$res = $con->consultarInsumoControaldor();
if (isset($_GET['action'])) {
    if ($_GET['action'] ==  "falloActualizaInsumo") {
        print '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
          Nombre del insumo ya existente
        </div>
      </div>';
    }
}
?>
<h1 style="text-align: center;">Editar insumo</h1>
<br><br>
<div class="container">
    <form action="" method="post">
        <div class="row">
            <input type="hidden" name="idInsumo" id="" value="<?php echo $res[0]['idInsumos']?>">
            <div class="col">
                <label for="">Insumo</label>
                <input type="text" name="insumo" placeholder="Nombre del Insumo" class="form-control" value="<?php echo $res[0]['Insumo']?>">
            </div>
            <div class="col">
                <label for="">Cantidad</label>
                <input type="number" name="cantidad" placeholder="Cantidad" class="form-control" value="<?php echo $res[0]['totalImsumos']?>">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <button name="actualizarInsumo" class="btn btn-primary">Actualizar Insumo</button>
            </div>
        </div>
</div>
</form>
</div>
<?php
$actualiza = new ControladorInsumo();
$actualiza->actualizarInsumoControlador();
?>