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

$tipo=htmlspecialchars($_POST["tipocomponenteregistrar"]);
$_SESSION['tipoimprimirr']=$tipo;
 echo '<script language="javascript" type="text/javascript">


history.go(0);
</script>';
?>





