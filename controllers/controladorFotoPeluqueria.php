<?php

class ControladorFotoPeluqueria
{
    function registrarFotoPeluqueriaControlador()
    {
        if (isset($_POST['enviarFoto'])) {
            if (
                $_POST['propetario'] == null && $_POST['ccDocumento'] == null && $_POST['telefono'] == null && $_POST['mascota'] == null &&
                $_POST['idEspecie'] == null && $_POST['idGenero'] == null && $_POST['fechaIngreso'] == null && $_POST['entero'] == null
            ) {
                echo '<script>window.location="index.php?action=falloRegistroPeluqueria"</script>';
            } else {
                if ($_POST['idCliente'] == '') {
                    $conlIdMascota = array(
                        'ccDocumento' => $_POST['ccDocumento'],
                        'nombreMascota' => $_POST['mascota']
                    );
                    //Obtener id mascota
                    $consuMascota = new ControladorMascota();
                    $conIdMascota = $consuMascota->consultarIdClienteMascota($conlIdMascota);
                    $idMascota = $conIdMascota[0]['idMascota'];
                    //Obternr id fecha
                    $ConFechaIngreso = new ControladorFechaIngreso();
                    $datoFechaIngreso = array('fecha' => $_POST['fechaIngreso'], 'idMascota' => $idMascota);
                    $reidFecha = $ConFechaIngreso->consultarIdControlador();
                    $idFecha = $reidFecha[0]['idFechaIngreso'];

                    //Recogemos el archivo enviado por el formulario
                    $archivo = $_FILES['subirAntes']['name'];
                    $archivo1 = $_FILES['subirDespues']['name'];
                    //Si el archivo contiene algo y es diferente de vacio
                    if (isset($archivo) && $archivo != "") {
                        //Obtenemos algunos datos necesarios sobre el archivo
                        $tipo = $_FILES['subirAntes']['type'];
                        $tamano = $_FILES['subirAntes']['size'];
                        $temp = $_FILES['subirAntes']['tmp_name'];
                        //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                        if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                            echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                            - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                        } else {
                            //Si la imagen es correcta en tamaño y tipo
                            //Se intenta subir al servidor
                            if (move_uploaded_file($temp, 'Views/img/fotoPeluqueria/' . $archivo)) {
                                //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                                chmod('Views/img/fotoPeluqueria/' . $archivo, 0777);
                                //Mostramos el mensaje de que se ha subido co éxito
                                echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                                //Mostramos la imagen subida
                                //echo '<p><img src="Views/img/fotoPeluqueria/' . $archivo . '"></p>';
                            } else {
                                //Si no se ha podido subir la imagen, mostramos un mensaje de error
                                echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                            }
                        }
                    }

                    if (isset($archivo1) && $archivo1 != "") {
                        //Obtenemos algunos datos necesarios sobre el archivo
                        $tipo = $_FILES['subirDespues']['type'];
                        $tamano = $_FILES['subirDespues']['size'];
                        $temp = $_FILES['subirDespues']['tmp_name'];
                        //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                        if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                            echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                            - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                        } else {
                            //Si la imagen es correcta en tamaño y tipo
                            //Se intenta subir al servidor
                            if (move_uploaded_file($temp, 'Views/img/fotoPeluqueria/' . $archivo1)) {
                                //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                                chmod('Views/img/fotoPeluqueria/' . $archivo1, 0777);
                                //Mostramos el mensaje de que se ha subido co éxito
                                echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                                //Mostramos la imagen subida
                                //echo '<p><img src="Views/img/fotoPeluqueria/' . $archivo1 . '"></p>';
                            } else {
                                //Si no se ha podido subir la imagen, mostramos un mensaje de error
                                echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                            }
                        }
                    }
                    $imgAntes = 'Views/img/fotoPeluqueria/' . $archivo . '';
                    $imgDespues = 'Views/img/fotoPeluqueria/' . $archivo1 . '';
                    $guardarImagen = array('antes' => $imgAntes, 'despues' => $imgDespues, 'observaciones' => $_POST['Observacion'], 'idFecha' => $idFecha, 'idMascota' => $idMascota);
                    $registrarFoto = new ModeloFotoPeluqueria();
                    $res = $registrarFoto->registrarFotoPeluqueriaModelo($guardarImagen);
                    if ($res == true) {
                        echo '<script>window.location="index.php?action=okRegistroPeluqueria"</script>';
                    } else {
                        echo '<script>alert.("Fallo")</script>';
                    }
                } else {
                    if ($_POST['idMascota'] == '') {
                        $conlIdMascota = array(
                            'idCliente' => $_POST['idCliente'],
                            'nombreMascota' => $_POST['mascota']
                        );
                        //Obtener id mascota
                        $consuMascota = new ControladorMascota();
                        $conIdMascota = $consuMascota->consultarIdMascota($conlIdMascota);
                        $idMascota = $conIdMascota[0]['idMascota'];
                        //Obternr id fecha
                        $ConFechaIngreso = new ControladorFechaIngreso();
                        $datoFechaIngreso = array('fecha' => $_POST['fechaIngreso'], 'idMascota' => $idMascota);
                        $reidFecha = $ConFechaIngreso->consultarIdControlador();
                        $idFecha = $reidFecha[0]['idFechaIngreso'];
                        //Recogemos el archivo enviado por el formulario
                        $archivo = $_FILES['subirAntes']['name'];
                        $archivo1 = $_FILES['subirDespues']['name'];
                        //Si el archivo contiene algo y es diferente de vacio
                        if (isset($archivo) && $archivo != "") {
                            //Obtenemos algunos datos necesarios sobre el archivo
                            $tipo = $_FILES['subirAntes']['type'];
                            $tamano = $_FILES['subirAntes']['size'];
                            $temp = $_FILES['subirAntes']['tmp_name'];
                            //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                            if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                                echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                            - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                            } else {
                                //Si la imagen es correcta en tamaño y tipo
                                //Se intenta subir al servidor
                                if (move_uploaded_file($temp, 'Views/img/fotoPeluqueria/' . $archivo)) {
                                    //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                                    chmod('Views/img/fotoPeluqueria/' . $archivo, 0777);
                                    //Mostramos el mensaje de que se ha subido co éxito
                                    echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                                    //Mostramos la imagen subida
                                    //echo '<p><img src="Views/img/fotoPeluqueria/' . $archivo . '"></p>';
                                } else {
                                    //Si no se ha podido subir la imagen, mostramos un mensaje de error
                                    echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                                }
                            }
                        }

                        if (isset($archivo1) && $archivo1 != "") {
                            //Obtenemos algunos datos necesarios sobre el archivo
                            $tipo = $_FILES['subirDespues']['type'];
                            $tamano = $_FILES['subirDespues']['size'];
                            $temp = $_FILES['subirDespues']['tmp_name'];
                            //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                            if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                                echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                            - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                            } else {
                                //Si la imagen es correcta en tamaño y tipo
                                //Se intenta subir al servidor
                                if (move_uploaded_file($temp, 'Views/img/fotoPeluqueria/' . $archivo1)) {
                                    //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                                    chmod('Views/img/fotoPeluqueria/' . $archivo1, 0777);
                                    //Mostramos el mensaje de que se ha subido co éxito
                                    echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                                    //Mostramos la imagen subida
                                    //echo '<p><img src="Views/img/fotoPeluqueria/' . $archivo1 . '"></p>';
                                } else {
                                    //Si no se ha podido subir la imagen, mostramos un mensaje de error
                                    echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                                }
                            }
                        }
                        $imgAntes = 'Views/img/fotoPeluqueria/' . $archivo . '';
                        $imgDespues = 'Views/img/fotoPeluqueria/' . $archivo1 . '';
                        $guardarImagen = array('antes' => $imgAntes, 'despues' => $imgDespues, 'observaciones' => $_POST['Observacion'], 'idFecha' => $idFecha, 'idMascota' => $idMascota);
                        $registrarFoto = new ModeloFotoPeluqueria();
                        $res = $registrarFoto->registrarFotoPeluqueriaModelo($guardarImagen);
                        if ($res == true) {
                            echo '<script>window.location="index.php?action=okRegistroPeluqueria"</script>';
                        } else {
                            echo '<script>alert.("Fallo")</script>';
                        }
                    } else {
                        //Obternr id fecha
                        $ConFechaIngreso = new ControladorFechaIngreso();
                        $datoFechaIngreso = array('fecha' => $_POST['fechaIngreso'], 'idMascota' => $_POST['idMascota']);
                        $reidFecha = $ConFechaIngreso->consultarIdControlador();
                        $idFecha = $reidFecha[0]['idFechaIngreso'];
                        //Recogemos el archivo enviado por el formulario
                        $archivo = $_FILES['subirAntes']['name'];
                        $archivo1 = $_FILES['subirDespues']['name'];
                        //Si el archivo contiene algo y es diferente de vacio
                        if (isset($archivo) && $archivo != "") {
                            //Obtenemos algunos datos necesarios sobre el archivo
                            $tipo = $_FILES['subirAntes']['type'];
                            $tamano = $_FILES['subirAntes']['size'];
                            $temp = $_FILES['subirAntes']['tmp_name'];
                            //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                            if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                                echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                            - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                            } else {
                                //Si la imagen es correcta en tamaño y tipo
                                //Se intenta subir al servidor
                                if (move_uploaded_file($temp, 'Views/img/fotoPeluqueria/' . $archivo)) {
                                    //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                                    chmod('Views/img/fotoPeluqueria/' . $archivo, 0777);
                                    //Mostramos el mensaje de que se ha subido co éxito
                                    echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                                    //Mostramos la imagen subida
                                    //echo '<p><img src="Views/img/fotoPeluqueria/' . $archivo . '"></p>';
                                } else {
                                    //Si no se ha podido subir la imagen, mostramos un mensaje de error
                                    echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                                }
                            }
                        }

                        if (isset($archivo1) && $archivo1 != "") {
                            //Obtenemos algunos datos necesarios sobre el archivo
                            $tipo = $_FILES['subirDespues']['type'];
                            $tamano = $_FILES['subirDespues']['size'];
                            $temp = $_FILES['subirDespues']['tmp_name'];
                            //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                            if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                                echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                            - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                            } else {
                                //Si la imagen es correcta en tamaño y tipo
                                //Se intenta subir al servidor
                                if (move_uploaded_file($temp, 'Views/img/fotoPeluqueria/' . $archivo1)) {
                                    //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                                    chmod('Views/img/fotoPeluqueria/' . $archivo1, 0777);
                                    //Mostramos el mensaje de que se ha subido co éxito
                                    echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                                    //Mostramos la imagen subida
                                    //echo '<p><img src="Views/img/fotoPeluqueria/' . $archivo1 . '"></p>';
                                } else {
                                    //Si no se ha podido subir la imagen, mostramos un mensaje de error
                                    echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                                }
                            }
                        }
                        $imgAntes = 'Views/img/fotoPeluqueria/' . $archivo . '';
                        $imgDespues = 'Views/img/fotoPeluqueria/' . $archivo1 . '';
                        $guardarImagen = array('antes' => $imgAntes, 'despues' => $imgDespues, 'observaciones' => $_POST['Observacion'], 'idFecha' => $idFecha, 'idMascota' => $_POST['idMascota']);
                        $registrarFoto = new ModeloFotoPeluqueria();
                        $res = $registrarFoto->registrarFotoPeluqueriaModelo($guardarImagen);
                        if ($res == true) {
                            echo '<script>window.location="index.php?action=okRegistroPeluqueria"</script>';
                        } else {
                            echo '<script>alert.("Fallo")</script>';
                        }
                    }
                }
            }
        }
    }

    

}
