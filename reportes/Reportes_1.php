<?php

require('../fpdf/fpdf.php');
include_once '../modelo/ModeloLog.php';
session_start();

class PDF extends FPDF {

    function Header() {
        // Logo
        $this->Image('../images/logoLogin.png', 10, 8, 33);
        // Arial bold 15
        $this->Ln(20);
        $this->SetFont('Arial', 'B', 12);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
//    $this->Cell(30,10,'Modelo del Expediente Tecnico',0,0,'C');
        // Salto de línea
        $this->Ln();
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
    public function quitar_tildes($cadena) {
        $no_permitidas = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "ñ", "À", "Ã", "Ì", "Ò", "Ù", "Ã™", "Ã ", "Ã¨", "Ã¬", "Ã²", "Ã¹", "ç", "Ç", "Ã¢", "ê", "Ã®", "Ã´", "Ã»", "Ã‚", "ÃŠ", "ÃŽ", "Ã”", "Ã›", "ü", "Ã¶", "Ã–", "Ã¯", "Ã¤", "«", "Ò", "Ã", "Ã„", "Ã‹");
        $permitidas = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "n", "N", "A", "E", "I", "O", "U", "a", "e", "i", "o", "u", "c", "C", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "u", "o", "O", "i", "a", "e", "U", "I", "A", "E");
        $texto = str_replace($no_permitidas, $permitidas, $cadena);
        return $texto;
    }

    function BasicTable($header, $fila2, $fila22,$fila21) {
        // Cabecera
        $this->SetFont('Arial', 'B', 8);
        foreach ($header as $col)
            $this->Cell(150);
        $this->Cell(40, 10, $col, 1, 0, 'C');
        $this->SetFont('');
        $this->Ln(0);

        // Datos
        $this->SetFont('Arial', 'B', 8);
        $this->SetFont('');

        $this->Ln(0);

        foreach ($fila2 as $col) {

            $this->SetFont('Arial', 'B', 8);
            $this->Cell(150, 5, $col, 1, 0);
        }
        $this->SetFont('Arial', 'B', 8);
        $this->SetFont('');
        $this->Ln();
        foreach ($fila22 as $col) {

            $this->SetFont('Arial', 'B', 8);
            $this->Cell(150, 5, $col, 1, 0);
        }
        $this->Ln(1);
         foreach ($fila21 as $col) {

            $this->SetFont('Arial', 'B', 8);
            $this->Cell(156.5);
             
            $this->Cell(180, 5, $col);
        }
        $this->SetFont('Arial', 'B', 8);
        $this->SetFont('');
        $this->Ln();
    }

    function BasicTable11($header, $fila2, $fila22, $fila222, $fila2222,$fila23,$fila24,$fila25,$fila26,$fila27,$fila28,$fila29,$fila30,$fila31) {
        $this->Ln();
        // Cabecera
        $this->SetFont('Arial', 'B', 8);
        foreach ($header as $col)
            $this->Cell(150);
        $this->Cell(40, 5, $col, 1, 0, 'C');
        $this->SetFont('');
        $this->Ln(0);


        // Datos


        $this->Ln(0);
 $this->Cell(5);
        foreach ($fila2 as $col) {

            $this->SetFont('Arial', 'B', 8);
            $this->Cell(145, 5, $col, 1, 0);
        }
        $this->SetFont('Arial', 'B', 8);
        $this->SetFont('');
        $this->Ln();
        $this->Cell(5);
        foreach ($fila22 as $col) {

            $this->SetFont('Arial', 'B', 8);
            $this->Cell(145, 5, $col, 1, 0);
        }
        $this->SetFont('Arial', 'B', 8);
        $this->SetFont('');
        $this->Ln();
        $this->Cell(5);
        foreach ($fila222 as $col) {

            $this->SetFont('Arial', 'B', 8);
            $this->Cell(48.3, 5, $col, 1, 0);
        }
        $this->Ln(-5);
        $this->SetFont('Arial', 'B', 8);
        foreach ($fila2222 as $col)
            $this->Cell(150);
        $this->Cell(40, 10, $col, 1, 0, 'C');
        $this->SetFont('');

$this->Ln(-5);
         foreach ($fila23 as $col)
     
        $this->Cell(5, 15, $col, 1, 0, 'INV');
        $this->SetFont('');

$this->SetFont('Arial', 'B', 5);
        $this->Ln(-6);
         foreach ($fila24 as $col)

         $this->Cell(5, 15, $col);
        $this->SetFont('');
$this->Ln();

$this->SetFont('Arial', 'B', 5);
        $this->Ln(-13.5);
         foreach ($fila25 as $col)

         $this->Cell(5, 15, $col);
        $this->SetFont('');
$this->Ln();

$this->SetFont('Arial', 'B', 5);
        $this->Ln(-13.5);
         foreach ($fila26 as $col)

         $this->Cell(5, 15, $col);
        $this->SetFont('');
$this->Ln();

$this->SetFont('Arial', 'B', 5);
        $this->Ln(-13.5);
         foreach ($fila27 as $col)

         $this->Cell(5, 15, $col);
        $this->SetFont('');
$this->Ln();

$this->SetFont('Arial', 'B', 5);
        $this->Ln(-13.5);
         foreach ($fila28 as $col)

         $this->Cell(5, 15, $col);
        $this->SetFont('');
$this->Ln();

$this->SetFont('Arial', 'B', 5);
        $this->Ln(-13);
         foreach ($fila29 as $col)

         $this->Cell(5, 15, $col);
        $this->SetFont('');
$this->Ln();

$this->SetFont('Arial', 'B', 5);
        $this->Ln(-13.5);
         foreach ($fila30 as $col)

         $this->Cell(5, 15, $col);
        $this->SetFont('');
$this->Ln();

$this->SetFont('Arial', 'B', 5);
        $this->Ln(-13.5);
         foreach ($fila31 as $col)

         $this->Cell(5, 15, $col);
        $this->SetFont('');
$this->Ln();
    }

    function BasicTable1($header1, $fila2, $data2) {
        // Logo
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(80);

        $this->Cell(30, 10, 'Caracteristicas Tecnicas', 10, 0, 'C');
        // Salto de línea
        $this->Ln(-5);
        // Cabecera
        $this->SetFillColor(150, 25, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(.2);
//    $this->SetFont('','B');
        // Cabecera
        $w = array(29, 29, 29, 41, 29, 29);
        for ($i = 0; $i < count($header1); $i++)
            if ($i != 3) {
                $this->Cell($w[$i], 7, $header1[$i], 1, 0, 'C', true);
            } else {
                $this->Cell($w[$i], 12, $header1[$i], 1, 0, 'C', true);
            }
        $this->Ln();
        // Restauración de colores y fuentes
        $this->SetFillColor(0, 0, 0);
        $this->SetTextColor(0);
        // Logo
        $this->SetFont('Arial', 'B', 8);
        $this->SetFont('');

        // Datos
        foreach ($fila2 as $row) {
            $this->Ln(0);

            foreach ($row as $col)
                $this->Cell(29, 5, $col, 1);
            $this->Ln();
        }
        $this->Ln(-5);
        foreach ($data2 as $row) {
            $this->Ln(-0.1);
            $this->Cell(128);
            foreach ($row as $col)
                $this->Cell(29, 5, $col, 1);
            $this->Ln();
        }
    }

    function BasicTable2($header1, $fila3, $data3) {
        // Logo
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(80);

        $this->Cell(30, 10, 'Disco Duro', 20, 0, 'C');
        // Salto de línea

        $this->Ln(8);
        // Cabecera
        foreach ($fila3 as $col)
            $this->Cell(62, 5, $col, 1, 0, 'C');
        $this->SetFont('Arial', 'B', 8);
        $this->SetFont('');
        $this->Ln();
        foreach ($data3 as $row) {
            foreach ($row as $col)
                $this->Cell(62, 6, $col, 1);
            $this->Ln();
        }
    }

    function BasicTable3($header1, $fila4, $fila5, $fila6, $fila7) {
        // Logo
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(80);

        $this->Cell(30, 10, 'Perifericos', 10, 0, 'C');
        // Salto de línea
        $this->SetFont('');
        $this->Ln(8);
        // Cabecera
        foreach ($fila4 as $col)
            $this->Cell(46.5, 5, $col, 1);

        $this->Ln();

        foreach ($fila5 as $col)
            $this->Cell(46.5, 5, $col, 1);
        $this->Ln();
        foreach ($fila6 as $col)
            $this->Cell(46.5, 5, $col, 1);
        $this->Ln();
        foreach ($fila7 as $col)
            $this->Cell(46.5, 5, $col, 1);
        $this->Ln();
    }

    function BasicTable4($fila8, $data4) {
        // Logo
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(80);

//    $this->Cell(30,10,'Otros Datos:',10,0,'C');
        // Salto de línea

        $this->Ln(-10);
        // Cabecera
          $i=0;
        foreach ($fila8 as $col) {
             $i=$i+1;
            if($i!=4){
                 if($i!=5){

            $this->Cell(38, 5, $col, 1, 0, 'C');}
        }
        if($i==4){
            $this->Cell(20, 5, $col, 1, 0, 'C');
        }
 if($i==5){
            $this->Cell(56, 5, $col, 1, 0, 'C');
        }
        }
        $this->SetFont('Arial', 'B', 8);
        $this->SetFont('');
        $this->Ln();
      
        foreach ($data4 as $row) {
            $i=0;
            foreach ($row as $col) {
                $i=$i+1;
                $col = utf8_decode($col);
                if($i!=4){

                 if($i!=5){
                $this->Cell(38, 5, $col, 1);}
            }
 if($i==4){
    $this->Cell(20, 5, $col, 1);
}
if($i==5){
            $this->Cell(56, 5, $col, 1);
        }
            }
            $this->Ln();
        }
    }

    function BasicTable5($fila9, $fila10, $fila11,$fila12,$fila13,$fila14,$fila15,$fila16,$fila17,$fila18,$fila19,$fila20,$fila32,$fila166) {
        // Logo
        $this->Ln();
        $this->SetFont('Arial', 'B', 8);
$this->Cell(60);
        foreach ($fila9 as $col)
            $this->Cell(100, 8, $col, 1, 0);

        $this->Ln();
        $this->Cell(60);
        foreach ($fila10 as $col)
            $this->Cell(100, 8, $col, 1, 0);

        $this->Ln();
        $this->Cell(60);
        foreach ($fila11 as $col)
            $this->Cell(100, 8, $col, 1, 0);
        $this->Ln();
        $this->Cell(60);
        foreach ($fila12 as $col)
            $this->Cell(130, 5, $col, 1, 0);
        $this->Ln();
        $this->Cell(60);
        foreach ($fila13 as $col)
            $this->Cell(20, 8, $col, 1, 0);
        $this->Ln(0);
        $this->Cell(120);
        foreach ($fila14 as $col)
            $this->Cell(70, 8, $col, 1, 0);
        $this->Ln(-29);
        $this->Cell(160);
        foreach ($fila15 as $col)
            $this->Cell(10, 4, $col, 1, 0);
        $this->Ln();
        $this->Cell(160);
        foreach ($fila166 as $col)
            $this->Cell(10, 4, $col, 1, 0);
        $this->Ln();
        $this->Cell(160);
        foreach ($fila15 as $col)
            $this->Cell(10, 4, $col, 1, 0);
        $this->Ln();
        $this->Cell(160);
        foreach ($fila16 as $col)
            $this->Cell(10, 4, $col, 1, 0);
         $this->Ln();
        $this->Cell(160);
        foreach ($fila15 as $col)
            $this->Cell(10, 4, $col, 1, 0);
        $this->Ln();
        $this->Cell(160);
        foreach ($fila16 as $col)
            $this->Cell(10, 4, $col, 1, 0);
        $this->Ln(-2.5);
        $this->Cell(130);
        foreach ($fila32 as $col)
            $this->Cell(10, 4, $col);
        $this->Ln(-7.5);
        $this->Cell(130);
        foreach ($fila32 as $col)
            $this->Cell(10, 4, $col);
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
$header = array('MOVIMIENTO DE');
$fila21=utf8_decode('MEDIOS BÁSICOS');
$fila21 = array($fila21);

$header1111 = array('TIPO DE MOVIMIENTO');
$estacion = $_SESSION['estacion'];
$pdf = new PDF();
$obj = new ModeloLog();
// Títulos de las columnas
if($estacion!=NULL){
$departamento = explode("Departamento:", $estacion);
//$_SESSION['depaselecc'] = $departamento[1];
//$_SESSION['depaseleccc'] = $departamento[1];
$esta = $estacion;
$esta = explode("Estacion:", $esta);
$esta = explode("Ubicacion:", $esta[1]);
$departamento = explode("Departamento:", $esta[1]);


$header1 = array('CPU', 'Serie', 'Velocidad', 'Memorias', 'Tipo', 'Capacidad');
$data111 = $obj->mostrar_todos_los_componentes_id1($estacion);
foreach ($data111 as $i) {
    if ($i->tipo == 'Computadora') {

        $data6 = $obj->mostrar_perifericos_fpdf($i->numeroinventario);
    }
}
$Mouse = '';
$lectorcd = '';
$teclado = '';
$quemadorcd = '';
$bocinas = '';
$lectordvd = '';
foreach ($data6 as $i) {
    if ($i->mouse == 'mouse') {
        $Mouse = 'X';
    }
    if ($i->lectorcd == 'lectorcd') {
        $lectorcd = 'X';
    }
    if ($i->teclado == 'teclado') {
        $teclado = 'X';
    }
    if ($i->quemadorcd == 'quemadorcd') {
        $quemadorcd = 'X';
    }
    if ($i->bocinas == 'bocinas') {
        $bocinas = 'X';
    }
    if ($i->lectordvd == 'lectordvd') {
        $lectordvd = 'X';
    }
    if ($i->quemadordvd == 'quemadordvd') {
        $quemadordvd = 'X';
    }
}


$fila4 = array('Raton (Mouse):', $Mouse, 'Lector CD:', $lectorcd);
$fila5 = array('Teclado:', $teclado, 'Quemador CD:', $quemadorcd);
$fila6 = array('Bocinas (Speaker):', $bocinas, 'Lector  DVD:', $lectordvd);
$fila7 = array('', '', 'Quemador DVD:', $quemadordvd);
$data11 = $obj->mostrar_todos_los_componentes_id1($estacion);
$data = $obj->mostrar_todos_los_componentes_id($estacion);
foreach ($data11 as $i) {
    if ($i->tipo == 'Computadora') {


        $data2 = $obj->mostrar_tiporam_fpdf($i->numeroinventario);
        $data5 = $obj->mostrar_cpu_fpdf($i->numeroinventario);
        $numeroinventario = $i->numeroinventario;
    }
}

foreach ($data11 as $i) {
    if ($i->tipo == 'Computadora') {
        $data3 = $obj->mostrar_discoduro_fpdf($i->numeroinventario);
    }
}
// Carga de datos
}
$prompt=$_SESSION["prompt"];
if($prompt==""||$prompt==NULL){
    $prompt="Enviado al taller";
}
$fila2 = array('ENTIDAD:');
$fila22=utf8_decode('DIRECCIÓN:');
$fila22 = array($fila22);
$fila3 = array('Marca:', 'Serie:', 'Capacidad:');
$area=utf8_decode('ÁREA:');
$fila222 = array($area, 'NOMBRE:', 'FIRMA:');
$fila2222 = array($prompt);
$des=utf8_decode('DESCRIPCIÓN');
$fila8 = array($des, 'MARCA', 'NS', 'NI', 'DEPARTAMENTO');
$fila9 = array('Hecho:');
$fila10 = array('Autorizado:');
$fila11 = array('Aprobado:');
$fila12 = array('COMPROBANTE DE OPERACIONES No:');
$fila13 = array('D', 'M', 'A');
$fila14 = array('No.');
$fila15 = array('D', 'M', 'A');
$fila166 = array(date("d        m         Y"), '', '');
$fila16 = array('', '', '');
$fila17 = array('D', 'M', 'A');
$fila18 = array('', '', '');
$fila19 = array('D', 'M', 'A');
$fila20 = array('', '', '');
$fila23 = array('');
$fila24 = array('R');
$fila25 = array('e');
$fila26 = array('c');
$fila27 = array('e');
$fila28 = array('p');
$fila29 = array('t');
$fila30 = array('o');
$fila31 = array('r');
$fila32 = array('Firma:');
$bandera = 0;
$estadooo = $_SESSION['estadoimprimirr'];
$tipooo = $_SESSION['tipoimprimirr'];
$depaaaa=$_SESSION['depaseleccc'];
$marca=$_SESSION['marcacomponenteregistrar'];

//$departamento = explode("Departamento:", $i->estacion);
//if (array_key_exists(1, $departamento)) {
//    if ($departamento[1] == $_SESSION['depaselecc']) {}}
if($marca!="Seleccionar"&&$estadooo=="Seleccionar"&&$tipooo=="Seleccionar"&&($depaaaa=="Todos"||$depaaaa=="Seleccionar")){
        $data4 = $obj->mostrar_todos_los_componentes_idddddddddddd($marca);
}

if($marca!="Seleccionar"&&$estadooo!="Seleccionar"&&$tipooo=="Seleccionar"&&($depaaaa=="Todos"||$depaaaa=="Seleccionar")){
        $data4 = $obj->mostrar_todos_los_componentes_iddddddddddddd($estadooo,$marca);
}
if($marca!="Seleccionar"&&$estadooo!="Seleccionar"&&$tipooo!="Seleccionar"&&$depaaaa=="Seleccionar"){
        $data4 = $obj->mostrar_todos_los_componentes_idddddddddddddd($marca,$estadooo,$tipooo);
}
if($marca!="Seleccionar"&&$estadooo!="Seleccionar"&&$tipooo!="Seleccionar"&&$depaaaa!="Seleccionar"&&depaaaa!="Todos"){
        $data4 = $obj->mostrar_todos_los_componentes_iddddddddddddddd($marca,$estadooo,$tipooo,$depaaaa);
}
if($marca!="Seleccionar"&&$estadooo=="Seleccionar"&&$tipooo!="Seleccionar"&&$depaaaa!="Seleccionar"){
        $data4 = $obj->mostrar_todos_los_componentes_idddddddddddddddd($marca,$tipooo,$depaaaa);
}
if($estadooo!="Seleccionar"&&$tipooo!="Seleccionar"&&$depaaaa!="Seleccionar"&&$marca=="Seleccionar"){
        $data4 = $obj->mostrar_todos_los_componentes_iddd($estadooo,$tipooo,$depaaaa);
}
if($estadooo=="Seleccionar"&&$tipooo=="Seleccionar"&&$depaaaa!="Seleccionar"&&$depaaaa!="Todos"&&$marca=="Seleccionar"){
       $data4 = $obj->mostrar_todos_los_componentes_iddddddd($depaaaa);
}
if($estadooo!="Seleccionar"&&$tipooo=="Seleccionar"&&$depaaaa!="Seleccionar"&&$depaaaa!="Todos"&&$marca=="Seleccionar"){
       $data4 = $obj->mostrar_todos_los_componentes_idddddddddd($estadooo,$depaaaa);

}
if($estadooo=="Seleccionar"&&$tipooo!="Seleccionar"&&$depaaaa!="Seleccionar"&&$depaaaa!="Todos"&&$marca=="Seleccionar"){
       $data4 = $obj->mostrar_todos_los_componentes_iddddddddd($tipooo,$depaaaa);

}
if($estadooo=="Seleccionar"&&$tipooo=="Seleccionar"&&$depaaaa=="Seleccionar"&&$marca=="Seleccionar"){
    $depaaaaa=$_SESSION['departamento'];
        $data4 = $obj->mostrar_todos_los_componentes_iddddddd($depaaaaa);
}
if($estadooo!="Seleccionar"&&$tipooo!="Seleccionar"&&$depaaaa=="Seleccionar"&&$marca=="Seleccionar"){
    $depaaaaaa=$_SESSION['departamento'];
        $data4 = $obj->mostrar_todos_los_componentes_idddddddd($estadooo,$tipooo,$depaaaaaa);
}
if($estadooo=="Seleccionar"&&$tipooo!="Seleccionar"&&$depaaaa=="Seleccionar"&&$marca=="Seleccionar"){
    $depaaaaaa=$_SESSION['departamento'];
        $data4 = $obj->mostrar_todos_los_componentes_iddddddddd($tipooo,$depaaaaaa);
}
if($estadooo!="Seleccionar"&&$tipooo=="Seleccionar"&&$depaaaa=="Seleccionar"&&$marca=="Seleccionar"){
    $depaaaaaaa=$_SESSION['departamento'];
        $data4 = $obj->mostrar_todos_los_componentes_idddddddddd($estadooo,$depaaaaaaa);
}
if($estadooo!="Seleccionar"&&$tipooo!="Seleccionar"&&$depaaaa=="Todos"&&$marca=="Seleccionar"){
        $data4 = $obj->mostrar_todos_los_componentes_idddd($estadooo,$tipooo);
}
if($estadooo!="Seleccionar"&&$tipooo=="Seleccionar"&&$depaaaa=="Todos"&&$marca=="Seleccionar"){
        $data4 = $obj->mostrar_todos_los_componentes_iddddd($estadooo);
}
if($estadooo=="Seleccionar"&&$tipooo!="Seleccionar"&&$depaaaa=="Todos"&&$marca=="Seleccionar"){
        $data4 = $obj->mostrar_todos_los_componentes_idddddd($tipooo);
}
if($estadooo=="Seleccionar"&&$tipooo=="Seleccionar"&&$depaaaa=="Todos"&&$marca=="Seleccionar"){
        $data4 = $obj->mostrar_todos_los_componentes_iddddddddddd();
}
//$_SESSION['estadoimprimirr']="Seleccionar";
//$_SESSION['tipoimprimirr']="Seleccionar";
//$_SESSION['marcacomponenteregistrar']="Seleccionar";
//$_SESSION['depaseleccc']="Seleccionar";
//$_SESSION['depaselecc']="Seleccionar";
//        $pdf->SetFont('Arial', '', 14);
        $pdf->AddPage();
//        foreach ($data11 as $ii) {
//            if ($ii->tipo == 'Computadora') {
//                $bandera = 1;
//            }
//        }
        
            $pdf->BasicTable($header, $fila2, $fila22,$fila21);
            $pdf->BasicTable11($header1111, $fila2, $fila22, $fila222, $fila2222,$fila23,$fila24,$fila25,$fila26,$fila27,$fila28,$fila29,$fila30,$fila31);
            $pdf->Ln();
//$pdf->BasicTable1($header1,$data5,$data2);
//$pdf->BasicTable2($header1,$fila3,$data3);
//$pdf->BasicTable3($header1,$fila4,$fila5,$fila6,$fila7);
            $pdf->BasicTable4($fila8, $data4);
            $pdf->BasicTable5($fila9, $fila10,$fila11,$fila12,$fila13,$fila14,$fila15,$fila16,$fila17,$fila18,$fila19,$fila20,$fila32,$fila166);
        

//$pdf->AddPage();
//$pdf->ImprovedTable($header,$data);
//$pdf->AddPage();
//$pdf->FancyTable($header,$data);
        $pdf->Output();
?>
















