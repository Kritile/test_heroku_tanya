<?php
$response = array();

if (isset($_POST['username']) && isset($_POST['Email']) && isset($_POST['Password'])) {
	
	$name = $_POST['username'];
	$password = $_POST['Password'];
	$phone = $_POST['Phone'];
	$mail = $_POST['Email'];
	
	require_once 'config/db_connect.php';

    $db = new DB_CONNECT();
	$db->connect();

    $result = mysqli_query($db->dbConn, "INSERT INTO registeredusers(Username, Password, Phone, EmailAddress)  VALUES ('$name', '$password', '$phone', '$mail')") or die ('Error in query to database');

    if ($result) {
        $response["success"] = 1;
        $response["message"] = "Registration";

        echo json_encode($response);
    } else {
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";

        echo json_encode($response);
    }
} else {
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    echo json_encode($response);
}
?>