<?php
session_start();
include_once '../modelo/ModeloLog.php';
$departamento = htmlspecialchars($_POST['orderBox']);
if ($departamento == null) {
   echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:red;' id='mensaje'><img src='/images/incorrecto.jpg' alt='' width='17' height='17' /><strong>Seleccione un departamento</strong></p>";

} else {
    $nombrenuevodepa = htmlspecialchars($_POST['nombredepartamento']);
    $ubicacionnuevadepa = htmlspecialchars($_POST['ubicaciondepartamento']);
    $areanuevadepa = htmlspecialchars($_POST['opcionesareadepartamento']);
    $banderadepa = 0;
    $obj = new ModeloLog();
    $mostrar = $obj->mostrar_departamentos();

    foreach ($mostrar as $i) {
        $ndepa = $i->nombredepartamento;
        $dep = $i->nombredepartamento;

        if ($dep == $departamento && $nombrenuevodepa == '') {
            $nombrenuevodepa = $ndepa;
        }

        if ($dep == $departamento && $ubicacionnuevadepa == 'Seleccionar') {
           
            $ubicacionnuevadepa = $i->ubicaciondepartamento;
        }

        if ($dep == $departamento && $areanuevadepa == 'Seleccionar') {
            $areanuevadepa = $i->area;
            
        }
    }

    $mostrarestaciones = $obj->mostrar_estaciones();
    foreach ($mostrarestaciones as $iestacion) {
        if ($mostrarestaciones != NULL) {

            $depa =$iestacion->departamento;

            if ($depa == $departamento) {
                $primero = utf8_decode($iestacion->nombreubicacionnickdepartamento);
                $segundo1 = explode("Departamento:", $primero);
                $tercero = explode("Ubicacion:", $segundo1[0]);
                $aca = $tercero[0] . 'Ubicacion:' . utf8_decode($ubicacionnuevadepa) . ' ' . 'Departamento:' . utf8_decode($nombrenuevodepa);
                $esto = $iestacion->nombreubicacionnickdepartamento;
                $ac = $aca;

                $obj->modificarEstacionotro($esto, $ac);
            }
        }
    }

$_SESSION['departamentoselcetcionado']=$nombrenuevodepa;
    $obj->modificarDepartamento($departamento, $nombrenuevodepa, $ubicacionnuevadepa, $areanuevadepa);
   echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:green;' id='mensaje'><img src='/images/correcto.jpg' alt='' width='20' height='20' /><strong>Se modifico correctamente</strong></p>";
            
}
?>
