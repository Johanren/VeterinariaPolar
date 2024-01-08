<?php

class ControladorCliente
{
    function consultarPropietarioAjaxControlador($dato)
    {
        $consultar = new ModeloCliente();
        $respuesta = $consultar->consultarPropietarioAjaxModelo($dato);
        return $respuesta;
    }

    function registrarPropietarioControlador()
    {
        if (isset($_POST["enviar"])) {
            if (
                $_POST['propetario'] == null && $_POST['ccDocumento'] == null && $_POST['telefono'] == null && $_POST['mascota'] == null &&
                $_POST['idEspecie'] == null && $_POST['idGenero'] == null && $_POST['fechaIngreso'] == null && $_POST['entero'] == null
            ) {
                $contAnamnesis = new ControladorAnamnesis();
                $resAnamenesis = $contAnamnesis->registrarAnemesisControlador();
            } else {
                if ($_POST['idCliente'] == '') {
                    $datoCliente = array(
                        'nomPropietario' => $_POST['propetario'],
                        'cc' => $_POST['ccDocumento'],
                        'telefono' => $_POST['telefono']
                    );
                    //registrar
                    $registrarCliente = new ModeloCliente();
                    $resCliente = $registrarCliente->registrarPropietarioModelo($datoCliente);
                    //consultarIDCliente
                    $consIdCli = new ModeloCliente();
                    $resIdCliente = $consIdCli->consultarIdPropietarioModelo($datoCliente);
                    $idCliente = $resIdCliente[0]['idCliente'];
                    //registrarMascota
                    $datoMascota = array(
                        'nombreMascota' => $_POST['mascota'],
                        'idEspecie' => $_POST['idEspecie'],
                        'idGenero' => $_POST['idGenero'],
                        'entero' => $_POST['entero'],
                        'idCliente' => $idCliente
                    );
                    $registrarMascota = new ControladorMascota();
                    //registrarMascota
                    $resMascota = $registrarMascota->registrarMascotaControlador($datoMascota);
                    $conlIdMascota = array(
                        'idCliente' => $idCliente,
                        'nombreMascota' => $_POST['mascota']
                    );
                    //Obtener id mascota
                    $conIdMascota = $registrarMascota->consultarIdMascota($conlIdMascota);
                    $idMascota = $conIdMascota[0]['idMascota'];
                    //RegistrarFecha
                    $registrarFechaIngreso = new ControladorFechaIngreso();
                    $datoFechaIngreso = array('fecha' => $_POST['fechaIngreso'], 'idMascota' => $idMascota);
                    $resFecha = $registrarFechaIngreso->registrarFechaIngresoControlador($datoFechaIngreso);
                    //obtener idFecha
                    $reidFecha = $registrarFechaIngreso->consultarIdControlador();
                    $idFecha = $reidFecha[0]['idFechaIngreso'];
                    //registrar edad
                    $regisEdad = array('edad' => $_POST['edad'], 'idFecha' => $idFecha, 'idMascota' => $idMascota);
                    $registrarEdad = new ControladorEdad();
                    $res = $registrarEdad->registrarEdadControlador($regisEdad);
                    //Registrar Consulta
                    $regisConsulta = array('consulta' => $_POST['tipoConsultao'], 'idFecha' => $idFecha, 'idMascota' => $idMascota);
                    $resgistrarConsulta = new ControladorTipoConsulta();
                    $resConsulta = $resgistrarConsulta->registrarTipoConsulta($regisConsulta);
                    //RegistrarMedicoFecha
                    $medicoFecha = array('idMedico' => $_POST['idmedico'], 'idFecha' => $idFecha);
                    $resMedicoFec = new registrarFechaMedico();
                    $resMedi = $resMedicoFec->registrarFechaMedicoControlador($medicoFecha);
                    if ($resMedi == true) {
                        $contAnamnesis = new ControladorAnamnesis();
                        $resAnamenesis = $contAnamnesis->registrarAnemesisControlador();
                    } else {
                        print "Fallido";
                    }
                } else {

                    if ($_POST['idMascota'] == '') {
                        $datoMascota = array(
                            'nombreMascota' => $_POST['mascota'],
                            'idEspecie' => $_POST['idEspecie'],
                            'idGenero' => $_POST['idGenero'],
                            'entero' => $_POST['entero'],
                            'idCliente' => $_POST['idCliente']
                        );
                        $registrarMascota = new ControladorMascota();
                        //registrarMascota
                        $resMascota = $registrarMascota->registrarMascotaControlador($datoMascota);
                        $conlIdMascota = array(
                            'idCliente' => $_POST['idCliente'],
                            'nombreMascota' => $_POST['mascota']
                        );
                        //Obtener id mascota
                        $conIdMascota = $registrarMascota->consultarIdMascota($conlIdMascota);
                        $idMascota = $conIdMascota[0]['idMascota'];
                        //RegistrarFecha
                        $registrarFechaIngreso = new ControladorFechaIngreso();
                        $datoFechaIngreso = array('fecha' => $_POST['fechaIngreso'], 'idMascota' => $idMascota);
                        $resFecha = $registrarFechaIngreso->registrarFechaIngresoControlador($datoFechaIngreso);
                        //obtener idFecha
                        $reidFecha = $registrarFechaIngreso->consultarIdControlador();
                        $idFecha = $reidFecha[0]['idFechaIngreso'];
                        //registrar edad
                        $regisEdad = array('edad' => $_POST['edad'], 'idFecha' => $idFecha, 'idMascota' => $idMascota);
                        $registrarEdad = new ControladorEdad();
                        $res = $registrarEdad->registrarEdadControlador($regisEdad);
                        //Registrar Consulta
                        $regisConsulta = array('consulta' => $_POST['tipoConsultao'], 'idFecha' => $idFecha, 'idMascota' => $idMascota);
                        $resgistrarConsulta = new ControladorTipoConsulta();
                        $resConsulta = $resgistrarConsulta->registrarTipoConsulta($regisConsulta);
                        //RegistrarMedicoFecha
                        $medicoFecha = array('idMedico' => $_POST['idmedico'], 'idFecha' => $idFecha);
                        $resMedicoFec = new registrarFechaMedico();
                        $resMedi = $resMedicoFec->registrarFechaMedicoControlador($medicoFecha);
                        if ($resMedi == true) {
                            $contAnamnesis = new ControladorAnamnesis();
                            $resAnamenesis = $contAnamnesis->registrarAnemesisControlador();
                        } else {
                            print "Fallido";
                        }
                    } else {
                        $conlIdMascota = array(
                            'idCliente' => $_POST['idCliente'],
                            'nombreMascota' => $_POST['mascota']
                        );
                        //Obtener id mascota
                        $registrarMascota = new ControladorMascota();
                        $conIdMascota = $registrarMascota->consultarIdMascota($conlIdMascota);
                        $idMascota = $conIdMascota[0]['idMascota'];
                        //RegistrarFecha
                        $registrarFechaIngreso = new ControladorFechaIngreso();
                        $datoFechaIngreso = array('fecha' => $_POST['fechaIngreso'], 'idMascota' => $idMascota);
                        $resFecha = $registrarFechaIngreso->registrarFechaIngresoControlador($datoFechaIngreso);
                        //obtener idFechamaxmax
                        $reidFecha = $registrarFechaIngreso->consultarIdControlador();
                        $idFecha = $reidFecha[0]['idFechaIngreso'];
                        //registrar edad
                        $regisEdad = array('edad' => $_POST['edad'], 'idFecha' => $idFecha, 'idMascota' => $idMascota);
                        $registrarEdad = new ControladorEdad();
                        $res = $registrarEdad->registrarEdadControlador($regisEdad);
                        //Registrar Consulta
                        $regisConsulta = array('consulta' => $_POST['tipoConsultao'], 'idFecha' => $idFecha, 'idMascota' => $idMascota);
                        $resgistrarConsulta = new ControladorTipoConsulta();
                        $resConsulta = $resgistrarConsulta->registrarTipoConsulta($regisConsulta);
                        //RegistrarMedicoFecha
                        $medicoFecha = array('idMedico' => $_POST['idmedico'], 'idFecha' => $idFecha);
                        $resMedicoFec = new registrarFechaMedico();
                        $resMedi = $resMedicoFec->registrarFechaMedicoControlador($medicoFecha);
                        if ($resMedi == true) {
                            $contAnamnesis = new ControladorAnamnesis();
                            $resAnamenesis = $contAnamnesis->registrarAnemesisControlador();
                        } else {
                            print "Fallido";
                        }
                    }
                }
            }
        }
    }

    function registrarMascotaPeluqueriaFecha()
    {
        if (isset($_POST["enviarFoto"])) {
            if (
                $_POST['propetario'] == null && $_POST['ccDocumento'] == null && $_POST['telefono'] == null && $_POST['mascota'] == null &&
                $_POST['idEspecie'] == null && $_POST['idGenero'] == null && $_POST['fechaIngreso'] == null && $_POST['entero'] == null
            ) {
                $resFotoPeluqueria = new ControladorFotoPeluqueria();
                $resFotoPeluqueria->registrarFotoPeluqueriaControlador();
            } else {


                if ($_POST['idCliente'] == '') {
                    $datoCliente = array(
                        'nomPropietario' => $_POST['propetario'],
                        'cc' => $_POST['ccDocumento'],
                        'telefono' => $_POST['telefono']
                    );
                    //registrar
                    $registrarCliente = new ModeloCliente();
                    $resCliente = $registrarCliente->registrarPropietarioModelo($datoCliente);
                    //consultarIDCliente
                    $consIdCli = new ModeloCliente();
                    $resIdCliente = $consIdCli->consultarIdPropietarioModelo($datoCliente);
                    $idCliente = $resIdCliente[0]['idCliente'];
                    //registrarMascota
                    $datoMascota = array(
                        'nombreMascota' => $_POST['mascota'],
                        'idEspecie' => $_POST['idEspecie'],
                        'idGenero' => $_POST['idGenero'],
                        'entero' => $_POST['entero'],
                        'idCliente' => $idCliente
                    );
                    $registrarMascota = new ControladorMascota();
                    //registrarMascota
                    $resMascota = $registrarMascota->registrarMascotaControlador($datoMascota);
                    $conlIdMascota = array(
                        'idCliente' => $idCliente,
                        'nombreMascota' => $_POST['mascota']
                    );
                    //Obtener id mascota
                    $conIdMascota = $registrarMascota->consultarIdMascota($conlIdMascota);
                    $idMascota = $conIdMascota[0]['idMascota'];
                    //RegistrarFecha
                    $registrarFechaIngreso = new ControladorFechaIngreso();
                    $datoFechaIngreso = array('fecha' => $_POST['fechaIngreso'], 'idMascota' => $idMascota);
                    $resFecha = $registrarFechaIngreso->registrarFechaIngresoControlador($datoFechaIngreso);
                    //obtener idFecha
                    $reidFecha = $registrarFechaIngreso->consultarIdControlador();
                    $idFecha = $reidFecha[0]['idFechaIngreso'];
                    //RegistrarMedicoFecha
                    $medicoFecha = array('idMedico' => $_POST['idmedico'], 'idFecha' => $idFecha);
                    $resMedicoFec = new registrarFechaMedico();
                    $resMedi = $resMedicoFec->registrarFechaMedicoControlador($medicoFecha);
                    //registrar edad
                    $regisEdad = array('edad' => $_POST['edad'], 'idFecha' => $idFecha, 'idMascota' => $idMascota);
                    $registrarEdad = new ControladorEdad();
                    $resEdad = $registrarEdad->registrarEdadControlador($regisEdad);
                    //Registrar hora
                    $regisHora = array('hora' => $_POST['horaIngreso'], 'idFecha' => $idFecha, 'idMascota' => $idMascota);
                    $registrarHora = new ControladorHora();
                    $resHora = $registrarHora->registrarHoraControlador($regisHora);
                    if ($resHora == true) {
                        $resFotoPeluqueria = new ControladorFotoPeluqueria();
                        $resFotoPeluqueria->registrarFotoPeluqueriaControlador();
                    } else {
                        print "Fallido";
                    }
                } else {

                    if ($_POST['idMascota'] == '') {
                        $datoMascota = array(
                            'nombreMascota' => $_POST['mascota'],
                            'idEspecie' => $_POST['idEspecie'],
                            'idGenero' => $_POST['idGenero'],
                            'entero' => $_POST['entero'],
                            'idCliente' => $_POST['idCliente']
                        );
                        $registrarMascota = new ControladorMascota();
                        //registrarMascota
                        $resMascota = $registrarMascota->registrarMascotaControlador($datoMascota);
                        $conlIdMascota = array(
                            'idCliente' => $_POST['idCliente'],
                            'nombreMascota' => $_POST['mascota']
                        );
                        //Obtener id mascota
                        $conIdMascota = $registrarMascota->consultarIdMascota($conlIdMascota);
                        $idMascota = $conIdMascota[0]['idMascota'];
                        //RegistrarFecha
                        $registrarFechaIngreso = new ControladorFechaIngreso();
                        $datoFechaIngreso = array('fecha' => $_POST['fechaIngreso'], 'idMascota' => $idMascota);
                        $resFecha = $registrarFechaIngreso->registrarFechaIngresoControlador($datoFechaIngreso);
                        //obtener idFecha
                        $reidFecha = $registrarFechaIngreso->consultarIdControlador();
                        $idFecha = $reidFecha[0]['idFechaIngreso'];
                        //RegistrarMedicoFecha
                        $medicoFecha = array('idMedico' => $_POST['idmedico'], 'idFecha' => $idFecha);
                        $resMedicoFec = new registrarFechaMedico();
                        $resMedi = $resMedicoFec->registrarFechaMedicoControlador($medicoFecha);
                        //registrar edad
                        $regisEdad = array('edad' => $_POST['edad'], 'idFecha' => $idFecha, 'idMascota' => $idMascota);
                        $registrarEdad = new ControladorEdad();
                        $resEdad = $registrarEdad->registrarEdadControlador($regisEdad);
                        //Registrar hora
                        $regisHora = array('hora' => $_POST['horaIngreso'], 'idFecha' => $idFecha, 'idMascota' => $idMascota);
                        $registrarHora = new ControladorHora();
                        $resHora = $registrarHora->registrarHoraControlador($regisHora);
                        if ($resHora == true) {
                            $resFotoPeluqueria = new ControladorFotoPeluqueria();
                            $resFotoPeluqueria->registrarFotoPeluqueriaControlador();
                        } else {
                            print "Fallido";
                        }
                    } else {
                        $conlIdMascota = array(
                            'idCliente' => $_POST['idCliente'],
                            'nombreMascota' => $_POST['mascota']
                        );
                        //Obtener id mascota
                        $registrarMascota = new ControladorMascota();
                        $conIdMascota = $registrarMascota->consultarIdMascota($conlIdMascota);
                        $idMascota = $conIdMascota[0]['idMascota'];
                        //RegistrarFecha
                        $registrarFechaIngreso = new ControladorFechaIngreso();
                        $datoFechaIngreso = array('fecha' => $_POST['fechaIngreso'], 'idMascota' => $idMascota);
                        $resFecha = $registrarFechaIngreso->registrarFechaIngresoControlador($datoFechaIngreso);
                        //obtener idFecha
                        $reidFecha = $registrarFechaIngreso->consultarIdControlador();
                        $idFecha = $reidFecha[0]['idFechaIngreso'];
                        //RegistrarMedicoFecha
                        $medicoFecha = array('idMedico' => $_POST['idmedico'], 'idFecha' => $idFecha);
                        $resMedicoFec = new registrarFechaMedico();
                        $resMedi = $resMedicoFec->registrarFechaMedicoControlador($medicoFecha);
                        //registrar edad
                        $regisEdad = array('edad' => $_POST['edad'], 'idFecha' => $idFecha, 'idMascota' => $idMascota);
                        $registrarEdad = new ControladorEdad();
                        $resEdad = $registrarEdad->registrarEdadControlador($regisEdad);
                        //Registrar hora
                        $regisHora = array('hora' => $_POST['horaIngreso'], 'idFecha' => $idFecha, 'idMascota' => $idMascota);
                        $registrarHora = new ControladorHora();
                        $resHora = $registrarHora->registrarHoraControlador($regisHora);
                        if ($resHora == true) {
                            $resFotoPeluqueria = new ControladorFotoPeluqueria();
                            $resFotoPeluqueria->registrarFotoPeluqueriaControlador();
                        } else {
                            print "Fallido";
                        }
                    }
                }
            }
        }
    }
}
