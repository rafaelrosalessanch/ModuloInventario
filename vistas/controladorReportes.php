<?php
session_start();
include_once '../modelo/ModeloLog.php';
$extract = extract($_GET);
$tipoo=htmlspecialchars($_POST["tipocomponenteregistrar"]);
$marcaa=htmlspecialchars($_POST["marcacomponenteregistrar"]);
$estadoo=htmlspecialchars($_POST["opcionesverestado"]);
$departamentoo=htmlspecialchars($_POST["opcionesverdepartamentos"]);
$estacionn=htmlspecialchars($_POST["orderBox"]);
$obj = new ModeloLog();
$mostrar = $obj->mostrar_todos_los_componentes();
$_SESSION['estadoimprimirr']=$estadoo;
$_SESSION['tipoimprimirr']=$tipoo;
     

        $_SESSION['depaselecc']="$departamentoo";
        $_SESSION['depaseleccc']="$departamentoo";



$_SESSION['marcacomponenteregistrar']=$marcaa;
if($estacionn==NULL){
foreach ($mostrar as $i) {



if($tipoo!="Seleccionar" && $marcaa=="Seleccionar"&& $estadoo=="Seleccionar"&& $departamentoo=="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    if($tipoo==$tipo){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}
if($tipoo!="Seleccionar" && $marcaa!="Seleccionar"&& $estadoo=="Seleccionar"&& $departamentoo=="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    if($tipoo==$tipo&&$marca==$marcaa){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}
if($tipoo!="Seleccionar" && $marcaa=="Seleccionar"&& $estadoo!="Seleccionar"&& $departamentoo=="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    if($tipoo==$tipo&&$estado==$estadoo){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}
if($tipoo!="Seleccionar" && $marcaa=="Seleccionar"&& $estadoo=="Seleccionar"&& $departamentoo!="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    if($tipoo==$tipo&&$departamen==$departamentoo){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}
if($tipoo!="Seleccionar" && $marcaa!="Seleccionar"&& $estadoo!="Seleccionar"&& $departamentoo=="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    if($tipoo==$tipo&&$marca==$marcaa&&$estado==$estadoo){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}
if($tipoo!="Seleccionar" && $marcaa!="Seleccionar"&& $estadoo!="Seleccionar"&& $departamentoo!="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    if($tipoo==$tipo&&$marca==$marcaa&&$estado==$estadoo&&$departamen==$departamentoo){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}
if($tipoo!="Seleccionar" && $marcaa=="Seleccionar"&& $estadoo!="Seleccionar"&& $departamentoo!="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    if($tipoo==$tipo&&$estado==$estadoo&&$departamen==$departamentoo){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}
if($tipoo!="Seleccionar" && $marcaa!="Seleccionar"&& $estadoo=="Seleccionar"&& $departamentoo!="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    if($tipoo==$tipo&&$marca==$marcaa&&$departamen==$departamentoo){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}
if($tipoo=="Seleccionar" && $marcaa!="Seleccionar"&& $estadoo!="Seleccionar"&& $departamentoo!="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    if($estado==$estadoo&&$marca==$marcaa&&$departamen==$departamentoo){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}
if($tipoo=="Seleccionar" && $marcaa!="Seleccionar"&& $estadoo=="Seleccionar"&& $departamentoo=="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    if($marca==$marcaa){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}
if($tipoo=="Seleccionar" && $marcaa!="Seleccionar"&& $estadoo!="Seleccionar"&& $departamentoo=="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    if($marca==$marcaa&&$estado==$estadoo){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}
//if($tipoo=="Seleccionar" && $marcaa!="Seleccionar"&& $estadoo=="Seleccionar"&& $departamentoo!="Todos"){
//    $tipo = $i->tipo;
//    $marca = $i->marca;
//    $estado = $i->estado;
//    $departamen = $i->departamento;
//    if($marca==$marcaa&&$departamen==$departamentoo){
//
//    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
//    }
//}
if($tipoo=="Seleccionar" && $marcaa=="Seleccionar"&& $estadoo!="Seleccionar"&& $departamentoo!="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    if($estado==$estadoo&&$departamen==$departamentoo){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}
if($tipoo=="Seleccionar" && $marcaa=="Seleccionar"&& $estadoo!="Seleccionar"&& $departamentoo=="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    if($estado==$estadoo){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}
if($tipoo=="Seleccionar" && $marcaa!="Seleccionar"&& $estadoo=="Seleccionar"&& $departamentoo!="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    if($marca==$marcaa&&$departamen==$departamentoo){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}
if($tipoo=="Seleccionar" && $marcaa=="Seleccionar"&& $estadoo=="Seleccionar"&& $departamentoo!="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    if($departamen==$departamentoo){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}

if($tipoo=="Seleccionar" && $marcaa=="Seleccionar"&&$estadoo=="Seleccionar"&& $departamentoo=="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;


    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    
}}}  else {
    foreach ($mostrar as $i) {



if($tipoo!="Seleccionar" && $marcaa=="Seleccionar"&& $estadoo=="Seleccionar"&& $departamentoo=="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    $estacion = $i->estacion;
    if($tipoo==$tipo&&$estacion==$estacionn){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}
if($tipoo!="Seleccionar" && $marcaa!="Seleccionar"&& $estadoo=="Seleccionar"&& $departamentoo=="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    $estacion = $i->estacion;
    if($tipoo==$tipo&&$marca==$marcaa&&$estacion==$estacionn){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}
if($tipoo!="Seleccionar" && $marcaa=="Seleccionar"&& $estadoo!="Seleccionar"&& $departamentoo=="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    $estacion = $i->estacion;
    if($tipoo==$tipo&&$estado==$estadoo&&$estacion==$estacionn){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}
if($tipoo!="Seleccionar" && $marcaa=="Seleccionar"&& $estadoo=="Seleccionar"&& $departamentoo!="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    $estacion = $i->estacion;
    if($tipoo==$tipo&&$departamen==$departamentoo&&$estacion==$estacionn){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}
if($tipoo!="Seleccionar" && $marcaa!="Seleccionar"&& $estadoo!="Seleccionar"&& $departamentoo=="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    $estacion = $i->estacion;
    if($tipoo==$tipo&&$marca==$marcaa&&$estado==$estadoo&&$estacion==$estacionn){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}
if($tipoo!="Seleccionar" && $marcaa!="Seleccionar"&& $estadoo!="Seleccionar"&& $departamentoo!="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    $estacion = $i->estacion;
    if($tipoo==$tipo&&$marca==$marcaa&&$estado==$estadoo&&$departamen==$departamentoo&&$estacion==$estacionn){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}
if($tipoo!="Seleccionar" && $marcaa=="Seleccionar"&& $estadoo!="Seleccionar"&& $departamentoo!="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    $estacion = $i->estacion;
    if($tipoo==$tipo&&$estado==$estadoo&&$departamen==$departamentoo&&$estacion==$estacionn){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}
if($tipoo!="Seleccionar" && $marcaa!="Seleccionar"&& $estadoo=="Seleccionar"&& $departamentoo!="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    $estacion = $i->estacion;
    if($tipoo==$tipo&&$marca==$marcaa&&$departamen==$departamentoo&&$estacion==$estacionn){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}
if($tipoo=="Seleccionar" && $marcaa!="Seleccionar"&& $estadoo!="Seleccionar"&& $departamentoo!="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    $estacion = $i->estacion;
    if($estado==$estadoo&&$marca==$marcaa&&$departamen==$departamentoo&&$estacion==$estacionn){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}
if($tipoo=="Seleccionar" && $marcaa!="Seleccionar"&& $estadoo=="Seleccionar"&& $departamentoo=="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    $estacion = $i->estacion;
    if($marca==$marcaa&&$estacion==$estacionn){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}
if($tipoo=="Seleccionar" && $marcaa!="Seleccionar"&& $estadoo!="Seleccionar"&& $departamentoo=="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    $estacion = $i->estacion;
    if($marca==$marcaa&&$estado==$estadoo&&$estacion==$estacionn){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}
if($tipoo=="Seleccionar" && $marcaa!="Seleccionar"&& $estadoo=="Seleccionar"&& $departamentoo!="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    $estacion = $i->estacion;
    if($marca==$marcaa&&$departamen==$departamentoo&&$estacion==$estacionn){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}
if($tipoo=="Seleccionar" && $marcaa=="Seleccionar"&& $estadoo!="Seleccionar"&& $departamentoo!="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    $estacion = $i->estacion;
    if($estado==$estadoo&&$departamen==$departamentoo&&$estacion==$estacionn){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}
if($tipoo=="Seleccionar" && $marcaa=="Seleccionar"&& $estadoo!="Seleccionar"&& $departamentoo=="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    $estacion = $i->estacion;
    if($estado==$estadoo&&$estacion==$estacionn){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}
if($tipoo=="Seleccionar" && $marcaa!="Seleccionar"&& $estadoo=="Seleccionar"&& $departamentoo!="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    $estacion = $i->estacion;
    if($marca==$marcaa&&$departamen==$departamentoo&&$estacion==$estacionn){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}
if($tipoo=="Seleccionar" && $marcaa=="Seleccionar"&& $estadoo=="Seleccionar"&& $departamentoo!="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
    $estacion = $i->estacion;
    if($departamen==$departamentoo&&$estacion==$estacionn){

    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
    }
}

if($tipoo=="Seleccionar" && $marcaa=="Seleccionar"&&$estadoo=="Seleccionar"&& $departamentoo=="Todos"){
    $tipo = $i->tipo;
    $marca = $i->marca;
    $estado = $i->estado;
    $departamen = $i->departamento;
$estacion = $i->estacion;
if($estacion==$estacionn){
    echo "<tr style='margin-Top:0px'><td></td><td style='width: 100px'>$tipo</td><td></td><td style='width: 100px'>$marca</td><td></td><td></td><td style='width: 100px'>$i->modelo</td><td style='width: 100px'>$i->numserie</td><td style='width: 100px'>$i->numeroinventario</td><td style='width: 100px'>$estado</td><td>$departamen</td></tr>";
}
}}
}

?>





