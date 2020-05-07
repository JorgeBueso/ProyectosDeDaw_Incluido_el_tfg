$(document).ready(function(){

    //Sidenav en móviles
    $('.sidenav').sidenav();

    //Mensajes
    var input_tipo = $("input[name=tipo-mensaje]");
    var input_texto = $("input[name=texto-mensaje]");
    if (input_tipo.length && input_texto.length){
        M.toast({html: input_texto.val(), classes: input_tipo.val() + " lighten-5"});
    }

    //Ocultar toast
    $(".toast").click(function () {
        $(this).hide();
    });

    //Cambiar clave
    $("input[type=checkbox][name=cambiar_clave]").click(function () {
        $("#password").toggleClass( "hide" );
    });

});