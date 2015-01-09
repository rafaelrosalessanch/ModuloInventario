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
//$_SESSION['estadoimprimirr']='Seleccionar';
//$_SESSION['tipoimprimirr']='Seleccionar';
$departamentoseleccionado = htmlspecialchars($_POST["opcionesverdepartamentos"]);
$departamentopertenece = $_SESSION['departamento'];
$_SESSION['estacion']=NULL;
//   echo "<strong style='font-size: 12px'>listado de componentes departamento: </strong>
echo"                         <table  border='0' style='width: 900px;height: 10px;marginTop:-20px' >";


include_once '../modelo/ModeloLog.php';
$extract = extract($_GET);
$obj = new ModeloLog();
$mostrar = $obj->mostrar_todos_los_componentes();
$bandera = 0;
 $jefes=$_SESSION['jefe'];
//if ($departamentopertenece == 'Informatica') {
//    $bandera = 1;
//}
foreach ($mostrar as $i) {
    $departamento = explode("Departamento:",$i->estacion);
    if($departamentoseleccionado!='Todos'){
    if (array_key_exists(1, $departamento)) {
        if (($departamentoseleccionado == $departamento[1]) && (($departamentopertenece == 'Informática')||($jefes!='no')||($departamentopertenece== $departamento[1]))) {
            $_SESSION['depaselecc']=$departamentoseleccionado;
             $_SESSION['depaseleccc']=$departamentoseleccionado;
            $bandera = 1;
           $tipo=utf8_decode($i->tipo);
           $marca=utf8_decode($i->marca);
           $modelo=utf8_decode($i->modelo);
           $estado=utf8_decode($i->estado);
            echo "<tr style='marginTop:-10px'><td style='width: 138px;'><div style='width=10px'>$tipo</div></td><td style='width: 235px'>$marca</td><td style='width: 278px'><p style='width:10px'>$modelo</p></td><td style='width: 320px;'><p style='width:10px'>$i->numserie</p></td><td style='width: 300px;'><p style='width:10px'>$i->numeroinventario</p></td><td style='width: 238px;'>$estado</td></tr>";
       
           
        }

//        if (($departamentoseleccionado == $departamento[1]) && $departamentopertenece == $departamento[1] && $bandera == 0) {
//$bandera=1;
//$_SESSION['depaselec']=$departamentoseleccionado;
//             echo "<tr style='marginTop:-10px'><td style='width: 138px;'><div style='width=10px'>$i->tipo</div></td><td style='width: 238px'>$i->marca</td><td style='width: 280px'><p style='width:10px'>$i->modelo</p></td><td style='width: 320px;'><p style='width:10px'>$i->numserie</p></td><td style='width: 300px;'><p style='width:10px'>$i->numeroinventario</p></td><td style='width: 238px;'>$i->estado</td></tr>";
//        }
    }
}else {
   $_SESSION['depaselecc']=$departamentoseleccionado;
             $_SESSION['depaseleccc']=$departamentoseleccionado;
            $bandera = 1;
           $tipo=utf8_decode($i->tipo);
           $marca=utf8_decode($i->marca);
           $modelo=utf8_decode($i->modelo);
           $estado=utf8_decode($i->estado);
            echo "<tr style='marginTop:-10px'><td style='width: 138px;'><div style='width=10px'>$tipo</div></td><td style='width: 235px'>$marca</td><td style='width: 278px'><p style='width:10px'>$modelo</p></td><td style='width: 320px;'><p style='width:10px'>$i->numserie</p></td><td style='width: 300px;'><p style='width:10px'>$i->numeroinventario</p></td><td style='width: 238px;'>$estado</td></tr>";

}
}

echo"</table>";


if($bandera==0&&$departamentopertenece != 'Informática'){
echo '<script language="javascript" type="text/javascript">

            alert("Usted no pertenece a este departamento")
history.go(0);
</script>';}
if($bandera==0&&$departamentopertenece == 'Informática'){
echo '<script language="javascript" type="text/javascript">

            alert("No se encontro resultado para este departamento")
history.go(0);
</script>';}
 echo '<script language="javascript" type="text/javascript">


history.go(0);
</script>';
?>





