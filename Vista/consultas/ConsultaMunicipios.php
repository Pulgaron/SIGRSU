<?php


if (isset($_POST["sub"])){
    $municipio = $_POST['Municipio'];
    require_once("../../Controlador/consultas/ControladorConsultaMunicipios.php");

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
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home">Por Municipio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#profile">Por Region</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab"  href="#">Disabled</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 40px, 0px);">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                </div>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade show active" id="home">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" name="FormConsult">

                    <select class="js-example-basic-single" name="Municipio">
                        <option >Seleccionar</option>
                        <?php
                        require_once ("../../Controlador/consulta_municipio.php");
                        foreach ($municipios as $municipio):
                        ?>
                        <option value="<?php echo $municipio['idMunicipios'];?>"> <?php echo $municipio['Municipio'];?> </option>
                        <?php endforeach;?>
                    </select>
                        <button type="submit" name="sub">Aceptar</button> <!-- AQUIIIIIIIIIIII-->
                </form>
                <div>
                    <?php
                    if (isset($_POST["sub"])):

                    foreach ($consultamunicipios as $consultamunicipio):
                    ?>
                    <table>
                        <tr>
                           <td>
                               <a> <?php echo $consultamunicipio["Municipio"]?></a>
                           </td>
                        </tr>
                    </table>
                    <?php endforeach;endif; ?>
                </div>
            </div>
            <div class="tab-pane fade" id="profile">
                <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
            </div>
            <div class="tab-pane fade" id="dropdown1">
                <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</p>
            </div>
            <div class="tab-pane fade" id="dropdown2">
                <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
            </div>
        </div>
    </article>
</section>
</body>
</html>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>