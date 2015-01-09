<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author rafael
 */


error_reporting(E_ALL ^ E_NOTICE);
session_start();
//$marca=NULL;
//$modelocomponente=NULL;
//$numeroseriecomponente=NULL;
//$numeroinventariocomponente=NULL;
//$estadocomponente=NULL;
//$tipocomponente=NULL;
//$estacion=NULL;
//$fecha=NULL;
//$red=NULL;
include_once '../entidades/Componente.php';
include_once '../modelo/ModeloLog.php';
$tipocomponente=htmlspecialchars($_POST['tipocomponenteregistrar']);
$red='';
$marcacomponenteregistrar=htmlspecialchars($_POST['marcacomponenteregistrar']);
$modelocomponente=htmlspecialchars($_POST['modelocomponente']);
$numeroseriecomponente=htmlspecialchars($_POST['numeroseriecomponente']);
$numeroinventariocomponente=htmlspecialchars($_POST['numeroinventariocomponente']);
$numeroinventariocomponentee=$numeroinventariocomponente;
$estadocomponente=htmlspecialchars($_POST['estadocomponente']);
$estacion=htmlspecialchars($_POST['radioo']);
if($tipocomponente=='Computadora'){
    $red=htmlspecialchars($_POST['red']);
    $ip=htmlspecialchars($_POST['ip']);





}



$primero=explode(":",$estacion);
$segundo1=$primero[0];
$segundo2=$primero[1];
$segundo3=$primero[2];
$segundo4=$primero[3];
$segundootro=$primero[4];
$primero1=explode(",",$segundo2);
$segundo5=$primero1[0];//Rafael
$primero2=explode(",",$segundo3);
$segundo6=$primero2[0];//puesto6
$primero3=explode(",",$segundo4);
$segundo7=$primero3[0];//3er nivel
$primero4=explode(",",$segundootro);
$segundo8=$primero4[0];//Informatica
$final=$segundo5.$segundo6.$segundo7.$segundo8;
$fecha=date("d-m-Y H:i:s");

$marca=$marcacomponenteregistrar;
if($red==''){

$ip='0.0.0.0';
return validarComponente($marca, $modelocomponente, $numeroseriecomponente, $numeroinventariocomponente,$estadocomponente,'Sin observaciones',$tipocomponente,$estacion,$fecha,$red,$ip);
}  else {
    $capacidadramm=htmlspecialchars($_POST['capacidadram']);
$tiporamm=htmlspecialchars($_POST['tiporam']);

$capacidadhddd=htmlspecialchars($_POST['capacidadhdd']);
$seriehddd=htmlspecialchars($_POST['seriehdd']);
$tipohddd=htmlspecialchars($_POST['tipohdd']);

$velocidadcpuu=htmlspecialchars($_POST['velocidadcpu']);
$tipocpuu=htmlspecialchars($_POST['tipocpu']);
$seriecpuu=htmlspecialchars($_POST['seriecpu']);

if(htmlspecialchars($_POST['mouse'])){
    $mouse='mouse';}else {
       $mouse='no';
    }
    $teclado=htmlspecialchars($_POST['teclado']);
    if($teclado!=NULL){
    $teclado='teclado';}else {
       $teclado='no';
    }
    if(htmlspecialchars($_POST['bocinas'])){
    $bocinas='bocinas';}else {
       $bocinas='no';
    }
    if(htmlspecialchars($_POST['lectorcd'])){
    $lectorcd='lectorcd';}else {
       $lectorcd='no';
    }
    if(htmlspecialchars($_POST['quemadorcd'])){
    $quemadorcd='quemadorcd';}  else {
       $quemadorcd='no';
    }
    if(htmlspecialchars($_POST['lectordvd'])){
    $lectordvd='lectordvd';}else {
        $lectordvd='no';
    }
    if(htmlspecialchars($_POST['quemadordvd'])){
    $quemadordvd='quemadordvd';}  else {
        $quemadordvd='no';
    }
     if(htmlspecialchars($_POST['fuente'])){
    $fuente='fuente';}  else {
        $fuente='no';
    }



    return validarComponentered($marca, $modelocomponente, $numeroseriecomponente, $numeroinventariocomponente,$estadocomponente,'Sin observaciones',$tipocomponente,$estacion,$fecha,$red,$ip,$tiporamm,$capacidadramm,$numeroinventariocomponentee,$tipocpuu,$seriecpuu,$velocidadcpuu,$tipohddd,$seriehddd,$capacidadhddd,$mouse,$teclado,$bocinas,$lectorcd,$quemadorcd,$lectordvd,$quemadordvd,$fuente);
    

}
function validarComponente($marca, $modelo, $numeroserie, $numeroinventario,$estado,$observaciones,$tipocomponente,$estacion,$fecha,$red,$ip) {
    if ($marca == "Seleccionar" || $estado == NULL  || $tipocomponente == "Seleccionar"|| $estado == "Seleccionar" || $estacion =='Seleccionar') {
     $_SESSION['error']=1;
      $obj = new ModeloLog();
        $mostrar = $obj->mostrar_todos_los_componentes();
        $usuario = $_SESSION['usuario'];
          $fecha=date("d-m-Y H:i:s");
        $obj->registrar_trazas_componentes($tipocomponente, $marca, $numeroinventario, $numeroserie, $fecha, $usuario, 'Insertado por primera vez', $estacion,'Inicio','Ejecutada incorrectamente');
        echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:red;' id='mensaje'><img src='/images/incorrecto.jpg' alt='' width='17' height='17' /><strong>Error al introducir los datos</strong></p>";
    } else {
        $obj = new Componente();
      
if(($obj->insertar_componente($marca, $modelo, $numeroserie, $numeroinventario, $estado, $observaciones, $tipocomponente, $estacion,$fecha,$red,$ip))==TRUE){
            $_SESSION['error']=0;
 $obj = new ModeloLog();
        $mostrar = $obj->mostrar_todos_los_componentes();
        $usuario = $_SESSION['usuario'];
        $obj->registrar_trazas_componentes($tipocomponente, $marca, $numeroinventario, $numeroserie, $fecha, $usuario, 'Insertado por primera vez', $estacion,'Inicio','Ejecutada correctamente');
    echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:green;' id='mensaje'><strong>Se inserto correctamente</strong></p>";

    }  else {
         $_SESSION['error']=2;
          $obj = new ModeloLog();
        $mostrar = $obj->mostrar_todos_los_componentes();
        $usuario = $_SESSION['usuario'];
        $obj->registrar_trazas_componentes($tipocomponente, $marca, $numeroinventario, $numeroserie, $fecha, $usuario, 'Insertado por primera vez', $estacion,'Inicio','Ejecutada incorrectamente');
       echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:red;' id='mensaje'><strong>Ya existe un componente con el mismo Num inventario</strong></p>";

    }
        
    }
}

function validarComponentered($marca, $modelo, $numeroserie, $numeroinventario,$estado,$observaciones,$tipocomponente,$estacion,$fecha,$red,$ip,$tiporamm,$capacidadramm,$numeroinventariocomponentee,$tipocpuu,$seriecpuu,$velocidadcpuu,$tipohddd,$seriehddd,$capacidadhddd,$mouse,$teclado,$bocinas,$lectorcd,$quemadorcd,$lectordvd,$quemadordvd,$fuente) {
    if ($marca == "Seleccionar" || $numeroinventario == NULL || $estado == NULL  || $tipocomponente == "Seleccionar"|| $estado == "Seleccionar" || $estacion =='Seleccionar'||$tipocpuu=='Seleccionar'||$velocidadcpuu=='Seleccionar'||$tiporamm=='Seleccionar'||$capacidadramm=='Seleccionar'||$tipohddd=='Seleccionar'||$capacidadhddd=='Seleccionar') {
       $_SESSION['error']=1;
     $objjj = new ModeloLog();
         $fecha=date("d-m-Y H:i:s");
        $usuario = $_SESSION['usuario'];
        $objjj->registrar_trazas_componentes($tipocomponente, $marca, $numeroinventario, $numeroserie, $fecha, $usuario, 'Insertado por primera vez', $estacion,'Inicio','Ejecutada incorrectamente');

        echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:red;' id='mensaje'><strong>Error al introducir los datos</strong></p>";
    } else {
 $objjj = new ModeloLog();
        $obj = new Componente();
$obj->insertar_componente($marca, $modelo, $numeroserie, $numeroinventario, $estado, $observaciones, $tipocomponente, $estacion,$fecha,$red,$ip);

        $usuario = $_SESSION['usuario'];
        $objjj->registrar_trazas_componentes($tipocomponente, $marca, $numeroinventario, $numeroserie, $fecha, $usuario, 'Insertado por primera vez', $estacion,'Inicio','Ejecutada correctamente');


$objjj->insertar_ram($tiporamm,$capacidadramm,$numeroinventariocomponentee);
$objjj->insertar_cpu($tipocpuu,$seriecpuu,$velocidadcpuu,$numeroinventariocomponentee);
$objjj->insertar_hdd($tipohddd,$seriehddd,$capacidadhddd,$numeroinventariocomponentee);
$objjj->insertar_periferico($mouse,$teclado,$bocinas,$lectorcd,$quemadorcd,$lectordvd,$quemadordvd,$numeroinventariocomponentee,$fuente);
 $_SESSION['error']=0;
echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:green;' id='mensaje'><strong>Se inserto correctamente</strong></p>";

    }
}


?>