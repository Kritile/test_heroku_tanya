<?php

$response = array();

if (isset($_POST['Login']) && isset($_POST['Password']) && isset($_POST['TableName'])) {

	$name = $_POST['Login'];
	$pswd = $_POST['Password'];
	$table = $_POST['TableName'];

	require_once 'config/db_connect.php';

	$db = new DB_CONNECT();
	$db->connect();

	$query = "SELECT * FROM registeredusers WHERE ".$table."='".$name."' AND Password='".$pswd."'";
	$result = mysqli_query($db->dbConn, $query);


	if ($result > 0) {
	
		mysqli_query($db->dbConn, "UPDATE registeredusers SET checkAuthoriz='1' WHERE ".$table."='".$name."' AND Password='".$pswd."'") or die ('Error in query to database');

		while($row=mysqli_fetch_assoc($result))
		{
			$response["success"] = 1;
			$response["message"] = "Authoriz";
		} 
    
		echo json_encode($response);
        
} else {
    $response["success"] = 0;
    $response["message"] = "No section found";
    echo json_encode($response);
}
}else {
    $response["success"] = 0;
    $response["message"] = "Error";
    echo json_encode($response);
}


?>



