<?php

class ConsultaRegion_Models
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

    public function getconsultaRegion($region){
        try{
            $consulta = $this->DB->query("select region.Region, municipios.Municipio, Latitud, Longitud, tipositio.NombreSitio, 
            estadooperacion.EstadoOperacion, Toneladas_por_dia, Anios_vida_util, CASE WHEN Proyecto_Ejecutivo = 1 THEN 'Si' ELSE 'No' END as Proyecto_Ejecutivo, 
            CASE WHEN Cumple_Norma = 1 THEN 'Si' ELSE 'No' END as Cumple_Norma, CASE WHEN Pepena = 1 THEN 'Si' ELSE 'No' END as Pepena
            from sitios, municipios, tipositio, estadooperacion, region
            where sitios.Region = region.idRegion
            and municipios.idMunicipios = sitios.Municipio
            and tipositio.idTipoSitio = sitios.TipoSitio
            and estadooperacion.idEstadoOperacion = sitios.Estado_Operacion
            and region.idRegion = '$region'");


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

    public function getRegion(){
        try{
            $consulta = $this->DB->query("select idRegion,Region from region");
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