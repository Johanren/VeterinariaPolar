<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="Views/img/icon.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Cita Veterinaria</h5>
                    <a href="frmRegistrarCitaVeterinaria" class="btn btn-primary">Registrar Cita</a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="Views/img/icon.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Peluqueria</h5>
                    <a href="frmRegistrarCitaPeluqueria" class="btn btn-primary">Registrar Peluqueria</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#exampleModalCenter').modal('toggle')
    });
</script>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Recordatorio</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <?php
                $evento = new ControladorEvento();
                $res = $evento->consultarEventoVentanaControlador();
                if (empty($res)) {
                ?>
                    <h4 style="text-align: center;">No tienes eventos para hoy</h4>
                <?php
                } else {
                ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Evento</th>
                                <th>Descripcion</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($res as $key => $value) {
                                $matriz = explode(" ", $value['start']);
                            ?>
                                <tr>
                                    <td><?php echo $value['title'] ?></td>
                                    <td><?php echo $value['descripcion'] ?></td>
                                    <td><?php echo $matriz[0] ?></td>
                                    <td><?php echo $matriz[1] ?></td>
                                </tr>
                        <?php }
                        } ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>