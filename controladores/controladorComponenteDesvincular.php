<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 *
 * @author rafael
 */
$nombreregistrar = htmlspecialchars($_POST["tipocomponenteregistrar"]);
$marcadesvincular=htmlspecialchars($_POST["oorderBox"]);
include '../modelo/ModeloLog.php';
$banderaerror=0;
$objregistrar = new ModeloLog();
$extract = extract($_GET);
$mostrar = $objregistrar->mostrar_marca_de_todos_componentes();
$mostrarcom=$objregistrar->mostrar_todos_los_componentes();
foreach ($mostrarcom as $i) {
    if(($i->tipo==$nombreregistrar)&&($i->marca==$marcadesvincular)){
        $banderaerror=1;
    }
}
if($banderaerror==0){
foreach ($mostrar as $i) {

if($marcadesvincular==$i->nombremarca){
    $componentepertenece=$i->componentepertenece;
   
$nuevocomponentepertenece = explode("$nombreregistrar","$componentepertenece");
if($nuevocomponentepertenece[0]!=NULL&&$nuevocomponentepertenece[1]!=NULL){
$masnuevocomponentepertenece=$nuevocomponentepertenece[0].$nuevocomponentepertenece[1];
$objregistrar->modificarmarca($i->nombremarca, $masnuevocomponentepertenece);

}
if($nuevocomponentepertenece[0]!=NULL&&$nuevocomponentepertenece[1]==NULL){
    $masnuevocomponentepertenece=$nuevocomponentepertenece[0];
 $objregistrar->modificarmarca($i->nombremarca, $masnuevocomponentepertenece);

    }
if($nuevocomponentepertenece[0]==NULL&&$nuevocomponentepertenece[1]!=NULL){
    $masnuevocomponentepertenece=$nuevocomponentepertenece[1];
  $objregistrar->modificarmarca($i->nombremarca, $masnuevocomponentepertenece);

    }
if($nuevocomponentepertenece[0]==NULL&&$nuevocomponentepertenece[1]==NULL){
    $masnuevocomponentepertenece='';
   $objregistrar->modificarmarca($i->nombremarca, $masnuevocomponentepertenece);

    }

    }
}

}  else {
    echo '<script language="javascript" type="text/javascript">
            alert("Error, no se puede desvincular porque existe un componente añadido con esa marca");

</script>';
}


$nombreregistrarrr = htmlspecialchars($_POST["tipocomponenteregistrar"]);

if($nombreregistrarrr!='Seleccionar'){

$mostrar = $objregistrar->mostrar_marca_de_todos_componentes();

foreach ($mostrar as $i) {
    $compo = $i->componentepertenece;
    if (preg_match("/$nombreregistrarrr/", $compo)) {
// echo  "<p id='pvincular' value='$i->nombremarca'>$i->nombremarca</p>";
 echo "<p id='p$i->nombremarca'><input id='$i->nombremarca' type='radio' value='$i->nombremarca' name='oorderBox'/>$i->nombremarca</p>";

    }
}}  else {
    echo '<script language="javascript" type="text/javascript">
            alert("Error al cargar de la base de datos")
history.go(-1);
</script>';
}

?>





