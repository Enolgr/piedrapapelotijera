$(document).ready(function () {
    let seleccion = false;
    let jugador = false;
    let jugador1 = false;
    let seleccion1 = false;

    function solucion() {
        let resultado;
        if (seleccion === 'piedra' && seleccion1 === 'tijera') {
            resultado = '¡Ha ganado ' + jugador + '!';
        } else if (seleccion === 'papel' && seleccion1 === 'piedra') {
            resultado = '¡Ha ganado ' + jugador + '!';
        } else if (seleccion === 'tijera' && seleccion1 === 'papel') {
            resultado = '¡Ha ganado ' + jugador + '!';
        } else if (seleccion1 === seleccion) {
            resultado = '¡Es un empate!';
        } else {
            resultado = 'Ha ganado, ' + jugador1 + ' intenta de nuevo.';
        }

        $("#respuesta").text(resultado);  // Mostrar el resultado en el contenedor de respuesta
    }

    // Selección de imagen y actualización de estilo
    $("img").click(function () {
        seleccion = $(this).data("value");
        $(".elemento").removeClass("seleccionado");
        $(this).addClass("seleccionado");
        $("#respuesta").html("");
    });

    // Capturar el nombre del jugador
    $("#nombre").change(function () {
        jugador = $('#nombre').val();
        console.log(jugador);
    });

    // Iniciar el juego
    $("#jugar").click(function () {
        if (!jugador) {
            $("#respuesta").html("Introduce tu nombre antes de jugar");
            return; // Salir de la función si no hay nombre
        }

        if (seleccion && jugador) {
            $.ajax({
                type: "POST",
                url: "./php/guarda.php",    
                data: { jugador: jugador, seleccion: seleccion },
                dataType: "json",
                success: function (respuesta) {
                    jugador1 = respuesta.nombre; 
                    seleccion1 = respuesta.seleccion;

                    if (jugador1 && seleccion1) {

                        // Si hay un jugador1, se puede jugar
                        solucion();
                    } else {
                        // Si no hay jugador1, mostrar mensaje de espera
                        $("#respuesta").text("Esperando al jugador 2...");
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $("#respuesta").text("Error en la comunicación con el servidor: " + textStatus);
                }
            });
        } else {
            $("#respuesta").html("Selecciona una opción antes de jugar");
        }
    });
});
