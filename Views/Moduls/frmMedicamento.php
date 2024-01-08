<?php

if (isset($_GET['action'])) {
    if ($_GET['action'] ==  "okAgregarMedicamento") {
        print '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
          Medicamento agregadado
        </div>
      </div>';
    }
    if ($_GET['action'] ==  "okActualizarMedicamento") {
        print '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
          Medicamento Actualizado
        </div>
      </div>';
    }
}
if ($_SESSION['roles'] != "administrador") {
    echo '<script>window.location="inicio"</script>';
}

$conn = new ControladorMedicamento();
$con = $conn->contarDatoaMedicamentoControlador();
$limtPagina = 3;
$pagina = $con[0]['COUNT(Medicamento)'] / $limtPagina;
$pagina = ceil($pagina);
if (!$_GET['pagina']) {
    echo '<script>window.location="index.php?action=frmMedicamento&pagina=1"</script>';
}
if ($_GET['pagina'] > $pagina || $_GET['pagina'] <= 0) {
    echo '<script>window.location="index.php?action=frmMedicamento&pagina=1"</script>';
}

$lis = new ControladorMedicamento();
$res = $lis->lsitarMedicamentoControlador($_GET['pagina'],$limtPagina);
?>
<h1 style="text-align: center;">Medicamentos</h1>
<br><br><br>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="agregarMedicamento" class="btn btn-primary">Agregar Medicamento</a>
            <br><br>
            <div class="form-control">
                <form method="post">
                    <label for="">Medicamento</label>
                    <input type="text" name="medicamento" class="form-control" placeholder="Nombre del medicamento">
                    <br>
                    <button class="btn btn-primary" name="buscar">Buscar</button>
                </form>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <di class="col">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Medicamento</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($res as $key => $value) {
                            $conn = $key + 1;
                        ?>
                            <tr>
                                <td><?php echo $conn ?></td>
                                <td><?php echo $value['Medicamento'] ?></td>
                                <td><?php echo $value['TotalMedicamento'] ?></td>
                                <td><?php echo $value['tipoMedicamento'] ?></td>
                                <td><a href="index.php?action=editarMedicamento&idMedicamento=<?php echo $value['IdMedicamento'] ?>" class="btn btn-primary"><img src="Views/img/editar.png" alt="" width="20"></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php if (!isset($_POST['medicamento'])) { ?>
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>"><a class="page-link" href="index.php?action=frmMedicamento&pagina=<?php echo $_GET['pagina'] - 1 ?>">Anterior</a></li>
                                    <?php for ($i = 0; $i < $pagina; $i++) : ?>
                                        <li class="page-item <?php if ($_GET['pagina'] == $i + 1) {
                                                                    print 'active';
                                                                } ?>"><a class="page-link" href="index.php?action=frmMedicamento&pagina=<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a></li>
                                    <?php endfor ?>
                                    <li class="page-item <?php echo $_GET['pagina'] >= $pagina ? 'disabled' : '' ?>"><a class="page-link" href="index.php?action=frmMedicamento&pagina=<?php echo $_GET['pagina'] + 1 ?>">Siguiente</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </di>
    </div>
</div>