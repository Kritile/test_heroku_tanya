<?php

$response = array();


require_once 'config/db_connect.php';

$db = new DB_CONNECT();
$db->connect();

mysqli_query($db->dbConn, "SET NAMES 'utf8'");


$query = "SELECT * FROM sectionsmainpages";
$result = mysqli_query($db->dbConn, $query);


if (mysqli_num_rows($result) > 0) {
    $response["section"] = array();

    while ($row = mysqli_fetch_array($result)) {
        $section = array();
        $section["_id"] = $row["_id"];
        $section["NameChapter"] = $row["NameChapter"];

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



