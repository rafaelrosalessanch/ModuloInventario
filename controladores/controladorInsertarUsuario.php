   <?php
include_once '../modelo/ModeloLog.php';
   $name=$_POST['nombreusuario'];
   $name=  utf8_encode($name);
$apellidos=$_POST['apellidosusuario'];
$apellidos=utf8_encode($apellidos);
$ci=$_POST['ci'];
$cargo=$_POST['cargousuario'];
$cargo=utf8_encode($cargo);
$departamento=$_POST['opcionesestaciones'];
$departamento=utf8_encode($departamento);
$obj=new ModeloLog();
$mostrar=$obj->mostrar_departamentos();
foreach ($mostrar as $i) {
    if($i->nombredepartamento==$departamento){
        $numerodepa=$i->iddepartamento;
    }

}
if(strlen($numerodepa)==1){
$numerodepa='0'.$numerodepa;

}

 if (isset($_POST['submit'])) {

    if(is_uploaded_file($_FILES['fichero']['tmp_name'])) { // verifica haya sido cargado el archivo
        if(move_uploaded_file($_FILES['fichero']['tmp_name'], $_FILES['fichero']['name'])) { // se coloca en su lugar final

        }
    }

// A continuación el formulario
}
include_once '../modelo/ModeloLog.php';
$obj = new ModeloLog();
        $mostrarusuario=$obj->mostrar_usuarios();
        $bandera=0;
     foreach ($mostrarusuario as $i) {

            if ($i->ci == $ci) {
                $bandera=1;
            }}
            if($bandera!=1){


$conn  = pg_connect("user=postgres password=postgres dbname=identificacion host=localhost");
$data = file_get_contents( $_FILES['fichero']['name'] );
// Escape the binary data
$escaped = bin2hex( $data );
// Insert it into the database


pg_query( "INSERT INTO usuario (nombreusuario, fotousuario,departamento,codigobarra,apellidos,ci,cargo) VALUES ('$name',
decode('{$escaped}' , 'hex'),'$departamento','111111111111','$apellidos','$ci','$cargo')" );
pg_close($conn);
unlink($_FILES['fichero']['name']);
  $mostrarusuario=$obj->mostrar_usuarios();
        $bandera=0;
     foreach ($mostrarusuario as $i) {

            if ($i->codigobarra == '111111111111') {
//               $codigobarra='999'.$numerodepa.substr($ci, -5).$i->idusuario;
 $codigobarra=$i->ci.'1';
            }}
            $conn  = pg_connect("user=postgres password=postgres dbname=identificacion host=localhost");
            pg_query("UPDATE usuario SET codigobarra='$codigobarra'where codigobarra='111111111111'");
pg_close($conn);
header('location:../vistas/insertar usuario.php');
            }  else {
    header('location:../vistas/insertar usuario.php');
}
   ?>
