<?php
include_once '../modelo/ModeloLog.php';
$extract = extract($_GET);
$estacionseleccionada = htmlspecialchars($_POST['radio']);
$obj=new ModeloLog();
$bandera=0;
$obj=new ModeloLog();
$mostrarcomponentes=$obj->mostrar_todos_los_componentes();



       foreach ($mostrarcomponentes as $icomponente){
    if($icomponente->estacion==$estacionseleccionada){
        $bandera=1;
    }
}


if($bandera==1){
    echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:red;margin-left:-30px' id='mensaje'><img src='/images/incorrecto.jpg' alt='' width='17' height='17' /><strong>Error la estacion tiene componentes vinculados</strong></p>";

}  else {
    $obj->eliminarEstacion($estacionseleccionada);


       echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:green;' id='mensaje'><img src='/images/correcto.jpg' alt='' width='17' height='17' /><strong>Se elimino correctamente</strong></p>";


}
           


?>
