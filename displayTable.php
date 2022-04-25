<!DOCTYPE html>

<html>
	<head>
	
		<title>Table Content</title>
		
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<meta name="author" content="Your Name" />
		<meta name="description" content="Short deacriptopn of this page" />
		<meta name="keywords" content="keywords, for, a, better, search" />
		
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		
	</head>
	
	<body>

		<?php

			require_once 'connect.php';
			$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
			if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());

    	        	$raw_results = mysqli_query($db_server, "SELECT * FROM Collectdata") or die(mysql_error());
		      // "Collectdata" is the name of our table
		      // * means that we select all fields.
		               
		      if(mysqli_num_rows($raw_results) > 0){ // If one or more rows are returned, do following:

				while($results = mysqli_fetch_array($raw_results)){
				// $results = mysql_fetch_array($raw_results) puts data from the database into array, while it is valid, it performs the loop

					echo "<p>".$results['username']." – ".$results['email']." – ".$results['favoritecar']." – ".$results['age']." – ".$results['brand']." – ".$results['additionchoice']." – ".$results['text']."</p>";
            		}
	    		}
		?>
	</body>
</html>