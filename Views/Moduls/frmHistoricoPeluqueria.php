<?php
$consultarHora = new ControladorHora();
$consulHora = $consultarHora->consultarHistoricoHoraMascotaControlador();
$lisMo = new RegistrarFechaMedico();
$lisMedi = $lisMo->consultarFechaMedicoControlador();
//var_dump($consulHora);
?>
<style>
    .thumb {
        height: 150px;
        border: 1px solid #000;
        margin: 10px 5px 0 0;
    }
</style>
<h1 style="text-align: center;">Historico Peluqueria</h1>
<br><br>
<div class="container">
    <div class="row">
        <div class="form-control">
            <div style="text-align: right;">
                <img src="Views/img/logoFormularioVeterinario.png" alt="">
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="form-control">
                    <h4>Datos del paciente</h4>
                    <div class="row">
                        <div class="col">
                            <input type="hidden" name="idMascota" id="idMascota">
                            <label class="mb-3">Nombre Paciente</label>
                            <input type="text" id="mascota" value="<?php echo $consulHora[0]['nombreMascota'] ?>" disabled name="mascota" class="form-control" placeholder="Ingrese el nombre de la mascota">

                        </div>
                        <div class="col">
                            <input type="hidden" name="idEspecie" id="idEspecie">
                            <label class="mb-3">Especie</label>
                            <input type="text" id="especie" value="<?php echo $consulHora[0]['especie'] ?>" disabled name="especie" class="form-control" placeholder="Ingrese la especie de la mascota">
                        </div>
                        <div class="col">
                            <label class="mb-3">Fecha Ingreso</label>
                            <input type="text" name="fechaIngreso" value="<?php echo $consulHora[0]['fecha'] ?>" disabled class="form-control" placeholder="Ingrese la fecha de ingreso">
                        </div>
                        <div class="col">
                            <input type="hidden" name="idGenero" id="idGenero">
                            <label class="mb-3">Genero</label>
                            <input type="text" name="genero" disabled value="<?php echo $consulHora[0]['genero'] ?>" id="genero" class="form-control" placeholder="Ingrese el genero">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <input type="hidden" name="idCliente" id="idCliente">
                            <label class="mb-3">Propietario</label>
                            <input type="text" name="propetario" value="<?php echo $consulHora[0]['propietario'] ?>" disabled id="cedula" class="form-control" placeholder="Ingrese el nombre el propietario">
                        </div>
                        <div class="col">
                            <label class="mb-3">Entero</label>
                            <input type="text" name="entero" value="<?php echo $consulHora[0]['Entero'] ?>" disabled id="entero" class="form-control" placeholder="Ingrese si o no">
                        </div>
                        <div class="col">
                            <input type="hidden" name="idEdad" id="idEdad">
                            <label class="mb-3">Edad</label>
                            <input type="text" disabled value="<?php echo $consulHora[0]['edad'] ?>" name="edad" id="edad" class="form-control" placeholder="Ingrese la edad de la mascota">
                        </div>
                        <div class="col">
                            <label class="mb-3">Telefono</label>
                            <input type="text" disabled value="<?php echo $consulHora[0]['telefono'] ?>" name="telefono" id="telefono" class="form-control" placeholder="Ingrese el numero del propietario">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="mb-3">Hora Ingreso</label>
                            <input type="text" disabled value="<?php echo $consulHora[0]['hora'] ?>" name="horaIngreso" id="" class="form-control" placeholder="Ingrese la hora">
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="form-control">
                    <div class="row">
                        <div class="col">
                            <br>
                            <label for="" class="mb-3">Imagen antes</label>
                            <br><br>
                            <img id="uploadPreview1" width="350" height="200" src="<?php echo $consulHora[0]['fotoAntes'] ?>" />
                        </div>
                        <div class="col">
                            <br>
                            <label for="" class="mb-3">Imagen despues</label>
                            <br><br>
                            <img id="uploadPreview2" width="350" height="200" src="<?php echo $consulHora[0]['fotoDespues'] ?>" />
                        </div>
                        <div class="col">
                            <br>
                            <label for="" class="mb-3">Observaciones</label>
                            <textarea name="Observacion" disabled id="" class="form-control" cols="30" rows="10"><?php echo $consulHora[0]['observaciones'] ?></textarea>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-control">
                    <div class="row">
                        <div class="col">
                            <br><br>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Encargado</span>
                                <input type="text" class="form-control" value="<?php echo $lisMedi[0]['medico'] ?>" disabled name="encargado" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col">
                            <br>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Propietario</span>
                                <input type="text" value="<?php echo $consulHora[0]['propietario'] ?>" class="form-control" disabled id="cliente" name="propietario" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">CC</span>
                                <input type="text" value="<?php echo $consulHora[0]['numeroCedula'] ?>" class="form-control" disabled id="numeroCliente" name="ccDocumento" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
            </form>
        </div>
    </div>
</div>