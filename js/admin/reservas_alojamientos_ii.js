function js_metodo(metodo)
{
    var total = $('#total').val();
    var total_senia = $('#total_senia').val();
    
    if(metodo=='anticipado')
    {
        $('#total_pagar').text(total);
        $('#metod_div').show();
        $('#garantia_div').hide();
        
    }
        
    if(metodo=='senia')
    {
        $('#total_pagar').text(total_senia);    
        $('#metod_div').show();
        $('#garantia_div').hide();
        
    }
    
    if(metodo=='garantia')
    {
        $('#garantia_div').show();
        $('#metod_div').hide();
    }
}

function aplicar_descuento()
{
    var descuento = $('#descuento').val();
    var total = $('#total').val();
    
    des=descuento*total/100;
    des_total=total-des;
    
    $('#total_estadia').text(des_total);
    
    
}
