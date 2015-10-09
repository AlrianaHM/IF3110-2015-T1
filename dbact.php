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
		return $res;
		
	}

	function updateQuestion($id_q, $Name, $Email, $Topic, $content){
		global $db;

		$qry = "UPDATE question SET Name='$Name', Email='$Email', Topic='$Topic', Content='$content' WHERE id_q=$id_q";
		
		$res = mysqli_query($db, $qry);
		return $res;
		
	}

	function getQuestion($id) {
		global $db;
		$q = "SELECT * FROM question WHERE id_q='$id'";
		$res = mysqli_query($db, $q);

		$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
		
		return $row;
	}

	function getLastQid() {
		global $db;
		$q = "SELECT * FROM question ORDER BY id_q DESC LIMIT 1";
		$res = mysqli_query($db, $q);
		$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
		return $row;
	}

	function getAllQuestion(){
		global $db;

		$qry = "SELECT * FROM question ORDER BY created_date DESC" ;
		
		$res = mysqli_query($db, $qry);
		return $res;
	}

	function delQuestion($id_q){
		global $db;

		$qry = "DELETE FROM question WHERE id_q=$id_q";

		$res = mysqli_query($db, $qry);
		return $res;
	}

	function addAnswer($id, $Name, $Email, $content){
		global $db;

		$qry = "INSERT INTO answer (id_q, Name, Email, Content)
			VALUES ('$id', '$Name', '$Email', '$content')";
		
		$res = mysqli_query($db, $qry);
		$qry2 = "UPDATE question SET nAns=nAns+1 WHERE id_q=$id" ;
		$res = mysqli_query($db, $qry2);
		return $res;
		
	}

	function getAnsfor($id_q){
		global $db;

		$qry = "SELECT * FROM answer WHERE id_q=$id_q ORDER BY created_date DESC" ;
		
		$res = mysqli_query($db, $qry);

		return $res;
	}
?>
