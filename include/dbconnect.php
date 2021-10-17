<?php



	// this will avoid mysql_connect() deprecation error.

	error_reporting( ~E_DEPRECATED & ~E_NOTICE );

	// but I strongly suggest you to use PDO or MySQLi.

	

	define('DBHOST', 'localhost');

	define('DBUSER', 'conectaycompra');

	define('DBPASS', 'conectaycompra@2017');

	define('DBNAME', 'conectaycompra');

	

	$conn = mysqli_connect(DBHOST,DBUSER,DBPASS);

	$dbcon = mysqli_select_db($conn, DBNAME);

	mysqli_query($conn, "SET NAMES 'utf8'");

	

	if ( !$conn ) {

		die("Connection failed : " . mysqli_error($conn));

	}

	

	if ( !$dbcon ) {

		die("Database Connection failed : " . mysqli_error($conn));

	}