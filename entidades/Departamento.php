<?php

include_once'../modelo/connect.php';

class Departamento {

    private $IdDepartamento;
    private $NombreDepartamento;

    public function __construct() {
        
    }

    public function ListartarTodoslosDepartamentos() {
        $objConnect = new Connect();
        $query = "Select * from departamento";
        return $objConnect->ConvConsultaObjeto($query);
    }

    public function insertarDepartamento($nombreDepartamento, $ubicacionDepartamento, $area) {
        $nombreDepartamento=$nombreDepartamento;
        $ubicacionDepartamento=$ubicacionDepartamento;
        $area=$area;
        $objConnect = new Connect();
        $query = "insert into departamento (nombredepartamento,ubicaciondepartamento,area)values('$nombreDepartamento','$ubicacionDepartamento','$area')";
        return $objConnect->ConsultarBD($query);
    }

}
?>
