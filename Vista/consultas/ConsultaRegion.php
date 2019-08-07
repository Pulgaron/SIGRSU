<?php


if (isset($_POST["sub"])){
    $regioon = $_POST['Region'];
    require_once("../../Controlador/consultas/ControladorConsultaRegion.php");
}

if(isset($_POST['export_data'])) {
    $region = $_POST['Region'];
    require_once("../../Controlador/consultas/ControladorConsultaRegion.php");


    function filterData(&$str)
    {
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
    }

// file name for download
    $fileName = "codexworld_export_data" . date('Ymd') . ".xls";

// headers for download
    header("Content-Disposition: attachment; filename=\"$fileName\"");
    header("Content-Type: application/vnd.ms-excel");

    $flag = false;
    foreach ($consultaregiones as $row) {
        if (!$flag) {
            // display column names as first row
            echo implode("\t", array_keys($row)) . "\n";
            $flag = true;
        }
        // filter data
        array_walk($row, 'filterData');
        echo implode("\t", array_values($row)) . "\n";

    }

    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consulta por región</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link rel="icon" type="image/png" width="100%" height="100%" href="../../imagenes/logo.png">
    <link rel="stylesheet" href="../../css/bootstrap.css" type="text/css" media="all" />
    <link rel="stylesheet" href="../../css/iconos.css" type="text/css" media="all" />
    <script src="../../jquery/jquery-1.12.4.js"></script>
    <script src="../../jquery/jquery-1.12.4.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8R1knz15286Hf1yU1ievgZFxeF7fnC0w&callback=initMap">
    </script>
    <meta name="author" content="Genesis Mora Cruz">
</head>
<body>
<header>
    <div class="contenedor">
        <div class="encabezado">
            <script languaje="JavaScript">
                var mydate=new Date()
                var year=mydate.getYear()
                if (year < 1000)
                    year+=1900
                var day=mydate.getDay()
                var month=mydate.getMonth()
                var daym=mydate.getDate()
                if (daym<10)
                    daym="0"+daym
                var dayarray=new Array("Domingo,","Lunes,","Martes,","Miércoles,","Jueves,","Viernes,","Sábado,")
                var montharray=new Array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre")
                document.write("<font color='white' face='sans-serif' style='font-size:10pt; margin-top: 10px'>"+dayarray[day]+" "+daym+" de "+montharray[month]+" de "+year+"</font>")
            </script>
        </div>
        <br>
        <div id="marca">
            <table style="margin-left: 10%">
                <tr>
                    <td >
                        <img width="120px" height="140px" style="margin-right: 30px" src="../../imagenes/logo2.png">
                    </td>
                    <td style="border-left: 1px solid white; border-right: 1px solid white;">
                        <h3 >Sitios de Disposición Final de Residuos Sólidos Urbanos</h3>
                        <h3>Estado de Veracruz</h3>
                    </td>
                    <td >
                        <img width="160px" height="140px" style="margin-left: 30px" src="../../imagenes/logouvcolor.png">
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="collapse navbar-collapse" id="navbarColor01" >
                <ul class="navbar-nav mr-auto" >
                    <li class="nav-item active">
                        <a class="nav-link"  href="../../index.php"><span class="sr-only; icon-home"></span> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="../informacion.html">Información</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="../QuienesSomos.html">Quiénes somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="../Contactos.html">Contactos</a>
                    </li>
                </ul>
            </div>
            <a class="btn btn-success btn-sm" style="margin-right: 20px" href="../login.html">Iniciar Sesión</a>
            <button class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </div>
</header>
<section>
    <article>
        <h2 style="text-align: left">Consulta por región</h2>
        <br>
        <h5 style="text-align: left">Seleccione la región que desea consultar</h5>
        <div id="myTabContent" class="tab-content" style="margin-top: 50px">
            <div class="tab-pane fade show active" id="home">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" name="FormConsult">
                    <select class="js-example-basic-single" name="Region">
                        <option >Seleccionar...</option>
                        <?php
                        require_once ("../../Controlador/consulta_region.php");
                        foreach ($regiones as $region):
                            ?>
                            <option value="<?php echo $region['idRegion'];?>"> <?php echo $region['Region'];?> </option>
                        <?php endforeach;?>
                    </select>
                    <button type="submit" name="sub" class="btn btn-primary btn-sm">Aceptar</button> <!-- AQUIIIIIIIIIIII-->
                </form>
                <div style="margin-top: 50px">
                    <table class="table table-hover">
                        <thead>
                        <tr class="table-warning">
                            <th scope="col">Región</th>
<<<<<<< HEAD
                            <th scope="col">Municipio</th>
                            <th scope="col">Latitud</th>
                            <th scope="col">Longitud</th>
                            <th scope="col">Tipo de sitio</th>
                            <th scope="col">Estado de operación</th>
                            <th scope="col">Toneladas por día</th>
                            <th scope="col">Años de vida útil</th>
                            <th scope="col">Es proyecto ejecutivo</th>
                            <th scope="col">Cumple con normas</th>
                            <th scope="col">Tiene pepena</th>
=======
                            <th scope="col">Latitud</th>
                            <th scope="col">Longitud</th>
                            <th scope="col">Estado de operación</th>
>>>>>>> 3391e3ebbe47869f424fe6fc6d1fd89beb58a786
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (isset($_POST["sub"])):
                            foreach ($consultaregiones as $consultaregion):
                                ?>
                                <tr class="table-light">
<<<<<<< HEAD
=======
                                    <td>
                                        <a> <?php echo $consultaregion["Region"]?></a>
                                    </td>
                                    <td>
                                        <a> <?php echo $consultaregion["Region"]?></a>
                                    </td>
                                    <td>
                                        <a> <?php echo $consultaregion["Region"]?></a>
                                    </td>
>>>>>>> 3391e3ebbe47869f424fe6fc6d1fd89beb58a786
                                    <td>
                                        <a> <?php echo $consultaregion["Region"]?></a>
                                    </td>
                                    <td>
                                        <a> <?php echo $consultaregion["Municipio"]?></a>
                                    </td>
                                    <td>
                                        <a> <?php echo $consultaregion["Latitud"]?></a>
                                    </td>
                                    <td>
                                        <a> <?php echo $consultaregion["Longitud"]?></a>
                                    </td>
                                    <td>
                                        <a> <?php echo $consultaregion["NombreSitio"]?></a>
                                    </td>
                                    <td>
                                        <a> <?php echo $consultaregion["EstadoOperacion"]?></a>
                                    </td>
                                    <td>
                                        <a> <?php echo $consultaregion["Toneladas_por_dia"]?></a>
                                    </td>
                                    <td>
                                        <a> <?php echo $consultaregion["Anios_vida_util"]?></a>
                                    </td>
                                    <td>
                                        <a> <?php echo $consultaregion["Proyecto_Ejecutivo"]?></a>
                                    </td>
                                    <td>
                                        <a> <?php echo $consultaregion["Cumple_Norma"]?></a>
                                    </td>
                                    <td>
                                        <a> <?php echo $consultaregion["Pepena"]?></a>
                                    </td>
                                </tr>
                            <?php endforeach;endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <h5 style="text-align: left; margin-top: 100px">Descargas:</h5>
        <br>
<<<<<<< HEAD
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <input type="hidden" value="<?php echo $regioon?>" name="Region">
            <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-success" <button type="button" >Archivo Excel</button>
            <!--<button type="button" class="btn btn-success">Archivo PDF</button>-->
        <br>
        <h5 style="text-align: left; margin-top: 100px">Consultas</h5>
        <br>
        <a class="btn btn-primary" id="botonconculta" href="ConsultaRegion.php" role="button">Por Región</a>
        <a class="btn btn-primary" id="botonconculta" href="ConsultaMunicipios.php" role="button">Por Municipio</a>
        <a class="btn btn-primary" id="botonconculta" href="ConsultaTipo.php" role="button">Por Tipo de sitio</a>
=======
        <button type="button" class="btn btn-outline-success">Archivo Excel</button>
        <button type="button" class="btn btn-outline-success">Archivo PDF</button>
>>>>>>> 3391e3ebbe47869f424fe6fc6d1fd89beb58a786
    </article>
</section>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
<footer>
    <p style="text-align: center">SIG de Sitios de Disposición Final de RSU COPYRIGHT &copy 2019 | UNIVERSIDAD VERACRUZANA</p>
</footer>
</body>
</html>