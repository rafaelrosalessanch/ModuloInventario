<?php
session_start();
include_once '../modelo/ModeloLog.php';
include_once '../modelo/connect.php';

$objeto=new ModeloLog();
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
$nombreusuarioglobal = htmlspecialchars($_POST['nombre']);
$apellidosusuarioglobal = htmlspecialchars($_POST['apellidos']);
$emailusuario = htmlspecialchars($_POST['email']);
$usuario = htmlspecialchars($_POST['usuario']);
$contrasena = htmlspecialchars($_POST['contrasena']);
$bandera=0;


if($objconnect->Conectar()==NULL){
    $_SESSION['usuario'] = $nombreusuarioglobal;
    echo "

<p style='color:darkred;margin-left:-30px;font-size: 14px' id='mensaje'><strong>Error de conexion</strong></p>";

}


if($usuario==NULL||$contrasena==NULL||$nombreusuarioglobal==null||$apellidosusuarioglobal==null||$emailusuario==null) {
   }else {
	$_SESSION['usuario']=$usuario;
	$objeto->insertarUsuarioglobal($nombreusuarioglobal,$apellidosusuarioglobal,$emailusuario,$usuario, $contrasena);
	 
        echo '<script language="javascript" type="text/javascript">

location.href="../vistasnuevas/informatica.php";
</script>';
}
                

?>
