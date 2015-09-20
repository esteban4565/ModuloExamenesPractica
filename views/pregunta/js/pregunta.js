$(function()
{
    
    $("#contenido").change(function() {
        var cont = $("#contenido").val();
        if (cont === "nuevo") {
            document.getElementById("div_contenido_tx").style.display = 'block';
        }
        else {
            document.getElementById("div_contenido_tx").style.display = 'none';
        }
    });
    
    
}); 