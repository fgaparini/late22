function multiplicar_precio(id_habitacion,precio,id_alojamiento)
{
    option = $('#option_'+id_habitacion).val();
    $('#label_precio_'+id_habitacion).text(precio*option);
    
    if(option==0)
    $('#submit'+id_alojamiento).attr("disabled", "disabled"); // To disable
    else
    $('#submit'+id_alojamiento).removeAttr("disabled"); // To enable
    
}
