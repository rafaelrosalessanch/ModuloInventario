<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author rafael
 */
session_start();

$estado=htmlspecialchars($_POST["opcionesverestado"]);
$_SESSION['estadoimprimirr']=$estado;
 echo '<script language="javascript" type="text/javascript">


history.go(0);
</script>';
?>





