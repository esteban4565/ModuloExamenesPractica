$(function()
{
    
    $("#btn_pruebas").click(function() {
        alert(1);
        $("#div_pruebas").empty();
        $.getJSON('pruebasjs/', function(arreglo) {
            for (var iP = 0; iP < arreglo.length; iP++) {
                $("#div_pruebas").append(arreglo[iP].codigo + ' - ' + arreglo[iP].nombre + '<br>');
            }
        });
    });
    
    
}); 