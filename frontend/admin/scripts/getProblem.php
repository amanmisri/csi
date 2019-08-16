<?php
    require '../configuration/database.php';

    $query = "SELECT * FROM problem_of_the_week_admin ORDER BY id DESC LIMIT 1";

    $result = mysqli_query($connec, $query);

    //Fetch the links
    $all_links = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //var_dump($all_links);

    print_r(json_encode($all_links));

    //Free the result
    mysqli_free_result($result);

    //Close the connection
    mysqli_close($connec);

?>