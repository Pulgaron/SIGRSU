<?php 

require_once("Controlador/ControladorCoordenadas.php");

?>

<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>SIGRSU</title>
    <link rel="icon" type="image/png" width="100%" height="100%" href="imagenes/logo.png">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/iconos.css" type="text/css" media="all" />
    <script src="js/colormarcador.js"></script>
    <meta charset="utf-8">
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
                        <img width="120px" height="140px" style="margin-right: 30px" src="imagenes/logo2.png">
                    </td>
                    <td style="border-left: 1px solid white; border-right: 1px solid white;">
                        <h3 >Sitios de Disposición Final de Residuos Sólidos Urbanos</h3>
                        <h3>Estado de Veracruz</h3>
                    </td>
                    <td >
                        <img width="160px" height="140px" style="margin-left: 30px" src="imagenes/logouvcolor.png">
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
                        <a class="nav-link"  href="index.php"><span class="sr-only; icon-home"></span> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="Vista/informacion.html">Información</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="Vista/QuienesSomos.html">Quiénes somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="Vista/Contactos.html">Contactos</a>
                    </li>
                </ul>
            </div>
            <a class="btn btn-success btn-sm" style="margin-right: 20px" href="Vista/login.html">Iniciar Sesión</a>
            <button class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </div>
</header>
<div id="holi">
    <button id ="buton-holi" onclick="colorChanger()"> asdasd</button>
</div>
<div id="datos"></div>
<div id="map" class="container">

    <script>
        var flag = 0;
        var datos = document.querySelector("#datos");
        var lista_coordenadas = <?php echo json_encode($coordenadas)?>;
        var map;
        var markers = [];
        var markers2 = [];
        var circulos = [];
        var circle;
        

        for(var i = 0; i<lista_coordenadas.length; i++){
            markers[i] = lista_coordenadas[i];
        } 

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 19.194029, lng: -96.146442},
                zoom: 7
            });
            var infowindow = new google.maps.InfoWindow();
            for (var i in lista_coordenadas){

                var marker =  new google.maps.Marker({
                    position: {lat:parseFloat(lista_coordenadas[i].Latitud), lng:parseFloat(lista_coordenadas[i].Longitud)},
                    map: map,
                    title: lista_coordenadas[i].Municipio,
                    animation: google.maps.Animation.DROP,
                    id : parseInt(lista_coordenadas[i].idSitio),
                    icon: 'https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi.png',
                    sitio: lista_coordenadas[i].tipositio

                });
               markers2.push(marker);
               

                datos.innerHTML='';



                // cache created marker to markers object with id as its key
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        console.log(marker.id)
                        desactivar(marker.id, flag);
                        var titulo = marker.getTitle();
                        /*  for(var i in lista_coordenadas){
                             if( lista_coordenadas[i].Municipio === titulo){

                                 localStorage.setItem('titulo', titulo);}
                         } */
                        datos.innerHTML = '<a> Municipio: '+lista_coordenadas[i].Municipio+'</a></br><a>Tipo de Sitio: '+lista_coordenadas[i].tipositio+'</a>'+
                            '</br><a>Toneladas recibidas por dia: '+lista_coordenadas[i].Toneladas_por_dia+'</a>'+'</br><a>Estado de operacion: '+lista_coordenadas[i].Edo_operacion+'</a>'
                        infowindow.setContent(datos);
                        infowindow.open(map, marker);


                    }
                })(marker, i));

                circle = new google.maps.Circle({
                    id: lista_coordenadas[i].idsitios,
                    strokeColor: '#FF0000',
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: '#FF0000',
                    fillOpacity: 0.35,
                    map: map,
                    center: {lat:parseFloat(lista_coordenadas[i].Latitud), lng:parseFloat(lista_coordenadas[i].Longitud)},
                    radius: 1000,
                });
                circulos[lista_coordenadas[i].idSitio] = circle;
            }

            var j = 0;
        
                console.log(markers);
                console.log(markers2);
                console.log(Object.keys(markers2).length);

                for (var i = 0; i < markers2.length; i++) {
                    
                    if (markers2[i].sitio === 'Relleno Sanitario') {
                        var Marker = markers2[i];
                        Marker.setIcon('http://maps.google.com/mapfiles/ms/micons/yellow-dot.png');
                        Marker.setMap(map);
                    }
                    else if(markers2[i].sitio === 'Relleno Sanitario Privado'){
                        var Marker = markers2[i];
                        Marker.setIcon('http://maps.google.com/mapfiles/ms/micons/blue-dot.png');
                        Marker.setMap(map);
                    }
                    else if(markers2[i].sitio === 'Sitio Controlado'){
                        var Marker = markers2[i];
                        Marker.setIcon('http://maps.google.com/mapfiles/ms/micons/green-dot.png');
                        Marker.setMap(map);
                    }
                    else if(markers2[i].sitio === 'Tiradero a Cielo Abierto'){
                        var Marker = markers2[i];
                        Marker.setIcon('http://maps.google.com/mapfiles/ms/micons/ltblue-dot.png');
                        Marker.setMap(map);
                    }
                    else if(markers2[i].sitio === 'Tiradero a Cielo Abierto Privado'){
                        var Marker = markers2[i];
                        Marker.setIcon('http://maps.google.com/mapfiles/ms/micons/orange-dot.png');
                        Marker.setMap(map);
                    }
                    else if(markers2[i].sitio === 'Tiradero Clandestino'){
                        var Marker = markers2[i];
                        Marker.setIcon('http://maps.google.com/mapfiles/ms/micons/pink-dot.png');
                        Marker.setMap(map);
                    }
                    else if(markers2[i].sitio === 'Tiradero Controlado'){
                        var Marker = markers2[i];
                        Marker.setIcon('http://maps.google.com/mapfiles/ms/micons/purple-dot.png');
                        Marker.setMap(map);
                    }
                    else if(markers2[i].sitio === 'Tiradero Contrlado Privado'){
                        var Marker = markers2[i];
                        Marker.setIcon('http://maps.google.com/mapfiles/ms/micons/red-dot.png');
                        Marker.setMap(map);
                    }
                    else{
                        var Marker = markers2[i];
                        Marker.setIcon('http://maps.google.com/mapfiles/kml/paddle/wht-circle.png');
                        
                        Marker.setMap(map);
                    }

                       
                    }   
        }
        

var button = document.querySelector('#buton-holi');

 

    
       

       var flag;

        function desactivar(idMark){
            if(flag === 0){
                circulos[idMark].setMap(null);
                flag = 1;
            }
            else{
                circulos[idMark].setMap(map);
                flag = 0;
            }
        }
    
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8R1knz15286Hf1yU1ievgZFxeF7fnC0w&callback=initMap">
    </script>
</div>
<section>
    <article id="consulta">
        <h4 style="color: #2C3E50;">Consultas</h4>
        <div class="jumbotron">
            <a class="btn btn-primary" id="botonconculta" href="Vista/consultas/ConsultaRegion.php" role="button">Por Región</a>
            <a class="btn btn-primary" id="botonconculta" href="Vista/consultas/ConsultaMunicipios.php" role="button">Por Municipio</a>
            <a class="btn btn-primary" id="botonconculta" href="Vista/consultas/ConsultaTipo.php" role="button">Por Tipo de sitio</a>
        </div>
    </article>
</section>
<footer>
    <p style="text-align: center">SIG de Sitios de Disposición Final de RSU COPYRIGHT &copy 2019 | UNIVERSIDAD VERACRUZANA</p>
</footer>
</body>
</html>
