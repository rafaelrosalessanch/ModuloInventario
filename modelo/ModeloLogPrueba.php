<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModeloLogPrueba
 *
 * @author rafael
 */
class ModeloLogPrueba {
 private $objConnect; //Connect es la clase que permite el trabajo con la Base de Dato

		public function __construct () {
			$this->objConnect=new Connect();               //instanciar la clase connect
			}

		public function registrar_log_bd($marca,$modelo,$numeroserie,$numeroinventario,$estado,$observaciones,$tipocomponente) {
		$marc=utf8_encode($marca);
                $estad=utf8_encode($estado);
                 $observacione=utf8_encode($observaciones);
                 $tipocomponent=utf8_encode($tipocomponente);
                    $pepe= "insert into componente (marca,modelo,numeroserie,numeroinventario,estado,observaciones,tipocomponente)values('$marc','$modelo','$numeroserie','$numeroinventario','$estad','$observacione','$tipocomponent')";
//
//
                return  $this->objConnect->ConsultarBD($pepe);
			//codigo aqui
		}

                public function registrar_trazas_componentes($tipocomponente,$marca,$numeroinventario,$numeroserie,$fecha,$usuario,$entrada,$asignado_a,$asignado_desde) {
		$marc=utf8_encode($marca);
                $usuari=utf8_encode($usuario);
                 $asignado_=utf8_encode($asignado_a);
                 $asignado_desd=utf8_encode($asignado_desde);
                 $tipocomponent=utf8_encode($tipocomponente);
                    $pepe= "insert into trazascomponentes (tipocomponente,marca,numeroinventario,fecha_accion,usuario,tipo_accion,asignado_a,asignado_desde)values('$tipocomponent','$marc','$numeroinventario','$fecha','$usuari','$entrada','$asignado_','$asignado_desd')";
//
//
                return  $this->objConnect->ConsultarBD($pepe);
			//codigo aqui
		}






                public function insertar_login_administracion($numero,$usuario) {
		$pepe= "UPDATE loginadministracion SET estado=$numero where usuario='$usuario'";
//

                return  $this->objConnect->ConsultarBD($pepe);
			//codigo aqui
		}
                public function cambiarcontrasena($usuario,$contrasenanueva) {
		$usuari=utf8_encode($usuario);
                $contrasenanuev=utf8_encode($contrasenanueva);
                    $pepe= "UPDATE loguiar SET contrasena='$contrasenanuev' where usuario='$usuari'";
//

                return  $this->objConnect->ConsultarBD($pepe);
			//codigo aqui
		}
                 public function cambiarcomponente($numeroinventario,$modelo,$numserie,$observaciones,$numinventario,$marca,$estado) {
		$marc=utf8_encode($marca);
                $estad=utf8_encode($estado);
                 $observacione=utf8_encode($observaciones);
$modelo=utf8_encode($modelo);
                     $pepe= "UPDATE objetos SET modelo='$modelo', numserie='$numserie', observaciones='$observacione', numeroinventario='$numinventario', marca='$marc', estado='$estad' where numeroinventario='$numeroinventario'";
//

                return  $this->objConnect->ConsultarBD($pepe);
			//codigo aqui
		}



                public function modificarUsuario($usuario,$departamento,$contrasena,$privilegios) {
                    $usuari=utf8_encode($usuario);
                $departament=utf8_encode($departamento);
                 $contrasen=utf8_encode($contrasena);


		$pepe= "UPDATE loguiar SET contrasena='$contrasen',administracion='$privilegios' where usuario='$usuari' and departamento='$departament'";
//

                return  $this->objConnect->ConsultarBD($pepe);
			//codigo aqui
		}
                  public function modificarEstacion($nombreestacionnueva,$ubicacion,$trabajador,$departamento,$estacion,$aca) {
		$nombreestacionnuev=utf8_encode($nombreestacionnueva);
                $ubicacio=utf8_encode($ubicacion);
                 $trabajado=utf8_encode($trabajador);
                 $departament=utf8_encode($departamento);
                 $estacio=utf8_encode($estacion);
                 $ac=utf8_encode($aca);
                      $pepe= "UPDATE estacion SET nombreestacion='$nombreestacionnuev',ubicacion='$ubicacio',nick='$trabajado',departamento='$departament', nombreubicacionnickdepartamento='$ac' where nombreubicacionnickdepartamento='$estacio'";
//

                return  $this->objConnect->ConsultarBD($pepe);
			//codigo aqui
		}
                  public function modificarEstacionotro($estacion,$aca) {
		   $estacio=utf8_encode($estacion);
                 $ac=utf8_encode($aca);
                      $pepe= "UPDATE estacion SET nombreubicacionnickdepartamento='$ac' where nombreubicacionnickdepartamento='$estacio'";
//

                return  $this->objConnect->ConsultarBD($pepe);
			//codigo aqui
		}
                public function modificarDepartamento($nombredepartamento,$nuevonombredepartamento,$nuevaubicaciondepartamento,$nuevaareadepartamento) {
		$nombredepartament=utf8_encode($nombredepartamento);
                $nuevonombredepartament=utf8_encode($nuevonombredepartamento);
                $nuevaubicaciondepartament=utf8_encode($nuevaubicaciondepartamento);
                $nuevaareadepartament=utf8_encode($nuevaareadepartamento) ;
                    $pepe= "UPDATE departamento SET nombredepartamento='$nuevonombredepartament',ubicaciondepartamento='$nuevaubicaciondepartament',area='$nuevaareadepartament' where nombredepartamento='$nombredepartament'";
//

                return  $this->objConnect->ConsultarBD($pepe);
			//codigo aqui
		}


                public function modificarmarca($NombreMarca,$componentePertenece) {
		$pepe= "UPDATE marcaobjetos SET componentepertenece='$componentePertenece'where nombremarca='$NombreMarca'";
//

                return  $this->objConnect->ConsultarBD($pepe);
			//codigo aqui
		}

//               public function mostrar_marca_a_desvincular () {
//		$pepe="SELECT componentepertenece FROM marcaobjetos where";
//		return $this->objConnect->ConvConsultaObjeto($pepe);
//		//codigo aqui
//		}
                public function insertarUsuario($usuario,$contraseña,$departamento,$privilegios) {

//               $pasar=utf8_decode($usuario);
               $user=utf8_encode($usuario);
               $password=utf8_encode($contraseña);
               $depa=utf8_encode($departamento);

		$pepe= "insert into loguiar (usuario,contrasena,departamento,administracion)values('$user','$password','$depa','$privilegios')";
//
//
                return  $this->objConnect->ConsultarBD($pepe);
			//codigo aqui
		}
                 public function insertar_Atributos($nombremarca,$nombretipo,$nombreestado) {
$bandera1=TRUE;$bandera2=TRUE;$bandera3=TRUE;
                 if($nombremarca!=NULL){
                     $marc=utf8_encode($nombremarca);
                   $pepe= "insert into marcaobjetos (nombremarca)values('$marc')";
 $bandera1=$this->objConnect->ConsultarBD($pepe);
                 }
		if($nombretipo!=NULL){
                    $tip=utf8_encode($nombretipo);
                   $pepe= "insert into tipoobjetos (nombretipoobjeto)values('$tip')";
   $bandera2=$this->objConnect->ConsultarBD($pepe);
                 }
                 if($nombreestado!=NULL){
                        $esta=utf8_encode($nombreestado);
                   $pepe= "insert into estadoobjetos (nombreestado)values('$esta')";
   $bandera3=$this->objConnect->ConsultarBD($pepe);
                 }
                 if($bandera1==FALSE)
                 return FALSE;
                 if($bandera2==FALSE)
                 return FALSE;
                 if($bandera3==FALSE)
                 return FALSE;

             return TRUE;
		}
                public function insertarUsuariologeados($usuario) {
		$pepe= "insert into logeados (usuario)values('$usuario')";
//
//
                return  $this->objConnect->ConsultarBD($pepe);
			//codigo aqui
		}
		public function consultar_departamento_login_User ($usuario) {
		$pepe="SELECT departamento FROM login where usuario='$usuario'";
		return $this->objConnect->ConvConsultaObjeto($pepe);
		//codigo aqui
		}
                public function consultar_estado_usuario () {
		$pepe="SELECT usuario FROM loginadministracion where estado='1'";
		return $this->objConnect->ConvConsultaObjeto($pepe);
		//codigo aqui
		}
                public function consultar_contrasena_usuario ($usuario) {
		$pepe="SELECT contrasena FROM loguiar where usuario='$usuario'";
		return $this->objConnect->ConvConsultaObjeto($pepe);
		//codigo aqui
		}
		public function mostrar_departamentos () {
		$pepe="SELECT * FROM departamento ORDER BY nombredepartamento";
		return $this->objConnect->ConvConsultaObjeto($pepe);
		//codigo aqui
		}
                public function mostrar_area() {
		$pepe="SELECT * FROM areadepartamento";
		return $this->objConnect->ConvConsultaObjeto($pepe);
		//codigo aqui
		}
                public function mostrar_estaciones () {
		$pepe="SELECT * FROM estacion ORDER BY nombreestacion";
		return $this->objConnect->ConvConsultaObjeto($pepe);
		//codigo aqui
		}
                public function mostrar_usuarios_departamento ($departamento) {
		$pepe="SELECT usuario FROM loguiar where departamento='$departamento'and administracion!='superuser'and administracion!='Super administrador'";
		return $this->objConnect->ConvConsultaObjeto($pepe);
		//codigo aqui
		}
                public function mostrar_usuarios_todos () {
		$pepe="SELECT usuario FROM loguiar where  administracion!='superuser'and administracion!='Super administrador'";
		return $this->objConnect->ConvConsultaObjeto($pepe);
		//codigo aqui
		}
               public function mostrar_login ($usario) {
		$pepe="SELECT * FROM loguiar where usuario='$usario'";
		return $this->objConnect->ConvConsultaObjeto($pepe);
		//codigo aqui
		}
                public function mostrar_estados () {
		$pepe="SELECT * FROM estadoobjetos ";
		return $this->objConnect->ConvConsultaObjeto($pepe);
		//codigo aqui
		}
                 public function mostrar_loginAdministracion ($usario) {
		$pepe="SELECT * FROM loginadministracion where usuario='$usario'";
		return $this->objConnect->ConvConsultaObjeto($pepe);
		//codigo aqui
		}
                public function mostrar_departamentoparaseleccion () {
		$pepe="SELECT nombre FROM departamento where iddepartamento=";
		return $this->objConnect->ConvConsultaObjeto($pepe);
		//codigo aqui
		}
		public function mostrar_estacion_de_trabajo () {
		$pepe="SELECT * FROM estacion ORDER BY nombreestacion";
		return $this->objConnect->ConvConsultaObjeto($pepe);
		//codigo aqui
		}
                public function mostrar_tipo_de_componente () {
		$pepe="SELECT * FROM tipoobjetos ORDER BY nombretipoobjeto";
		return $this->objConnect->ConvConsultaObjeto($pepe);
		//codigo aqui
		}
                public function mostrar_marca_de_todos_componentes () {
		$pepe="SELECT * FROM marcaobjetos ORDER BY nombremarca ";
		return $this->objConnect->ConvConsultaObjeto($pepe);
		//codigo aqui
		}

                public function mostrar_todos_los_componentes () {
		$pepe="SELECT * FROM objetos ORDER BY tipo";
		return $this->objConnect->ConvConsultaObjeto($pepe);
		//codigo aqui
		}

                 public function mostrar_todos_los_usuarios () {
		$pepe="SELECT * FROM loguiar";
		return $this->objConnect->ConvConsultaObjeto($pepe);
		//codigo aqui
		}



		public function listar_usuarios_pasados () {
			$pepe="SELECT usuario FROM log WHERE tiempo = 500 and navegación= „plena‟ or tiempo =
1000 and navegación= „plena‟ or tiempo=200 and navegación= „basica‟";
                    return $this->objConnect->ConvConsultaObjeto($pepe);
		//codigo aqui
		}
public function eliminarUsuario($departamento,$usuario) {

		$pepe= "DELETE FROM loguiar WHERE usuario='$usuario' and departamento='$departamento'";
//

                return  $this->objConnect->ConsultarBD($pepe);
			//codigo aqui
		}
public function eliminarDepartamento($departamento) {
    $departamento=utf8_encode($departamento);
    $pepe= "DELETE FROM departamento WHERE nombredepartamento='$departamento'";
//

                return  $this->objConnect->ConsultarBD($pepe);
			//codigo aqui
		}
public function eliminarEstacion($estacion) {
    $estacion=utf8_encode($estacion);
		$pepe= "DELETE FROM estacion WHERE nombreubicacionnickdepartamento='$estacion'";
//

                return  $this->objConnect->ConsultarBD($pepe);
			//codigo aqui
		}
                public function eliminarEstado($estacion) {

               $estacion=utf8_encode($estacion);
		$pepe= "DELETE FROM estadoobjetos WHERE nombreestado='$estacion'";
//

                return  $this->objConnect->ConsultarBD($pepe);
			//codigo aqui
		}
   public function eliminarMarca($marca) {
       $marca=utf8_encode($marca);
		$pepe= "DELETE FROM marcaobjetos WHERE nombremarca='$marca'";
//

                return  $this->objConnect->ConsultarBD($pepe);
			//codigo aqui
		}
                 public function eliminarTipo($tipo) {
                     $tipo=utf8_encode($tipo);
		$pepe= "DELETE FROM tipoobjetos WHERE nombretipoobjeto='$tipo'";
//

                return  $this->objConnect->ConsultarBD($pepe);
			//codigo aqui
		}
                public function eliminarComponente($componente) {

               $componente=utf8_encode($componente);
		$pepe= "DELETE FROM objetos WHERE numeroinventario='$componente'";
//

                return  $this->objConnect->ConsultarBD($pepe);
			//codigo aqui
		}
}
?>
