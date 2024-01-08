<?php

?>
<h1 style="text-align: center;">Visualizar PDF Historico</h1>
<div class="container">
    <div class="row">
        <div class="col">
            <br>
            <br>
        <h5>Visualizar Historico PDF</h5>
        <br><br>
        <a target="_blank" href="index.php?action=visualizarHistoricopdf&fecha=<?php echo $_GET['idFechaIngreso'] . '&idMascota='.$_GET['idMascota']?>"><img src="Views/img/pdf.png" width="50px" alt=""></a>
        </div>
        <div class="col">
            <br>
            <br>
        <h5>Seguimiento en casa PDF</h5>
        <br><br>
        <a target="_blank" href="index.php?action=seguimientoCasapdf&fecha=<?php echo $_GET['idFechaIngreso'] . '&idMascota='.$_GET['idMascota']?>"><img src="Views/img/pdf.png" width="50px" alt=""></a>
        </div>
        <div class="col">
            <br>
            <br>
        <h5>Consentimiento informado</h5>
        <br><br>
        <a target="_blank" href="index.php?action=terminosCondicionespdf&fecha=<?php echo $_GET['idFechaIngreso'] . '&idMascota='.$_GET['idMascota'] ?>"><img src="Views/img/pdf.png" width="50px" alt=""></a>
        </div>
    </div>
</div>
<br>
<a href="index.php?action=frmHistoricoVeterinario&idFechaIngreso=<?php echo $_GET['fecha'] . '&idMascota='.$_GET['idMascota'] .'&idFechaIngreso='.$_GET['idFechaIngreso']?>" class="btn btn-primary">Volver</a>