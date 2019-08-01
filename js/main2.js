function initMap() {
        var posicionMapa = {lat:19.0586984 , lng:-96.1584499};
        var cotaxtla = {lat:19.0674222 , lng:-96.15761944444445};
        var jamapa =  new google.maps.LatLng(19.0390972,-96.1438888888889);
        var texto = '<h3>Rio Jamapa (28039)</h3>' + '<p></p>' +'<a href="views/public/calculos.php?idAfluente=1"><input class="boton1" type="button" value="Calcular"></a>';
        var texto1 = '<h3>Rio Cotaxtla (28040)</h3>' + '<p></p>' +'<a href="views/public/calculos.php?idAfluente=2"><input class="boton1" type="button" value="Calcular"></a>';
        var map = new google.maps.Map(document.getElementById('map2'), {
          zoom: 13,
          center: posicionMapa,
          mapTypeId: 'terrain'
        });

        var marker = new google.maps.Marker({
          position:cotaxtla, 
          map: map, 
          title: "Rio Cotaxtla"
        });

         var informacion = new google.maps.InfoWindow({
          content: texto
        });

        marker.addListener('click', function(){
          informacion.open(map, marker)
        });

        var marker2 = new google.maps.Marker({
          position:jamapa, 
          map: map, 
          title: "Rio Jamapa"
        });

         var informacion1 = new google.maps.InfoWindow({
          content: texto1
        });

        marker2.addListener('click', function(){
          informacion1.open(map, marker2)
        });

      }