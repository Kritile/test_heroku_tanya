<?php

$response = array();

if (isset($_POST['Login']) && isset($_POST['Password'])) {

	$name = $_POST['Login'];
	$pswd = $_POST['Password'];
	$table = $_POST['TableName'];


	require_once 'config/db_connect.php';

	$db = new DB_CONNECT();
	$db->connect();

	$query = "SELECT * FROM registeredusers WHERE `".$table."`='".$name."' AND `Password`='".$pswd."'";
	$result = mysqli_query($db->dbConn, $query);


if (mysqli_num_rows($result) > 0) {
    $response["section"] = array();

    while ($row = mysqli_fetch_array($result)) {
        $section = array();
        $section["username"] = $row["Username"];
        $section["password"] = $row["Password"];
		$section["email"] = $row["EmailAddress"];
		$section["phone"] = $row["Phone"];
        array_push($response["section"], $section);
    }
    $response["success"] = 1;

    echo json_encode($response);
} else {
    $response["success"] = 0;
    $response["message"] = "No section found";

    echo json_encode($response);
}


?>



