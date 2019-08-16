<?php
    require '../configuration/database.php';

    $problem = $_POST['problem'];
    $option_1 = $_POST['option1'];
    $option_2 = $_POST['option2'];
    $option_3 = $_POST['option3'];
    $option_4 = $_POST['option4'];
    $correct = $_POST['correct_option'];

    //echo(json_encode(array("problem" => $problem, "opt1" => $option1, "opt2" => $option_2, "opt3" => $option_3, "opt4" => $option_4, "correct" => $correct)));

    $query = "INSERT INTO problem_of_the_week_admin (problem, option_1, option_2, option_3, option_4, correct_option) VALUES ('$problem', '$option_1', '$option_2', '$option_3', '$option_4', '$correct')";

    if(!mysqli_query($connec, $query)) {
        echo(json_encode(array('status' => 'OK', 'message' => 'Problem could not be created.', 'error' => mysqli_error($connec))));
    } else {
        echo'<script>alert("Problem Created")</script>';
        header("Location: ../a2/create_a_problem.php");
    }

?>