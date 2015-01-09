<?php
require('../fpdf/fpdf.php');
include_once '../modelo/ModeloLog.php';
session_start();
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
   
    $this->Cell(30,10,'Modelo del Expediente T�cnico',0,0,'C');
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
    public  function quitar_tildes($cadena) {
$no_permitidas= array ("á","é","í","ó","ú","�?","É","�?","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã�?","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã�?","Ã„","Ã‹");
$permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
$texto = str_replace($no_permitidas, $permitidas ,$cadena);
return $texto;
}
function BasicTable($header,$fila2, $data,$estacion,$numinventario,$departamento,$numserie)
{
    // Cabecera
    $this->SetFont('Arial','B',12);
    foreach($header as $col)
        $this->Cell(62,15,$col,1,0,'C');
    $this->SetFont('');
    $this->Ln();
    
    // Datos
    $this->SetFont('Arial','B',10);
    $this->SetFont('');
    $estacion= utf8_decode($estacion);
     $this->Cell(60,-6,$estacion,-30,0,'C');
     $this->Cell(65,-6,$numinventario.'                    '.$numserie,-30,0,'C');
     $departamento= utf8_decode($departamento);
     $this->Cell(60,-6,$departamento,-30,0,'C');
$this->Ln(0);
  
    foreach($fila2 as $col){
        
 $this->SetFont('Arial','B',12);
        $this->Cell(62,5,$col,1,0,'C');}
         $this->SetFont('Arial','B',8);
      $this->SetFont('');
    $this->Ln();
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(62,6,$col,1);
        $this->Ln();
    }
}

function BasicTable1($header1,$fila2, $data2)
{
       // Logo
   $this->SetFont('Arial','B',12);
$this->Cell(80);

    $this->Cell(30,10,'Caracter�sticas T�cnicas',10,0,'C');
    // Salto de línea
    $this->Ln(8);
    // Cabecera
   $this->SetFillColor(150,25,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.2);
//    $this->SetFont('','B');
    // Cabecera
    $w = array(29, 29,29, 41, 29, 29);
    for($i=0;$i<count($header1);$i++)
    if($i!=3){
        $this->Cell($w[$i],7,$header1[$i],1,0,'C',true);}  else {
                 $this->Cell($w[$i],12,$header1[$i],1,0,'C',true);
            }
    $this->Ln();
    // Restauración de colores y fuentes
    $this->SetFillColor(0,0,0);
    $this->SetTextColor(0);
         // Logo
   $this->SetFont('Arial','B',8);
    $this->SetFont('');

    // Datos
    foreach($fila2 as $row)
    {
        $this->Ln(0);
    
        foreach($row as $col)
            $this->Cell(29,5,$col,1);
        $this->Ln();
    }
    $this->Ln(-5);
    foreach($data2 as $row)
    {
        $this->Ln(-0.1);
    $this->Cell(128);
        foreach($row as $col)
            $this->Cell(29,5,$col,1);
        $this->Ln();
    }
}



function BasicTable2($header1,$fila3, $data3)
{
       // Logo
   $this->SetFont('Arial','B',12);
$this->Cell(80);

    $this->Cell(30,10,'Disco Duro',20,0,'C');
    // Salto de línea
    
    $this->Ln(8);
    // Cabecera
    foreach($fila3 as $col)
        $this->Cell(62,5,$col,1,0,'C');
       $this->SetFont('Arial','B',8);
    $this->SetFont('');
    $this->Ln();
    foreach($data3 as $row)
    {
        foreach($row as $col)
            $this->Cell(62,6,$col,1);
        $this->Ln();
    }
}

function BasicTable3($header1,$fila4, $fila5,$fila6,$fila7)
{
       // Logo
   $this->SetFont('Arial','B',12);
$this->Cell(80);

    $this->Cell(30,10,'Perif�ricos',10,0,'C');
    // Salto de línea
    $this->SetFont('');
    $this->Ln(8);
    // Cabecera
    foreach($fila4 as $col)
        $this->Cell(46.5,5,$col,1);
   
    $this->Ln();
   
        foreach($fila5 as $col)
             $this->Cell(46.5,5,$col,1);
        $this->Ln();
         foreach($fila6 as $col)
             $this->Cell(46.5,5,$col,1);
        $this->Ln();
         foreach($fila7 as $col)
             $this->Cell(46.5,5,$col,1);
        $this->Ln();
    }


function BasicTable4($header1,$fila8,$data4)
{
       // Logo
   $this->SetFont('Arial','B',12);
$this->Cell(80);

    $this->Cell(30,10,'Otros Datos:',10,0,'C');
    // Salto de línea

    $this->Ln(8);
    // Cabecera
    foreach($fila8 as $col){
        $col= utf8_decode($col);
        $this->Cell(37.2,5,$col,1,0,'C');}
  $this->SetFont('Arial','B',8);
   $this->SetFont('');
    $this->Ln();
    foreach($data4 as $row)
    {
        foreach($row as $col){
            $col= utf8_decode($col);
            $this->Cell(37.2,6,$col,1);}
        $this->Ln();
    }
}


function BasicTable5($fila9,$fila10)
{
       // Logo
 $this->Ln();
$this->SetFont('Arial','B',12);

    foreach($fila9 as $col)
        $this->Cell(31,5,$col,1,0,'C');

    $this->Ln();
    foreach($fila10 as $col)
        $this->Cell(31,5,$col,1,0,'C');

    $this->Ln();

}

// Una tabla más completa
//function ImprovedTable($header, $data)
//{
//    // Anchuras de las columnas
//    $w = array(40, 35, 45, 40);
//    // Cabeceras
//    for($i=0;$i<count($header);$i++)
//        $this->Cell($w[$i],7,$header[$i],1,0,'C');
//    $this->Ln();
//    // Datos
//    foreach($data as $row)
//    {
//        $this->Cell($w[0],6,$row[0],'LR');
//        $this->Cell($w[1],6,$row[1],'LR');
//        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
//        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
//        $this->Ln();
//    }
//    // Línea de cierre
//    $this->Cell(array_sum($w),0,'','T');
//}
//
//// Tabla coloreada
//function FancyTable($header, $data)
//{
//    // Colores, ancho de línea y fuente en negrita
//    $this->SetFillColor(255,0,0);
//    $this->SetTextColor(255);
//    $this->SetDrawColor(128,0,0);
//    $this->SetLineWidth(.3);
//    $this->SetFont('','B');
//    // Cabecera
//    $w = array(40, 35, 45, 40);
//    for($i=0;$i<count($header);$i++)
//        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
//    $this->Ln();
//    // Restauración de colores y fuentes
//    $this->SetFillColor(224,235,255);
//    $this->SetTextColor(0);
//    $this->SetFont('');
//    // Datos
//    $fill = false;
//    foreach($data as $row)
//    {
//        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
//        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
//        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
//        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
//        $this->Ln();
//        $fill = !$fill;
//    }
//    // Línea de cierre
//    $this->Cell(array_sum($w),0,'','T');
//}
}
$estacion=$_SESSION['estacion'];
$pdf = new PDF();
$obj=new ModeloLog();
// Títulos de las columnas
$departamento = explode("Departamento:",$estacion);
 $_SESSION['depaselecc']=$departamento[1];
     $_SESSION['depaseleccc']=$departamento[1];
                                        $esta = $estacion;
                                        $esta = explode("Estacion:", $esta);
                                        $esta = explode("Ubicacion:", $esta[1]);
$departamento=explode("Departamento:", $esta[1]);

$header = array('Computadora', '# Inventario        # Serie' , 'Ubicaci�n');
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
$fila4 = array('Rat�n (Mouse):', $Mouse, 'Lector CD:', $lectorcd);
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
$numserie=$i->numserie;
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
if($bandera==1){
$pdf->BasicTable($header,$fila2,$data,$esta[0],$numeroinventario,$departamento[1],$numserie);
$pdf->Ln();
$pdf->BasicTable1($header1,$data5,$data2);
$pdf->BasicTable2($header1,$fila3,$data3);
$pdf->BasicTable3($header1,$fila4,$fila5,$fila6,$fila7);
$pdf->BasicTable4($header1,$fila8,$data4);
$pdf->BasicTable5($fila9,$fila10);}  else {

}

//$pdf->AddPage();
//$pdf->ImprovedTable($header,$data);
//$pdf->AddPage();
//$pdf->FancyTable($header,$data);
$pdf->Output();

?>
















