<?php
include_once'../modelo/connect.php';
include '../modelo/ModeloLog.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Componente
 *
 * @author rafael
 */
class Componente {

    protected $IdComponente;
    protected $TipoComponente;
    protected $MarcaComponente;
    protected $ModeloComponente;
    protected $NsComponente;
    protected $NinvComponente;
    protected $InvComponente;
    protected $EstadoComponente;
    protected $Observaciones;

    public function __construct() {
        
    }

    public function actualizarcomponenteasignado($componente, $estacion) {
        $estacion=$estacion;
        $objConnect = new Connect();
        $obj = new ModeloLog();
        $usuario = $_SESSION['usuario'];
        $fecha=date("d-m-Y H:i:s");
        $mostrar=$obj->mostrar_todos_los_componentes();
        foreach ($mostrar as $i) {
            if ($i->numeroinventario == $componente) {
                $obj->registrar_trazas_componentes(utf8_decode($i->tipo), utf8_decode($i->marca), utf8_decode($i->numeroinventario),'sin', $fecha, $usuario, 'Movimiento interno', $estacion,  utf8_decode($i->estacion),'Ejecutada correctamente');
            }
        }
        $primero=explode("Departamento:",$estacion);

        
        $pepe = "UPDATE objetos SET estacion='$estacion',departamento='$primero[1]' where numeroinventario='$componente'";
        return $objConnect->ConsultarBD($pepe);

        //codigo aqui
    }
     public function actualizarcomponentemodificado($componente) {
        $objConnect = new Connect();
        $obj = new ModeloLog();
        $usuario = $_SESSION['usuario'];
        $fecha=date("d-m-Y H:i:s");
        $mostrar=$obj->mostrar_todos_los_componentes();
        foreach ($mostrar as $i) {
            if ($i->numeroinventario == $componente) {
                $obj->registrar_trazas_componentes($i->tipo, $i->marca, $i->numeroinventario,'sin', $fecha, $usuario, 'Modificado', $i->estacion,$i->estacion,'Ejecutada correctamente');
            }
        }


        $pepe = "UPDATE objetos SET estacion='$estacion' where numeroinventario='$componente'";
        return $objConnect->ConsultarBD($pepe);
        //codigo aqui
    }






    public function insertar_componente($marca, $modelo, $numeroserie, $numeroinventario, $estado, $observaciones, $tipocomponente, $estacion, $fecha, $red,$ip) {
       $marca=$marca;
       $modelo=$modelo;
       $estado=$estado;
       $observaciones=$observaciones;
       $tipocomponente=$tipocomponente;
       $estacion=$estacion;
        $objConnect = new Connect();
       
        $bandera = 0;
        foreach ($mostrar as $i) {
            if ($i->numeroinventario == $numeroinventario) {
                $bandera = 1;
            }
        }

        if ($red == '') {
            $redd = '';
        } else {
            $redd = $red;
        }
        if ($bandera == 0) {
            $marca=$marca;
            $estado=$estado;
                $estacion=$estacion;
                $departamento = explode("Departamento:", $estacion);
                 $observaciones=$observaciones;
                 $modelo=$modelo;
                 $tipocomponente=$tipocomponente;
            $pepe = "INSERT INTO objetos(modelo, numserie, observaciones, numeroinventario,estacion, marca, tipo,estado,red,fecha,ip,departamento)
    VALUES ('$modelo', '$numeroserie','$observaciones', '$numeroinventario','$estacion','$marca','$tipocomponente','$estado','$redd','$fecha','$ip','$departamento[1]')";
            return $objConnect->ConsultarBD($pepe);
        } else {
            return FALSE;
        }
    }

}
?>
