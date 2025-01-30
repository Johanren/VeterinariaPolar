<?php

class ControladorMedico
{
    function controladorMedicoAjax($dato)
    {
        $consultar = new ModeloMedico();
        $respuesta = $consultar->consultarMedicoAjax($dato);
        return $respuesta;
    }

    function listarModeloControlador()
    {
        $lis = new ModeloMedico();
        $res = $lis->listarMedicoModelo();
        return $res;
    }

    function consultarMedicoControlador()
    {
        if (isset($_GET['idMedico'])) {
            $dato = $_GET['idMedico'];
            $lis = new ModeloMedico();
            $res = $lis->consultarMedicoModelo($dato);
            return $res;
        }
    }

    function ActualizarMedicoControlador()
    {
        if (isset($_POST['actualizarMedico'])) {
            $dato = array('activo' => $_POST['activo'], 'rol' => $_POST['rol'], 'idMedico' => $_POST['idMedico']);
            $actu = new ModeloMedico();
            $res = $actu->actualizarMedicoModelo($dato);
            if ($res == true) {
                echo '<script>window.location="index.php?action=okActualizarMedico&pagina=1"</script>';
            }
        }
    }

    function registrarMedicoControlador()
    {
        if (isset($_POST['agregarMedico'])) {
            if ($_POST['password'] == $_POST['password1']) {
                $password = $_POST['password'];
                $dato = array(
                    'medico' => $_POST['medico'],
                    'MP' => $_POST['MP'],
                    'activo' => $_POST['activo'],
                    'rol' => $_POST['rol'],
                    'password' => $password
                );
                $actu = new ModeloMedico();
                $res = $actu->registrarMedicoModelo($dato);
                if ($res == true) {
                    echo '<script>window.location="index.php?action=okRegistrarMedico&pagina=1"</script>';
                }
            } else {
                echo '<script>window.location="falloContrasenaMedico"</script>';
            }
        }
    }
}
