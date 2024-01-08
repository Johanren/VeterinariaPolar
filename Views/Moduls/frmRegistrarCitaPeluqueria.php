<?php 
if (isset($_GET['action'])) {
	if ($_GET['action'] ==  "okRegistroPeluqueria") {
		print '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
          Registro Completo
        </div>
      </div>';
	}
    if ($_GET['action'] ==  "falloRegistroPeluqueria") {
		print '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
          Registro fallido no has ingresado datos
        </div>
      </div>';
	}
}
?>
<style>
    .thumb {
        height: 150px;
        border: 1px solid #000;
        margin: 10px 5px 0 0;
    }
</style>
<h1 style="text-align: center;">Registrar Peluqueria</h1>
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
                            <input type="text" id="mascota" required name="mascota" class="form-control" placeholder="Ingrese el nombre de la mascota">

                        </div>
                        <div class="col">
                            <input type="hidden" name="idEspecie" id="idEspecie">
                            <label class="mb-3">Especie</label>
                            <input type="text" id="especie" required name="especie" class="form-control" placeholder="Ingrese la especie de la mascota">
                        </div>
                        <div class="col">
                            <label class="mb-3">Fecha Ingreso</label>
                            <input type="date" name="fechaIngreso" required class="form-control" placeholder="Ingrese la fecha de ingreso">
                        </div>
                        <div class="col">
                            <input type="hidden" name="idGenero" id="idGenero">
                            <label class="mb-3">Genero</label>
                            <input type="text" name="genero" required id="genero" class="form-control" placeholder="Ingrese el genero">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <input type="hidden" name="idCliente" id="idCliente">
                            <label class="mb-3">Propietario</label>
                            <input type="text" name="propetario" required id="cedula" class="form-control" placeholder="Ingrese el nombre el propietario">
                        </div>
                        <div class="col">
                            <label class="mb-3">Entero</label>
                            <input type="text" name="entero" required id="entero" class="form-control" placeholder="Ingrese si o no">
                        </div>
                        <div class="col">
                            <input type="hidden" name="idEdad" id="idEdad">
                            <label class="mb-3">Edad</label>
                            <input type="text" name="edad" id="edad" class="form-control" placeholder="Ingrese la edad de la mascota">
                        </div>
                        <div class="col">
                            <label class="mb-3">Telefono</label>
                            <input type="text" name="telefono" required id="telefono" class="form-control" placeholder="Ingrese el numero del propietario">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="mb-3">Hora Ingreso</label>
                            <input type="time" name="horaIngreso" required id="" class="form-control" placeholder="Ingrese la hora">
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="form-control">
                    <div class="row">
                        <div class="col">
                            <br>
                            <label for="" class="mb-3">Subir imagen antes</label>
                            <input id="uploadImage1" required class="form-control" type="file" id="subirAntes" name="subirAntes" onchange="previewImage1(1);" />
                            <br><br>
                            <img id="uploadPreview1" width="350" height="200" src="Views/img/img.jpg" />
                        </div>
                        <div class="col">
                            <br>
                            <label for="" class="mb-3">Subir imagen despues</label>
                            <input id="uploadImage2" required class="form-control" id="subirDespues" type="file" name="subirDespues" onchange="previewImage(2);" />
                            <br><br>
                            <img id="uploadPreview2" width="350" height="200" src="Views/img/img.jpg" />
                        </div>
                        <div class="col">
                            <br>
                            <label for="" class="mb-3">Observaciones</label>
                            <textarea name="Observacion" id="" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-control">
                    <div class="row">
                        <div class="col">
                            <br><br>
                            <div class="input-group mb-3">
                                <input type="hidden" name="idmedico" value="<?php echo $_SESSION['idMedico'] ?>" id="idmedico">
                                <span class="input-group-text" id="basic-addon1">Encargado</span>
                                <input type="text" class="form-control" id="medico" disabled value="<?php echo $_SESSION['medico'] ?>" name="encargado" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col">
                            <br>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Propietario</span>
                                <input type="text" class="form-control" id="cliente" name="propietario" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">CC</span>
                                <input type="text" class="form-control" id="numeroCliente" required name="ccDocumento" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div style="text-align: center;">
                    <button class="btn btn-primary" name="enviarFoto">Registrar</button>
                </div>
                <br>
            </form>
        </div>
    </div>
</div>
<?php
$registrarPeluqueria = new ControladorCliente();
$registrarPeluqueria->registrarMascotaPeluqueriaFecha();
?>