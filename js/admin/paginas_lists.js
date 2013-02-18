function paginas_delete(id_pagina)
{
    
    $('myModal').modal('show');
   $('#eliminar').click(function(){
        base_url = $('#base_url').val();   
        datos={
            ID_Pagina:id_pagina
        }
        //AJAX
        $.ajax({
            url: base_url+"admin/ajax/paginas_delete/",
            type: 'POST',
            data: datos,
            success: function(msg) {
                $('#pa_'+id_pagina).hide();
                $('#myModal').modal('hide');
            }
        })
        
    });
}