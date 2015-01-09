<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author rafael
 */
session_start();
$estacion = htmlspecialchars($_POST["orderBox"]);
if ($estacion == NULL) {
    $estacion = $_SESSION['estacion'];
} else {
    $departamento = explode("Departamento:", $estacion);
    $_SESSION['depaselecc'] = $departamento[1];
    $_SESSION['depaseleccc'] = $departamento[1];
    $_SESSION['estacion'] = $estacion;
}
include '../modelo/ModeloLog.php';
$obj=new ModeloLog();
$mostrar = $obj->mostrar_todos_los_componentes();
$cont=0;
foreach ($mostrar as $i) {
    if($i->estacion==$estacion){
        if($i->tipo=="Computadora"){
            $cont++;
        }
    }
}
if (($estacion != NULL)&&($cont!=0)) {
//
//    echo '<script language="javascript" type="text/javascript">
//
//
//history.go(0);
//</script>';
    echo "<script language='javascript' type='text/javascript'>


                 window.open('http://activosmatica.cce.sld.cu/reportes/Reportes.php');


</script>;
";
} else {
    echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:red;' id='mensaje'><img src='/images/incorrecto.jpg' alt='' width='17' height='17' /><strong>no existe expediente para esta estacion</strong></p>";

}
?>





