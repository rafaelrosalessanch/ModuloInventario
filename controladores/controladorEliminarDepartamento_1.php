<?php
session_start();
include_once '../modelo/ModeloLog.php';
include_once '../modelo/ModeloLog.php';
$departamento = htmlspecialchars($_POST['orderBox']);
//if($departamento==$_SESSION['departamentoselcetcionado']){
//   echo "<script language='javascript' type='text/javascript'> document.getElementById('fil').style.visibility='hidden'</script>";
//}
$bandera=0;
$obj=new ModeloLog();
$mostrarcomponentes=$obj->mostrar_todos_los_componentes();
$mostrarestaciones=$obj->mostrar_estaciones();
foreach ($mostrarestaciones as $i){
    if($i->departamento==$departamento){
       foreach ($mostrarcomponentes as $icomponente){
    if($icomponente->estacion==$i->nombreubicacionnickdepartamento){
        $bandera=1;
    }
}

    }
}
if ($departamento==NULL) {
    $bandera2=1;
}  else {
    $bandera2=0;
}
if($bandera==1){
    echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:red;margin-left:-30px' id='mensaje'><img src='/images/incorrecto.jpg' alt='' width='17' height='17' /><strong>Error el departamento tiene componentes vinculados</strong></p>";

} else {
    if ($bandera2!=1){
    $obj->eliminarDepartamento($departamento);

    echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:green;' id='mensaje'><img src='/images/correcto.jpg' alt='' width='17' height='17' /><strong>Se elimino correctamente</strong></p>";
} else {
   echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:red;' id='mensaje'><img src='/images/incorrecto.jpg' alt='' width='17' height='17' /><strong>Seleccione un departamento</strong></p>";


}} 

?>
