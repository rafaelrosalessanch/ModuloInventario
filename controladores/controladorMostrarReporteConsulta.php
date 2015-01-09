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
$tipo=htmlspecialchars($_POST["tipocomponenteregistrar"]);
$marca=htmlspecialchars($_POST["marcacomponentemodificar"]);
$estado=htmlspecialchars($_POST["estadocomponenteregistrar"]);
$departamento=htmlspecialchars($_POST["departamentoconsultar"]);
if($tipo=='Seleccionar'){
    $_SESSION['tipoconsultaconsulta']=NULL;
}  else {
    $_SESSION['tipoconsultaconsulta']=$tipo;
}
if($marca=='Seleccionar'){
    $_SESSION['marcaconsultaconsulta']=NULL;
}  else {
   $_SESSION['marcaconsultaconsulta']=$marca;
}
if($estado=='Seleccionar'){
    $_SESSION['estadoconsultaconsulta']=NULL;
}  else {
   $_SESSION['estadoconsultaconsulta']=$estado;
}
if($departamento=='Seleccionar'){
   $_SESSION['departamentoconsultaconsulta']=NULL;
}  else {
   $_SESSION['departamentoconsultaconsulta']=$departamento;
}

    echo "<script language='javascript' type='text/javascript'>


                 window.open('http://localhost/reportes/ReportesConsulta.php');
history.go(0);

</script>;
";



?>





