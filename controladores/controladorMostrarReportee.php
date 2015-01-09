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
$_SESSION["prompt"]=htmlspecialchars($_POST["prompt"]);;

    echo "<script language='javascript' type='text/javascript'>


                 window.open('http://activosmatica.cce.sld.cu/reportes/Reportes_1.php');


</script>;
";



?>





