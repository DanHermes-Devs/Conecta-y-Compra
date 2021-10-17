<?php

$db = mysqli_connect('localhost', 'root', 'root', 'conectaycompra');

if(!$db)
{
    echo "Sin conexión";
}

echo "Conexión exitosa";