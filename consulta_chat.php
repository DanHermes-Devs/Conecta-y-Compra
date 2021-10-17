<?php 

ob_start();
session_start();

require_once 'dbconnect.php';
// $res=mysqli_query($conn, "SELECT * FROM usuarios WHERE id_usuario=".$_SESSION['user']);
// $userRow=mysqli_fetch_array($res);
$res=mysqli_query($conn, "SELECT * FROM usuarios WHERE id_usuario=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res);

$cons = "SELECT * FROM chat ORDER BY id DESC";
$ejecutarSQL = mysqli_query ($conn, $cons); 

while ($rowChat = mysqli_fetch_assoc($ejecutarSQL)) { 



	echo '<div id="datos-chat">
				<span style="color: #1c62c4;">'. $rowChat['nombre'] .': </span>
				<span style="color: #848484;">'. $rowChat['mensaje'] .' </span>
				<span style="float:right;">'. date('g:i a', strtotime($rowChat['fecha'])) .'</span>
			</div>';

}