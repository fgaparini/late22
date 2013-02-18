

function llenar(variable)
{
    var base_url = $('#base_url').val();
    var datos={};
    switch(variable)
    {
        case 'provincia':

            datos={
                pais : $('#pais').val(),
                tipo: 'pais'
            }
            document.getElementById('provincia').options.length = 0;
            document.getElementById('provincia').options[0] = new Option("Seleccione...", "", false, false)
            document.getElementById('ciudad').options.length = 0;
            document.getElementById('ciudad').options[0] = new Option("Seleccione...", "", false, false)
            document.getElementById('localidad').options.length = 0;
            document.getElementById('localidad').options[0] = new Option("Seleccione...", "", false, false)
          
            break;
        case 'ciudad':
            
            datos={
                pais : $('#pais').val(),
                provincia : $('#provincia').val(),
                tipo: 'provincia'
            }
            document.getElementById('ciudad').options.length = 0;
            document.getElementById('ciudad').options[0] = new Option("Seleccione...", "", false, false)
            document.getElementById('localidad').options.length = 0;
            document.getElementById('localidad').options[0] = new Option("Seleccione...", "", false, false)
          
            break;
        case 'localidad':
            
            datos={
                pais : $('#pais').val(),
                provincia : $('#provincia').val(),
                ciudad : $('#ciudad').val(),
                tipo: 'ciudad'
            }
            document.getElementById('localidad').options.length = 0;
            document.getElementById('localidad').options[0] = new Option("Seleccione...", "", false, false)
            break;
    }
    

    $.ajax({
        url: base_url+"admin/ajax/alojamientos_form_select/",
        type: 'GET',
        data: datos,
        success: function(msg) {

            //document.getElementById(variable).options[1] = new Option('Seleccione', 'Seleccione', false)
                
            //var msg = rta.lista[i].split(",");
            var msg = msg.split('-');
                
            for(var i in msg)
            {
                simple = msg[i];
                doble = simple.split(',')
                nombre = doble[1];
                valor = doble[0];
                if(doble!='' && doble!=null)
                    document.getElementById(variable).options[i] = new Option(nombre, valor, false)
            }
                
                
            
        }
    })
        
        
        
        
        
}//Fin Funcion

$(function() {
    
    $('input[id=comision_senia]').click(function() {
        var inputcomi2 =$('#comision').val();
        if($('#comision_senia').attr('checked')) {
            $("input#senia").val(inputcomi2);
            $("input#senia").prop({
                readonly:true
            });
        } else {
            $("input#senia").prop({
                readonly:false
            });
        };
    });
                 
    $('input#comision').blur( function (){
                         
        if($('input[id=comision_senia]').attr('checked')) {
            var inputcomi22 =$('#comision').val();
            $("input#senia").val(inputcomi22);
            $("input#senia").prop({
                readonly:true
            });
                                 
        } else {
            $("input#senia").prop({
                readonly:false
            });
        };
    })
    
});




 
