<?php
class ControladorMedicamento
{
    function lsitarMedicamentoControlador()
    {
        $lis = new ModeloMedicamento();
        
            $res = $lis->listarMedicamentoModelo();
            return $res;
        
    }

    function agregarMedicamentoControlador($cantidad)
    {
        if (isset($_POST['agregarMedicamento'])) {
            $dato = array(
                'medicamento' => $_POST['medicamento'],
                'cantidad' => $cantidad,
                'tipo' => $_POST['tipo']
            );
            $agregar = new ModeloMedicamento();
            $res = $agregar->registrarMedicamentoModelo($dato);
            if ($res == true) {
                echo '<script>window.location="index.php?action=okAgregarMedicamento&pagina=1"</script>';
            } else {
                echo '<script>window.location="index.php?action=falloAgregarMedicamento&pagina=1"</script>';
            }
        }
    }

    function consultarMedicamentoControlador()
    {
        if (isset($_GET['idMedicamento'])) {
            $dato = $_GET['idMedicamento'];
            $lis = new ModeloMedicamento();
            $res = $lis->consultarMedicamentoModelo($dato);
            return $res;
        }
    }

    function actualizarMedicamentoControlador($cantidad)
    {
        $dato = array(
            'id' => $_POST['idMedicamento'],
            'medicamento' => $_POST['medicamento'],
            'cantidad' => $cantidad,
            'tipo' => $_POST['tipo']
        );
        $lis = new ModeloMedicamento();
        $res = $lis->actualizarMedicamentoModelo($dato);
        if ($res == true) {
            echo '<script>window.location="index.php?action=okActualizarMedicamento&pagina=1"</script>';
        } else {
            echo '<script>window.location="index.php?action=falloActualizarMedicamento&idMedicamento='.$_POST['idMedicamento'].'"</script>';
        }
    }

    function controladorMedicamentoAjax($dato)
    {
        $consultar = new ModeloMedicamento();
        $respuesta = $consultar->consultarMedicamentoAjax($dato);
        return $respuesta;
    }

    function obtenerTotalMedicamento($dato){
        $consultar = new ModeloMedicamento();
        $respuesta = $consultar->obtenerTotalMedicamentoModelo($dato);
        return $respuesta;
    }

    function actualizarMedicamentoTotal($total, $insumo){
        $consultar = new ModeloMedicamento();
        $respuesta = $consultar->actualizarMedicamentoTotalModelo($total, $insumo);
    }

    function listarMedicamentoReporteControlador($insumo){
        $consultar = new ModeloMedicamento();
        $respuesta = $consultar->listarMedicamentoReporteModelo($insumo);
        return $respuesta;
    }

    
}
