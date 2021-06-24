<?php
$response = array();

if (isset($_POST['inspection']) && isset($_POST['service']) && isset($_POST['date']) && isset($_POST['time'])) {

    $inspection = $_POST['inspection'];
	$service = $_POST['service']; 
	$date = $_POST['date'];
	$time = $_POST['time']; 

	$udIE = $_POST['individual'];
	
	require_once 'config/db_connect.php';

    $db = new DB_CONNECT();
	$db->connect();

    $result = mysqli_query($db->dbConn, "INSERT INTO makeanappointment(idInspection, IdService, Date, Time, idIndividual) VALUES ('$inspection','$service', '$date', '$time', $udIE)");

    if ($result) {
        $response["success"] = 1;
        $response["message"] = "Appointmen successfully created.";

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