 $(function () {
   
   
   $('.descripcion_form a' ).click(function(){
       
       
       var ids=$( this).attr('rel');
        
       var descrip =$('form#'+ids).children('input#descrip_'+ids).val();
       var id_emp =$('form#'+ids).children('input#ID_Empresa_'+ids).val();
        
        base_url = $('#base_url').val();   
        $.blockUI({ message: '<img src="'+base_url+'img/ajax-loader.gif" />' });
        
        datos={
            ID_Empresa:id_emp,
            ImagenEmpresa:ids,
            ImagenDescripcion:descrip
        }
        //AJAX
        $.ajax({
            url: base_url+"admin/ajax/empresas_imagenes_descripcion/",
            type: 'POST',
            data: datos,
            success: function(msg) {
                $.unblockUI();
               
            }
        })
        
        
   });
     
 })
