<?php  

//controllers
require_once 'controllers/controladorViews.php';
require_once 'controllers/controladorCliente.php';
require_once 'controllers/controladorMascota.php';
require_once 'controllers/controladorEspecie.php';
require_once 'controllers/controladorGenero.php';
require_once 'controllers/controladorTipoConsulta.php';
require_once 'controllers/controladorEdad.php';
require_once 'controllers/controladorFechaIngreso.php';
require_once 'controllers/controladorAnamnesis.php';
require_once 'controllers/controladorExamenFisico.php';
require_once 'controllers/controladorSistemasAfectados.php';
require_once 'controllers/controladorListaProblema.php';
require_once 'controllers/controladorListaDepurada.php';
require_once 'controllers/controladordamnvitp.php';
require_once 'controllers/controladorPlanHospitalario.php';
require_once 'controllers/controladorPlanCasa.php';
require_once 'controllers/controladorRecomendaciones.php';
require_once 'controllers/controladorProximoControl.php';
require_once 'controllers/controladorNotasProgreso.php';
require_once 'controllers/controladorHora.php';
require_once 'controllers/controladorFotoPeluqueria.php';
require_once 'controllers/controladorMedico.php';
require_once 'controllers/controladorFechaMedico.php';
require_once 'controllers/controladorAnexoPDF.php';
require_once 'controllers/controladorLogin.php';
require_once 'controllers/controladorRol.php';
require_once 'controllers/controladorMedicamento.php';
require_once 'controllers/controladorInsumo.php';
require_once 'controllers/controladorHospitalarioInsumo.php';
require_once 'controllers/controladorInformacionOperaciones.php';
require_once 'controllers/controladorEvento.php';
//Modelo
require_once 'Models/conexion.php';
require_once 'Models/modeloViews.php';
require_once 'Models/modeloCliente.php';
require_once 'Models/modeloMascota.php';
require_once 'Models/modeloEspecie.php';
require_once 'Models/modeloGenero.php';
require_once 'Models/modeloTipoConsulta.php';
require_once 'Models/modeloEdad.php';
require_once 'Models/modeloFechaIngreso.php';
require_once 'Models/modeloAnamnesis.php';
require_once 'Models/modeloExamenFisico.php';
require_once 'Models/modeloSistemaAfectado.php';
require_once 'Models/modeloListaProblema.php';
require_once 'Models/modeloListaDepurada.php';
require_once 'Models/modeloamnvitp.php';
require_once 'Models/modeloPlanHospital.php';
require_once 'Models/modeloPLanCasa.php';
require_once 'Models/modeloRecomendaciones.php';
require_once 'Models/modeloProximoControl.php';
require_once 'Models/modeloNotasProgreso.php';
require_once 'Models/modeloHora.php';
require_once 'Models/modeloFotoPeluqueria.php';
require_once 'Models/modeloMedico.php';
require_once 'Models/modeloFechaMedico.php';
require_once 'Models/modeloAnexoPDF.php';
require_once 'Models/modeloLogin.php';
require_once 'Models/modeloRol.php';
require_once 'Models/modeloMedicamento.php';
require_once 'Models/modeloInsumo.php';
require_once 'Models/modeloHospitalarioInsumo.php';
require_once 'Models/modeloInformacionOperaciones.php';
require_once 'Models/modeloEvento.php';
//fpdf


$views = new controladorViews();
$views->cargarTemplate();

?>