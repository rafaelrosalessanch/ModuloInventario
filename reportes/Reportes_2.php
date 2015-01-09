<?php
require('../fpdf/fpdf.php');
include_once '../modelo/ModeloLog.php';

class PDF extends FPDF
{

    function Header()
{
    // Logo
    $this->Image('../images/logoLogin.png',10,8,33);
    // Arial bold 15
     $this->Ln(20);
    $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(80);
    // Título

    $this->Cell(30,10,'Cantidad total de activos por tipos',0,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Cargar los datos
//function LoadData($file)
//{
//    // Leer las líneas del fichero
//    $lines = file($file);
//    $data = array();
//    foreach($lines as $line)
//        $data[] = explode(';',trim($line));
//    return $data;
//}

// Tabla simple

function BasicTable($header)
{
    // Cabecera
    $this->SetFont('Arial','B',12);
//    foreach($header as $col)
        $this->Cell(62,15,$header,1,0,'C');
    $this->SetFont('');
    $this->Ln();

    // Datos

}





}
$estacion=$_SESSION['estacion'];
$tipo=$_SESSION['tipoconsultaconsulta'];
$marca=$_SESSION['marcaconsultaconsulta'];
$estado=$_SESSION['estadoconsultaconsulta'];
$departamentoo=$_SESSION['departamentoconsultaconsulta'];
$pdf = new PDF();
$obj=new ModeloLog();
// Títulos de las columnas

                                        $esta = $estacion;
                                        $esta = explode("Estacion:", $esta);
                                        $esta = explode("Ubicacion:", $esta[1]);
$departamento=explode("Departamento:", $esta[1]);

$header = array('Computadora', '# Inventario', 'Ubicacion');
$header1 = array('CPU', 'Serie', 'Velocidad','Memorias','Tipo','Capacidad');
$data111 =$obj->mostrar_todos_los_componentes_id1($estacion);
foreach($data111 as $i)
    {
    if($i->tipo=='Computadora'){

$data6 =$obj->mostrar_perifericos_fpdf($i->numeroinventario);


}}
$Mouse='';
$lectorcd='';
$teclado='';
 $quemadorcd='';
  $bocinas='';
   $lectordvd='';
foreach($data6 as $i)
    {
    if($i->mouse=='mouse'){
        $Mouse='X';
    }
  if($i->lectorcd=='lectorcd'){
        $lectorcd='X';
    }
 if($i->teclado=='teclado'){
        $teclado='X';
    }
    if($i->quemadorcd=='quemadorcd'){
        $quemadorcd='X';
    }
     if($i->bocinas=='bocinas'){
        $bocinas='X';
    }
     if($i->lectordvd=='lectordvd'){
        $lectordvd='X';
    }
      if($i->quemadordvd=='quemadordvd'){
        $quemadordvd='X';
    }
    }

$fila2 = array('Marca:', 'Modelo:', 'Tarjeta N/S:');
$fila3 = array('Marca:', 'Serie:', 'Capacidad:');
$fila4 = array('Raton (Mouse):', $Mouse, 'Lector CD:', $lectorcd);
$fila5 = array('Teclado:', $teclado, 'Quemador CD:', $quemadorcd);
$fila6 = array('Bocinas (Speaker):', $bocinas, 'Lector  DVD:', $lectordvd);
$fila7 = array('', '', 'Quemador DVD:', $quemadordvd);
$fila8 = array('Dispositivo', 'Marca', 'Modelo','No Inventario','N/S');
$fila9 = array('Movimientos:', '', '','','','');
$fila10 = array('Fecha:', '', '','','','');
// Carga de datos


$data11 =$obj->mostrar_todos_los_componentes_id1($estacion);
$data =$obj->mostrar_todos_los_componentes_id($estacion);
foreach($data11 as $i)
    {
    if($i->tipo=='Computadora'){


$data2 =$obj->mostrar_tiporam_fpdf($i->numeroinventario);
$data5=$obj->mostrar_cpu_fpdf($i->numeroinventario);
$numeroinventario=$i->numeroinventario;
}}

foreach($data11 as $i)
    {
    if($i->tipo=='Computadora'){
$data3 =$obj->mostrar_discoduro_fpdf($i->numeroinventario);}



}
$bandera=0;
 $data4=$obj->mostrar_todos_los_componentes_id11($estacion);
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
foreach ($data11 as $ii){
if($ii->tipo=='Computadora'){
    $bandera=1;
}

}


$pdf->BasicTable($header);


//$pdf->Ln();
//$pdf->BasicTable1($header1,$data5,$data2);
//$pdf->BasicTable2($header1,$fila3,$data3);
//$pdf->BasicTable3($header1,$fila4,$fila5,$fila6,$fila7);
//$pdf->BasicTable4($header1,$fila8,$data4);
//$pdf->BasicTable5($fila9,$fila10);
//$pdf->AddPage();
//$pdf->ImprovedTable($header,$data);
//$pdf->AddPage();
//$pdf->FancyTable($header,$data);
$pdf->Output();

?>



























