<?php
include_once '../modelo/ModeloLog.php';
include_once '../modelo/ModeloLog.php';
$idcpu = htmlspecialchars($_POST['orderBoxhd']);
$bandera=0;
$obj=new ModeloLog();
$banderaaa=0;
$obj->eliminar_hdd($idcpu);
$fecha=date("d-m-Y H:i:s");
            session_start();
            $usuario = $_SESSION['usuario'];
        $mostrar=$obj->mostrar_hdd();
        foreach ($mostrar as $i) {
            if ($i->iddiscoduro == $idcpu&&$banderaaa==0) {
                $banderaaa=1;
                 $mostrarobjetos=$obj->mostrar_todos_los_componentes_id1($i->idobjeto);
                 foreach ($mostrarobjetos as $ii) {
                $tipo=$ii->tipo;
                $marca=$ii->marca;
                $estacion=$ii->estacion;
                $obj->registrar_trazas_componentes($tipo, $marca, $ii->numeroinventario,'sin', $fecha, $usuario, 'Modificado', "sin cambios",$estacion,'Ejecutada correctamente');
            }}
        }
echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:green;' id='mensaje'><strong>Se elimino correctamente</strong></p>";

?>
