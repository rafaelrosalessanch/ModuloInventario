<?php

include_once '../modelo/ModeloLog.php';
$extract = extract($_GET);
$obj = new ModeloLog();
$mostrar = $obj->mostrar_ubicacion();
echo "<option>Seleccionar</option>";
foreach ($mostrar as $i) {
    $ubicacion = utf8_decode($i->nombreubicacion);
    echo "<option>$ubicacion</option>";
}
?>
