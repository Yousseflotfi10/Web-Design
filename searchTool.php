<!DOCTYPE html>

<html>
	<head>
	
		<title>Search Results</title>
		
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<meta name="author" content="Your Name" />
		<meta name="description" content="Short deacriptopn of this page" />
		<meta name="keywords" content="keywords, for, a, better, search" />
		
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		
	</head>
	
	<body>

		<?php

			require_once 'connect.php'; // remember to change to your NetID
			// $db_server = mysql_connect($db_hostname, $db_username, $db_password);
			$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);


			if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());
		//	mysql_select_db($db_database) or die("Unable to select database: " . mysql_error());

		    $query = $_GET['query']; // This gets the value that the user entered in the search form.
		     
		    $min_length = 3; // We can set minimum length of the query. This is optional.
	     
		    if(strlen($query) >= $min_length){ // If the length of the query is more or equal minimum length, then following operations will be performed:
	         
		        $query = htmlspecialchars($query); // This changes the special characters of the query to their equivalents, for example: "<" to "&gt;"
         
		//        $query = mysql_real_escape_string($query);
		        // makes sure nobody uses SQL injection
        
		        $raw_results = mysqli_query($db_server, "SELECT * FROM Cardata WHERE (username LIKE '%".$query."%') OR (email LIKE '%".$query."%') OR (car LIKE '%".$query."%') OR (age LIKE '%".$query."%') OR (Brand LIKE '%".$query."%') OR (additionchoice LIKE '%".$query."%') OR (ExtraText LIKE '%".$query."%')") OR die(mysql_error());
		        // "Cardata" is the name of our table
		        // * means that we select all fields.
		        // '%$query%' is the search term. % means "anything."
		        // If you want exact match, you need to use title='$query'
         
		        if(mysqli_num_rows($raw_results) > 0){ // If one or more rows are returned, do following:
             
	   				while($results = mysqli_fetch_array($raw_results)){
	    				// $results = mysql_fetch_array($raw_results) puts data from the database into array, while it is valid, it performs the loop

						echo "<p>User ".$results['username']." (e-mail: ".$results['email'].") uploaded favorite cars: ".$results['car'].", most favorite one is ".$results['Brand']." and ".$results['ExtraText']."</p>";
             
						// Posting the results fetched from the database.
            		}
            	}
		        else{ // If there are no matches rows do the following:
            		echo "Your search produced no results."; // You could add some CSS code here, of course.
    	    	}
         
    		}
    		else{ // If the length of the query is less than the minimum we assigned, do the following:
    			    echo "Minimum length is ".$min_length;
    		}
		?>
	</body>
</html>