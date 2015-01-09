<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author rafael
 */

//
//    echo '<script language="javascript" type="text/javascript">
//
//
//history.go(0);
//</script>';
session_start();
$_SESSION['imprimirtipoo']=htmlspecialchars($_POST['tipocomponenteregistrar']);
$_SESSION['imprimirmarcaa']=htmlspecialchars($_POST['marcacomponentemodificar']);
$_SESSION['imprimirestadoo']=htmlspecialchars($_POST['estadocomponenteregistrar']);
$_SESSION['imprimirdepartamentoo']=htmlspecialchars($_POST['departamentoconsultar']);

   

?>





