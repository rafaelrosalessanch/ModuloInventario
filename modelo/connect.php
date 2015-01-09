<?php
class Connect{
    protected $usuario;
    protected $contracenna;
    protected $servidor;
    protected $enlace = null;
    protected $BaseDatos;
    protected $puerto;

    public function __construct() {
        $this->usuario='desarrolladorvistas';
        $this->contracenna='desarrollo';
        $this->servidor='localhost';
        $this->BaseDatos='inventario';
        $this->puerto='5432';
    }

    public function Conectar() {
        $this->enlace = pg_connect("host=$this->servidor port=$this->puerto dbname=$this->BaseDatos user=$this->usuario password=$this->contracenna")or die ('Error de conexión');
        $abs=pg_connection_busy($this->enlace);
             if($abs){
                 return "Error de conexión";
             } else {
                  return $this->enlace;
             }
                
        

    }

    public function CerrarConeccion() {
        return pg_close($this->enlace);
    }

    public function ConsultarBD($query) {
        $this->Conectar();
        $consult = pg_query($query);
        if ($consult) {
            $this->CerrarConeccion();
            return true;
        }
        else {
            $this->CerrarConeccion();
            return false;
        }
    }

    public function ConvConsultaObjeto($query) {
        $this->Conectar();
        $aux = pg_query($query);
        $array = array();
        while ($obj = pg_fetch_object($aux)) {
            $array[] = $obj;
        }
        $this->CerrarConeccion();
        return $array;
    }


}
?>






