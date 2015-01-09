<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EstacionDeTrabajo
 *
 * @author rafael
 */
include_once'../modelo/connect.php';
class EstacionDeTrabajo {
    private $IdEestacion;
    private $NombreEstacion;
    private $NickEstacion;
    private $UbicacionEstacion;
    private $ListaComponente;

     public function  __construct() {
        
       }
    public function insertar_estacion_de_trabajo($nombre,$ubicacion,$nick,$departamento){
        $nombre=$nombre;
        $ubicacion=$ubicacion;
        $nick=$nick;
        $departamento=$departamento;
        $nombreubicacionnickdepartamento="Trabajador:$nick Estacion:$nombre Ubicacion:$ubicacion Departamento:$departamento";
        $objConnect = new Connect();
        include '../modelo/ModeloLog.php';
        $objmodelo=new ModeloLog();
        $mostrar=$objmodelo->mostrar_estaciones();
        $bandera=0;
        foreach ($mostrar as $i){
            if(utf8_decode($i->nombreubicacionnickdepartamento)==$nombreubicacionnickdepartamento){
                $bandera=1;
            }
        }
        if ($bandera==0) {
            $pepe = "INSERT INTO estacion(nombreestacion, ubicacion, nick,departamento,nombreubicacionnickdepartamento)VALUES('$nombre', '$ubicacion','$nick', '$departamento','$nombreubicacionnickdepartamento')";
        return $objConnect->ConsultarBD($pepe);
        }  else {
            return FALSE;;
        }

    
}
 public function mostrar_estaciones () {
      $objConnect = new Connect();
		$pepe="SELECT * FROM estacion ORDER BY nombreestacion";
		return $objConnect->ConvConsultaObjeto($pepe);
		//codigo aqui
		}
}
?>
