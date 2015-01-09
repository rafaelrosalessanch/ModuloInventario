<?php
include_once '../modelo/ModeloLog.php';
include_once '../modelo/connect.php';
$obj = new ModeloLog(); //Connect es la clase que permite el trabajo con la Base de Dato
$nombreEmpresa = htmlspecialchars($_POST['nombreEmpresa']);
    $objConnect = new Connect();               //instanciar la clase connect
    $pepe = "insert into empresa (nombreempresa)values('$nombreEmpresa')";
    $pepe1="ALTER TABLE estructura ADD COLUMN nuevo text;";
    $objConnect->ConsultarBD($pepe);
    $objConnect->ConsultarBD($pepe1);
    
echo "

<p style='color:red;font-size: 14px' id='mensaje'>$nombreEmpresa</p>";




?>