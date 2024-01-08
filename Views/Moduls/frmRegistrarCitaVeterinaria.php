<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] ==  "okRegistroVeterinario") {
        print '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
          Registro Completo
        </div>
      </div>';
    }
    if ($_GET['action'] ==  "fallidoRegistroVeterinario") {
        print '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
          Fallido no has registrado ningun dato
        </div>
      </div>';
    }
    if ($_GET['action'] ==  "fallidoRegistroVeterinarioInsumo") {
        print '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
          Se registro consulta pero Insumos insuficiente comuniquese con el adminsitrador
        </div>
      </div>';
    }
}
?>
<h1 style="text-align: center;">Registrar Cita Veterinaria</h1>
<br><br>
<div class="container">
    <div class="row">
        <div class="form-control">
            <div style="text-align: right;">
                <img src="Views/img/logoFormularioVeterinario.png" alt="">
            </div>
            <form method="post">
                <div class="form-control">
                    <h4>Datos del paciente</h4>
                    <div class="row">
                        <div class="col">
                            <input type="hidden" name="idMascota" id="idMascota">
                            <label class="mb-3">Nombre Paciente</label>
                            <input type="text" id="mascota" name="mascota" required class="form-control" placeholder="Ingrese el nombre de la mascota">

                        </div>
                        <div class="col">
                            <input type="hidden" name="idEspecie" id="idEspecie">
                            <label class="mb-3">Especie</label>
                            <input type="text" id="especie" name="especie" required class="form-control" placeholder="Ingrese la especie de la mascota">
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
                            <input type="text" name="entero" id="entero" required class="form-control" placeholder="Ingrese si o no">
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
                            <input type="hidden" id="idTipoConsulta" name="idTipoConsulta">
                            <label class="mb-3">Tipo de consulta</label>
                            <!--<input type="text" name="tipoConsultao" id="tipoConsultao" class="form-control" placeholder="Ingrese el tipo de consulta">-->
                            <select name="tipoConsultao" required id="tipoConsultao" class="form-control">
                                <option value="Consulta">Consulta</option>
                                <option value="Urgencia">Urgencia</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-control">
                    <h4>Anamnesis y Catamnesis </h4>
                    <div class="row">
                        <div class="col">
                            <label class="mb-3">Motivo Consulta</label>
                            <input type="text" name="motivoConsulta" id="motivoConsulta" class="form-control" placeholder="Ingrese el motivo de la consulta">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label class="mb-3">Signos observados</label>
                            <input type="text" name="signosObservados" id="signosObservados" class="form-control" placeholder="Ingrese el signos observados">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label class="mb-3">Causa aparente</label>
                            <input type="text" name="causaPaciente" id="causaPaciente" class="form-control" placeholder="Ingrese el causa aparente">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label class="mb-3">Tratamiento</label>
                            <input type="text" name="tratamiento" id="tratamiento" class="form-control" placeholder="Ingrese el tratamiento">
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-control">
                    <h4>Examen fisico </h4>
                    <br>
                    <div class="row">
                        <table class="table table-bordered border-primary">
                            <tbody>
                                <tr>
                                    <td>Temperatura (°C)</td>
                                    <td><input type="text" aria-label="Last name" class="form-control" name="temperaturas"></td>
                                    <td>F. cardiaca</td>
                                    <td><input type="text" aria-label="Last name" class="form-control" name="cardiaca"></td>
                                    <td>Peso</td>
                                    <td><input type="text" aria-label="Last name" class="form-control" name="peso"></td>
                                </tr>
                                <tr>
                                    <td>Pulso</td>
                                    <td><input type="text" aria-label="Last name" class="form-control" name="pulso"></td>
                                    <td>F.respiratoria</td>
                                    <td><input type="text" aria-label="Last name" class="form-control" name="respiratoria"></td>
                                    <td>Ganglios linfaticos </td>
                                    <td><input type="text" aria-label="Last name" class="form-control" name="gangliosLinfaticos"></td>
                                </tr>
                                <tr>
                                    <td>Mucosas</td>
                                    <td><input type="text" aria-label="Last name" class="form-control" name="mucosa"></td>
                                    <td>R. tusigeno</td>
                                    <td><input type="text" aria-label="Last name" class="form-control" name="tusigeno"></td>
                                    <td>Observaciones </td>
                                    <td><textarea class="form-control" id="exampleFormControlTextarea1" name="observaciones" rows="3"></textarea></td>
                                </tr>
                                <tr>
                                    <td>T. llenado capilar</td>
                                    <td><input type="text" aria-label="Last name" class="form-control" name="llenadoCapilar"></td>
                                    <td>% Deshidratación </td>
                                    <td><input type="text" aria-label="Last name" class="form-control" name="deshidratacion"></td>
                                </tr>
                                <tr>
                                    <td>Dolor </td>
                                    <td><input type="text" aria-label="Last name" class="form-control" name="dolor"></td>
                                    <td>Condicion corporal</td>
                                    <td><input type="text" aria-label="Last name" class="form-control" name="condicionCorporal"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="form-control">
                    <h4>Sistemas afectados (marque con una x)</h4>
                    <br>
                    <div class="row">
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="circulatorio" value="Si" id="">
                            <label class="form-check-label">Circulatorio</label>
                        </div>
                        <br>
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="digestivo" value="Si" id="">
                            <label class="form-check-label">Digestivo</label>
                        </div>
                        <br>
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="respiratorio" value="Si" id="">
                            <label class="form-check-label">Respiratorio</label>
                        </div>
                        <br>
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="dermatologico" value="Si" id="">
                            <label class="form-check-label">Dermatologico</label>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="nervioso" value="Si" id="">
                            <label class="form-check-label">Nervioso</label>
                        </div>
                        <br>
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="genitourinario" value="Si" id="">
                            <label class="form-check-label">Genitourinario</label>
                        </div>
                        <br>
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="oseo" value="Si" id="">
                            <label class="form-check-label">Oseo</label>
                        </div>
                        <br>
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="organosSentidos" value="Si" id="">
                            <label class="form-check-label">Organos de los sentidos</label>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="linfatico" value="Si" id="">
                            <label class="form-check-label">Linfatico</label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-control">
                    <h4>Lista de problemas</h4>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"></th>
                                <th scope="col">Agregar</th>
                            </tr>
                        </thead>
                        <tbody id="problema">
                            <tr>
                                <th scope="row">1</th>
                                <td><input type="text" class="form-control" name="problema[]"></td>
                                <td><a class="btn btn-primary" id="agregarProblema"><img src="Views/img/agregar.png" width="20" alt=""></a></td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <h4>Lista depurada</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"></th>
                                <th scope="col">Agregar</th>
                            </tr>
                        </thead>
                        <tbody id="depurada">
                            <tr>
                                <th scope="row">1</th>
                                <td><input type="text" class="form-control" name="depurada[]"></td>
                                <td><a class="btn btn-primary" id="agregarDepurada"><img src="Views/img/agregar.png" width="20" alt=""></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="form-control">
                    <br>
                    <div id="inputs">
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">DAMNVITP</span>
                                    <input type="text" class="form-control" title="Digestivo
Anomaliza congenita
Metabólico
Neoplasia, nutricional
Vascular
Infeccioso, idioplatico, inmunomediad, inflamatoio
Trauma, toxico
Parasitario
                                    " name="DAMNVITP" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Plan diagnostico</span>
                                    <input type="text" class="form-control" title="AYUDAS DX" name="planDiagnostico" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Diagnostico definitivo</span>
                                    <input type="text" class="form-control" name="diagnosticoDefinitivo" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Pronostico</span>
                                    <input type="text" class="form-control" name="pronostico" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-control">
                    <h4>Plan terapeutico/ Insumo</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Insumo </th>
                                    <th scope="col">Cantidad </th>
                                    <th scope="col">Agregar</th>
                                </tr>
                            </thead>
                            <tbody id="insumo">
                                <tr>
                                    <td><input type="text" class="form-control" name="principioActivoInsumo[]" id="insumoPrincipio"></td>
                                    <td><input type="text" class="form-control" name="dosisInsumo[]"></td>
                                    <td><a class="btn btn-primary" id="agregarInsumo"><img src="Views/img/agregar.png" width="20" alt=""></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="form-control">
                    <h4>Plan terapeutico/ intrahospitalario</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Principio activo </th>
                                    <th scope="col">Posologia</th>
                                    <th scope="col">Dosis </th>
                                    <th scope="col">Via</th>
                                    <th scope="col">Frecuencia</th>
                                    <th scope="col">Duracion</th>
                                    <th scope="col">Observaciones</th>
                                    <th scope="col">Agregar</th>
                                </tr>
                            </thead>
                            <tbody id="hospiralario">
                                <tr>
                                    <td><input type="text" class="form-control" name="principioActivo[]" id="medicamento"></td>
                                    <td><input type="text" class="form-control" name="posologia[]"></td>
                                    <td><input type="text" class="form-control" name="dosis[]"></td>
                                    <td><input type="text" class="form-control" name="via[]"></td>
                                    <td><input type="text" class="form-control" name="frecuencia[]"></td>
                                    <td><input type="text" class="form-control" name="duracion[]"></td>
                                    <td><input type="text" class="form-control" name="observacionesHospitalario[]"></td>
                                    <td><a class="btn btn-primary" id="agregarHospiralario"><img src="Views/img/agregar.png" width="20" alt=""></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="form-control">
                    <h4>Plan terapeutico/ en casa</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Principio activo </th>
                                    <th scope="col">Posologia</th>
                                    <th scope="col">Dosis </th>
                                    <th scope="col">Via</th>
                                    <th scope="col">Frecuencia</th>
                                    <th scope="col">Duracion</th>
                                    <th scope="col">Observaciones</th>
                                    <th scope="col">Agregar</th>
                                </tr>
                            </thead>
                            <tbody id="casa">
                                <tr>
                                    <td><input type="text" class="form-control" name="principioActivoCasa[]" id="medicamentoCasa"></td>
                                    <td><input type="text" class="form-control" name="posologiaCasa[]"></td>
                                    <td><input type="text" class="form-control" name="dosisCasa[]"></td>
                                    <td><input type="text" class="form-control" name="viaCasa[]"></td>
                                    <td><input type="text" class="form-control" name="frecuenciaCasa[]"></td>
                                    <td><input type="text" class="form-control" name="duracionCasa[]"></td>
                                    <td><input type="text" class="form-control" name="observacionesCasa[]"></td>
                                    <td><a class="btn btn-primary" id="agregarCasa"><img src="Views/img/agregar.png" width="20" alt=""></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="form-control">
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Recomendaciones</span>
                                <textarea type="text" class="form-control" name="recomendaciones" aria-label="Username" aria-describedby="basic-addon1"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Proximo control</span>
                                <textarea type="text" class="form-control" name="proximoControl" aria-label="Username" aria-describedby="basic-addon1"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Notas de progreso</span>
                                <textarea type="text" class="form-control" name="notasProgreso" aria-label="Username" aria-describedby="basic-addon1"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br><br>
                <div class="form-control">
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <input type="hidden" id="idmedico" value="<?php echo $_SESSION['idMedico'] ?>" name="idmedico">
                                <span class="input-group-text" id="basic-addon1">Medico Veterinario</span>
                                <input type="text" disabled class="form-control" id="medico" value="<?php echo $_SESSION['medico'] ?>" name="medico" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Nombre</span>
                                <input type="text" disabled class="form-control" value="<?php echo $_SESSION['medico'] ?>" id="nombreMedico" name="nombreMedico" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">MP</span>
                                <input type="text" disabled class="form-control" id="mp" value="<?php echo $_SESSION['mp'] ?>" name="mp" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Propietario</span>
                                <input type="text" class="form-control" id="cliente" name="propietario" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Nombre</span>
                                <input type="text" class="form-control" id="cliente1" name="nombrePropietario" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">CC</span>
                                <input type="text" class="form-control" id="numeroCliente" required name="ccDocumento" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <button class="btn btn-primary" name="enviar">Registrar</button>
                <br>
            </form>
            <?php
            $contCliente = new ControladorCliente();
            $respuesta = $contCliente->registrarPropietarioControlador();
            ?>
            <br><br><br>
        </div>
    </div>
</div>