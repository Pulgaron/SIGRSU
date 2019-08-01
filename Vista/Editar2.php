


<?php
 session_start();//Reanudar la sesión en el caso de que haya sido iniciada anteriormente
  	if (!isset($_SESSION["iduser"])){//Si se almaceno algo en la variable super global
          header("Location:login.html");//No hay nada en la variable super global asi que lo redirigimos NO PASAS!
  	} else {
  		$name = require_once("../Controlador/usuarios/my_data.php");
  		$validar = require_once("../Controlador/usuarios/controlador_estado.php");
  		$mandar = strcasecmp($validar, 'A');
  		//$mandar1 = strcasecmp($validar, 'U');
  	    if ($mandar) {
  				header("Location:login.html");
        }
    }  


$latitud = $_GET["latitud"];
$longitud = $_GET["longitud"];
$id = $_GET["id"];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sesión iniciada</title>
    <link rel="icon" type="image/png" width="100%" height="100%" href="../imagenes/logo.png">
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" media="all" />
    <link rel="stylesheet" href="../css/iconos.css" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="../select/css/select2.css">
    <script type="text/javascript" src="../select/js/select2.js"></script>
    <meta name="author" content="Genesis Mora Cruz">
</head>
<body>
<header>
    <div class="contenedor">
        <div class="encabezado">Martes 07 de Mayo de 2019</div>
        <div id="marca">
            <table style="margin-left: 10%">
                <tr>
                    <td >
                        <img width="78.8px" height="100px" style="margin-right: 30px" src="../imagenes/logo.png">
                    </td>
                    <td style="border-left: 1px solid white;">
                        <h3 >Sitios de Disposición Final de Residuos Sólidos Urbanos </h3>
                        <h4 >Sistema de Información Geográfica de Veracruz</h4>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</header>
<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary nav-tabs">
        <div class="collapse navbar-collapse" id="navbarColor01" >
            <ul class="navbar-nav mr-auto " >
                <li class="nav-item active">
                    <a class="nav-link" href="vistaAdmin.php"><span class="sr-only; icon-home"></span> Mi cuenta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Agregar.php">Agregar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Editar.php">Editar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Eliminar.php">Eliminar</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<h2 style="text-align: left; margin-left: 25%; margin-right: 25%; margin-top: 80px;">Agregar un punto al mapa</h2>
<div style="width: 50%; margin-left: 25%; margin-right: 25%; background-color: #d9d9d9">
    <div style="width: 80%; margin-left: 10%; margin-right: 10%; margin-top: 60px">
    
        <br>
        <form action="../Controlador/puntos/controlador_editar_2.php" method="post" name="FormEdit2">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="form-group">
                <label for="mibuscar">Municipio</label>
                <select name="Municipio" class="form-control" id="mibuscar">
                    <option>Seleccionar...</option>
                    <?php
                    require_once("../Controlador/puntos/controlador_get_municipios.php");
                    foreach ($get_municipios as $municipio):
                    ?>
                    <option value="<?php echo $municipio["Municipio"]; ?>"><?php echo  $municipio["Municipio"]  ?> </option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="form-group">
                <label class="col-form-label" for="inputDefault">Coordenada Este (Latitud)</label>
                <input type="text" class="form-control" placeholder="Ej. 20.932653" id="inputDefault" name="Latitud">
            </div>
            <div class="form-group">
                <label class="col-form-label" for="inputDefault">Coordenada Norte (Longitud)</label>
                <input type="text" class="form-control" placeholder="Ej. -97.627736" id="inputDefault" name= "Longitud">
            </div>
            <div class="form-group">
                <label for="exampleTextarea">Poblados cercanos</label>
                <textarea class="form-control" id="exampleTextarea" rows="3" name = "Poblados"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleTextarea">Cuerpos de agua superficiales cercanos</label>
                <textarea class="form-control" id="exampleTextarea" rows="3" name="Cuerpos_agua"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleTextarea">Área o Reserva Natural protegida</label>
                <textarea class="form-control" id="exampleTextarea" rows="3" name= "Area_natural"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleSelect1">Acuífero</label>
                <select name="Acuifero" class="form-control" id="exampleSelect1">
                    <option>Seleccionar...</option>
                    <?php
                    require_once("../Controlador/puntos/controlador_get_acuiferos.php");
                    foreach ($get_acuiferos as $acuifero):
                    ?>
                    <option value="<?php echo $acuifero["Acuifero"]; ?>"><?php echo  $acuifero["Acuifero"]  ?> </option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleSelect1">Región</label>
                <select name="Region" class="form-control" id="exampleSelect1">
                    <option>Seleccionar...</option>
                    <?php
                    require_once("../Controlador/puntos/controlador_get_regiones.php");
                    foreach ($get_regiones as $region):
                    ?>
                    <option value="<?php echo $region["Region"]; ?>"><?php echo  $region["Region"]  ?> </option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleSelect1">Corrientes de aire</label>
                <select name="corriente_aire" class="form-control" id="exampleSelect1">
                    <option>Seleccionar...</option>
                    <?php
                    require_once("../Controlador/puntos/controlador_get_corrientes.php");
                    foreach ($get_corrientes as $corriente):
                    ?>
                    <option value="<?php echo $corriente["Viento"]; ?>"><?php echo  $corriente["Viento"]  ?> </option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleSelect1">Tipo de Sitio</label>
                <select name="Tipo_sitio" class="form-control" id="exampleSelect1">
                    <option>Seleccionar...</option>
                    <?php
                    require_once("../Controlador/puntos/controlador_get_tipodesitio.php");
                    foreach ($get_sitios as $sitio):
                    ?>
                    <option value="<?php echo $sitio["TipoDeSitiocol"]; ?>"><?php echo  $sitio["TipoDeSitiocol"]  ?> </option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="form-group">
                <label class="col-form-label" for="inputDefault">Toneladas recibidas por día</label>
                <input type="text" class="form-control" placeholder="Ej. 20.932653" id="inputDefault"  name="toneladas">
            </div>
            <div class="form-group">
                <label for="exampleSelect1">Estado de operación</label>
                <select name="Estado" class="form-control" id="exampleSelect1">
                    <option>Seleccionar...</option>
                    <?php
                    require_once("../Controlador/puntos/controlador_get_estado.php");
                    foreach ($get_estados as $estado):
                    ?>
                    <option value="<?php echo $estado["Estado"]; ?>"><?php echo  $estado["Estado"]  ?> </option>
                    <?php endforeach?>
                </select>
            </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary btn-lg">Aceptar</button>
        </form>
       
    </div>
    <br>
</div>
<footer>
    <p style="text-align: center">SIG de Sitios de Disposición Final de RSU COPYRIGHT &copy 2019 | UNIVERSIDAD VERACRUZANA</p>
</footer>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('#mibuscar').select2();
    });
</script>