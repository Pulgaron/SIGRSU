function initMap() {
        var posicionMapa = {lat:20.1195307 , lng:-97.6667689};
    /*var cotaxtla = {lat:19.0674222 , lng:-96.15761944444445};
    var jamapa =  new google.maps.LatLng(19.0390972,-96.1438888888889);
    var texto = '<h3>Rio Jamapa (28039)</h3>' + '<p></p>' +'<a href="views/public/calculos.php?idAfluente=1"><input class="boton1" type="button" value="Calcular"></a>';
    var texto1 = '<h3>Rio Cotaxtla (28040)</h3>' + '<p></p>' +'<a href="views/public/calculos.php?idAfluente=2"><input class="boton1" type="button" value="Calcular"></a>';
    */
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 6.5,
          center: posicionMapa,
          mapTypeId: 'terrain'
        });

        for (var i in listaCoor){
            var marker = new google.maps.Marker({
                position: {lat: parseFloat(listaCoor[i].Latitud), lon: parseFloat(listaCoor[i].Longitud)},
                map: map,
                title: listaCoor[i].Municipio
            });
        }
}