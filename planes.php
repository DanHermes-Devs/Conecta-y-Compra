<?php
ob_start();
session_start();
if( !isset($_SESSION['user'])){
	header("Location: login?p=cuenta");
}
else{
	$uid= $_SESSION['user'];
}
include_once 'dbconnect.php';

require_once 'include/header.php';

?>


<div class="container pagecont" style="width: 100%;padding: 50px 15px; margin-top:100px;">

<h1>Planes</h1>

</div>


<?php require_once 'include/footer.php'; ?>

</body>

</html>
<?php ob_end_flush(); ?>