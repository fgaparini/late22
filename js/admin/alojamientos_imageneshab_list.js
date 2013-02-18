         
function habitaciones_imagenes_delete(id_habitacion,nombre_habitacion)
{
    $('myModal').modal('show');
    $('#eliminar').click(function(){
        base_url = $('#base_url').val();   
        datos={
            ID_Habitacion:id_habitacion,
            NombreImagenHab:nombre_habitacion
        }
        //AJAX
        $.ajax({
            url: base_url+"admin/ajax/habitaciones_imagenes_delete/",
            type: 'POST',
            data: datos,
            success: function(msg) {
                $('#ah_'+nombre_habitacion).hide();
                $('#myModal').modal('hide');
            }
        })
        
    });
}

$(function () {
    //Fancy
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
        var id_emp =$('form#'+ids).children('input#ID_Habitacion_'+ids).val();
        base_url = $('#base_url').val();   
        
        $.blockUI({
            message: '<img src="'+base_url+'img/ajax-loader.gif" />'
        });
        
        datos={
            ID_Habitacion:id_emp,
            ImagenHabitacion:ids,
            ImagenDescripcion:descrip
        }
        //AJAX
        $.ajax({
            url: base_url+"admin/ajax/habitaciones_imagenes_descripcion/",
            type: 'POST',
            data: datos,
            success: function(msg) {
                $.unblockUI();     
            }
        })
    });
    
});