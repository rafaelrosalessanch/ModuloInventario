<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author rafael
 */
include_once '../entidades/Departamento.php';

$nombreDepartamento = htmlspecialchars($_POST['nombredepartamento']);
$ubicacionDepartamento = htmlspecialchars($_POST['ubicaciondepartamento']);
$area = htmlspecialchars($_POST['opcionesareadepartamento']);
return validarDepartamento($nombreDepartamento,$ubicacionDepartamento,$area);

function validarDepartamento($nombreDepartamento,$ubicacionDepartamento,$area) {

    if ($nombreDepartamento == NULL||$ubicacionDepartamento=='Seleccionar'||$area=='Seleccionar') {
          echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:red;' id='mensaje'><img src='/images/incorrecto.jpg' alt='' width='17' height='17' /><strong>Error en los datos</strong></p>";
            } else {


    $pattern = "/^[a-z]+$|áéíóú|/i";
    if (preg_match($pattern, $nombreDepartamento)){

        $obj=new Departamento();
        $mostrar=$obj->ListartarTodoslosDepartamentos();
        $bandera=0;
        foreach ($mostrar as $i) {
            if (($i->nombredepartamento == $nombreDepartamento)) {
                $bandera=1;
            }}
            if($bandera==1){
                 echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:red;' id='mensaje'><img src='/images/incorrecto.jpg' alt='' width='17' height='17' /><strong>El departamento ya existe</strong></p>";
            }  else {
                $nombreDepartament=$nombreDepartamento;
                $ubicacionDepartament=$ubicacionDepartamento;
              $obj->insertarDepartamento($nombreDepartament,$ubicacionDepartament,$area);
      echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:green;' id='mensaje'><img src='/images/correcto.jpg' alt='' width='20' height='20' /><strong>Se insert&oacute; correctamente</strong></p>";
            }

    }  else {
       echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:red;' id='mensaje'><img src='/images/incorrecto.jpg' alt='' width='17' height='17' /><strong>Error en losvvv datos</strong></p>";
    }
}}

?>