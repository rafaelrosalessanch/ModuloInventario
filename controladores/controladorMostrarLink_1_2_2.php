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

$marca=htmlspecialchars($_POST["marcacomponenteregistrar"]);
$_SESSION['marcacomponenteregistrar']=$marca;
 echo '<script language="javascript" type="text/javascript">


history.go(0);
</script>';
?>





