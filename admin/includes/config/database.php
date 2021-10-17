<?php

function conectarDB() : mysqli
{
    $db = mysqli_connect('127.0.0.1', 'conectaycompra', 'conectaycompra@2017', 'conectaycompra');

    if(!$db)
    {
        echo "No se creo la conexion";
        exit;
    }

    return $db; 
}