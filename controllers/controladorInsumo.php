<?php

class ControladorInsumo
{
    function listarInsumoControlador()
    {
        $lis = new ModeloInsumo();
        $res = $lis->listarInsumoModelo();
        return $res;
    }


    function registrarInsumoControlador()
    {
        if (isset($_POST['agregarInsumo'])) {
            $dato = array(
                'insumo' => $_POST['insumo'],
                'cantiada' => $_POST['cantidad']
            );
            $resgistrar = new ModeloInsumo();
            $res = $resgistrar->registraInsumoModelo($dato);
            if ($res == true) {
                echo '<script>window.location="index.php?action=okAgregarInsumo&pagina=1"</script>';
            } else {
                echo '<script>window.location="index.php?action=falloAgregarInsumo&pagina=1"</script>';
            }
        }
    }

    function consultarInsumoControaldor()
    {
        if (isset($_GET['idInsumos'])) {
            $dato = $_GET['idInsumos'];
            $lis = new ModeloInsumo();
            $res = $lis->consultarInsumoModelo($dato);
            return $res;
        }
    }

    function actualizarInsumoControlador()
    {
        if (isset($_POST['actualizarInsumo'])) {
            $dato = array(
                'id' => $_POST['idInsumo'],
                'insumo' => $_POST['insumo'],
                'cantiada' => $_POST['cantidad']
            );

            $actualizar = new ModeloInsumo();
            $res = $actualizar->actualziarInsumoModelo($dato);
            if ($res == true) {
                echo '<script>window.location="index.php?action=okActualizaInsumo&pagina=1"</script>';
            } else {
                echo '<script>window.location="index.php?action=falloActualizaInsumo&idInsumos=' . $_POST['idInsumo'] . '"</script>';
            }
        }
    }

    function controladorInsumoAjax($dato)
    {
        $consultar = new ModeloInsumo();
        $respuesta = $consultar->consultaInsumoAjax($dato);
        return $respuesta;
    }

    function obtenerTotalInsumo($dato)
    {
        $consultar = new ModeloInsumo();
        $respuesta = $consultar->obtenerTotalInsumoModelo($dato);
        return $respuesta;
    }

    function actualizarInsumoTotal($total, $insumo)
    {
        $consultar = new ModeloInsumo();
        $respuesta = $consultar->actualizarInsumoTotalModelo($total, $insumo);
    }

    function listarInsumosReporteControaldor($insumo)
    {
        $list =  new ModeloInsumo();
        $res = $list->listarInsumoReporteModelo($insumo);
        return $res;
    }

    function contarInsumosReporteControlador()
    {
        $list =  new ModeloInsumo();
        $res = $list->contarInsumosReportModelo();
        return $res;
    }
}
