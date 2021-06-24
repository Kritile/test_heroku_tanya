<?php

$response = array();

if (isset($_POST['nameTable']) && isset($_POST['nameWhere']) && isset($_POST['nameColumn'])) {

	$table = $_POST['nameTable'];
	$inspection = $_POST['nameWhere'];
	$column = $_POST['nameColumn'];

	require_once 'config/db_connect.php';

	$db = new DB_CONNECT();
	$db->connect();

	mysqli_query($db->dbConn, "SET NAMES 'utf8'");


	$query = "SELECT `_id` FROM ".$table." WHERE ".$column."='".$inspection."'";
	
	$result = mysqli_query($db->dbConn, $query);


	if ($result > 0 && $result != null) {
		
	while($row=mysqli_fetch_assoc($result))
    {
		$response["success"] = 1;
        $response["_id"] = $row['_id'];
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



