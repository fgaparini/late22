function empresas_delete(id_empresa)
{
    
    $('myModal').modal('show');
   $('#eliminar').click(function(){
        base_url = $('#base_url').val();   
        datos={
            ID_Empresa:id_empresa
        }
        //AJAX
        $.ajax({
            url: base_url+"admin/ajax/empresas_delete/",
            type: 'POST',
            data: datos,
            success: function(msg) {
                $('#em_'+id_empresa).hide();
                $('#myModal').modal('hide');
            }
        })
        
    });
}