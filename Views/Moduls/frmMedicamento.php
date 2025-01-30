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

$lis = new ControladorMedicamento();
$res = $lis->lsitarMedicamentoControlador();
?>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap4.js"></script>
<h1 style="text-align: center;">Medicamentos</h1>
<br><br><br>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="agregarMedicamento" class="btn btn-primary">Agregar Medicamento</a>
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
            </div>
        </di>
    </div>
</div>