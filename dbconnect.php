<?php
	// this will avoid mysql_connect() deprecation error.

	error_reporting( ~E_DEPRECATED & ~E_NOTICE );

	// but I strongly suggest you to use PDO or MySQLi.

	$conn = mysqli_connect("localhost", "conectaycompra", "conectaycompra@2017") or die("No se puede conectar al servidor de BD");
	mysqli_select_db($conn, "conectaycompra") or die("No se puede seleccionar la base"); 
	mysqli_query($conn, "SET NAMES 'utf8'");

	$dbcon = mysqli_select_db($conn, "conectaycompra");
	mysqli_query($conn, "SET NAMES 'utf8'");