<?php
//1. abrimos un controlador de errores
try {
    //2. instanciamos la clase PDO
    $con = new PDO("mysql:host=localhost;dbname=sitio_php", "root", "");

    //3. ejecutamos el cambio de caracteres correspondientes
    $con->exec("SET CHARACTER SET UTF8");
} catch (Exception $e) {

    echo "Error" . $e->getMessage();
}
