<?php
	include_once 'dbconnect.php';
?>
<?php require_once 'include/header.php'; ?>


 <!-- Page Content -->
    <div class="container pagecont" style="width: 100%;
           padding: 50px 15px; margin-top:120px; min-height: 300px;">
	   
           <div class="col-sm-12 col-md-12" style="padding:0; text-align: center;">
<?php
    $query = $_GET['q']; 
    // gets value sent over search form
     
    $min_length = 3;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query = mysqli_real_escape_string($query);
        // makes sure nobody uses SQL injection
         
        $raw_results = mysqli_query($conn, "SELECT * FROM tiendas
            WHERE (`titulo` LIKE '%".$query."%') OR (`descripcion` LIKE '%".$query."%') OR (`categoria` LIKE '%".$query."%')") or die(mysqli_error());
             
        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table
         
        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
         
        if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysqli_fetch_array($raw_results)){
            // $results = mysqli_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             
                echo "<p><h3>".$results['titulo']."</h3>".$results['text']."</p>";
                // posts results gotten from database(title and text) you can also show id ($results['id'])
            }
             
        }
        else{ // if there is no matching rows do following
            echo "No se encontraron resultados para '<strong><i>" .$query ."</i></strong> '. Intenta nuevamente con otro término.";
        }
         
    }
    else{ // if query length is less than minimum
        echo "Ingresa un mínimo de ".$min_length. " caracteres.";
    }
?>
	
		</div>
	</div>
	
	<?php require_once 'include/footer.php'; ?>


	

	

</body>

</html>
