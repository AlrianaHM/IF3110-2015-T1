<!--@author : Ignatius Alriana H.M / 13513051-->
<?php 
	$host = 'localhost';
	// MySQL username
	$username = 'root';
	// MySQL password
	$password = '';
	// Database name
	$database = 'stackexchange';

	$db = mysqli_connect($host, $username, $password, $database);

	function addQuestion($Name, $Email, $Topic, $content){
		global $db;

		$qry = "INSERT INTO question (Name, Email, Topic, Content)
			VALUES ('$Name', '$Email', '$Topic', '$content')";
		
		$res = mysqli_query($db, $qry);
		
	}

	function getAllQuestion(){
		global $db;

		$qry = "SELECT * FROM question ORDER BY created_date DESC" ;
		
		$res = mysqli_query($db, $qry);
		return $res;
	}

?>