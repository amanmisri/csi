<?php
    require '../configuration/database.php';

    //Create a query
    $query = 'SELECT * FROM seminar_table';
    
    //Get the result
    $result = mysqli_query($connec, $query);

    //Fetch the links
    $all_links = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //var_dump($all_links);

    echo(json_encode($all_links));

    //Free the result
    mysqli_free_result($result);

    //Close the connection
    mysqli_close($connec);


?>