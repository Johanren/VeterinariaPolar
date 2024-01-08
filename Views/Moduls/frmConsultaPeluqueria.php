<?php
$consultar = new ControladorHora();
$con = $consultar->consultarHoraMascota();
?>
<h1 style="text-align: center;">Consulta Peluqueria</h1>
<br><br>
<form action="" method="post">
    <div class="container">
        <div class="row">
            <div class="col">
                <label for="" class="mb-3">Ingrese Numero de cedula del cliente</label>
                <input type="text" class="form-control" name="numeroCedula" placeholder="Digite Numero de Cedula">
            </div>
            <div class="col">
                <label for="" class="mb-3">Ingrese fecha del registro</label>
                <input type="date" class="form-control" name="fechaIngreso" placeholder="Digite Numero de Cedula">
            </div>
            <div class="col">
                <br>
                <label for="" class="mb-4"></label>
                <button class="btn btn-primary" name="enviarTimeVete">Buscar</button>
            </div>
        </div>
    </div>
</form>
<br><br>
<?php
if (isset($con)) {
?>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Mascota</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Historico</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($con as $key => $value) {
                            $cont = $key + 1;
                            echo '
                            <tr>
                                <th scope="row">' . $cont . '</th>
                                <td>' . $value['propietario'] . '</td>
                                <td>' . $value['nombreMascota'] . '</td>
                                <td>' . $value['fecha'] . '</td>
                                <td><a href="index.php?action=frmHistoricoPeluqueria&idFechaIngreso=' . $value['idFechaIngreso'] . '&idMascota=' . $value['idMascota'] . '"><img src="Views/img/historico.png" alt="" width="20px"></a></td>
                            </tr>
                            ';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
}
?>