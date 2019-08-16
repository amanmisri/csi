<?php 
	error_reporting(E_ERROR | E_PARSE);
    require '../configuration/database.php';

    $question_id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $option = $_POST['options'];
    $score = 0;

    //echo json_encode(array("id" => $question_id, "name" => $name, "mobile" => $mobile, "option" => $option, "email" => $email));

    $check_already = "SELECT * FROM `user_submit_problem` WHERE user_email = '$email' and problem_id = $question_id";
    $result_check = mysqli_query($connec, $check_already);
    if(mysqli_num_rows($result_check) > 0){

        die("You have already submitted the answer for this problem");

    }else{
    $query = "SELECT email_student from problem_of_the_week where email_student='$email'";
    $result = mysqli_query($connec, $query);

    //echo json_encode(array("result" => mysqli_num_rows($result)));   


    if(mysqli_num_rows($result) > 0) {
        /*$query = "SELECT score from problem_of_the_week where email_student='$email'";
        $result = mysqli_query($connec, $query);
        //echo json_encode(array("result" => mysqli_fetch_all($result, MYSQLI_ASSOC)));

        $score = mysqli_fetch_all($result, MYSQLI_ASSOC);*/
        echo "WELCOME: " . $name;
        echo "<br>";
        $correct_option = '';
        $query = "SELECT correct_option from problem_of_the_week_admin where id=$question_id";
        //echo $query;
        $res = mysqli_query($connec, $query);
        //print_r(mysqli_fetch_assoc($res));
        $temp = mysqli_fetch_assoc($res);
        $correct_option = $temp['correct_option'];

        if($option == $correct_option) {
            $query = "UPDATE problem_of_the_week 
            SET score = score + 5 
            WHERE email_student = '$email'";
             $add_to_check_user = "INSERT INTO `user_submit_problem`(`user_email`, `problem_id`) VALUES ('$email', $question_id )";
             mysqli_query($connec, $add_to_check_user);

            if(mysqli_query($connec, $query)) {
                echo "Thank you for your submission";
            }
        }else{
            echo "Thank you for your submission";
        }
        //print_r($correct_option);
        /*$temp = mysqli_fetch_assoc($res, MYSQLI_ASSOC);
        echo json_encode($temp);*/
        
        //json_encode($score)['score'] = json_encode($score)['score'] + 5; 
    } else {
        $query = "INSERT INTO problem_of_the_week (name_of_student, email_student, phone_number, score) VALUES ('$name', '$email', $mobile, $score)";
         $add_to_check_user = "INSERT INTO `user_submit_problem`(`user_email`, `problem_id`) VALUES ('$email', $question_id )";
         mysqli_query($connec, $add_to_check_user);
        if(mysqli_query($connec, $query)  ) {
             echo "WELCOME: " . $name;
              echo "<br>";
        }

        $correct_option = '';
        $query = "SELECT correct_option from problem_of_the_week_admin where id=$question_id";
        //echo $query;
        $res = mysqli_query($connec, $query);
        //print_r(mysqli_fetch_assoc($res));
        $temp = mysqli_fetch_assoc($res);
        $correct_option = $temp['correct_option'];

        if($option == $correct_option) {
            $query = "UPDATE problem_of_the_week 
            SET score = score + 5 
            WHERE email_student = '$email'";

            if(mysqli_query($connec, $query)) {
                 echo "Thank you for your submission";
            }
        }
        else{
            echo "Thank you for your submission";
        }
    } 

}//big else
?>