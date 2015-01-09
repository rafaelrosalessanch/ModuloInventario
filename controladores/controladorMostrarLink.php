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
include '../modelo/ModeloLog.php';
$objregistrarasignar = new ModeloLog();
$extract = extract($_GET);
$departamentoseleccionado = htmlspecialchars($_POST["opcionesverdepartamentos"]);

$departamentopertenece=$_SESSION['departamento'];
 $jefes=$_SESSION['jefe'];
if (($departamentopertenece==$departamentoseleccionado)||($departamentopertenece=='Informática')||($jefes!='no')) {
    $_SESSION['depaselec']=$departamentoseleccionado;
   echo "<div style='margin-top:10px;margin-left: 20px'>
                      <div>
<a id='vercomponentes' href='areasMedicasMostrarComponentes.php' style='margin-top: 10px;height: 50px;margin-left:75px;font-size:12px'><strong>Ver componentes</strong></a>
</div>
<div style='margin-top: 10px'>
<a id='verestaciones' href='areasMedicasMostrarEstaciones.php' style='margin-top: 10px;height: 50px;margin-left:75px;font-size:12px'><strong>Ver ficha tecnica</strong></a>
</div>

                    </div>";
}  else {

    echo '<script language="javascript" type="text/javascript">
       
            alert("Usted no pertenece a este departamento")
history.go(0);
</script>';

}
?>





