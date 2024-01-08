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
$conn = new ControladorInsumo();
$con = $conn->contarDatoaInsumoControlador();
$limtPagina = 3;
$pagina = $con[0]['COUNT(Insumo)'] / $limtPagina;
$pagina = ceil($pagina);
if (!$_GET['pagina']) {
    echo '<script>window.location="index.php?action=frmInsumo&pagina=1"</script>';
}
if($_GET['pagina']>$pagina || $_GET['pagina']<= 0){
    echo '<script>window.location="index.php?action=frmInsumo&pagina=1"</script>';
}
$lis = new ControladorInsumo();
$res = $lis->listarInsumoControlador($_GET['pagina'],$limtPagina);
?>
<h1 style="text-align: center;">Insumos</h1>
<br><br><br>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="agregarInsumo" class="btn btn-primary">Agregar Insumo</a>
            <br><br>
            <div class="form-control">
                <form method="post">
                    <label for="">Medicamento</label>
                    <input type="text" name="insumo" class="form-control" placeholder="Nombre del insumo">
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
                <?php if(!isset($_POST['insumo'])){?>
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item <?php echo $_GET['pagina']<=1? 'disabled' : ''?>"><a class="page-link" href="index.php?action=frmInsumo&pagina=<?php echo $_GET['pagina']-1?>">Anterior</a></li>
                                <?php for($i=0;$i<$pagina;$i++):?>
                                <li class="page-item <?php if($_GET['pagina'] == $i+1){print 'active';}?>"><a class="page-link" href="index.php?action=frmInsumo&pagina=<?php echo $i+1?>"><?php echo $i+1?></a></li>
                                <?php endfor?>
                                <li class="page-item <?php echo $_GET['pagina']>=$pagina? 'disabled' : ''?>"><a class="page-link" href="index.php?action=frmInsumo&pagina=<?php echo $_GET['pagina']+1?>">Siguiente</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <?php }?>
            </div>
        </di>
    </div>
</div>