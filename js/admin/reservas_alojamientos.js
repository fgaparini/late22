function multiplicar_precio(id_habitacion,precio)
{
   // precios = $('#label_precio_'+id_habitacion).text();
    option = $('#option_'+id_habitacion).val();
    
    $('#label_precio_'+id_habitacion).text(precio*option);
    
}
