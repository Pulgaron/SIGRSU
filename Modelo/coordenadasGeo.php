<?php

class coordenadasGeoModel
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

    public function getcoordenadasGeo(){
        try{
            $consulta = $this->DB->query("SELECT idSitio, municipios.Municipio ,Latitud,
             Longitud, tipositio.NombreSitio as Categoria, Toneladas_por_dia,estadooperacion.EstadoOperacion as Edo_operacion
            FROM sitios, municipios, tipositio, estadooperacion
            where sitios.Municipio = municipios.idMunicipios
            and sitios.TipoSitio = tipositio.idTipoSitio
            and sitios.Estado_Operacion = estadooperacion.idEstadoOperacion");
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
}