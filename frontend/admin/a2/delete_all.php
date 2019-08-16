

<?php 
    require '../configuration/database.php';
    $query = "SELECT  `id`, `name_of_student`, `email_student`, `phone_number`, `score` FROM `problem_of_the_week` ORDER BY score DESC";
    $query1  = 'TRUNCATE `problem_of_the_week_admin`';
	$query2 = 'TRUNCATE `problem_of_the_week`';
	$query3 = "TRUNCARE 'user_submit_problem'";
    //Get the result
    mysqli_query($connec, $query1);
    mysqli_query($connec, $query2);
    mysqli_query($connec, $query3);

?>