<?php

include_once '../modelo/ModeloLog.php';
$extract = extract($_GET);

$obj = new ModeloLog();
$mostrar = $obj->mostrar_todos_los_componentes();

foreach ($mostrar as $i) {

      $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
  


}
?>





