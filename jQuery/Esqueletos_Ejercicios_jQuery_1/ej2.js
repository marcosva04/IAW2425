/* Rellena este fichero */

$(document).ready(function () {
    // Cuando el sitio web se haya cargado por completo
    $("#btn-ocultar").click(function(){ 
        $("#encabezado").hide();
        $(".pares").hide();
     });

    $("#btn-mostrar").click(function(){ 
        $("#encabezado").show();
        $(".pares").show();
     });

});