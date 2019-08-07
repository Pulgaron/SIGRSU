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
<<<<<<< HEAD
            $consulta = $this->DB->query("select tipositio.NombreSitio, municipios.Municipio, Latitud, Longitud, estadooperacion.EstadoOperacion, 
            Toneladas_por_dia, Anios_vida_util, CASE WHEN Proyecto_Ejecutivo = 1 THEN 'Si' ELSE 'No' END as Proyecto_Ejecutivo, 
            CASE WHEN Cumple_Norma = 1 THEN 'Si' ELSE 'No' END as Cumple_Norma, CASE WHEN Pepena = 1 THEN 'Si' ELSE 'No' END as Pepena
            from sitios, municipios, tipositio, estadooperacion
            where sitios.TipoSitio = tipositio.idTipoSitio
            and sitios.Municipio = municipios.idMunicipios
            and estadooperacion.idEstadoOperacion = sitios.Estado_Operacion
=======
            $consulta = $this->DB->query("select tipositio.NombreSitio, Latitud, Longitud, municipios.Municipio
            from sitios, tipositio, municipios
            where sitios.TipoSitio = tipositio.idTipoSitio
            and municipios.idMunicipios = sitios.Municipio
>>>>>>> 3391e3ebbe47869f424fe6fc6d1fd89beb58a786
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