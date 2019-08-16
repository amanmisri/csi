<?php 

    $DB_HOST = 'localhost';
    $DB_USERNAME = 'csiAdmin';
    $DB_PASS = 'kdMZL{]MXJaS';
    $DB_NAME='csiWebsite';

    //Create a connection
    $connec = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASS, $DB_NAME);

    //Check the connection
    if(!$connec) {
        echo 'Did not connect to the server due to some error';
    }

    //Check if database exist
    if(!mysqli_select_db($connec, 'csi_website')) {
        echo 'Could not find the database you are looking for';
    }

?>