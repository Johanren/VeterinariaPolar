<?php

class modeloViews{
    function enlacePagina($enlace){
        if($enlace == 'inicio' ||
            $enlace == 'frmRegistrarCitaVeterinaria'||
            $enlace == 'frmRegistrarCitaPeluqueria' ||
            $enlace == 'frmConsultaVeterinaria' ||
            $enlace == 'frmConsultaPeluqueria' ||
            $enlace == 'frmHistoricoVeterinario' ||
            $enlace == 'frmReporte' ||
            $enlace == 'frmHistoricoPeluqueria' ||
            $enlace == 'frmPDF' ||
            $enlace == 'visualizarHistoricopdf' ||
            $enlace == 'seguimientoCasapdf' ||
            $enlace == 'terminosCondicionespdf' ||
            $enlace == 'recordatorio'||
            $enlace == 'ingresar'||
            $enlace == 'salir'||
            $enlace == 'frmUsuario'||
            $enlace == 'editarMedico'||
            $enlace == 'agregarMedico'||
            $enlace == 'frmMedicamento'||
            $enlace == 'agregarMedicamento'||
            $enlace == 'editarMedicamento'||
            $enlace == 'frmInsumo'||
            $enlace == 'agregarInsumo'||
            $enlace == 'editarInsumos'||
            $enlace == 'reporteExcel'){
            $modulo = 'Views/Moduls/'.$enlace.'.php';
        }
        elseif ($enlace == 'okRegistroVeterinario') {
            $modulo = 'Views/Moduls/frmRegistrarCitaVeterinaria.php';
        }
        elseif ($enlace == 'fallidoRegistroVeterinario') {
            $modulo = 'Views/Moduls/frmRegistrarCitaVeterinaria.php';
        }
        elseif ($enlace == 'fallidoRegistroVeterinarioInsumo') {
            $modulo = 'Views/Moduls/frmRegistrarCitaVeterinaria.php';
        }
        elseif ($enlace == 'okActualizarInvestigado') {
            $modulo = 'Views/Moduls/frmHistoricoVeterinario.php';
        }
        elseif ($enlace == 'FallidoPDFActualizarInvestigado') {
            $modulo = 'Views/Moduls/frmHistoricoVeterinario.php';
        }
        elseif ($enlace == 'okRegistroPeluqueria') {
            $modulo = 'Views/Moduls/frmRegistrarCitaPeluqueria.php';
        }
        elseif ($enlace == 'falloRegistroPeluqueria') {
            $modulo = 'Views/Moduls/frmRegistrarCitaPeluqueria.php';
        }elseif ($enlace == 'loginInactivo') {
            $modulo = 'Views/Moduls/ingresar.php';
        }
        elseif ($enlace == 'loginFallido') {
            $modulo = 'Views/Moduls/ingresar.php';
        }
        elseif ($enlace == 'okActualizarMedico') {
            $modulo = 'Views/Moduls/frmUsuario.php';
        }
        elseif ($enlace == 'okRegistrarMedico') {
            $modulo = 'Views/Moduls/frmUsuario.php';
        }
        elseif ($enlace == 'falloContrasenaMedico') {
            $modulo = 'Views/Moduls/agregarMedico.php';
        }
        elseif ($enlace == 'okAgregarMedicamento') {
            $modulo = 'Views/Moduls/frmMedicamento.php';
        }
        elseif ($enlace == 'okActualizarMedicamento') {
            $modulo = 'Views/Moduls/frmMedicamento.php';
        }
        elseif ($enlace == 'falloAgregarMedicamento') {
            $modulo = 'Views/Moduls/agregarMedicamento.php';
        }
        elseif ($enlace == 'falloActualizarMedicamento') {
            $modulo = 'Views/Moduls/editarMedicamento.php';
        }
        elseif ($enlace == 'okAgregarInsumo') {
            $modulo = 'Views/Moduls/frmInsumo.php';
        }
        elseif ($enlace == 'falloAgregarInsumo') {
            $modulo = 'Views/Moduls/agregarInsumo.php';
        }
        elseif ($enlace == 'okActualizaInsumo') {
            $modulo = 'Views/Moduls/frmInsumo.php';
        }
        elseif ($enlace == 'falloActualizaInsumo') {
            $modulo = 'Views/Moduls/editarInsumos.php';
        }
        elseif ($enlace == 'fallidoActualizarInvestigado') {
            $modulo = 'Views/Moduls/frmHistoricoVeterinario.php';
        }
        elseif ($enlace == 'datosevento') {
            $modulo = 'Views/datosevento.php';
        }
        return $modulo;
        
    }
}
