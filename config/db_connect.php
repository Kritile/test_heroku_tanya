<?php

class DB_CONNECT {

	var $dbConn;

    function connect() {
        require_once  'db_config.php';

        $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE) or die('Ошибка соединения: ' .  mysqli_error($con));
		
		$this->dbConn = $con;

        // returing connection cursor
        return $this->dbConn;

    }

    function close() {
        mysqli_close($dbConn);
    }

}

?>