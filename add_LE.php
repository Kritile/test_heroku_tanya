<?php
$response = array();

if (isset($_POST['NameOrganization']) && isset($_POST['INN']) && isset($_POST['Phone']) && isset($_POST['EmailAddress'])) {

    $nameOrganiz = $_POST['NameOrganization'];
	$inn = $_POST['INN'];
	$phone = $_POST['Phone'];
	$mail = $_POST['EmailAddress'];
	
	require_once 'config/db_connect.php';

    $db = new DB_CONNECT();
	$db->connect();

    $result = mysqli_query($db->dbConn, "INSERT INTO informationaboutlegalentities(`NameOrganization, INN, Phone, EmailAddress) VALUES ('$nameOrganiz', '$inn', '$phone', '$mail')") or die ('Error in query to database');

    if ($result) {
        $response["success"] = 1;
        $response["message"] = "Legal Entry info successfully add.";

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