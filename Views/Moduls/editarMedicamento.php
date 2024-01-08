<?php
$cons = new ControladorMedicamento();
$res = $cons->consultarMedicamentoControlador();
if (isset($_GET['action'])) {
    if ($_GET['action'] ==  "falloActualizarMedicamento") {
        print '<div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
    <div>
      El nombre del medicamento ya existe
    </div>
  </div>';
    }
}
if ($_SESSION['roles'] != "administrador") {
    echo '<script>window.location="inicio"</script>';
}
if (isset($_POST['cantidad'])) {
    $cantidadTotal = $_POST['cantidad'] * $_POST['cantidadFrasco'];
    if ($cantidadTotal > 0) {
        $total = $cantidadTotal + $res[0]['TotalMedicamento'];
    }
    $agregar = new ControladorMedicamento();
    $agregar->actualizarMedicamentoControlador($total);
}

?>
<h1 style="text-align: center;">Editar Medicamento</h1>
<br><br>
<div class="container">
    <form action="" method="post">
        <input type="hidden" name="idMedicamento" value="<?php echo $res[0]['IdMedicamento'] ?>">
        <div class="row">
            <div class="col">
                <label for="">Medicamento</label>
                <input type="text" name="medicamento" placeholder="Nombre del Medicamento" class="form-control" value="<?php echo $res[0]['Medicamento'] ?>">
            </div>
            <div class="col">
                <label for="">Cantidad de frascos</label>
                <input type="number" name="cantidad" placeholder="Cantidad de frascos" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="">Cantidad por frasco</label>
                <input type="number" name="cantidadFrasco" placeholder="Cantidad por frascos" class="form-control">
            </div>
            <div class="col">
                <label for="">Tipo</label>
                <select name="tipo" id="" class="form-control">
                    <option value="ml" <?php if ($res[0]['tipoMedicamento'] == 'ml') {
                                            echo 'selected';
                                        } ?>>ML</option>
                    <option value="gr" <?php if ($res[0]['tipoMedicamento'] == 'gr') {
                                            echo 'selected';
                                        } ?>>GR</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="">Cantidad total</label>
                <input type="text" name="totalM" disabled placeholder="Cantidad por frascos" class="form-control" value="<?php echo $res[0]['TotalMedicamento'] ?>">
            </div>
        </div>
        <br>
        <button name="actualizarMedicamento" class="btn btn-primary">Actualizar Medicamento</button>
    </form>
</div>