<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 *
 * @author rafael
 */
$nombreregistrarrr = htmlspecialchars($_POST["tipocomponenteregistrar"]);
$nombreregistrar = htmlspecialchars($_POST["tipocomponenteregistrar"]);
$marcaseleccionada=htmlspecialchars($_POST['orderBox']);
include '../modelo/ModeloLog.php';
$objregistrar = new ModeloLog();
$extract = extract($_GET);
$mostrar = $objregistrar->mostrar_marca_de_todos_componentes();
foreach ($mostrar as $i) {

 
if($marcaseleccionada!=NULL){
    $componentepertenece=$i->componentepertenece;
    $nuevocomponentepertenece=$componentepertenece.$nombreregistrar;
$objregistrar->modificarmarca($marcaseleccionada, $nuevocomponentepertenece);

}
}
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