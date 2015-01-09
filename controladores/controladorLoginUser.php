<?php

session_start();
include_once '../modelo/ModeloLog.php';
include_once '../modelo/connect.php';
$obj = new ModeloLog();
$objconnect = new Connect();
 $_SESSION['usuario']=NULL;
$_SESSION['tipoconsultados']='Total de activos:';
$_SESSION['estadoimprimirr']='Seleccionar';
$_SESSION['marcacomponenteregistrar']='Seleccionar';
$_SESSION["activarfiltro"]=FALSE;
$_SESSION['tipoimprimirr']='Seleccionar';
    $_SESSION['departamento']=NULL;
    $_SESSION['administrador']=NULL;
    $_SESSION['depaselecc']=NULL;
$_SESSION['estacion']=NULL;
$usuario = htmlspecialchars($_POST['usuario']);
$contrasena = htmlspecialchars($_POST['contrasena']);
$bandera=0;
if($objconnect->Conectar()==NULL){
    
    echo "

<p style='color:darkred;margin-left:-30px;font-size: 14px' id='mensaje'><strong>Error de conexion</strong></p>";

}

else{
$mostrar = $obj->mostrar_login($usuario);

if($usuario!=NULL&&$contrasena!=NULL){
if($mostrar!=NULL){
foreach ($mostrar as $i) {
    $user = $i->usuario;
    $pass = $i->contrasena;
    $departamento=$i->departamento;
    $administrador=$i->administracion;
$jefe=$i->jefes;
$estado=$i->estado;



if (($usuario ==$user) && ($contrasena == $pass)) {
    $bandera=1;
    $_SESSION['estadoimprimirr']='Seleccionar';
$_SESSION['tipoimprimirr']='Seleccionar';
     $_SESSION['usuario']=$usuario;
     if ($departamento!="Informática"){
        $_SESSION['depaselecc']="$departamento";
        $_SESSION['depaseleccc']="$departamento";
     }  else {
        $_SESSION['depaselecc']="Todos";
$_SESSION['depaseleccc']="Todos";
     }

$_SESSION["prompt"]="";
    $_SESSION['departamento']=$departamento;
    $_SESSION['administrador']=$administrador;
    $_SESSION['jefe']=$jefe;
     $_SESSION['estado']=$estado;
    $palabra = $_SESSION['usuario'];
$_SESSION['palabra'] = ucfirst($palabra);
}


   


}if($bandera==1){
//    header("Location: ../vistas/informatica.php");
    if($departamento!='Informática'){ 
        if($_SESSION['estado']==1){
        echo '<script language="javascript" type="text/javascript">


location.href="../reportes/Reportes Generales.php";
</script>';}  else {
                       echo "<script language='javascript' type='text/javascript'>
    document.getElementById('contrasena').value=null;</script>";
     echo "

<p style='color:darkred;margin-left:-50px;font-size: 14px' id='mensaje'><strong>Usuario o contraseña incorrecta</strong></p>";
 
                    }}  else {
    if($_SESSION['estado']==1){
                   echo '<script language="javascript" type="text/javascript">

location.href="../vistas/informatica.php";
</script>';
                }}
    
}
if($bandera==0){
     echo "<script language='javascript' type='text/javascript'>
    document.getElementById('contrasena').value=null;</script>";
     echo "

<p style='color:darkred;margin-left:-50px;font-size: 14px' id='mensaje'><strong>Usuario o contraseña incorrecta</strong></p>";


}}  else {
         echo "<script language='javascript' type='text/javascript'>
    document.getElementById('contrasena').value=null;</script>";
    echo "

<p style='color:darkred;margin-left:-50px;font-size: 14px' id='mensaje'><strong>Usuario o contraseña incorrecta</strong></p>";

    }



}else {
     echo "<script language='javascript' type='text/javascript'>
    document.getElementById('contrasena').value=null;</script>";
    echo "

<p style='color:darkred;margin-left:-50px;font-size: 14px' id='mensaje'><strong>Usuario o contraseña incorrecta</strong></p>";


}}
?>
