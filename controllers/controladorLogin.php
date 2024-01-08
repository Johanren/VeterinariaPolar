<?php

class ControladorLogin
{
    function ingresarMedicoLoginControlador()
    {
        if (isset($_POST['ingresar'])) {
            $datos = array('mp' => $_POST['mp'], 'clave' => $_POST['password']);

            $consultarUsuario = new ModeloLogin();
            $res = $consultarUsuario->ModeloLoginIngresar($datos);
            if ($res[0]['activo'] != 'Inactivo') {
                if ($res[0]['MP'] == $_POST['mp'] && $res[0]['password'] == $_POST['password']) {
                    session_start();
                    $_SESSION['idMedico'] = $res[0]['idMedico'];
                    $_SESSION['medico'] = $res[0]['medico'];
                    $_SESSION['mp'] = $res[0]['MP'];
                    $_SESSION['roles'] = $res[0]['roles'];
                    $_SESSION['validar'] = true;
                    header('location:inicio');
                }else{
                    header('location:loginFallido');
                }
            }else{
                header('location:loginInactivo');
            }
        }
    }
}
