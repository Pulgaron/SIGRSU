<?php

class ConsultaTipo_Models
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

    public function getconsultaTipo($tipo){
        try{
            $consulta = $this->DB->query("select tipositio.NombreSitio, Latitud, Longitud, municipios.Municipio
            from sitios, tipositio, municipios
            where sitios.TipoSitio = tipositio.idTipoSitio
            and municipios.idMunicipios = sitios.Municipio
            and tipositio.idTipoSitio = '$tipo'");
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

    public function getTipo(){
        try{
            $consulta = $this->DB->query("select idTipoSitio, NombreSitio from tipositio");
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