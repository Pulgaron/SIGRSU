<?php


if (isset($_POST["subTipo"])){
    $tipo = $_POST['Tipo'];
    require_once("../../Controlador/consultas/ControladorConsultaTipo.php");

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultas</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>SIGRSU</title>
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
        <h2 style="text-align: left">Consulta por tipo de sitio</h2>
        <br>
        <h5 style="text-align: left">Seleccione el tipo de sitio que desea consultar</h5>
        <div id="myTabContent" class="tab-content" style="margin-top: 50px">
            <div class="tab-pane fade show active" id="home">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" name="FormConsult">
                    <select class="js-example-basic-single" name="Tipo">
                        <option >Seleccionar</option>
                        <?php
                        require_once ("../../Controlador/consulta_tipo.php");
                        foreach ($tipos as $tipo):
                            ?>
                            <option value="<?php echo $tipo['idTipoSitio'];?>"> <?php echo $tipo['NombreSitio'];?> </option>
                        <?php endforeach;?>
                    </select>
                    <button type="submit" name="subTipo">Aceptar</button> <!-- AQUIIIIIIIIIIII-->
                </form>
                <div style="margin-top: 50px">
                    <table class="table table-hover">
                        <thead>
                        <tr class="table-warning">
                            <th scope="col">Tipo de sitios</th>
                            <th scope="col">Latitud</th>
                            <th scope="col">Longitud</th>
                            <th scope="col">Municipio</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (isset($_POST["subTipo"])):
                            foreach ($consultatipos as $consultatipo):
                                ?>
                                <tr class="table-light">
                                    <td>
                                        <a> <?php echo $consultatipo["NombreSitio"]?></a>
                                    </td>
                                    <td>
                                        <a> <?php echo $consultatipo["Latitud"]?></a>
                                    </td>
                                    <td>
                                        <a> <?php echo $consultatipo["Longitud"]?></a>
                                    </td>
                                    <td>
                                        <a> <?php echo $consultatipo["Municipio"]?></a>
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
        <button type="button" class="btn btn-outline-success">Archivo Excel</button>
        <button type="button" class="btn btn-outline-success">Archivo PDF</button>
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