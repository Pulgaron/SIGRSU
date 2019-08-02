<?php

class ConsultaMunicipios_Models
{
    private $DB;
    private $usuarios;
    private $value;

    public function __construct()
    {
        require_once("conexion.php");
        $this->DB = Conectar::conexion();
        $this->puntos = array();
        $this->value = 0;
    }

    public function getconsultaMunicipio($municipio){ //trae los datos cuando se oprime aceptar
        try{
            $consulta = $this->DB->query("select municipios.Municipio, Latitud, Longitud
            from sitios, municipios 
            where sitios.Municipio = municipios.idMunicipios
            and municipios.idMunicipios = '$municipio'");
            while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){
                $this->puntos[] = $registro;
            }

            $DB = null;
            return $this->puntos;
        }
        catch(Exception $e){
            echo "linea de error".$e->getLine()."<br>";
            echo "excepcion".$e->getMessage();
        }
        /*
        finally{
            $DB = null;
        }*/
    }

    public function getMunicipio(){ //llena las opciones del select
        try{
            $consulta = $this->DB->query("select idMunicipios,Municipio from municipios");
            while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){
                $this->puntos[] = $registro;
            }

            $DB = null;
            return $this->puntos;
        }
        catch(Exception $e){
            echo "linea de error".$e->getLine()."<br>";
            echo "excepcion".$e->getMessage();
        }

    }
}
?>