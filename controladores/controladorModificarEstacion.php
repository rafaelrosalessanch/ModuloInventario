<?php
include_once '../modelo/ModeloLog.php';
$estacionseleccionada = htmlspecialchars($_POST['radio']);

$nombrenuevoesta=htmlspecialchars($_POST['nombremodificar']);
$ubicacionnuevaesta=htmlspecialchars($_POST['ubicacionmodificar']);
$trabajadornuevoesta=htmlspecialchars($_POST['trabajadormodificar']);
$departamentonuevoesta=htmlspecialchars($_POST['departamentomodificar']);
if ($estacionseleccionada!='nada'){
        $banderadepa=0;
        $obj = new ModeloLog();
$mostrar=$obj->mostrar_estaciones();
       
foreach ($mostrar as $i) {
   if($i->nombreubicacionnickdepartamento==$estacionseleccionada&&$nombrenuevoesta==''){


$banderadepa=1;

            $nombrenuevoesta=$i->nombreestacion;
        }
         if($i->nombreubicacionnickdepartamento==$estacionseleccionada&&$ubicacionnuevaesta=='Seleccionar'){


$banderadepa=1;

            $ubicacionnuevaesta=$i->ubicacion;
        }
       if($i->nombreubicacionnickdepartamento==$estacionseleccionada&&$trabajadornuevoesta==''){


$banderadepa=1;

            $trabajadornuevoesta=$i->nick;
        }
          if($i->nombreubicacionnickdepartamento==$estacionseleccionada&&$departamentonuevoesta=='Seleccionar'){


$banderadepa=1;

            $departamentonuevoesta=$i->departamento;
        }
        }

 $aca="Trabajador:$trabajadornuevoesta Estacion:$nombrenuevoesta Ubicacion:$ubicacionnuevaesta Departamento:$departamentonuevoesta";
            $obj->modificarEstacion($nombrenuevoesta, $ubicacionnuevaesta, $trabajadornuevoesta, $departamentonuevoesta, $estacionseleccionada, $aca);
       
        
       echo "
<div class='logo_img' ><img src='/images/logo.jpg' alt='' width='256' height='84' class='logo_img' /></div>
<p style='color:green;' id='mensaje'><img src='/images/correcto.jpg' alt='' width='20' height='20' /><strong>Se modifico correctamente</strong></p>";
} 



?>
