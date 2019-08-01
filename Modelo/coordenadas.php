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
            $consulta = $this->DB->query("SELECT idsitios, municipios.Municipio ,Latitud,
             Longitud, tipodesitio.TipoDeSitiocol as Categoria, Toneladas_por_Dia, edo_operacion.Estado as Edo_operacion
            FROM sitios, municipios, tipodesitio, edo_operacion
            where sitios.Municipio = municipios.idMunicipios
            and sitios.Categoria = tipodesitio.idTipoDeSitio
            and sitios.Edo_operacion = edo_operacion.idEdo_Operacion");
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