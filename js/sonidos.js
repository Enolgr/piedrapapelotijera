$(document).ready(function () {


    $("#piedra").click(function () {
        const audio = new Audio("./audio/rock.mp3");
        audio.play();
    });

    $("#papel").click(function () {
        const audio = new Audio("./audio/paper.mp3");
        audio.play();
    });

    $("#tijera").click(function () {
        const audio = new Audio("./audio/scissors.mp3");
        audio.play();
    });

});




