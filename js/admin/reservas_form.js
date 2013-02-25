//Calendario cosas
$(function() {
    var dates = $( "#from, #to" ).datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: false,
        numberOfMonths: 1,
        onSelect: function( selectedDate ) {
            var option = this.id == "from" ? "minDate" : "maxDate",
            instance = $( this ).data( "datepicker" ),
            date = $.datepicker.parseDate(
                instance.settings.dateFormat ||
                $.datepicker._defaults.dateFormat,
                selectedDate, instance.settings );
            dates.not( this ).datepicker( "option", option, date  );
        }
    });  
    
});

//Autocompletado cosas
$(function() {
    
    var alojamientos_array=[];
    
    base_url = $('#base_url').val();   
    //AJAX
    $.ajax({
        url: base_url+"ajax/reservas_alojamientos_list/",
        type: 'POST',
        success: function(msg) {            
            alojamientos_array=msg.split(',');
            $( "#alojamientos" ).autocomplete({
                source: alojamientos_array
            });
                
        }
    })		
});


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
            document.getElementById('provincia').options[0] = new Option("Seleccione...", "null", false, false)
            document.getElementById('ciudad').options.length = 0;
            document.getElementById('ciudad').options[0] = new Option("Seleccione...", "null", false, false)
            document.getElementById('localidad').options.length = 0;
            document.getElementById('localidad').options[0] = new Option("Seleccione...", "null", false, false)
          
            break;
        case 'ciudad':
            
            datos={
                pais : $('#pais').val(),
                provincia : $('#provincia').val(),
                tipo: 'provincia'
            }
            document.getElementById('ciudad').options.length = 0;
            document.getElementById('ciudad').options[0] = new Option("Seleccione...", "null", false, false)
            document.getElementById('localidad').options.length = 0;
            document.getElementById('localidad').options[0] = new Option("Seleccione...", "null", false, false)
          
            break;
        case 'localidad':
            
            datos={
                pais : $('#pais').val(),
                provincia : $('#provincia').val(),
                ciudad : $('#ciudad').val(),
                tipo: 'ciudad'
            }
            document.getElementById('localidad').options.length = 0;
            document.getElementById('localidad').options[0] = new Option("Seleccione...", "null", false, false)
            break;
    }
    

    $.ajax({
        url: base_url+"ajax/alojamientos_form_select/",
        type: 'GET',
        data: datos,
        success: function(msg) {

            //document.getElementById(variable).options[1] = new Option('Seleccione', 'Seleccione', false)
                
            //var msg = rta.lista[i].split(",");
            var msg = msg.split('-');
            count=0;
            for(var i in msg)
            {
                count++;
                simple = msg[i];
                doble = simple.split(',')
                nombre = doble[1];
                valor = doble[0];
                if(doble!='' && doble!=null)
                    document.getElementById(variable).options[count] = new Option(nombre, valor, false)
            }
                
                
            
        }
    })
        
        
        
        
        
}//Fin Funcion

function mostrar_div()
{
    campo = $('#campo').val();
    if(campo=='nombre')
    {
        $('#nombre_alojamiento').show();
        $('#lugar_alojamiento').hide(); 
    }
    else
    {
        $('#nombre_alojamiento').hide();
        $('#lugar_alojamiento').show(); 
    }
}