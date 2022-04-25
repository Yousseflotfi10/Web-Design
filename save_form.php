<?php
	require_once 'connect.php';
	$db_connect = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

	if (!$db_connect) die("Unable to connect to MySQL.");

	$username = $_POST['name_from'];
	$email = $_POST['email_from'];
	$favoritecar = $_POST['textline'];
	$age = $_POST['textline_optional'];
	$brand = $_POST['dropdown'];
	$additionchoice = (implode(",", $_POST['Option']));
	$text = $_POST['textarea'];

	$check = mysqli_query($db_connect, "SELECT 1 FROM Collectdata");

	if (!$check) {
		$create_table = "CREATE TABLE Collectdata (id INT NOT NULL AUTO_INCREMENT, username TEXT NOT NULL,".
		"email VARCHAR(100) NOT NULL, car TEXT NOT NULL, age INT(3), Brand TEXT NOT NULL,".
		"additionchoice TEXT, ExtraText TEXT, PRIMARY KEY (id));";

		$table_created = mysqli_query($db_connect, $create_table) or die("Unable to create table.");
		};


	$query = "INSERT INTO Collectdata (username, email, car, age, Brand, additionchoice, ExtraText)".
		"VALUES ('$username','$email','$favoritecar','$age','$brand','$additionchoice','$text');";

	$result = mysqli_query($db_connect, $query) or die("Unable to insert data.");

	if($result){
		echo "Data Saved Successfully!";}
	else{
		echo "There was a problem while saving the data.";}	

?>