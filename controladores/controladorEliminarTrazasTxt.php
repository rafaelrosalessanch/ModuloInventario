<?php
//Creamos el archivo datos.txt
//ponemos tipo 'a' para añadir lineas sin borrar
include '../modelo/ModeloLog.php';
$obj=new ModeloLog();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero=$_POST["numero"];
    $count = count($numero);
    if($count==0){
        echo '<script language="javascript" type="text/javascript">
            alert("Seleccione una o varias trazas a eliminar")
history.go(-1);
</script>';
    }
 else {


$nombre_fichero = '/home/www/app/informatica/activosinformaticos/trazasYlog/trazas.txt';

if (file_exists($nombre_fichero)) {
   $file=fopen("/home/www/app/informatica/activosinformaticos/trazasYlog/trazas.txt","a") or die("Problemas");
//  //vamos añadiendo el contenido
    $mostrar=$obj->mostrar_trazas();
     foreach ($mostrar as $i) {
         for ($ii = 0; $ii < $count; $ii++) {
         if($numero[$ii]==$i->idtraza){
        $usuario=$i->usuario;
        $accion=$i->tipo_accion;
              $tipocomponente=$i->tipocomponente;
        $numeroinventario=$i->numeroinventario;
        $fecha=$i->fecha_accion;
$resultadoo=$i->retorno;
fputs($file,"Usuario:");
  fputs($file,"$usuario");
  fputs($file,"          ");
  fputs($file,"Acción:");
fputs($file,"$accion");
fputs($file,"          ");
  fputs($file,"Tipo de componente:");
fputs($file,"$tipocomponente");
fputs($file,"          ");
fputs($file,"Num inventario:");
fputs($file,"$numeroinventario");
fputs($file,"          ");

fputs($file,"Fecha y hora:");
fputs($file,"$fecha");
fputs($file,"          ");
fputs($file,"\n");
}}}

  fclose($file);
} else {
   $file=fopen("/home/www/app/informatica/activosinformaticos/trazasYlog/trazas.txt","a") or die("Problemas");
  //vamos añadiendo el contenido
  fputs($file,"Registro de Trazas eliminadas");
  fputs($file,"\n");
  fputs($file,"________________________________________________________________________________________");
fputs($file,"\n");
  fclose($file);

    $file=fopen("/home/www/app/informatica/activosinformaticos/trazasYlog/trazas.txt","a") or die("Problemas");
//  //vamos añadiendo el contenido
    $mostrar=$obj->mostrar_trazas();
     foreach ($mostrar as $i) {
         for ($ii = 0; $ii < $count; $ii++) {
         if($numero[$ii]==$i->idtraza){
        $usuario=$i->usuario;
        $accion=$i->tipo_accion;
              $tipocomponente=$i->tipocomponente;
        $numeroinventario=$i->numeroinventario;
        $fecha=$i->fecha_accion;
$resultadoo=$i->retorno;
fputs($file,"Usuario:");
  fputs($file,"$usuario");
  fputs($file,"          ");
  fputs($file,"Acción:");
fputs($file,"$accion");
fputs($file,"          ");
  fputs($file,"Tipo de componente:");
fputs($file,"$tipocomponente");
fputs($file,"          ");
fputs($file,"Num inventario:");
fputs($file,"$numeroinventario");
fputs($file,"          ");
fputs($file,"Fecha y hora:");
fputs($file,"$fecha");
fputs($file,"          ");
fputs($file,"\n");
}}}
 
  fclose($file);
  
  }
    for ($i = 0; $i < $count; $i++) {

        $obj->eliminarTrazas($numero[$i]);
    }
}
 echo '<script language="javascript" type="text/javascript">
            alert("Trazas eliminadas correctamente")
history.go(-1);
</script>';}
  ?>