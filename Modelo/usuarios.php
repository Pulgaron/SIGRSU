<?php
class Usuarios_Models
{
  private $db;
  private $usuarios;
  private $value;
  private $bandera;
  public function __construct()
  {
    require_once("conexion.php");
    $this->db = Conectar::conexion();
    $this->usuarios = array();
    $this->value = 0;
    $this->bandera = false;
  }

  public function my_data($id)
  {
    try {
      $consulta = $this->db->query("SELECT Usuario FROM usuarios WHERE idUsuarios='$id'");
      while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $this->usuarios[] = $registro;
      }
      return $this->usuarios;

    } catch (Exception $e) {
      echo "Línea del error: " . $e->getLine() . "<br>";
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";

    } finally {
      $db = null;
    }
  }

  public function estado($id)
  {
    try {
      $consulta = $this->db->query("SELECT Estado FROM usuarios WHERE idUsuarios = '$id'");
      while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $estado = $registro['Estado'];
      }
      return $estado;
    } catch (Exception $e) {
      echo "Línea del error: " . $e->getLine() . "<br>";
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    } finally {
      $db = null;
    }
  }

  public function busca_usuario_registrado($usuario,$contrasenia)
  {
    try {
      $consulta = $this->db->query("SELECT * FROM usuarios WHERE Usuario = '$usuario'");
      $this->value = -2;//menos 2 no hay registros
      while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $this->value = -1;//Si hay apodo
        // if (password_verify($contrasenia,$registro['Contrasenia'])) {
            if ($contrasenia == $registro['Contrasenia']) {
          $this->value = $registro['idUsuarios'];//Mayor que cero si existe el registro
          break;
        }
      }
      return $this->value;
    } catch (Exception $e) {
      echo "Línea del error: 8" . $e->getLine() . "<br>";
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }finally {
      $db = null;
    }
  }

}
?>