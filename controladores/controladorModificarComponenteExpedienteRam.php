<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 *
 * @author rafael
 */
include_once '../modelo/ModeloLog.php';
$numeroinventariocomponentee = htmlspecialchars($_POST["idcheckbox"]);
$tiporam = htmlspecialchars($_POST["tiporam"]);
$capacidadram = htmlspecialchars($_POST["capacidadram"]);


$objjj = new ModeloLog();

if($tiporam!='Seleccionar'&&$capacidadram!='Seleccionar'){
$objjj->insertar_ram($tiporam, $capacidadram, $numeroinventariocomponentee);
$fecha=date("d-m-Y H:i:s");
            session_start();
            $usuario = $_SESSION['usuario'];
        $mostrar=$objjj->mostrar_todos_los_componentes();
        foreach ($mostrar as $i) {
            if ($i->numeroinventario == $numeroinventariocomponentee) {
                $tipo=$i->tipo;
                $marca=$i->marca;
                $estacion=$i->estacion;
                $obj->registrar_trazas_componentes($tipo, $marca, $i->numeroinventario,'sin', $fecha, $usuario, 'Modificado', "sin cambios",$estacion,'Ejecutada correctamente');
            }
        }
echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:green;' id='mensaje'><strong>Se inserto correctamente</strong></p>";}
else {
    $fecha=date("d-m-Y H:i:s");
            session_start();
            $usuario = $_SESSION['usuario'];
        $mostrar=$objjj->mostrar_todos_los_componentes();
        foreach ($mostrar as $i) {
            if ($i->numeroinventario == $numeroinventariocomponentee) {
                $tipo=$i->tipo;
                $marca=$i->marca;
                $estacion=$i->estacion;
                $obj->registrar_trazas_componentes($tipo, $marca, $i->numeroinventario,'sin', $fecha, $usuario, 'Modificado', "sin cambios",$estacion,'Ejecutada incorrectamente');
            }
        }
    echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:red;' id='mensaje'><img src='/images/incorrecto.jpg' alt='' width='17' height='17' /><strong>Error en los datos</strong></p>";

}
?>