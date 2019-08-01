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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sesión iniciada</title>
    <link rel="icon" type="image/png" width="100%" height="100%" href="../imagenes/logo.png">
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css" media="all" />
    <link rel="stylesheet" href="../css/iconos.css" type="text/css" media="all" />
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
                        <img width="120px" height="140px" style="margin-right: 30px" src="../imagenes/logo2.png">
                    </td>
                    <td style="border-left: 1px solid white; border-right: 1px solid white;">
                        <h3 >Sitios de Disposición Final de Residuos Sólidos Urbanos</h3>
                        <h3>Estado de Veracruz</h3>
                    </td>
                    <td >
                        <img width="160px" height="140px" style="margin-left: 30px" src="../imagenes/logouvcolor.png">
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
                    <a class="nav-link" href="#">Editar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Eliminar.php">Eliminar</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<h2 style="text-align: left; margin-left: 25%; margin-right: 25%; margin-top: 80px;">Editar un punto del mapa</h2>
<div style="width: 50%; margin-left: 25%; margin-right: 25%; background-color: #d9d9d9">
    <div style="width: 80%; margin-left: 10%; margin-right: 10%; margin-top: 60px">
        <br>
        <form action="../Controlador/puntos/controlador_editar.php" method="post" name="FormEdit">  
        <div class="form-group">
            <label class="col-form-label" for="inputDefault">Coordenada Este (Latitud)</label>
            <input type="text" class="form-control" placeholder="Ej. 20.932653" id="inputDefault" name ="Latitud">
        </div>
        <div class="form-group">
            <label class="col-form-label" for="inputDefault">Coordenada Norte (Longitud)</label>
            <input type="text" class="form-control" placeholder="Ej. -97.627736" id="inputDefault" name="Longitud">
        </div>
        <br>
        <button type="submit" class="btn btn-primary btn-lg">Buscar</button>
    </div>
    <br>
</div>
<footer>
    <p style="text-align: center">SIG de Sitios de Disposición Final de RSU COPYRIGHT &copy 2019 | UNIVERSIDAD VERACRUZANA</p>
</footer>
</body>
</html>