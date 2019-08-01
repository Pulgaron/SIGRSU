<?php

class Puntos_Models{

    public function __construct()
    {
        require_once("conexion.php");
        $this->db = Conectar::conexion();
        $this->puntos = array();
        $this->value = 0;
        $this->bandera = false;
    }

    public function insertar_punto($municipio,$latitud,$longitud,$poblados,$cuerpo_agua,$area_natural,$acuifero,$region ,$corriente_aire, $tipo_sitio, $toneladas, $estado)
        {
            try {
                //$consulta = $this->db->query();
                $sql = "INSERT INTO sitios (idsitios,Municipio,Latitud,Longitud,Poblados_cercanos,Cuerpos_agua_cercanos,Area_protegida_cercana,Acuifero,Region,Vientos,Categoria_de_Sitio,Toneladas_por_dia, Estado) VALUES(null,:mun,:lat,:long,:pob,:cuerpo,:area,:acui,:reg,:corr,:cate,:ton,:sta)";

                $resultado = $this->db->prepare($sql);
                $resultado->execute(array(":mun"=>$municipio, ":lat"=>$latitud, ":long"=>$longitud, ":pob"=>$poblados, ":cuerpo"=>$cuerpo_agua, ":area"=>$area_natural, ":acui"=>$acuifero,":reg"=>$region ,":corr"=>$corriente_aire, ":cate"=>$tipo_sitio, ":ton"=>$toneladas, ":sta"=>$estado));
                $resultado->closeCursor();

              } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

        public function editar_punto($municipio,$latitud,$longitud,$poblados,$cuerpo_agua,$area_natural,$acuifero,$region ,$corriente_aire, $tipo_sitio, $toneladas, $estado, $id)
        {
            try {
                //$consulta = $this->db->query();
                $sql = "UPDATE sitios SET Municipio = :mun, Latitud = :lat, Longitud = :long, Poblados_cercanos = :pob, Cuerpos_agua_cercanos = :cuerpo, Area_protegida_cercana = :area, Acuifero = :acui, Region = :reg, Vientos = :corr, Categoria_de_Sitio = :cate, Toneladas_por_dia = :ton, Estado = :sta where idsitios = '$id'";
                $modificar = $this->db->prepare($sql);
                $modificar->execute(array(":mun"=>$municipio, ":lat"=>$latitud, ":long"=>$longitud, ":pob"=>$poblados, ":cuerpo"=>$cuerpo_agua, ":area"=>$area_natural, ":acui"=>$acuifero,":reg"=>$region ,":corr"=>$corriente_aire, ":cate"=>$tipo_sitio, ":ton"=>$toneladas, ":sta"=>$estado));
                $modificar->closeCursor();
            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        } 

        public function eliminar_punto($latitud ,$longitud)
        {
            try {
                //$consulta = $this->db->query();
                $sql = "UPDATE sitios SET status = 'B' where Latitud = :lat and Longitud = :lang";
                $modificar = $this->db->prepare($sql);
                $modificar->execute(array(":lat"=>$latitud, ":lang"=>$longitud));
                $modificar->closeCursor();
            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        } 
        
        public function get_punto($latitud, $longitud)
        {
            try {
                $consulta = $this->db->query("SELECT * FROM sitios WHERE Latitud = '$latitud' AND Longitud = '$longitud'");
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $this->puntos[] = $registro;
                }
                return $this->puntos;

            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        } 

        public function get_municipio()
        {
            try {
                $consulta = $this->db->query("SELECT Municipio FROM municipios");
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $this->puntos[] = $registro;
                }
                return $this->puntos;

            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        } 

        public function get_acuifero()
        {
            try {
                $consulta = $this->db->query("SELECT Acuifero FROM acuiferos");
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $this->puntos[] = $registro;
                }
                return $this->puntos;

            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

        public function get_region()
        {
            try {
                $consulta = $this->db->query("SELECT Region FROM regiones");
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $this->puntos[] = $registro;
                }
                return $this->puntos;

            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

        public function get_corriente()
        {
            try {
                $consulta = $this->db->query("SELECT Viento FROM vientos");
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $this->puntos[] = $registro;
                }
                return $this->puntos;

            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

        public function get_sitio()
        {
            try {
                $consulta = $this->db->query("SELECT TipoDeSitiocol FROM tipodesitio");
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $this->puntos[] = $registro;
                }
                return $this->puntos;

            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }

        public function get_estado()
        {
            try {
                $consulta = $this->db->query("SELECT Estado FROM edo_operacion");
                while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
                    $this->puntos[] = $registro;
                }
                return $this->puntos;

            } catch (Exception $e) {
                echo "Línea del error: " . $e->getLine() . "<br>";
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";

            } finally {
                $db = null;
            }
        }
}

?>