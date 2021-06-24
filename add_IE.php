<?php
$response = array();

if (isset($_POST['Surname']) && isset($_POST['Name']) && isset($_POST['INN']) && isset($_POST['Phone']) && isset($_POST['EmailAddress'])) {

    $surname = $_POST['Surname'];
	$name = $_POST['Name'];
	$middlname = $_POST['MiddleName'];
	$inn = $_POST['INN'];
	$phone = $_POST['Phone'];
	$mail = $_POST['EmailAddress'];
	
	require_once 'config/db_connect.php';

    $db = new DB_CONNECT();
	$db->connect();

    $result = mysqli_query($db->dbConn, "INSERT INTO informationaboutindividualentrepreneurs(Surname, Name, MiddleName, INN, Phone, EmailAddress) VALUES ('$surname','$name', '$middlname', '$inn', '$phone', '$mail')");

    if ($result) {
        $response["success"] = 1;
        $response["message"] = "Individual Entry info successfully created.";

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