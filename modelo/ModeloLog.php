<?php

include_once 'connect.php';

class ModeloLog {

    private $objConnect; //Connect es la clase que permite el trabajo con la Base de Dato

    public function __construct() {
        $this->objConnect = new Connect();               //instanciar la clase connect
    }

    public function registrar_log_bd($marca, $modelo, $numeroserie, $numeroinventario, $estado, $observaciones, $tipocomponente) {
        $marc = utf8_encode($marca);
        $estad = utf8_encode($estado);
        $observacione = utf8_encode($observaciones);
        $tipocomponent = utf8_encode($tipocomponente);
        $pepe = "insert into componente (marca,modelo,numeroserie,numeroinventario,estado,observaciones,tipocomponente)values('$marc','$modelo','$numeroserie','$numeroinventario','$estad','$observacione','$tipocomponent')";
//                 
//
        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }

    public function registrar_trazas_componentes($tipocomponente, $marca, $numeroinventario, $numeroserie, $fecha, $usuario, $entrada, $asignado_a, $asignado_desde,$retorno) {
        $marc = utf8_encode($marca);
        $usuari = utf8_encode($usuario);
        $asignado_ = $asignado_a;
        $asignado_desd = utf8_encode($asignado_desde);
        $tipocomponent = utf8_encode($tipocomponente);
        $pepe = "insert into trazascomponentes (tipocomponente,marca,numeroinventario,fecha_accion,usuario,tipo_accion,asignado_a,asignado_desde,retorno)values('$tipocomponent','$marc','$numeroinventario','$fecha','$usuari','$entrada','$asignado_','$asignado_desd','$retorno')";
//
//
        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }

    public function insertar_periferico($mouse, $teclado, $bocinas, $lectorcd, $quemadorcd, $lectordvd, $quemadordvd, $objeto, $fuente) {

        $pepe = "insert into perifericos (mouse,teclado,bocinas,lectorcd,quemadorcd,lectordvd,quemadordvd,idobjeto,fuente)values('$mouse','$teclado','$bocinas','$lectorcd','$quemadorcd','$lectordvd','$quemadordvd','$objeto','$fuente')";
//
//
        return $this->objConnect->ConsultarBD($pepe);
    }

    public function insertar_ram($tiporamm, $capacidadramm, $numeroinventariocomponentee) {

        $pepe = "insert into ram (tiporam,capacidad,idobjeto)values('$tiporamm','$capacidadramm','$numeroinventariocomponentee')";
//
//
        return $this->objConnect->ConsultarBD($pepe);
    }

     public function insertar_numero_serie_board($activo,$departamento) {

        $pepe = "UPDATE objetos SET numeroserieboard='$departamento' where numeroinventario='$activo'";
//

        return $this->objConnect->ConsultarBD($pepe);
    }

    public function insertar_cpu($tipocpuu, $seriecpuu, $velocidadcpuu, $numeroinventariocomponentee) {
        $pepe = "insert into cpu (marca,numeroseriecpu,velocidadcpu,idobjeto)values('$tipocpuu','$seriecpuu','$velocidadcpuu','$numeroinventariocomponentee')";
//
//
        return $this->objConnect->ConsultarBD($pepe);
    }

    public function insertar_hdd($tipohddd, $seriehddd, $capacidadhddd, $numeroinventariocomponentee) {
        $pepe = "insert into hd (marcadiscoduro,numeroseriediscoduro,capacidaddiscoduro,idobjeto)values('$tipohddd','$seriehddd','$capacidadhddd','$numeroinventariocomponentee')";
//
//
        return $this->objConnect->ConsultarBD($pepe);
    }

    public function insertar_login_administracion($numero, $usuario) {
        $pepe = "UPDATE loginadministracion SET estado=$numero where usuario='$usuario'";
//

        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }

    public function cambiarcontrasena($usuario, $contrasenanueva) {
        $usuari = utf8_encode($usuario);
        $contrasenanuev = utf8_encode($contrasenanueva);
        $pepe = "UPDATE loguiar SET contrasena='$contrasenanuev' where usuario='$usuari'";
//

        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }

    public function cambiarcomponente($numeroinventario, $modelo, $numserie, $observaciones, $numinventario, $marca, $estado) {
        $marc = $marca;
        $estad = $estado;
        $observacione = $observaciones;
        $modelo = $modelo;
        $pepe = "UPDATE objetos SET modelo='$modelo', numserie='$numserie', observaciones='$observacione', numeroinventario='$numinventario', marca='$marc', estado='$estad' where numeroinventario='$numeroinventario'";
//

        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }

    public function modificarUsuario($usuarioseleccionado,$nombreusuario, $departamento, $contrasena, $privilegios,$estado,$jefe) {
       


        $pepe = "UPDATE loguiar SET usuario='$nombreusuario',contrasena='$contrasena',departamento='$departamento',administracion='$privilegios',jefes='$jefe',estado='$estado' where usuario='$usuarioseleccionado'";
//

        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }

    public function modificarEstacion($nombreestacionnueva, $ubicacion, $trabajador, $departamento, $estacion, $aca) {
        $nombreestacionnuev = $nombreestacionnueva;
        $ubicacio = $ubicacion;
        $trabajado = $trabajador;
        $departament = $departamento;
        $estacio = $estacion;
        $ac = $aca;
        $pepe = "UPDATE estacion SET nombreestacion='$nombreestacionnuev',ubicacion='$ubicacio',nick='$trabajado',departamento='$departament', nombreubicacionnickdepartamento='$ac' where nombreubicacionnickdepartamento='$estacio'";
//

        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }

    public function modificarEstacionotro($estacion, $aca) {
        $estacio = $estacion;
        $ac = utf8_encode($aca);
        $pepe = "UPDATE estacion SET nombreubicacionnickdepartamento='$ac' where nombreubicacionnickdepartamento='$estacio'";
//

        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }

    public function modificarDepartamento($nombredepartamento, $nuevonombredepartamento, $nuevaubicaciondepartamento, $nuevaareadepartamento) {
        $nombredepartament = $nombredepartamento;
        $nuevonombredepartament = $nuevonombredepartamento;
        $nuevaubicaciondepartament = $nuevaubicaciondepartamento;
        $nuevaareadepartament = $nuevaareadepartamento;
        $pepe = "UPDATE departamento SET nombredepartamento='$nuevonombredepartament',ubicaciondepartamento='$nuevaubicaciondepartament',area='$nuevaareadepartament' where nombredepartamento='$nombredepartament'";
//

        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }

    public function modificarmarca($NombreMarca, $componentePertenece) {
        $pepe = "UPDATE marcaobjetos SET componentepertenece='$componentePertenece'where nombremarca='$NombreMarca'";
//

        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }

//               public function mostrar_marca_a_desvincular () {
//		$pepe="SELECT componentepertenece FROM marcaobjetos where";
//		return $this->objConnect->ConvConsultaObjeto($pepe);
//		//codigo aqui
//		}
    public function insertarUsuario($usuario, $contraseña, $departamento, $privilegios,$jefe,$estado) {

//               $pasar=utf8_decode($usuario);
        $user = $usuario;
        $password = $contraseña;
        $depa = $departamento;

        $pepe = "insert into loguiar (usuario,contrasena,departamento,administracion,jefes,estado)values('$user','$password','$depa','$privilegios','$jefe','$estado')";
//
//
        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }


 public function insertarUsuarioglobal($nombre,$apellidos,$email,$usuario, $contraseña) {
        $pepe = "insert into usuariosglobales (nombreusuarioglobal,apellidosusuarioglobal,emailusuarioglobal,usuariousuarioglobal,contrasenausuarioglobal)values('$nombre','$apellidos','$email','$usuario','$contraseña')";
//
//
        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }
    public function insertarUsuarioJefes($usuario, $contraseña, $departamento, $privilegios) {

//               $pasar=utf8_decode($usuario);
        $user = $usuario;
        $password = $contraseña;
        $depa = $departamento;

        $pepe = "insert into loguiar (usuario,contrasena,departamento,administracion,jefes)values('$user','$password','$depa','Invitado','$privilegios')";
//
//
        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }

    public function insertar_Atributos($nombremarca, $nombretipo, $nombreestado) {
        $bandera1 = TRUE;
        $bandera2 = TRUE;
        $bandera3 = TRUE;
        if ($nombremarca != NULL) {
            $marc = $nombremarca;
            $pepe = "insert into marcaobjetos (nombremarca)values('$marc')";
            $bandera1 = $this->objConnect->ConsultarBD($pepe);
        }
        if ($nombretipo != NULL) {
            $tip = $nombretipo;
            $pepe = "insert into tipoobjetos (nombretipoobjeto)values('$tip')";
            $bandera2 = $this->objConnect->ConsultarBD($pepe);
        }
        if ($nombreestado != NULL) {
            $esta = $nombreestado;
            $pepe = "insert into estadoobjetos (nombreestado)values('$esta')";
            $bandera3 = $this->objConnect->ConsultarBD($pepe);
        }
        if ($bandera1 == FALSE)
            return FALSE;
        if ($bandera2 == FALSE)
            return FALSE;
        if ($bandera3 == FALSE)
            return FALSE;

        return TRUE;
    }

    public function insertar_Atributos_Computadora($nombretipocpu, $nombrevelocidadcpu, $nombremarcahdd, $nombrecapacidadhdd, $nombretiporam, $nombrecapacidadram) {
        $bandera1 = TRUE;
        $bandera2 = TRUE;
        $bandera3 = TRUE;
        $bandera4 = TRUE;
        $bandera5 = TRUE;
        $bandera6 = TRUE;
        if ($nombretipocpu != NULL) {
            $nombretipocp = $nombretipocpu;
            $pepe = "insert into tipocpu (nombretipocpu)values('$nombretipocp')";
            $bandera1 = $this->objConnect->ConsultarBD($pepe);
        }
        if ($nombrevelocidadcpu != NULL) {
            $nombrevelocidadcp = $nombrevelocidadcpu;
            $pepe = "insert into velocidadcpu (nombrevelocidadcpu)values('$nombrevelocidadcp')";
            $bandera2 = $this->objConnect->ConsultarBD($pepe);
        }
        if ($nombremarcahdd != NULL) {
            $nombremarcahd = $nombremarcahdd;
            $pepe = "insert into marcahdd (nombremarcahdd)values('$nombremarcahd')";
            $bandera3 = $this->objConnect->ConsultarBD($pepe);
        }
        if ($nombrecapacidadhdd != NULL) {
            $nombrecapacidadhd = $nombrecapacidadhdd;
            $pepe = "insert into capacidadhdd (capacidadhdd)values('$nombrecapacidadhd')";
            $bandera4 = $this->objConnect->ConsultarBD($pepe);
        }
        if ($nombretiporam != NULL) {
            $nombretipora = $nombretiporam;
            $pepe = "insert into tiporam (nombretiporam)values('$nombretipora')";
            $bandera5 = $this->objConnect->ConsultarBD($pepe);
        }
        if ($nombrecapacidadram != NULL) {
            $nombrecapacidadra = $nombrecapacidadram;
            $pepe = "insert into capacidadram (capacidadram)values('$nombrecapacidadra')";
            $bandera6 = $this->objConnect->ConsultarBD($pepe);
        }




        if ($bandera1 == FALSE)
            return FALSE;
        if ($bandera2 == FALSE)
            return FALSE;
        if ($bandera3 == FALSE)
            return FALSE;
        if ($bandera4 == FALSE)
            return FALSE;
        if ($bandera5 == FALSE)
            return FALSE;
        if ($bandera6 == FALSE)
            return FALSE;
        return TRUE;
    }

    public function insertarUsuariologeados($usuario) {
        $pepe = "insert into logeados (usuario)values('$usuario')";
//
//
        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }

    public function consultar_departamento_login_User($usuario) {
        $pepe = "SELECT departamento FROM login where usuario='$usuario'";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }

    public function consultar_estado_usuario() {
        $pepe = "SELECT usuario FROM loginadministracion where estado='1'";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }

    public function consultar_contrasena_usuario($usuario) {
        $pepe = "SELECT contrasena FROM loguiar where usuario='$usuario'";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
    public function consultarUsuarioglobal($usuario) {
        $pepe = "SELECT usuariousuarioglobal FROM usuariosglobales where usuariousuarioglobal='$usuario'";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
    
       public function consultarUsuariogloball($usuario) {
        $pepe = "SELECT contrasenausuarioglobal FROM usuariosglobales where usuariousuarioglobal='$usuario'";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }

    public function mostrar_departamentos() {
        $pepe = "SELECT * FROM departamento ORDER BY nombredepartamento";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }

      public function mostrar_ubicacion() {
        $pepe = "SELECT * FROM ubicacion ORDER BY nombreubicacion";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
  public function mostrar_cpu() {
        $pepe = "SELECT * FROM cpu ORDER BY marca";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
    public function mostrar_hdd() {
        $pepe = "SELECT * FROM hd ORDER BY marcadiscoduro";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
  public function mostrar_trazas() {
        $pepe = "SELECT * FROM trazascomponentes ORDER BY fecha_accion";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
     public function mostrar_accion_trazas() {
        $pepe = "SELECT * FROM accionestrazas";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
    public function mostrar_vicedirecciones() {
        $pepe = "SELECT * FROM vicedirecciones";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }

//                   public function mostrar_tipocpu() {
//		$pepe="SELECT * FROM tipocpu";
//		return $this->objConnect->ConvConsultaObjeto($pepe);
//		//codigo aqui
//		}

    public function mostrar_estaciones() {
        $pepe = "SELECT * FROM estacion ORDER BY nombreestacion";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }

    public function mostrar_acordion() {
        $pepe = "SELECT * FROM acordion";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }

    public function mostrar_usuarios_departamento($departamento) {
        $pepe = "SELECT usuario FROM loguiar where departamento='$departamento'and administracion!='superuser'and administracion!='Super administrador'";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }

    public function mostrar_usuarios_todos() {
        $pepe = "SELECT usuario FROM loguiar where  administracion!='superuser'and administracion!='Super administrador'";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }

     public function mostrar_usuarios_todoos() {
        $pepe = "SELECT * FROM loguiar";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
    public function mostrar_login($usario) {
        $pepe = "SELECT * FROM loguiar where usuario='$usario'";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }

    public function mostrar_tipocpu() {
        $pepe = "SELECT * FROM tipocpu ORDER BY nombretipocpu ";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }

    public function mostrar_velocidadcpu() {
        $pepe = "SELECT * FROM velocidadcpu ORDER BY nombrevelocidadcpu ";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }

    public function mostrar_marcahdd() {
        $pepe = "SELECT * FROM marcahdd ORDER BY nombremarcahdd ";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }

    public function mostrar_capacidadhdd() {
        $pepe = "SELECT * FROM capacidadhdd ORDER BY capacidadhdd ";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }

    public function mostrar_capacidadram() {
        $pepe = "SELECT * FROM capacidadram";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }

    public function mostrar_tiporam() {
        $pepe = "SELECT * FROM tiporam ORDER BY nombretiporam ";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
     public function mostrar_tiporam_fpdf($id) {
        $pepe = "SELECT tiporam,capacidad FROM ram where idobjeto='$id'  ";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
 public function mostrar_perifericos_fpdf($id) {
        $pepe = "SELECT mouse,teclado,bocinas,lectorcd,quemadorcd,lectordvd,quemadordvd FROM perifericos where idobjeto='$id'  ";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }

       public function mostrar_discoduro_fpdf($id) {
        $pepe = "SELECT marcadiscoduro,numeroseriediscoduro,capacidaddiscoduro FROM hd where idobjeto='$id'  ";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
       public function mostrar_cpu_fpdf($id) {
        $pepe = "SELECT marca,numeroseriecpu,velocidadcpu FROM cpu where idobjeto='$id'  ";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
    public function mostrar_estados() {
        $pepe = "SELECT * FROM estadoobjetos ";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }

    public function mostrar_loginAdministracion($usario) {
        $pepe = "SELECT * FROM loginadministracion where usuario='$usario'";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }

    public function mostrar_departamentoparaseleccion() {
        $pepe = "SELECT nombre FROM departamento where iddepartamento=";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }

    public function mostrar_estacion_de_trabajo() {
        $pepe = "SELECT * FROM estacion ORDER BY nombreestacion";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }

    public function mostrar_tipo_de_componente() {
        $pepe = "SELECT * FROM tipoobjetos ORDER BY nombretipoobjeto";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }

    public function mostrar_marca_de_todos_componentes() {
        $pepe = "SELECT * FROM marcaobjetos ORDER BY nombremarca ";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }

    public function mostrar_todos_los_componentes() {
        $pepe = "SELECT * FROM objetos ORDER BY tipo";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
     public function mostrar_todos_los_componentes_id($id) {
        $pepe = "SELECT marca,modelo,numeroserieboard FROM objetos where estacion='$id' and tipo='Computadora' ";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
     public function mostrar_todos_los_componentes_iddd($estado,$tipo,$depa) {
        $pepe = "SELECT tipo,marca,numserie,numeroinventario,departamento FROM objetos where estado='$estado' and tipo='$tipo' and departamento='$depa' ";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
      public function mostrar_todos_los_componentes_idddd($estado,$tipo) {
        $pepe = "SELECT tipo,marca,numserie,numeroinventario,departamento FROM objetos where estado='$estado' and tipo='$tipo' ";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
     public function mostrar_todos_los_componentes_iddddd($estado) {
        $pepe = "SELECT tipo,marca,numserie,numeroinventario,departamento FROM objetos where estado='$estado' ";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
      public function mostrar_todos_los_componentes_idddddd($tipo) {
        $pepe = "SELECT tipo,marca,numserie,numeroinventario,departamento FROM objetos where tipo='$tipo' ";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
        public function mostrar_todos_los_componentes_iddddddd($depa) {
        $pepe = "SELECT tipo,marca,numserie,numeroinventario,departamento FROM objetos where departamento='$depa' ";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
     public function mostrar_todos_los_componentes_idddddddd($estado,$tipo,$depa) {
        $pepe = "SELECT tipo,marca,numserie,numeroinventario,departamento FROM objetos where estado='$estado' and tipo='$tipo' and departamento='$depa' ";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
     public function mostrar_todos_los_componentes_iddddddddd($estado,$depa) {
        $pepe = "SELECT tipo,marca,numserie,numeroinventario,departamento FROM objetos where tipo='$estado' and departamento='$depa' ";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
     public function mostrar_todos_los_componentes_idddddddddd($estado,$depa) {
        $pepe = "SELECT tipo,marca,numserie,numeroinventario,departamento FROM objetos where estado='$estado' and departamento='$depa' ";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
     public function mostrar_todos_los_componentes_iddddddddddddd($marca,$estado) {
        $pepe = "SELECT tipo,marca,numserie,numeroinventario,departamento FROM objetos where estado='$estado' and marca='$marca' ";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
    public function mostrar_todos_los_componentes_idddddddddddddd($marca,$estadooo,$tipooo) {
        $pepe = "SELECT tipo,marca,numserie,numeroinventario,departamento FROM objetos where marca='$marca' and tipo='$tipooo' and estado='$estadooo' ";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
    public function mostrar_todos_los_componentes_iddddddddddddddd($marca,$estadooo,$tipooo,$depa) {
        $pepe = "SELECT tipo,marca,numserie,numeroinventario,departamento FROM objetos where estado='$estado' and marca='$marca' and tipo='$tipooo' and departamento='$depa'";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
    public function mostrar_todos_los_componentes_idddddddddddddddd($marca,$tipooo,$depa) {
        $pepe = "SELECT tipo,marca,numserie,numeroinventario,departamento FROM objetos where  marca='$marca' and tipo='$tipooo' and departamento='$depa'";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
   

    public function mostrar_todos_los_componentes_idddddddddddd($marca) {
        $pepe = "SELECT tipo,marca,numserie,numeroinventario,departamento FROM objetos where marca='$marca' ";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
     public function mostrar_todos_los_componentes_iddddddddddd() {
        $pepe = "SELECT tipo,marca,numserie,numeroinventario,departamento FROM objetos";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
  public function mostrar_todos_los_componentes_id1($id) {
        $pepe = "SELECT * FROM objetos where estacion='$id' and tipo='Computadora' ";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
     public function mostrar_todos_los_componentes_id11($id) {
        $pepe = "SELECT tipo,marca,modelo,numeroinventario,numserie FROM objetos where estacion='$id' and tipo!='Computadora' ";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }
    public function mostrar_todos_los_usuarios() {
        $pepe = "SELECT * FROM loguiar";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }

    public function listar_usuarios_pasados() {
        $pepe = "SELECT usuario FROM log WHERE tiempo = 500 and navegación= „plena‟ or tiempo =
1000 and navegación= „plena‟ or tiempo=200 and navegación= „basica‟";
        return $this->objConnect->ConvConsultaObjeto($pepe);
        //codigo aqui
    }

    public function eliminarUsuario($usuario) {

        $pepe = "DELETE FROM loguiar WHERE usuario='$usuario'";
//

        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }

    public function eliminar_tipo_cpu($tipocpu) {

        $pepe = "DELETE FROM tipocpu WHERE nombretipocpu='$tipocpu'";
//

        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }

    public function eliminar_marca_hdd($marcahdd) {

        $pepe = "DELETE FROM marcahdd WHERE nombremarcahdd='$marcahdd'";
//

        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }

    public function eliminar_cpu($idcpu) {

        $pepe = "DELETE FROM cpu WHERE idcpu='$idcpu'";
//

        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }
     public function eliminar_hdd($idhdd) {

        $pepe = "DELETE FROM hd WHERE iddiscoduro='$idhdd'";
//

        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }
    public function eliminar_capacidad_hdd($capacidadhdd) {

        $pepe = "DELETE FROM capacidadhdd WHERE capacidadhdd='$capacidadhdd'";
//

        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }

    public function eliminar_tipo_ram($tiporam) {

        $pepe = "DELETE FROM tiporam WHERE nombretiporam='$tiporam'";
//

        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }

    public function eliminar_capacidad_ram($capacidadram) {

        $pepe = "DELETE FROM capacidadram WHERE capacidadram='$capacidadram'";
//

        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }

    public function eliminar_velocidad_cpu($velocidadcpu) {

        $pepe = "DELETE FROM velocidadcpu WHERE nombrevelocidadcpu='$velocidadcpu'";
//

        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }

    public function eliminarDepartamento($departamento) {
        $departamento = $departamento;
        $pepe = "DELETE FROM departamento WHERE nombredepartamento='$departamento'";
//

        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }

    public function eliminarEstacion($estacion) {
        $estacion = $estacion;
        $pepe = "DELETE FROM estacion WHERE nombreubicacionnickdepartamento='$estacion'";
//

        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }

    public function eliminarEstado($estacion) {

        $estacion = $estacion;
        $pepe = "DELETE FROM estadoobjetos WHERE nombreestado='$estacion'";
//

        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }

    public function eliminarMarca($marca) {
        $marca = $marca;
        $pepe = "DELETE FROM marcaobjetos WHERE nombremarca='$marca'";
//

        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }

    public function eliminarTrazas($id) {

        $pepe = "DELETE FROM trazascomponentes WHERE idtraza='$id'";
//

        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }
    public function eliminarTipo($tipo) {
        $tipo = $tipo;
        $pepe = "DELETE FROM tipoobjetos WHERE nombretipoobjeto='$tipo'";
//

        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }

    public function eliminarComponente($componente) {

        $componente = utf8_encode($componente);
        $pepe = "DELETE FROM objetos WHERE numeroinventario='$componente'";
//

        return $this->objConnect->ConsultarBD($pepe);
        //codigo aqui
    }

}
?>
