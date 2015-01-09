<?php

$_SESSION['imprimirtipoo']=htmlspecialchars($_POST['tipocomponenteregistrar']);
$_SESSION['imprimirmarcaa']=htmlspecialchars($_POST['marcacomponentemodificar']);
$_SESSION['imprimirestadoo']=htmlspecialchars($_POST['estadocomponenteregistrar']);
$_SESSION['imprimirdepartamentoo']=htmlspecialchars($_POST['departamentoconsultar']);
    echo "<script language='javascript' type='text/javascript'>


                 window.open('http://activosmatica.cce.sld.cu/reportes/Reportes_3.php');
history.go(0);

</script>;
";


?>





