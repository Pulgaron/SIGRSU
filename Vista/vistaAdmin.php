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
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Sesión iniciada</title>
    <link rel="icon" type="image/png" width="100%" height="100%" href="../imagenes/logo.png">
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" media="all" />
    <link rel="stylesheet" href="../css/iconos.css" type="text/css" media="all" />
    <meta charset="utf-8">
    <meta name="author" content="Genesis Mora Cruz">
</head>
<body>
<header>
    <div class="contenedor">
        <div id="marca">
            <div style="margin-right: 40px; margin-top: 5px">
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
                    document.write("<font color='black' face='sans-serif' style='font-size:11pt; margin-top: 10px'>"+dayarray[day]+" "+daym+" de "+montharray[month]+" de "+year+"</font>")
                </script>
            </div>
            <table style="margin-left: 20px">
                <tr>
                    <td >
                        <img width="100px" height="70px" src="../imagenes/logouv2.png">
                    </td>
                    <td >
                        <img width="60px" height="80px" src="../imagenes/logo2.png">
                    </td>
                    <td >
                        <h4 >Sitios de Disposición Final de Residuos Sólidos Urbanos del Estado de Veracruz</h4>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse"  id="navbarColor01" >
                <ul class="navbar-nav mr-auto " >
                    <li class="nav-item active">
                        <a class="nav-link" href="vistaAdmin.html"><span class="sr-only; icon-home"></span> Mi cuenta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Georreferencias.php">Sitios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="BaseDatos.php">Base de Datos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Nvoadmin.html">Nuevo administrador</a>
                    </li>
                </ul>
            </div>
            <a class="btn btn-secondary btn-sm" style="margin-right: 20px" href="../Controlador/usuarios/cerrar_sesion_controller.php">Cerrar Sesión</a>
            <button class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </div>
</header>
<section>
    <article>
        <div class="jumbotron ">
            <h1 class="display-3" style="text-align: left">¡Bienvenido!</h1></a>
            <br>
            <table >
                <tr >
                    <td width="45%" >
                        <p>Has ingresado a SIGRSU satisfactoriamente, puedes agregar, editar y eliminar sitios de disposición final de RSU en el mapa</p>
                        <p>También puede respaldar o restaurar la Base de Datos</p>
                        <p>O dar de alta a un nuevo administrador...</p>
                    </td>
                    <td width="10%" ></td>
                    <td width="45%" >
                        <img width="50%" height="55%" style="alignment: center" src="../imagenes/logo2.png">
                    </td>
                </tr>
            </table>
        </div>
    </article>
</section>
<footer >
    <p style="text-align: center; color: #fff;">Contacto: Dra. Gloria Inés González López. Correo: giglzlzy@yahoo.com.mx</p>
    <p style="color: #fff; text-align: center">SDF de RSU del Estado de Veracruz COPYRIGHT &copy 2019 | UNIVERSIDAD VERACRUZANA</p>
</footer>
</body>
</html>