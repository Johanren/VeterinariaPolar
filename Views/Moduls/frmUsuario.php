<?php

if (isset($_GET['action'])) {
    if ($_GET['action'] ==  "okActualizarMedico") {
        print '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
          Medico Actualizado
        </div>
      </div>';
    }
    if ($_GET['action'] ==  "okRegistrarMedico") {
        print '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
          Medico Registrado
        </div>
      </div>';
    }
}
if ($_SESSION['roles'] != "administrador") {
	echo '<script>window.location="inicio"</script>';
}
$lis = new ControladorMedico();
$res = $lis->listarModeloControlador();
?>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap4.js"></script>
<h1 style="text-align: center;">Usuario</h1>
<br><br><br>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="agregarMedico" class="btn btn-primary">Agregar Medico</a>
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
                            <th scope="col">Medico</th>
                            <th scope="col">MP</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Estado</th>
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
                                <td><?php echo $value['medico'] ?></td>
                                <td><?php echo $value['MP'] ?></td>
                                <td><?php echo $value['roles'] ?></td>
                                <td><?php echo $value['activo'] ?></td>
                                <td><a href="index.php?action=editarMedico&idMedico=<?php echo $value['idMedico'] ?>" class="btn btn-primary"><img src="Views/img/editar.png" alt="" width="20"></a></td>
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