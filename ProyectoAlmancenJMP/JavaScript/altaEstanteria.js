function huecosLibres(str) {
    //alert (strg);
    var xmlhttp;
    if (str == "") {
        document.getElementById("lugardisponible").innerHTML = "";
        return;
    }
    /*Asumiendo que el select de las lejas se llama lejasdisponibles, si la cadena de selectEstanteria es vacía, también lo será lejasdisponibles
     */
    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
        /* Creamos el objeto request para conexiones http,
         compatible con los navegadores descritos*/
    } else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        /*Como el explorer va por su cuenta, el objeto es un ActiveX */
    }

    /*Propiedades del objeto xmlhttp de la clase  XMLHttpRequest */
    xmlhttp.onreadystatechange = function () {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("lugardisponible").innerHTML = xmlhttp.responseText;
            /*Seleccionamos el elemento que recibirá el flujo de datos*/
        }
    }
//      alert(strg);
    xmlhttp.open("GET","../Controlador/ControladorLugarLibre.php?pasillosdisponibles=" + str, true);
    /*Mandamos al PHP encargado de traer los datos, el valor de referencia */
//        alert(str);
    xmlhttp.send();
}


