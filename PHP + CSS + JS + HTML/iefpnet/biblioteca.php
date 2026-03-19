<?php
function conectarBD(){ // conectar à BD
    $link = mysqli_connect("localhost", "bdutil", "qwerty123", "iefpnet");

    if (!$link){
        die('Não foi possível conectar à Base de Dados: ' . mysqli_error($link));
    }

    mysqli_set_charset($link, "utf8"); //para ç e ~
        
    return $link; 

}

?>