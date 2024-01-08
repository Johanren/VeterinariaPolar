<?php

class ControladorAnexoPDF
{
    function archivosAnexoControlador()
    {
        if (isset($_POST['enviarEdit'])) {
            if (isset($_FILES['pdfAnexo']['name']) && $_FILES['pdfAnexo']['name'] != "") {
                for ($i = 0; $i < count($_FILES['pdfAnexo']['name']); $i++) {
                    //Recogemos el archivo enviado por el formulario
                    $archivo = $_FILES['pdfAnexo']['name'][$i];
                    //Si el archivo contiene algo y es diferente de vacio
                    if (isset($archivo) && $archivo != "") {
                        //Obtenemos algunos datos necesarios sobre el archivo
                        $tipo = $_FILES['pdfAnexo']['type'][$i];
                        $tamano = $_FILES['pdfAnexo']['size'][$i];
                        $temp = $_FILES['pdfAnexo']['tmp_name'][$i];
                        //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                        //Si la imagen es correcta en tamaño y tipo
                        //Se intenta subir al servidor
                        if (!((strpos($tipo, "pdf")) && ($tamano <= 5000000))) {
                            echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                            - Se permiten archivos .pdf y de 500 kb como máximo.</b></div>';
                            echo '<script>window.location="index.php?action=FallidoPDFActualizarInvestigado&idFechaIngreso=' . $_GET['idFechaIngreso'] . '&idMascota=' . $_GET['idMascota'] . '"</script>';
                        } else {
                            if (move_uploaded_file($temp, 'Views/pdf/' . $archivo)) {
                                //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                                chmod('Views/pdf/' . $archivo, 0777);
                                //Mostramos el mensaje de que se ha subido co éxito
                                echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                                $pdf = 'Views/pdf/' . $archivo . '';
                                $descripcion = $_POST['descripcionPdf'][$i];
                                $registrarPDF = new ModeloAnexoPDF();
                                $res = $registrarPDF->registrarAnexoPDF($descripcion, $pdf, $_GET['idMascota'], $_GET['idFechaIngreso']);
                                if ($res == true) {
                                    echo '<script>window.location="index.php?action=okActualizarInvestigado&idFechaIngreso=' . $_GET['idFechaIngreso'] . '&idMascota=' . $_GET['idMascota'] . '"</script>';
                                } else {
                                    print 'fallo';
                                }
                            } else {
                                //Si no se ha podido subir la imagen, mostramos un mensaje de error
                                echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                            }
                        }
                    } else {
                        echo '<script>window.location="index.php?action=okActualizarInvestigado&idFechaIngreso=' . $_GET['idFechaIngreso'] . '&idMascota=' . $_GET['idMascota'] . '"</script>';
                    }
                }
            }
        }
    }

    function listarPDFControlador()
    {
        if (isset($_GET['idFechaIngreso'])) {
            $id = $_GET['idFechaIngreso'];
            $consult =  new ModeloAnexoPDF();
            $res = $consult->listarPDFModelo($id);
            return $res;
        }
    }
}
