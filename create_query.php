<?php
$response = array();

if (isset($_POST['name'])) {

    $name = $_POST['name'];
	
	require_once 'config/db_connect.php';

    $db = new DB_CONNECT();
	$db->connect();

    $result = mysqli_query($db->dbConn, "INSERT INTO sectionsmainpages(NameChapter, idCategory) VALUES ('$name', '1')");

    if ($result) {
        $response["success"] = 1;
        $response["message"] = "Product successfully created.";

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