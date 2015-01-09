<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author rafael
 */

include_once '../entidades/EstacionDeTrabajo.php';
$nombreEstacion = htmlspecialchars($_POST['nombremodificar']);
$nickEstacion = htmlspecialchars($_POST['trabajadormodificar']);
$ubicacionEstacion = htmlspecialchars($_POST['ubicacionmodificar']);
$departamento = htmlspecialchars($_POST['departamentomodificar']);
return validarEstacion($nombreEstacion, $nickEstacion, $ubicacionEstacion, $departamento);

function validarEstacion($nombreEstacion, $nickEstacion, $ubicacionEstacion, $departamento) {
    if ($nombreEstacion == NULL || $nickEstacion == NULL || $ubicacionEstacion == NULL ||$ubicacionEstacion == 'Seleccionar'|| $departamento == 'Seleccionar') {
        echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:red;' id='mensaje'><img src='/images/incorrecto.jpg' alt='' width='17' height='17' /><strong>Error en los datos</strong></p>";
            }else {

$pattern = "/^[a-z]+$|áéíóú|/i";
    if (preg_match($pattern,$nickEstacion)){

    $obj = new EstacionDeTrabajo();
        $mostraresta=$obj->mostrar_estaciones();
        $bandera=0;
     foreach ($mostraresta as $i) {
         $nombre=$nombreEstacion;
        $ubicacion=$ubicacionEstacion;
        $nick=$nickEstacion;
        $departamento=$departamento;
        $nombreubicacionnickdepartamento="Trabajador:$nick Estacion:$nombre Ubicacion:$ubicacion Departamento:$departamento";
            if ($i->nombreubicacionnickdepartamento == $nombreubicacionnickdepartamento) {
                $bandera=1;
            }}
            if($bandera==1){
                echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:red;' id='mensaje'><img src='/images/incorrecto.jpg' alt='' width='17' height='17' /><strong>La estacion ya existe</strong></p>";
            }
    else {
        
        if($obj->insertar_estacion_de_trabajo($nombreEstacion, $ubicacionEstacion, $nickEstacion, $departamento)==TRUE){
      echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:green;' id='mensaje'><img src='/images/correcto.jpg' alt='' width='20' height='20' /><strong>Se insert&oacute; correctamente</strong></p>";
            
    }  
    }}
 else {
       echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:red;' id='mensaje'><img src='/images/incorrecto.jpg' alt='' width='17' height='17' /><strong>Error en los datos</strong></p>";

        }
    }}

?>
