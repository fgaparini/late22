<script language = 'javascript' type="text/javascript">
// JavaScript Document
function obtener_nombre_pagina() {
    var ruta_nombre_pagina = document.location.href;
    var pos_sep = ruta_nombre_pagina.lastIndexOf("/"); 
    var nombre_pagina = ruta_nombre_pagina.substring( pos_sep + "/".length , ruta_nombre_pagina.length );
    return nombre_pagina;
}
function ir() {
    var myForm = document.createElement("form");
    myForm.method = "post";
    myForm.action = obtener_nombre_pagina();
    var id_habitacion = <?php echo $id_habitacion; ?>;
    var mes = document.calgen.sel_mes.options[document.calgen.sel_mes.selectedIndex].value;
    var anho = document.calgen.sel_anho.options[document.calgen.sel_anho.selectedIndex].value;
    for (i=1;i<=3;i++) {
        var myInput = document.createElement("input") ;
        switch(i) {
            case 1:
                myInput.setAttribute("name", "id_habitacion");
                myInput.setAttribute("value", id_habitacion);
                break;
            case 2:
                myInput.setAttribute("name", "mes");
                myInput.setAttribute("value", mes);
                break;
            case 3:
                myInput.setAttribute("name", "anho");
                myInput.setAttribute("value", anho);
                break;
        }
        myForm.appendChild(myInput);
    };
    document.body.appendChild(myForm);
    myForm.submit() ;
    document.body.removeChild(myForm);
}
function irdet(vmes, vanho) {
    var myForm = document.createElement("form");
    myForm.method = "post";
    myForm.action = obtener_nombre_pagina();
    var id_habitacion = <?php echo $id_habitacion; ?>;
    var mes = vmes;
    var anho = vanho;
    for (i=1;i<=3;i++) {
        var myInput = document.createElement("input") ;
        switch(i) {
            case 1:
                myInput.setAttribute("name", "id_habitacion");
                myInput.setAttribute("value", id_habitacion);
                break;
            case 2:
                myInput.setAttribute("name", "mes");
                myInput.setAttribute("value", mes);
                break;
            case 3:
                myInput.setAttribute("name", "anho");
                myInput.setAttribute("value", anho);
                break;
        }
        myForm.appendChild(myInput);
    };
    document.body.appendChild(myForm);
    myForm.submit() ;
    document.body.removeChild(myForm);
}
function actualizar() {
    var myForm = document.createElement("form");
    myForm.method = "post";
    myForm.action = obtener_nombre_pagina();
    var id_habitacion = <?php echo $id_habitacion; ?>;
    var mes = document.calgen.sel_mes.options[document.calgen.sel_mes.selectedIndex].value;
    var anho = document.calgen.sel_anho.options[document.calgen.sel_anho.selectedIndex].value;
    for (i=1;i<=3;i++) {
        var myInput = document.createElement("input") ;
        switch(i) {
            case 1:
                myInput.setAttribute("name", "id_habitacion");
                myInput.setAttribute("value", id_habitacion);
                break;
            case 2:
                myInput.setAttribute("name", "mes");
                myInput.setAttribute("value", mes);
                break;
            case 3:
                myInput.setAttribute("name", "anho");
                myInput.setAttribute("value", anho);
                break;
        }
        myForm.appendChild(myInput);
    };
    var total_actu = 0;
    var ac = new Array ();
    var ac = document.getElementsByName("actu");
    for(i=0; i<=ac.length - 1; i++) {
        if (document.calgen.actu[i].checked) {
            total_actu = total_actu + 1;
        };
    };
    if (document.getElementById("calgenasigs") != null) {
        var as = new Array ();
        var as = document.getElementsByName("asig");
        for(i=0; i<=as.length - 1; i++) {
            var actualizar = false;
            if (total_actu == 0) {
                actualizar = true;
            }
            else {
                if (document.calgen.actu[i].checked) {
                    actualizar = true;
                }
            }
            if (actualizar) {
                var min_asig = 0;
                var max_asig = 999;
                if ( (isNaN(Number(document.calgen.asig[i].value)) == true) || (isNaN(parseInt(document.calgen.asig[i].value)) == true) ) {
                    alert("Todos los d�as a actualizar deben tener un NUMERO ASIGNADO entre " + min_asig + " y " + max_asig + ".");
                    return;
                };
                if ( (parseInt(document.calgen.asig[i].value) < min_asig) || (parseInt(document.calgen.asig[i].value) > max_asig) ) {
                    alert("Todos los d�as a actualizar deben tener un NUMERO ASIGNADO mayor que " + min_asig + " y menor " + max_asig + ".");
                    return;
                };
                var myInput = document.createElement("input") ;
                myInput.setAttribute("name", document.calgen.asig[i].id);
                myInput.setAttribute("value", document.calgen.asig[i].value);
                myForm.appendChild(myInput);
            };
        };
    };
    if (document.getElementById("calgenesmis") != null) {
        var esm = new Array ();
        var esm = document.getElementsByName("esmi");
        for(i=0; i<= esm.length - 1; i++) {
            var actualizar = false;
            if (total_actu == 0) {
                actualizar = true;
            }
            else {
                if (document.calgen.actu[i].checked) {
                    actualizar = true;
                }
            }
            if (actualizar) {
                var min_esmi = 0;
                var max_esmi = 999;
                if ( (isNaN(Number(document.calgen.esmi[i].value)) == true) || (isNaN(parseInt(document.calgen.esmi[i].value)) == true) ) {
                    alert("Todos los d�as a actualizar deben tener una ESTANCIA MINIMA entre " + min_esmi + " y " + max_esmi + ".");
                    return;
                };
                if ( (parseInt(document.calgen.esmi[i].value) < min_esmi) || (parseInt(document.calgen.esmi[i].value) > max_esmi) ) {
                    alert("Todos los d�as a actualizar deben tener una ESTANCIA MINIMA mayor que " + min_esmi + " y menor " + max_esmi + ".");
                    return;
                };
                var myInput = document.createElement("input") ;
                myInput.setAttribute("name", document.calgen.esmi[i].id);
                myInput.setAttribute("value", document.calgen.esmi[i].value);
                myForm.appendChild(myInput);
            };
        };
    };
    if (document.getElementById("calgentarns") != null) {
        var ta = new Array ();
        var ta = document.getElementsByName("tarn");
        for(i=0; i<= ta.length - 1; i++) {
            var actualizar = false;
            if (total_actu == 0) {
                actualizar = true;
            }
            else {
                if (document.calgen.actu[i].checked) {
                    actualizar = true;
                }
            }
            if (actualizar) {
                var min_tarn = 0;
                var max_tarn = 9999;
                if ( (isNaN(Number(document.calgen.tarn[i].value)) == true) || (isNaN(parseInt(document.calgen.tarn[i].value)) == true) ) {
                    alert("Todos los d�as a actualizar deben tener una TARIFA NORMAL entre " + min_tarn + " y " + max_tarn + ".");
                    return;
                };
                if ( (parseInt(document.calgen.tarn[i].value) < min_tarn) || (parseInt(document.calgen.tarn[i].value) > max_tarn) ) {
                    alert("Todos los d�as a actualizar deben tener una TARIFA NORMAL mayor que " + min_tarn + " y menor " + max_tarn + ".");
                    return;
                };
                var myInput = document.createElement("input") ;
                myInput.setAttribute("name", document.calgen.tarn[i].id);
                myInput.setAttribute("value", document.calgen.tarn[i].value);
                myForm.appendChild(myInput);
            }
        };
    };
    if (document.getElementById("calgentaros") != null) {
        var to = new Array ();
        var to = document.getElementsByName("taro");
        for(i=0; i<= to.length - 1; i++) {
            var actualizar = false;
            if (total_actu == 0) {
                actualizar = true;
            }
            else {
                if (document.calgen.actu[i].checked) {
                    actualizar = true;
                }
            }
            if (actualizar) {
                var min_taro = 0;
                var max_taro = 9999;
                if ( (isNaN(Number(document.calgen.taro[i].value)) == true) || (isNaN(parseInt(document.calgen.taro[i].value)) == true) ) {
                    alert("Todos los d�as a actualizar deben tener una TARIFA OFERTA entre " + min_taro + " y " + max_taro + ".");
                    return;
                };
                if ( (parseInt(document.calgen.taro[i].value) < min_taro) || (parseInt(document.calgen.taro[i].value) > max_taro) ) {
                    alert("Todos los d�as a actualizar deben tener una TARIFA OFERTA mayor que " + min_taro + " y menor " + max_taro + ".");
                    return;
                };
                if ( parseInt(document.calgen.taro[i].value) > parseInt(document.calgen.tarn[i].value) ) {
                    alert("Todos los d�as a actualizar deben tener una TARIFA OFERTA menor o igual que la TARIFA NORMAL.");
                    return;
                };
                var myInput = document.createElement("input") ;
                myInput.setAttribute("name", document.calgen.taro[i].id);
                myInput.setAttribute("value", document.calgen.taro[i].value);
                myForm.appendChild(myInput);
            }
        };
    };
    if (document.getElementById("calgenbloq") != null) {
        var blo = new Array ();
        var blo = document.getElementsByName("bloq");
        for(i=0; i<=blo.length - 1; i++) {
            var actualizar = false;
            if (total_actu == 0) {
                actualizar = true;
            }
            else {
                if (document.calgen.actu[i].checked) {
                    actualizar = true;
                }
            }
            if (actualizar) {
                var myInput = document.createElement("input") ;
                myInput.setAttribute("name", document.calgen.bloq[i].id);
                myInput.setAttribute("value", document.calgen.bloq[i].value);
                myForm.appendChild(myInput);
            }
        };
    };
    document.body.appendChild(myForm);
    myForm.submit() ;
    document.body.removeChild(myForm);	
}
function sel_todo() {
    var ac = new Array ();
    var ac= document.getElementsByName("actu");
    for(i=0; i<= ac.length - 1; i++) {
        document.calgen.actu[i].checked = document.calgen.calgenactu.checked;
    };		
}
function bloquear_todo(te) {
    var blo = new Array ();
    var blo = document.getElementsByName("bloq");
    var taa = te;
    for(i=0; i<=blo.length - 1; i++) {
        if (taa==1){
            document.getElementById(i).className = 'mostrar2';
            document.getElementById(i+'a').className = 'ocultar2';
            document.calgen.bloq[i].value = 'A';}
        if (taa==2){
            document.getElementById(i).className = 'ocultar2';
            document.getElementById(i+'a').className = 'mostrar2';
            document.calgen.bloq[i].value = 'C';}
    };		
}
function asignar_todo() {
    var min_asig = 0;
    var max_asig = 999;
    if ( (isNaN(Number(document.calgen.calgenasigi.value)) == true) || (isNaN(parseInt(document.calgen.calgenasigi.value)) == true) ) {
        alert("El valor debe ser un n�mero entre " + min_asig + " y " + max_asig + ".");
        return;
    };
    if ( (parseInt(document.calgen.calgenasigi.value) < min_asig) || (parseInt(document.calgen.calgenasigi.value) > max_asig) ) {
        alert("El valor debe ser un n�mero mayor que " + min_asig + " y menor " + max_asig + ".");
        return;
    };
    var as = new Array ();
    var as = document.getElementsByName("asig");
    for(i=0; i<=as.length - 1; i++) {
        var operador = document.calgen.calgenasigs.options[document.calgen.calgenasigs.selectedIndex].value;
        switch (operador) {
            case "=":
                document.calgen.asig[i].value = document.calgen.calgenasigi.value;
                break;
            case "+":
                document.calgen.asig[i].value = parseInt(document.calgen.asig[i].value) + parseInt(document.calgen.calgenasigi.value);
                if (parseInt(document.calgen.asig[i].value) > max_asig) {
                    document.calgen.asig[i].value = max_asig;
                };
                break;
            case "-":
                document.calgen.asig[i].value = parseInt(document.calgen.asig[i].value) - parseInt(document.calgen.calgenasigi.value);
                if (parseInt(document.calgen.asig[i].value) < min_asig) {
                    document.calgen.asig[i].value = min_asig;
                };
                break;
        };
    };		
}
function normal_todo() {
    var min_tarn = 0;
    var max_tarn = 9999;
    if ( (isNaN(Number(document.calgen.calgentarni.value)) == true) || (isNaN(parseInt(document.calgen.calgentarni.value)) == true) ) {
        alert("El valor debe ser un n�mero entre " + min_tarn + " y " + max_tarn + ".");
        return;
    };
    if ( (parseInt(document.calgen.calgentarni.value) < min_tarn) || (parseInt(document.calgen.calgentarni.value) > max_tarn) ) {
        alert("El valor debe ser un n�mero mayor que " + min_tarn + " y menor " + max_tarn + ".");
        return;
    };
    var ta = new Array ();
    var ta = document.getElementsByName("tarn");
    for(i=0; i<= ta.length - 1; i++) {
        var operador = document.calgen.calgentarns.options[document.calgen.calgentarns.selectedIndex].value;
        switch (operador) {
            case "=":
                document.calgen.tarn[i].value = document.calgen.calgentarni.value;
                break;
            case "+":
                document.calgen.tarn[i].value = parseInt(document.calgen.tarn[i].value) + parseInt(document.calgen.calgentarni.value);
                if (parseInt(document.calgen.tarn[i].value) > max_tarn) {
                    document.calgen.tarn[i].value = max_tarn;
                };
                break;
            case "-":
                document.calgen.tarn[i].value = parseInt(document.calgen.tarn[i].value) - parseInt(document.calgen.calgentarni.value);
                if (parseInt(document.calgen.tarn[i].value) < min_tarn) {
                    document.calgen.tarn[i].value = min_tarn;
                };
                break;
        };
    };		
}
function oferta_todo() {
    var min_taro = 0;
    var max_taro = 9999;
    if ( (isNaN(Number(document.calgen.calgentaroi.value)) == true) || (isNaN(parseInt(document.calgen.calgentaroi.value)) == true) ) {
        alert("El valor debe ser un n�mero entre " + min_taro + " y " + max_taro + ".");
        return;
    };
    if ( (parseInt(document.calgen.calgentaroi.value) < min_taro) || (parseInt(document.calgen.calgentaroi.value) > max_taro) ) {
        alert("El valor debe ser un n�mero mayor que " + min_taro + " y menor " + max_taro + ".");
        return;
    };
    var to = new Array ();
    var to = document.getElementsByName("taro");
    for(i=0; i<= to.length - 1; i++) {
        var operador = document.calgen.calgentaros.options[document.calgen.calgentaros.selectedIndex].value;
        switch (operador) {
            case "=":
                document.calgen.taro[i].value = document.calgen.calgentaroi.value;
                break;
            case "+":
                document.calgen.taro[i].value = parseInt(document.calgen.taro[i].value) + parseInt(document.calgen.calgentaroi.value);
                if (parseInt(document.calgen.taro[i].value) > max_taro) {
                    document.calgen.taro[i].value = max_taro;
                };
                break;
            case "-":
                document.calgen.taro[i].value = parseInt(document.calgen.taro[i].value) - parseInt(document.calgen.calgentaroi.value);
                if (parseInt(document.calgen.taro[i].value) < min_taro) {
                    document.calgen.taro[i].value = min_taro;
                };
                break;
        };
    };		
}
function esmi_todo() {
    var min_esmi = 0;
    var max_esmi = 999;
    if ( (isNaN(Number(document.calgen.calgenesmii.value)) == true) || (isNaN(parseInt(document.calgen.calgenesmii.value)) == true) ) {
        alert("El valor debe ser un n�mero entre " + min_esmi + " y " + max_esmi + ".");
        return;
    };
    if ( (parseInt(document.calgen.calgenesmii.value) < min_esmi) || (parseInt(document.calgen.calgenesmii.value) > max_esmi) ) {
        alert("El valor debe ser un n�mero mayor que " + min_esmi + " y menor " + max_esmi + ".");
        return;
    };
    var esm = new Array ();
    var esm = document.getElementsByName("esmi");
    for(i=0; i<= esm.length - 1; i++) {
        var operador = document.calgen.calgenesmis.options[document.calgen.calgenesmis.selectedIndex].value;
        switch (operador) {
            case "=":
                document.calgen.esmi[i].value = document.calgen.calgenesmii.value;
                break;
            case "+":
                document.calgen.esmi[i].value = parseInt(document.calgen.esmi[i].value) + parseInt(document.calgen.calgenesmii.value);
                if (parseInt(document.calgen.esmi[i].value) > max_esmi) {
                    document.calgen.esmi[i].value = max_esmi;
                };
                break;
            case "-":
                document.calgen.esmi[i].value = parseInt(document.calgen.esmi[i].value) - parseInt(document.calgen.calgenesmii.value);
                if (parseInt(document.calgen.esmi[i].value) < min_esmi) {
                    document.calgen.esmi[i].value = min_esmi;
                };
                break;
        };
    };		
}



$(document).ready(function () {
     
     
    $(".bloqids").click(function(){
    
    var bloqs=$(this).attr("id");
    var bloqs1=bloqs.split("-");
    var bloqs2=bloqs1[0];

    bloquear(bloqs2);

});
$(".abierid").click(function(){
    var abiert1=$(this).attr("id");
    var abiert11=abiert1.split("-");
    var abiert12=abiert11[0];

    abierto(abiert12);
});

});


function bloquear(ja) {
document.getElementById(ja).className = 'ocultar2';
document.getElementById(ja+'a').className = 'mostrar2';
document.calgen.bloq[ja].value = "C";
}
function abierto(ka) {
document.getElementById(ka).className = 'mostrar2';
document.getElementById(ka+"a").className = 'ocultar2';
document.calgen.bloq[ka].value = "A";
}

</script>