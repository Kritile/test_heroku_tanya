<?php

$response = array();

if (isset($_POST['Login']) && isset($_POST['Password'])) {

	$name = $_POST['Login'];
	$pswd = $_POST['Password'];


	require_once 'config/db_connect.php';

	$db = new DB_CONNECT();
	$db->connect();

	$query = "UPDATE registeredusers SET checkAuthoriz='0' WHERE Username='".$name."' AND Password='".$pswd."'";
	$result = mysqli_query($db->dbConn, $query);


	if ($result > 0) {

		$response["success"] = 1;
		$response["message"] = "Authoriz";

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