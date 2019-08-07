<?php

class coordenadasModel
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

    public function getcoordenadas(){
        try{
            $consulta = $this->DB->query("SELECT idSitio, municipios.Municipio ,Latitud,
<<<<<<< HEAD
             Longitud, tipositio.NombreSitio as tipositio, Toneladas_por_dia,estadooperacion.EstadoOperacion as Edo_operacion
=======
             Longitud, tipositio.NombreSitio as Categoria, Toneladas_por_dia,estadooperacion.EstadoOperacion as Edo_operacion
>>>>>>> 3391e3ebbe47869f424fe6fc6d1fd89beb58a786
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