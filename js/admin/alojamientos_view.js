$(function () {
            
    $('#myTab a[href="#descripcion"]').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    })
            
    $('#myTab a[href="#servicios"]').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    })
            
    $('#myTab a[href="#fotos"]').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    })
            
    $('#myTab a[href="#ubicacion"]').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
        initialize();
        $('#ubicacion').css({left : '-10000px' });
    })
           
    $('#myTab a[href="#habitaciones"]').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    })
            
    $('#myTab a[href="#clientes"]').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    })
    
     $('#myTab a[href="#publicidad"]').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    })
            
    $('#myTab a[href="#disponibilidad"]').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    })
    
    $("a[rel=example_group]").fancybox({
        'transitionIn'		: 'none',
        'transitionOut'		: 'none',
        'titlePosition' 	: 'over',
        'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
            return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
        }
    });
    
    
    //Guardar descripcion...........
    $('.descripcion_form a' ).click(function(){
        var ids=$( this).attr('rel');
        var descrip =$('form#'+ids).children('input#descrip_'+ids).val();
        var id_emp =$('form#'+ids).children('input#ID_Alojamiento_'+ids).val();
        base_url = $('#base_url').val();   
        
       $.blockUI({
            message: '<img src="'+base_url+'img/ajax-loader.gif" />'
        });
        
        datos={
            ID_Alojamiento:id_emp,
            NombreImagen:ids,
            ImagenDescripcion:descrip
        }
        //AJAX
        $.ajax({
            url: base_url+"admin/ajax/alojamientos_imagenes_descripcion/",
            type: 'POST',
            data: datos,
            success: function(msg) {
                $.unblockUI();     
            }
        })
    });
    
           
})



function cliente_eliminar(id)
{
    $('myModal').modal('show');
    $('#eliminar').click(function(){
        base_url = $('#base_url').val();   
    
        datos={
            ID_Cliente: id
        }
        //AJAX
        $.ajax({
            url: base_url+"admin/ajax/clientes_eliminar/",
            type: 'POST',
            data: datos,
            success: function(msg) {
                
                $('#a_'+id).hide();
                $('#myModal').modal('hide');
            }
        })
        
    });
}   

function habitacion_eliminar(id)
{
    $('myModal').modal('show');
    $('#eliminar').click(function(){
        base_url = $('#base_url').val();   
        datos={
            ID_Habitacion: id
        }
        //AJAX
        $.ajax({
            url: base_url+"admin/ajax/habitaciones_eliminar/",
            type: 'POST',
            data: datos,
            success: function(msg) {
                $('#h_'+id).hide();
                $('#myModal').modal('hide');
            }
        })
        
    });
}

function alojamientos_imagenes_delete(id_alojamiento,nombre_imagen)
{
    $('myModal').modal('show');
    $('#eliminar').click(function(){
        base_url = $('#base_url').val();   
        datos={
            ID_Alojamiento:id_alojamiento,
            NombreImagen:nombre_imagen
        }
        //AJAX
        $.ajax({
            url: base_url+"admin/ajax/alojamientos_imagenes_delete/",
            type: 'POST',
            data: datos,
            success: function(msg) {
                $('#i_'+nombre_imagen).hide();
                $('#myModal').modal('hide');
            }
        })
        
    });
}
         
window.onload=function()
{

    
    
}      
         
         
    
// Inicialización de variables.
var map      = null;

function initialize() {   
    
    var coordenadas =document.getElementById('Coordenadas').value;   
    var coordenadas_split = coordenadas.split(',')
    
    latitud = coordenadas_split[0];
    longitud = coordenadas_split[1];
    
    
    directionsDisplay = new google.maps.DirectionsRenderer();
    Size = new google.maps.Size(800,450);

    var myOptions = {
        zoom: 15,
        center: new google.maps.LatLng(latitud,longitud),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
            position: google.maps.ControlPosition.TOP_RIGHT
        },
        navigationControl: true,
        navigationControlOptions: {
            style: google.maps.NavigationControlStyle.ZOOM_PAN,
            position: google.maps.ControlPosition.TOP_LEFT
        },
        scaleControl: true
         
    }
    var map = new google.maps.Map(document.getElementById("map"),
        myOptions);  
                                                                 
       
    var image = 'http://sanrafaelhoteles.com/imagenes/hotel.png';
    var myLatLng = new google.maps.LatLng(latitud,longitud);
    var beachMarker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        icon: image
    });
 

 
}


function confirmar(id_alojamiento,id_publicidad,accion)
{
    base_url = $('#base_url').val();  

    if(accion=='activar')
    {
            if(confirm('Esta seguro que desea cambiar el estado '))
                window.location = base_url+"admin/alojamientos/alojamientos_publicidad_estado/"+id_alojamiento+"/?ID_Publicidad="+id_publicidad;
            
    }else if(accion=='renovar')
    if(confirm('Esta seguro que desea renovar esta publicidad'))
                window.location = base_url+"admin/alojamientos/alojamientos_publicidad_renovar/"+id_alojamiento+"/?ID_Publicidad="+id_publicidad;
}


 


       
