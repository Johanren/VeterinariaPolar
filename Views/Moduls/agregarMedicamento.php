<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] ==  "falloAgregarMedicamento") {
        print '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
          Medicamento ya esta registrado
        </div>
      </div>';
    }
}
if ($_SESSION['roles'] != "administrador") {
	echo '<script>window.location="inicio"</script>';
}
?>
<h1 style="text-align: center;">Agregar Medicamento</h1>
<br><br>
<div class="container">
    <form action="" method="post">
        <div class="row">
            <div class="col">
                <label for="">Medicamento</label>
                <input type="text" name="medicamento" required placeholder="Nombre del Medicamento" class="form-control">
            </div>
            <div class="col">
                <label for="">Cantidad</label>
                <input type="number" name="cantidad" placeholder="Cantidad de frascos o cajas" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="">Presentación</label>
                <input type="number" name="cantidadFrasco" required placeholder="Cantidad por unidad" class="form-control">
            </div>
            <div class="col">
                <label for="">Unidad de medida</label>
                <select name="tipo" required id="" class="form-control">
                    <option value="ml">ML</option>
                    <option value="gr">GR</option>
                    <option value="tableta">TABLETA</option>
                </select>
            </div>
        </div>
        <br>
        <button name="agregarMedicamento" class="btn btn-primary">Agregar Medicamento</button>
    </form>
</div>
<?php
//calcular el total ml o gr por medicamento
if (isset($_POST['cantidadFrasco'])) {
    if ($_POST['cantidad'] == null) {
        $cantidadTotal = $_POST['cantidadFrasco'];
    }else{
        $cantidadTotal = $_POST['cantidad'] * $_POST['cantidadFrasco'];
    }
    $agregar = new ControladorMedicamento();
    $agregar->agregarMedicamentoControlador($cantidadTotal);
}


?>