<?php
$list = new ControladorFechaIngreso();
$listRes = $list->listarTodoVeterinaria();

if (isset($_GET['idMascota'])) {
    if ($listRes == NULL) {
        $listRes = $list->listarControl();
        if ($listRes == null) {
            $listRes = $list->listarrecomenda();
            if ($listRes == null) {
                $listRes = $list->listarPronostico();
                if ($listRes == null) {
                    $listRes = $list->listarSistema();
                    if ($listRes == null) {
                        $listRes = $list->listarExamen();
                        if ($listRes == null) {
                            $listRes = $list->listarAnamnesis();
                            if ($listRes == null) {
                                $listRes = $list->listarMascotaCliente();
                            }
                        }
                    }
                }
            }
        }
    }
}
$lisNotaCon = new ControladorNotasProgreso();
$lisNotasPro = $lisNotaCon->consultarNotaProgreso();

$lisControlProximo = new ControladorProximoControl();
$resControl = $lisControlProximo->consultarControlProximo();

$lisRecomen = new ControladorRecomendaciones();
$resRecome = $lisRecomen->consultarRecomendacion();

$lisDAMN = new ControladorAMNVITP();
$liDAMN = $lisDAMN->consultarDAM();
$lisSisteMa = new ControladorSistemasAfectados();
$lisSiste = $lisSisteMa->consultarSistema();

$listConExamen = new ConstroladorExamenFisico();
$listExamen = $listConExamen->consultarExamen();

$lisConMo = new ControladorAnamnesis();
$listConsulta = $lisConMo->consultarAnemesis();

$liss = new ControladorListaProblema();
$lisProblema = $liss->consultarProblemaFecha();

$lisss = new ControladorListaDepurada();
$listDepura = $lisss->consultarDepura();

$lisInsumo = new ControladorHospitalarioInsumo();
$listInsumo = $lisInsumo->consultarHospitalarioInsumo();

$lisHos = new ControladorPlanHospitalario();
$listHos = $lisHos->consultarPlanHospitalario();

$lisCas = new ControladorPlanCasa();
$lsitCasa = $lisCas->consultarPlanCasa();

$lisOpreacion =  new controladorInformacionOperaciones();
$listOpIn = $lisOpreacion->consultarInformacionOperaciones();

$lisMo = new RegistrarFechaMedico();
$lisMedi = $lisMo->consultarFechaMedicoControlador();

$lisPDF = new ControladorAnexoPDF();
$lisResPdf = $lisPDF->listarPDFControlador();

if (isset($_GET['action'])) {
    if ($_GET['action'] ==  "okActualizarInvestigado") {
        print '<div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
          Se Actualizo Correctamente
        </div>
      </div>';
    }
    if ($_GET['action'] ==  "fallidoActualizarInvestigado") {
        print '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
          Insumos insuficientes comuniquese con adminsitracion
        </div>
      </div>';
    }
    if ($_GET['action'] ==  "FallidoPDFActualizarInvestigado") {
        print '<div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
          No se puedo super el PDF error en el formato o supero el las 500 kb de tamaño
        </div>
      </div>';
    }
}
date_default_timezone_set('America/Mexico_City');
$fechaActal = date('Y-m-d');

?>
<!--<script src="Views/js/jquery.min.js"></script>
<script src="Views/js/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<h1 style="text-align: center;">Historico Veterinario</h1>
<br>

<div class="container">
    <div class="row">
        <div style="text-align: end;">
            <a href="index.php?action=frmPDF&fecha=<?php echo $listRes[0]['fecha'] . '&idMascota=' . $listRes[0]['idMascota'] . '&idFechaIngreso=' . $listRes[0]['idFechaIngreso'] ?>"><img src="Views/img/pdf.png" width="50px" alt=""></a>
        </div>
        <div class="form-control">
            <div style="text-align: right;">
                <img src="Views/img/logoFormularioVeterinario.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <div style="text-align: left;" class="form-control">
                        <Label style="font-weight: bold; ">Historia Clinita #<?php echo $_GET['idMascota'] ?></Label>
                    </div>
                </div>
            </div>

            <form method="post" enctype="multipart/form-data">
                <div class="form-control">
                    <h4>Datos del paciente</h4>
                    <div class="row">
                        <div class="col">
                            <input type="hidden">
                            <label class="mb-3">Nombre Paciente</label>
                            <input type="text" value="<?php print $listRes[0]['nombreMascota']; ?>" disabled name="mascota" class="form-control" placeholder="Ingrese el nombre de la mascota">

                        </div>
                        <div class="col">
                            <input type="hidden">
                            <label class="mb-3">Especie</label>
                            <input type="text" disabled name="especie" value="<?php print $listRes[0]['especie']; ?>" class="form-control" placeholder="Ingrese la especie del perro">
                        </div>
                        <div class="col">
                            <label class="mb-3">Fecha Ingreso</label>
                            <input type="date" name="fechaIngreso" value="<?php print $listRes[0]['fecha']; ?>" disabled class="form-control" placeholder="Ingrese la fecha de ingreso">
                        </div>
                        <div class="col">
                            <input type="hidden" name="idGenero">
                            <label class="mb-3">Genero</label>
                            <input type="text" name="genero" value="<?php print $listRes[0]['genero']; ?>" disabled class="form-control" placeholder="Ingrese el genero">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <input type="hidden" name="idCliente">
                            <label class="mb-3">Propietario</label>
                            <input type="text" name="propetario" value="<?php print $listRes[0]['propietario']; ?>" disabled class="form-control" placeholder="Ingrese el nombre el propietario">
                        </div>
                        <div class="col">
                            <label class="mb-3">Entero</label>
                            <input type="text" name="entero" value="<?php print $listRes[0]['Entero']; ?>" disabled class="form-control" placeholder="Ingrese si o no">
                        </div>
                        <div class="col">
                            <input type="hidden" name="idEdad" id="idEdad">
                            <label class="mb-3">Edad</label>
                            <input type="text" name="edad" value="<?php print $listRes[0]['edad']; ?>" disabled class="form-control" placeholder="Ingrese la edad de la mascota">
                        </div>
                        <div class="col">
                            <label class="mb-3">Telefono</label>
                            <input type="text" name="telefono" value="<?php print $listRes[0]['telefono']; ?>" disabled class="form-control" placeholder="Ingrese el numero del propietario">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">
                            <input type="hidden" id="idTipoConsulta">
                            <label class="mb-3">Tipo de consulta</label>
                            <input type="text" name="tipoConsultao" id="tipoConsultao" value="<?php print $listRes[0]['consulta']; ?>" disabled class="form-control" placeholder="Ingrese el tipo de consulta">
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-control">
                    <h4>Anamnesis y Catamnesis </h4>
                    <br>
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Motivo Consulta</th>
                                    <th scope="col">Signos observados</th>
                                    <th scope="col">Causa aparente</th>
                                    <th scope="col">Tratamiento</th>
                                    <th scope="col">Fecha y Hora</th>
                                </tr>
                            </thead>
                            <thead>
                                <?php
                                foreach ($listConsulta as $key => $value) {

                                ?>
                                    <tr>
                                        <input type="hidden" name="idAnemesis[]" value="<?php echo $value['idAnamnesisCatemnesis'] ?>" id="">
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;';
                                                                            } ?>" value="<?php echo $value['motivoConsulta'] ?>" class="form-control" name="motivoConsulta[]"></td>
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;';
                                                                            } ?>" value="<?php echo $value['signosObservados'] ?>" class="form-control" name="signosObservados[]"></td>
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;';
                                                                            } ?>" value="<?php echo $value['causaAparente'] ?>" class="form-control" name="causaPaciente[]"></td>
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;';
                                                                            } ?>" value="<?php echo $value['tratamiento'] ?>" class="form-control" name="tratamiento[]"></td>
                                        <td><input type="text" disabled style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                    print 'color: blue;';
                                                                                } ?>" value="<?php echo $value['fechaHistorico'] . " " . $value['horaHistorico'] ?>" class="form-control" name=""></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </thead>
                        </table>
                        <br>
                        <div class="col">
                            <input type="hidden" name="idAnamnsis" value="">
                            <label class="mb-3">Motivo Consulta</label>
                            <input type="text" name="motivoConsultaEditar" id="motivoConsulta" value="" class="form-control" placeholder="Ingrese el motivo de la consulta">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label class="mb-3">Signos observados</label>
                            <input type="text" name="signosObservadosEditar" value="" id="signosObservados" class="form-control" placeholder="Ingrese el signos observados">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label class="mb-3">Causa aparente</label>
                            <input type="text" name="causaPacienteEditar" value="" id="causaPaciente" class="form-control" placeholder="Ingrese el causa aparente">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label class="mb-3">Tratamiento</label>
                            <input type="text" name="tratamientoEditar" value="" id="tratamiento" class="form-control" placeholder="Ingrese el tratamiento">
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-control">
                    <h4>Examen fisico </h4>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th class="col">Temperatura</th>
                                            <th class="col">Pulso</th>
                                            <th class="col">Mucosas</th>
                                            <th class="col">Capilar</th>
                                            <th class="col">Dolor</th>
                                            <th class="col">cardiaca</th>
                                            <th class="col">respiratoria</th>
                                            <th class="col">tusigeno</th>
                                            <th class="col">% Deshidratación</th>
                                            <th class="col">Condicion corporal</th>
                                            <th class="col">Peso</th>
                                            <th class="col">Ganglios linfaticos</th>
                                            <th class="col">Observaciones</th>
                                            <th scope="col">Fecha y Hora</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($listExamen as $key => $value) {

                                        ?>
                                            <tr><input type="hidden" name="idExamen[]" value="<?php echo $value['idExamenFisico'] ?>">
                                                <td><textarea name="temperaturas[]" class="form-control" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                                                                echo 'disabled';
                                                                                                            } ?> id="" style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                                                                    print 'color: blue;"';
                                                                                                                                } ?>" cols="8" rows="1"><?php echo $value['temperatura'] ?></textarea></td>
                                                <td><textarea name="pulso[]" class="form-control" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                                                        echo 'disabled';
                                                                                                    } ?> id="" style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                                                            print 'color: blue;"';
                                                                                                                        } ?>" cols="10" rows="1"><?php echo $value['pulso'] ?></textarea></td>
                                                <td><textarea name="mucosa[]" class="form-control" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                                                        echo 'disabled';
                                                                                                    } ?> id="" style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                                                            print 'color: blue;"';
                                                                                                                        } ?>" cols="10" rows="1"><?php echo $value['mucosas'] ?></textarea></td>
                                                <td><textarea name="llenadoCapilar[]" class="form-control" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                                                                echo 'disabled';
                                                                                                            } ?> id="" style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                                                                    print 'color: blue;"';
                                                                                                                                } ?>" cols="10" rows="1"><?php echo $value['llenadoCapilar'] ?></textarea></td>
                                                <td><textarea name="dolor[]" class="form-control" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                                                        echo 'disabled';
                                                                                                    } ?> id="" style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                                                            print 'color: blue;"';
                                                                                                                        } ?>" cols="10" rows="1"><?php echo $value['Dolor'] ?></textarea></td>
                                                <td><textarea name="cardiaca[]" class="form-control" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                                                            echo 'disabled';
                                                                                                        } ?> id="" style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                                                                print 'color: blue;"';
                                                                                                                            } ?>" cols="10" rows="1"><?php echo $value['cardiaca'] ?></textarea></td>
                                                <td><textarea name="respiratoria[]" class="form-control" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                                                                echo 'disabled';
                                                                                                            } ?> id="" style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                                                                    print 'color: blue;"';
                                                                                                                                } ?>" cols="10" rows="1"><?php echo $value['respiratoria'] ?></textarea></td>
                                                <td><textarea name="tusigeno[]" class="form-control" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                                                            echo 'disabled';
                                                                                                        } ?> id="" style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                                                                print 'color: blue;"';
                                                                                                                            } ?>" cols="10" rows="1"><?php echo $value['tusigeno'] ?></textarea></td>
                                                <td><textarea name="deshidratacion[]" class="form-control" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                                                                echo 'disabled';
                                                                                                            } ?> id="" style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                                                                    print 'color: blue;"';
                                                                                                                                } ?>" cols="10" rows="1"><?php echo $value['deshidratacion'] ?></textarea></td>
                                                <td><textarea name="condicionCorporal[]" class="form-control" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                                                                    echo 'disabled';
                                                                                                                } ?> id="" style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                                                                        print 'color: blue;"';
                                                                                                                                    } ?>" cols="10" rows="1"><?php echo $value['condicionCorporal'] ?></textarea></td>
                                                <td><textarea name="peso[]" class="form-control" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                                                        echo 'disabled';
                                                                                                    } ?> id="" style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                                                            print 'color: blue;"';
                                                                                                                        } ?>" cols="10" rows="1"><?php echo $value['peso'] ?></textarea></td>
                                                <td><textarea name="gangliosLinfaticos[]" class="form-control" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                                                                    echo 'disabled';
                                                                                                                } ?> id="" style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                                                                        print 'color: blue;"';
                                                                                                                                    } ?>" cols="10" rows="1"><?php echo $value['gangliosLinfaticos'] ?></textarea></td>
                                                <td><textarea name="observaciones[]" class="form-control" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                                                                echo 'disabled';
                                                                                                            } ?> id="" style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                                                                    print 'color: blue;"';
                                                                                                                                } ?>" cols="10" rows="1"><?php echo $value['Observaciones'] ?></textarea></td>

                                                <td><textarea name="" disabled class="form-control" style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                                                print 'color: blue;"';
                                                                                                            } ?>" id="" cols="100" rows="1"><?php echo $value['fechaHistorico'] . " " . $value['horaHistorico'] ?></textarea></td>
                                            </tr>

                                    </tbody>
                                <?php
                                        }
                                ?>
                                </table>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <table class="table table-bordered border-primary">
                            <tbody>
                                <tr>
                                    <td>Temperatura (°C)</td>
                                    <input type="hidden" name="idExamane" value="">
                                    <td><input type="text" value="" aria-label="Last name" class="form-control" name="temperaturasEditar"></td>
                                    <td>F. cardiaca</td>
                                    <td><input type="text" value="" aria-label="Last name" class="form-control" name="cardiacaEditar"></td>
                                    <td>Peso</td>
                                    <td><input type="text" value="" aria-label="Last name" class="form-control" name="pesoEditar"></td>
                                </tr>
                                <tr>
                                    <td>Pulso</td>
                                    <td><input type="text" value="" aria-label="Last name" class="form-control" name="pulsoEditar"></td>
                                    <td>F.respiratoria</td>
                                    <td><input type="text" value="" aria-label="Last name" class="form-control" name="respiratoriaEditar"></td>
                                    <td>Ganglios linfaticos </td>
                                    <td><input type="text" value="" aria-label="Last name" class="form-control" name="gangliosLinfaticosEditar"></td>
                                </tr>
                                <tr>
                                    <td>Mucosas</td>
                                    <td><input type="text" value="" aria-label="Last name" class="form-control" name="mucosaEditar"></td>
                                    <td>R. tusigeno</td>
                                    <td><input type="text" value="" aria-label="Last name" class="form-control" name="tusigenoEditar"></td>
                                    <td>Observaciones </td>
                                    <td><textarea class="form-control" id="exampleFormControlTextarea1" name="observacionesEditar" rows="3"></textarea></td>
                                </tr>
                                <tr>
                                    <td>T. llenado capilar</td>
                                    <td><input type="text" value="" aria-label="Last name" class="form-control" name="llenadoCapilarEditar"></td>
                                    <td>% Deshidratación </td>
                                    <td><input type="text" value="" aria-label="Last name" class="form-control" name="deshidratacionEditar"></td>
                                </tr>
                                <tr>
                                    <td>Dolor </td>
                                    <td><input type="text" value="" aria-label="Last name" class="form-control" name="dolorEditar"></td>
                                    <td>Condicion corporal</td>
                                    <td><input type="text" value="" aria-label="Last name" class="form-control" name="condicionCorporalEditar"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="form-control">
                    <h4>Sistemas afectados (marque con una x)</h4>
                    <br>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="col">Circulatorio</th>
                                    <th class="col">Nervioso</th>
                                    <th class="col">Linfatico</th>
                                    <th class="col">Digestivo</th>
                                    <th class="col">Genitourinario</th>
                                    <th class="col">Respiratorio</th>
                                    <th class="col">Oseo</th>
                                    <th class="col">Dermatologico</th>
                                    <th class="col">Sentidos</th>
                                    <th scope="col">Fecha y Hora</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($lisSiste as $key => $value) {

                                ?>
                                    <tr>
                                        <input type="hidden" name="idSistema[]" value="<?php echo $value['idSitemasAfectados'] ?>">
                                        <td><input type="checkbox" value="<?php if ($value['circulatorio'] == 'Si') {
                                                                                print 'Si';
                                                                            } elseif ($value['circulatorio'] == 'No') {
                                                                                print 'Si';
                                                                            } elseif ($value['circulatorio'] == null) {
                                                                                print 'Si';
                                                                            } else {
                                                                                print 'No';
                                                                            } ?>" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                                        echo 'disabled';
                                                                                    } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                                    print 'color: blue;"';
                                                                                                } ?>" <?php if ($value['circulatorio'] == 'Si') {
                                                                                                            print 'checked';
                                                                                                        } ?> class="form-check-input" name="circulatorio[]"></td>
                                        <td><input type="checkbox" value="<?php if ($value['nervisoso'] == 'Si') {
                                                                                print 'Si';
                                                                            } elseif ($value['nervisoso'] == 'No') {
                                                                                print 'Si';
                                                                            } elseif ($value['nervisoso'] == null) {
                                                                                print 'Si';
                                                                            } else {
                                                                                print 'No';
                                                                            } ?>" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                                        echo 'disabled';
                                                                                    } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                                    print 'color: blue;"';
                                                                                                } ?>" <?php if ($value['nervisoso'] == 'Si') {
                                                                                                            print 'checked';
                                                                                                        } ?> class="form-check-input" name="nervioso[]"></td>
                                        <td><input type="checkbox" value="<?php if ($value['Linfatico'] == 'Si') {
                                                                                print 'Si';
                                                                            } elseif ($value['Linfatico'] == 'No') {
                                                                                print 'Si';
                                                                            } elseif ($value['Linfatico'] == null) {
                                                                                print 'Si';
                                                                            } else {
                                                                                print 'No';
                                                                            } ?>" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                                        echo 'disabled';
                                                                                    } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                                    print 'color: blue;"';
                                                                                                } ?>" <?php if ($value['Linfatico'] == 'Si') {
                                                                                                            print 'checked';
                                                                                                        } ?> class="form-check-input" name="linfatico[]"></td>
                                        <td><input type="checkbox" value="<?php if ($value['Digestivo'] == 'Si') {
                                                                                print 'Si';
                                                                            } elseif ($value['Digestivo'] == 'No') {
                                                                                print 'Si';
                                                                            } elseif ($value['Digestivo'] == null) {
                                                                                print 'Si';
                                                                            } else {
                                                                                print 'No';
                                                                            } ?>" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                                        echo 'disabled';
                                                                                    } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                                    print 'color: blue;"';
                                                                                                } ?>" <?php if ($value['Digestivo'] == 'Si') {
                                                                                                            print 'checked';
                                                                                                        } ?> class="form-check-input" name="digestivo[]"></td>
                                        <td><input type="checkbox" value="<?php if ($value['Genitourinario'] == 'Si') {
                                                                                print 'Si';
                                                                            } elseif ($value['Genitourinario'] == 'No') {
                                                                                print 'Si';
                                                                            } elseif ($value['Genitourinario'] == null) {
                                                                                print 'Si';
                                                                            } else {
                                                                                print 'No';
                                                                            } ?>" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                                        echo 'disabled';
                                                                                    } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                                    print 'color: blue;"';
                                                                                                } ?>" <?php if ($value['Genitourinario'] == 'Si') {
                                                                                                            print 'checked';
                                                                                                        } ?> class="form-check-input" name="genitourinario[]"></td>
                                        <td><input type="checkbox" value="<?php if ($value['Respiratorio'] == 'Si') {
                                                                                print 'Si';
                                                                            } elseif ($value['Respiratorio'] == 'No') {
                                                                                print 'Si';
                                                                            } elseif ($value['Respiratorio'] == null) {
                                                                                print 'Si';
                                                                            } else {
                                                                                print 'No';
                                                                            } ?>" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                                        echo 'disabled';
                                                                                    } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                                    print 'color: blue;"';
                                                                                                } ?>" <?php if ($value['Respiratorio'] == 'Si') {
                                                                                                            print 'checked';
                                                                                                        } ?> class="form-check-input" name="respiratorio"></td>
                                        <td><input type="checkbox" value="<?php if ($value['Oseo'] == 'Si') {
                                                                                print 'Si';
                                                                            } elseif ($value['Oseo'] == 'No') {
                                                                                print 'Si';
                                                                            } elseif ($value['Oseo'] == null) {
                                                                                print 'Si';
                                                                            } else {
                                                                                print 'No';
                                                                            } ?>" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                                        echo 'disabled';
                                                                                    } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                                    print 'color: blue;"';
                                                                                                } ?>" <?php if ($value['Oseo'] == 'Si') {
                                                                                                            print 'checked';
                                                                                                        } ?> class="form-check-input" name="oseo[]"></td>
                                        <td><input type="checkbox" value="<?php if ($value['Dermatologico'] == 'Si') {
                                                                                print 'Si';
                                                                            } elseif ($value['Dermatologico'] == 'No') {
                                                                                print 'Si';
                                                                            } elseif ($value['Dermatologico'] == null) {
                                                                                print 'Si';
                                                                            } else {
                                                                                print 'No';
                                                                            } ?>" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                                        echo 'disabled';
                                                                                    } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                                    print 'color: blue;"';
                                                                                                } ?>" <?php if ($value['Dermatologico'] == 'Si') {
                                                                                                            print 'checked';
                                                                                                        } ?> class="form-check-input" name="dermatologico[]"></td>
                                        <td><input type="checkbox" value="<?php if ($value['organosSentidos'] == 'Si') {
                                                                                print 'Si';
                                                                            } elseif ($value['organosSentidos'] == 'No') {
                                                                                print 'Si';
                                                                            } elseif ($value['organosSentidos'] == null) {
                                                                                print 'Si';
                                                                            } else {
                                                                                print 'No';
                                                                            } ?>" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                                        echo 'disabled';
                                                                                    } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                                    print 'color: blue;"';
                                                                                                } ?>" <?php if ($value['organosSentidos'] == 'Si') {
                                                                                                            print 'checked';
                                                                                                        } ?> class="form-check-input" name="organosSentidos[]"></td>
                                        <td><textarea name="" disabled class="form-control" style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                                        print 'color: blue;"';
                                                                                                    } ?>" id="" cols="100" rows="1"><?php echo $value['fechaHistorico'] . " " . $value['horaHistorico'] ?></textarea></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <input type="hidden" name="idSistemaAfectados" value="">
                            <input class="form-check-input" type="checkbox" name="circulatorioEditar" value="Si" id="">
                            <label class="form-check-label">Circulatorio</label>
                        </div>
                        <br>
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="digestivoEditar" value="Si" id="">
                            <label class="form-check-label">Digestivo</label>
                        </div>
                        <br>
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="respiratorioEditar" value="Si" id="">
                            <label class="form-check-label">Respiratorio</label>
                        </div>
                        <br>
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="dermatologicoEditar" value="Si" id="">
                            <label class="form-check-label">Dermatologico</label>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="nerviosoEditar" value="Si" id="">
                            <label class="form-check-label">Nervioso</label>
                        </div>
                        <br>
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="genitourinarioEditar" value="Si" id="">
                            <label class="form-check-label">Genitourinario</label>
                        </div>
                        <br>
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="oseoEditar" value="Si" id="">
                            <label class="form-check-label">Oseo</label>
                        </div>
                        <br>
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="organosSentidosEditar" value="Si" id="">
                            <label class="form-check-label">Organos de los sentidos</label>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="linfaticoEditar" value="Si" id="">
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
                                <th scope="col">Fecha y Hora</th>
                            </tr>
                        </thead>
                        <tbody id="">
                            <?php
                            foreach ($lisProblema as $key => $value) {
                                $cont = $key + 1;
                            ?>
                                <tr><input type="hidden" name="idProblema[]" value="<?php echo $value['idProblema'] ?>">
                                    <th scope="row"><?php echo $cont ?></th>
                                    <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                echo 'disabled';
                                                            } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                            print 'color: blue;"';
                                                                        } ?>" value="<?php echo $value['problema'] ?>" class="form-control" name="problemaEdit[]"></td>
                                    <td><input type="text" disabled style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value=" <?php echo 'Fecha: ' . $value['fechaHistorico'] . ' ' . $value['horaHistorico'] ?>" class="form-control" name=""></td>
                                </tr>
                            <?php

                            }
                            ?>
                        </tbody>
                    </table>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"></th>
                                <th scope="col">Agregar</th>
                            </tr>
                        </thead>
                        <tbody id="problema">
                            <th scope="row">1</th>
                            <input type="hidden" value="" name="idProbelma">
                            <td><input type="text" class="form-control" value="" name="problema[]"></td>
                            <td><a class="btn btn-primary" id="agregarProblema"><img src="Views/img/agregar.png" width="20" alt=""></a></td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <h4>Lista depurada</h4>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"></th>
                                <th scope="col">Agregar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listDepura as $key => $value) {
                                $cont = $key + 1;

                            ?>
                                <tr>
                                    <input type="hidden" name="idDepura[]" value="<?php echo $value['idListaDepurada'] ?>">
                                    <th scope="row"><?php echo $cont ?></th>
                                    <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                echo 'disabled';
                                                            } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                            print 'color: blue;"';
                                                                        } ?>" value="<?php echo $value['depurada'] ?>" class="form-control" name="depuraEdit[]"></td>
                                    <td><input type="text" disabled style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value=" <?php echo 'Fecha: ' . $value['fechaHistorico'] . ' ' . $value['horaHistorico'] ?>" class="form-control" name=""></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <br>
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
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="col">#</th>
                                <th class="col">DAMNVITP</th>
                                <th class="col">Plan diagnostico</th>
                                <th class="col">Diagnostico definitivo</th>
                                <th class="col">Pronostico</th>
                                <th class="col">Fecha y Hora</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($liDAMN as $key => $value) {
                                $cont = $key + 1;

                            ?>
                                <tr>
                                    <input type="hidden" name="idDamnvitp[]" value="<?php echo $value['idDiagnostico'] ?>">
                                    <th scope="row"><?php echo $cont ?></th>
                                    <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                echo 'disabled';
                                                            } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                            print 'color: blue;"';
                                                                        } ?>" value="<?php echo $value['damnvitp'] ?>" class="form-control" name="damnvitp[]"></td>
                                    <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                echo 'disabled';
                                                            } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                            print 'color: blue;"';
                                                                        } ?>" value="<?php echo $value['planDiagnostico'] ?>" class="form-control" name="planDiagnostico[]"></td>
                                    <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                echo 'disabled';
                                                            } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                            print 'color: blue;"';
                                                                        } ?>" value="<?php echo $value['diagnosticodefinitivo'] ?>" class="form-control" name="diagnosticoDefinitivo[]"></td>
                                    <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                echo 'disabled';
                                                            } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                            print 'color: blue;"';
                                                                        } ?>" value="<?php echo $value['pronostico'] ?>" class="form-control" name="pronostico[]"></td>
                                    <td><input type="text" disabled style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value=" <?php echo 'Fecha: ' . $value['fechaHistorico'] . ' ' . $value['horaHistorico'] ?>" class="form-control" name=""></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <br>
                    <div id="inputs">
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">DAMNVITP</span>
                                    <input type="hidden" name="idPronostico" value="">
                                    <input type="text" value="" class="form-control" title="Digestivo
Anomaliza congenita
Metabólico
Neoplasia, nutricional
Vascular
Infeccioso, idioplatico, inmunomediad, inflamatoio
Trauma, toxico
Parasitario
                                    " name="DAMNVITPEditar" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Plan diagnostico</span>
                                    <input type="text" value="" title="AYUDAS DX" class="form-control" name="planDiagnosticoEditar" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Diagnostico definitivo</span>
                                    <input type="text" value="" class="form-control" name="diagnosticoDefinitivoEditar" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Pronostico</span>
                                    <input type="text" value="" class="form-control" name="pronosticoEditar" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-control">
                    <h4>Plan terapeutico/ Insumo</h4>
                    <br>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Insumo </th>
                                    <th scope="col">Dosis </th>
                                    <th scope="col">Fecha y Hora</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($listInsumo as $key => $value) {
                                ?>
                                    <tr>
                                        <input type="hidden" name="idHospitalarioInsumo[]" value="<?php echo $value['idHospitalInsumo'] ?>" id="">
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['insumo'] ?>" class="form-control" name="principioActivoInsumoEdit[]"></td>
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['dosis'] ?>" class="form-control" name="dosisInsumoEdit[]"></td>
                                        <td><input type="text" di style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" disabled value=" <?php echo 'Fecha: ' . $value['fechaHistorico'] . ' ' . $value['horaHistorico'] ?>" class="form-control" name=""></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Insumo </th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Agregar</th>
                                </tr>
                            </thead>
                            <tbody id="insumo">
                                <tr>
                                    <td><input type="text" class="form-control" name="principioActivoInsumo[]" id="insumoPrincipio"></td>
                                    <td><input type="number" class="form-control" name="dosisInsumo[]"></td>
                                    <td><a class="btn btn-primary" id="agregarInsumo"><img src="Views/img/agregar.png" width="20" alt=""></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="form-control">
                    <h4>Plan terapeutico/ intrahospitalario</h4>
                    <br>
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
                                    <th scope="col">Fecha y Hora</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($listHos as $key => $value) {
                                ?>
                                    <tr>
                                        <input type="hidden" name="idHospital[]" value="<?php echo $value['idIntraHospitalario'] ?>" id="">
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['principioActivo'] ?>" class="form-control" name="principioActivoEdit[]"></td>
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['posologia'] ?>" class="form-control" name="posologiaEdit[]"></td>
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['dosis'] ?>" class="form-control" name="dosisEdit[]"></td>
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['via'] ?>" class="form-control" name="viaEdit[]"></td>
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['frecuencia'] ?>" class="form-control" name="frecuenciaEdit[]"></td>
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['duracion'] ?>" class="form-control" name="duracionEdit[]"></td>
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['observaciones'] ?>" class="form-control" name="observacionesHospitalarioEdit[]"></td>
                                        <td><input type="text" di style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" disabled value=" <?php echo 'Fecha: ' . $value['fechaHistorico'] . ' ' . $value['horaHistorico'] ?>" class="form-control" name=""></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <br>
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
                    <br>
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
                                    <th scope="col">Fecha y Hora</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($lsitCasa as $key => $value) {
                                ?>
                                    <tr>
                                        <input type="hidden" value="<?php echo $value['idTerapeuticoCasa'] ?>" name="idCasa[]">
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['principioActivo'] ?>" class="form-control" name="principioActivoCasaEdit[]"></td>
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['posologia'] ?>" class="form-control" name="posologiaCasaEdit[]"></td>
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['dosis'] ?>" class="form-control" name="dosisCasaEdit[]"></td>
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['via'] ?>" class="form-control" name="viaCasaEdit[]"></td>
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['frecuencia'] ?>" class="form-control" name="frecuenciaCasaEdit[]"></td>
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['duracion'] ?>" class="form-control" name="duracionCasaEdit[]"></td>
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['observaciones'] ?>" class="form-control" name="observacionesCasaEdit[]"></td>
                                        <td><input type="text" disabled style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                    print 'color: blue;"';
                                                                                } ?>" value=" <?php echo 'Fecha: ' . $value['fechaHistorico'] . ' ' . $value['horaHistorico'] ?>" class="form-control" name=""></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <br>
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
                    <h4>Consentimiento informado</h4>
                    <br>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Procedimiento</th>
                                    <th scope="col">Tecnica</th>
                                    <th scope="col">Explicación</th>
                                    <th scope="col">Ventajas</th>
                                    <th scope="col">Ciudad</th>
                                    <th scope="col">Consecuencias</th>
                                    <th scope="col">Secuelas</th>
                                    <th scope="col">Riesgos</th>
                                    <th scope="col">Situaciones</th>
                                    <th scope="col">Especialidad</th>
                                    <th scope="col">Alternativas</th>
                                    <th scope="col">Fecha y Hora</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($listOpIn as $key => $value) {
                                ?>
                                    <tr>
                                        <input type="hidden" value="<?php echo $value['idOperaciones'] ?>" name="idOperacionesEdit[]">
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['procedimiento'] ?>" class="form-control" name="procedimientodit[]"></td>
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['tecnica'] ?>" class="form-control" name="tecnicaEdit[]"></td>
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['explicacionTecnica'] ?>" class="form-control" name="explicacionTecnicaEdit[]"></td>
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['ventajas'] ?>" class="form-control" name="ventajasEdit[]"></td>
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['ciudad'] ?>" class="form-control" name="ciudadEdit[]"></td>
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['consecuencias'] ?>" class="form-control" name="consecuenciasEdit[]"></td>
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['secuelas'] ?>" class="form-control" name="secuelasEdit[]"></td>
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['riesgo'] ?>" class="form-control" name="riesgoEdit[]"></td>
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['extraordinarias'] ?>" class="form-control" name="extraordinariasEdit[]"></td>
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['especialidad'] ?>" class="form-control" name="especialidadEdit[]"></td>
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['alternativas'] ?>" class="form-control" name="alternativasEdit[]"></td>
                                        <td><input type="text" disabled style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                    print 'color: blue;"';
                                                                                } ?>" value=" <?php echo 'Fecha: ' . $value['fechaHistorico'] . ' ' . $value['horaHistorico'] ?>" class="form-control" name=""></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label class="mb-3">Nombre Del procedimiento</label>
                            <input type="text" name="procedimiento" class="form-control" placeholder="Ingrese Nombre Del procedimiento">

                        </div>
                        <div class="col">
                            <input type="hidden">
                            <label class="mb-3">Tecnica</label>
                            <input type="text" name="tecnica" class="form-control" placeholder="Ingrese Explicacion tecnica">
                        </div>
                        <div class="col">
                            <label class="mb-3">Explicacion tecnica</label>
                            <input type="text" name="explicacionTecnica" class="form-control" placeholder="Ingrese Explicacion tecnica">
                        </div>
                        <div class="col">
                            <label class="mb-3">Ventajas del mismo</label>
                            <input type="text" name="ventajas" class="form-control" placeholder="Ingrese Ventajas del mismo">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label class="mb-3">Ciudad</label>
                            <input type="text" name="ciudad" class="form-control" placeholder="Ingrese la Ciudad">
                        </div>
                        <div class="col">
                            <label class="mb-3">Consecuencias colaterales</label>
                            <input type="text" name="consecuencias" class="form-control" placeholder="Ingrese Consecuencias colaterales">
                        </div>
                        <div class="col">
                            <label class="mb-3">Secuelas</label>
                            <input type="text" name="secuelas" class="form-control" placeholder="Ingrese las Secuelas">
                        </div>
                        <div class="col">
                            <label class="mb-3">Riesgos</label>
                            <input type="text" name="riesgo" class="form-control" placeholder="Ingrese Riesgos">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="mb-3">Situaciones extraordinarias</label>
                            <input type="text" name="extraordinarias" id="tipoConsultao" class="form-control" placeholder="Ingrese Situaciones extraordinarias">
                        </div>
                        <div class="col-sm-3">
                            <label class="mb-3">Especialidad</label>
                            <input type="text" name="especialidad" class="form-control" placeholder="Ingrese Especialidad">
                        </div>
                        <div class="col-sm-3">
                            <label class="mb-3">Alternativas</label>
                            <input type="text" name="alternativas" class="form-control" placeholder="Ingrese Alternativas">
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-control">
                    <br>
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Recomendaciones</th>
                                    <th scope="col">Fecha y Hora</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($resRecome as $key => $value) {
                                    $cont = $key + 1;
                                ?>
                                    <tr>
                                        <input type="hidden" name="idRecomedaciones[]" value="<?php echo $value['idRecomendaciones'] ?>">
                                        <td scope="col"><?php echo $cont ?></td>
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['recomendacion'] ?>" class="form-control" name="recomendaciones[]"></td>
                                        <td><input type="text" disabled style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                    print 'color: blue;"';
                                                                                } ?>" value=" <?php echo 'Fecha: ' . $value['fechaHistorico'] . ' ' . $value['horaHistorico'] ?>" class="form-control" name=""></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="col">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Recomendaciones</span>
                                <textarea type="text" class="form-control" name="recomendacionesEditar" aria-label="Username" aria-describedby="basic-addon1"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Proximo Control</th>
                                    <th scope="col">Fecha y Hora</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($resControl as $key => $value) {
                                    $cont = $key + 1;
                                ?>
                                    <tr>
                                        <input type="hidden" name="idCOntrol[]" value="<?php echo $value['idControl'] ?>">
                                        <td scope="col"><?php echo $cont ?></td>
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['controlProximo'] ?>" class="form-control" name="proximoControl[]"></td>
                                        <td><input type="text" disabled style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                    print 'color: blue;"';
                                                                                } ?>" value=" <?php echo 'Fecha: ' . $value['fechaHistorico'] . ' ' . $value['horaHistorico'] ?>" class="form-control" name=""></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <br>
                        <div class="col">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Proximo control</span>
                                <input type="hidden" name="idControl" value="">
                                <textarea type="text" class="form-control" name="proximoControlEditar" aria-label="Username" aria-describedby="basic-addon1"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Notas Progreso</th>
                                    <th scope="col">Fecha y Hora</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($lisNotasPro as $key => $value) {
                                    $cont = $key + 1;
                                ?>
                                    <tr>
                                        <input type="hidden" name="idNotas[]" value="<?php echo $value['idProgreso'] ?>">
                                        <td scope="col"><?php echo $cont ?></td>
                                        <td><input type="text" <?php if ($_SESSION['roles'] != 'administrador') {
                                                                    echo 'disabled';
                                                                } ?> style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                print 'color: blue;"';
                                                                            } ?>" value="<?php echo $value['progreso'] ?>" class="form-control" name="notasProgreso[]"></td>
                                        <td><input type="text" disabled style="<?php if ($value['fechaHistorico'] == $fechaActal) {
                                                                                    print 'color: blue;"';
                                                                                } ?>" value=" <?php echo 'Fecha: ' . $value['fechaHistorico'] . ' ' . $value['horaHistorico'] ?>" class="form-control" name=""></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <br>
                        <div class="col">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Notas de progreso</span>
                                <input type="hidden" name="idProceso" value="">
                                <textarea type="text" class="form-control" name="notasProgresoEditar" aria-label="Username" aria-describedby="basic-addon1"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-control">
                    <br>
                    <h4>Anexar PDF</h4>
                    <br>
                    <div class="row">
                        <div class="col">
                            <br>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">PDF Subido</th>
                                        <th scope="col">PDF</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($lisResPdf as $key => $value) {
                                        $cont = $key + 1;
                                    ?>
                                        <tr>
                                            <td><?php echo $cont ?></td>
                                            <td><textarea class="form-control" disabled name="descripcionPdf[]" style="<?php if ($value['fechaIngreso'] == $fechaActal) {
                                                                                                                            print 'color: blue;"';
                                                                                                                        } ?>" id="descripcionPdf[]" cols="40" rows="1"><?php echo $value['Descripcion'] ?></textarea></td>
                                            <td><textarea class="form-control" disabled name="descripcionPdf[]" style="<?php if ($value['fechaIngreso'] == $fechaActal) {
                                                                                                                            print 'color: blue;"';
                                                                                                                        } ?>" id="descripcionPdf[]" cols="40" rows="1"><?php echo $value['fechaIngreso'] . '' . $value['horaIngreso'] ?></textarea></td>
                                            <td><button onclick="openModelPDF('<?php echo $value['urlPDF'] ?>')" class="btn btn-primary" type="button">Ver Archivo</button></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <br>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">PDF</th>
                                        <th scope="col">Agregar</th>
                                    </tr>
                                </thead>
                                <tbody id="pdf">
                                    <tr>
                                        <td>1</td>
                                        <td><textarea class="form-control" name="descripcionPdf[]" id="descripcionPdf[]" cols="40" rows="1"></textarea></td>
                                        <td><input type="file" name="pdfAnexo[]" id="pdfAnexo[]" class="form-control"></td>
                                        <td><a class="btn btn-primary" id="agregarPDF"><img src="Views/img/agregar.png" width="20" alt=""></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br><br><br>
                <div class="form-control">
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Medico Veterinario</span>
                                <input type="text" disabled class="form-control" value="<?php echo $lisMedi[0]['medico'] ?>" name="medico" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Nombre</span>
                                <input type="text" disabled class="form-control" value="<?php echo $lisMedi[0]['medico'] ?>" name="nombreMedico" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">MP</span>
                                <input type="text" disabled class="form-control" value="<?php echo $lisMedi[0]['MP'] ?>" name="mp" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Propietario</span>
                                <input type="text" disabled value="<?php print $listRes[0]['propietario']; ?>" class="form-control" id="cliente" name="propietario" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Nombre</span>
                                <input type="text" disabled value="<?php print $listRes[0]['propietario']; ?>" class="form-control" id="cliente1" name="nombrePropietario" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">CC</span>
                                <input type="text" disabled value="<?php print $listRes[0]['numeroCedula']; ?>" class="form-control" id="numeroCliente" name="ccDocumento" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary" name="enviarEdit">Registrar</button>
                        <?php if ($_SESSION['roles'] == 'administrador') { ?>
                            <button class="btn btn-primary" name="Actualizar">Actualizar</button>
                        <?php } else {
                        } ?>
                    </div>
                </div>
                <br>
            </form>
            <?php
            $contCliente = new ControladorAnamnesis();
            $respuesta = $contCliente->actualizarAnemesis();
            ?>
            <br><br><br>
        </div>
    </div>
</div>
<div class="modal fade" id="modalPdf" tabindex="-1" aria-labelledby="modalPdf" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ver archivo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe id="iframePDF" frameborder="0" scrolling="no" width="100%" height="500px"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>