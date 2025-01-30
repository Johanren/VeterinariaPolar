<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] ==  "okAgregarInsumo") {
        print '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
          Isumo agregadado
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
    if ($_GET['action'] ==  "okActualizaInsumo") {
        print '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
          Insumo actualizado
        </div>
      </div>';
    }
}
if ($_SESSION['roles'] != "administrador") {
    echo '<script>window.location="inicio"</script>';
}
$lis = new ControladorInsumo();
$res = $lis->listarInsumoControlador();
?>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap4.js"></script>
<h1 style="text-align: center;">Insumos</h1>
<br><br><br>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="agregarInsumo" class="btn btn-primary">Agregar Insumo</a>
        </div>
    </div>
    <br><br>
    <div class="row">
        <di class="col">
            <div class="table-responsive">
                <table class="table" id="usuario">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Insumo</th>
                            <th scope="col">Cantidad</th>
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
                                <td><?php echo $value['Insumo'] ?></td>
                                <td><?php echo $value['totalImsumos'] ?></td>
                                <td><a href="index.php?action=editarInsumos&idInsumos=<?php echo $value['idInsumos'] ?>" class="btn btn-primary"><img src="Views/img/editar.png" alt="" width="20"></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </di>
    </div>
</div>