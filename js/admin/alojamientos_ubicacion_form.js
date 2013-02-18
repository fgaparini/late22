

//<![CDATA[

// Inicialización de variables.
var map      = null;
var geocoder = null;

function load() {                                      // Abre LLAVE 1.
    if (GBrowserIsCompatible()) {						   // Abre LLAVE 2.
        map = new GMap2(document.getElementById("map"));
        Size = new google.maps.Size(800,450);
        map.setCenter(new GLatLng(-35.675147,-64.965822), 4);
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());

        geocoder = new GClientGeocoder();


        //---------------------------------//
        //   MARCADOR AL HACER CLICK
        //---------------------------------//
        GEvent.addListener(map, "click",
            function(marker, point) {
                if (marker) {
                    null;
                } else {
                    map.clearOverlays();
                    var marcador = new GMarker(point);
                    map.addOverlay(marcador);
                    //marcador.openInfoWindowHtml("<b><br>Coordenadas:<br></b>Latitud : "+point.y+"<br>Longitud : "+point.x+"<a href=http://www.mundivideo.com/fotos_pano.htm?lat="+point.y+"&lon="+point.x+"&mapa=3 TARGET=fijo><br><br>Fotografias</a>");
                    //marcador.openInfoWindowHtml("<b>Coordenadas:</b> "+point.y+","+point.x);
                    document.getElementById('Coordenadas').value = point.y+","+point.x;
                }
            }
            );
    //---------------------------------//
    //   FIN MARCADOR AL HACER CLICK
    //---------------------------------//

    } // Cierra LLAVE 1.
}   // Cierra LLAVE 2.

//---------------------------------//
//           GEOCODER
//---------------------------------//
function showAddress(address, zoom) {
    if (geocoder) {
        geocoder.getLatLng(address,
            function(point) {
                if (!point) {
                    alert(address + " not found");
                } else {
                    map.setCenter(point, zoom);
                    var marker = new GMarker(point);
                    map.addOverlay(marker);
                    //marker.openInfoWindowHtml("<b>"+address+"</b><br>Coordenadas:<br>Latitud : "+point.y+"<br>Longitud : "+point.x+"<a href=http://www.mundivideo.com/fotos_pano.htm?lat="+point.y+"&lon="+point.x+"&mapa=3 TARGET=fijo><br><br>Fotografias</a>");
                    // marker.openInfoWindowHtml("<b>Coordenadas:</b> "+point.y+","+point.x);
                   
                    document.getElementById('Coordenadas').value = point.y+","+point.x;
                    //document.form1.coordenadas.value = 
                }
            }
            );
    }
}
//---------------------------------//
//     FIN DE GEOCODER
//---------------------------------//

//]]>
    
    
window.onload=function()
{
    self.focus();
    load();
}


function posicion()
{
    direccion = $('#Direccion').val()
    showAddress(direccion, 15);
}