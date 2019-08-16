<?php
    require '../configuration/database.php';

    //f (isset($_POST['submit-blog-form'])) {
        $title = $_POST['title'];
        $content = $_POST['content_one'];
        //$post_date = date("M j, Y");
        $seminar_speaker = $_POST['seminar_speaker'];

        //echo(json_encode(array('title' => $title, 'content' => $content, 'date' => $post_date, 'author' => $author)));

        $query = "INSERT INTO seminar_table (seminar_title, seminar_content, seminar_speaker) VALUES('$title', '$content', '$seminar_speaker')";

        if(!mysqli_query($connec, $query)) {
            echo(json_encode(array('status' => 'OK', 'message' => 'Post could not be created.', 'error' => mysqli_error($connec))));

        } else {
            echo(json_encode(array('status' => 'OK', 'message' => 'Post created successfully.')));
        }
 ?>