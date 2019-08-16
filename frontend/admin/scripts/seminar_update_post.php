<?php 
    require '../configuration/database.php';

        if(isset($_GET['id'])) {
            $post_id = $_GET['id'];

            $title = $_POST['title'];
            $content = $_POST['content'];
            $seminar_speaker = $_POST['seminar_speaker'];

            $query = "UPDATE seminar_table SET seminar_title='$title', seminar_content='$content', seminar_speaker='$seminar_speaker' WHERE id='$post_id'";

            if(!mysqli_query($connec, $query)) {
                echo(json_encode(array('status' => 'OK', 'message' => 'Post could not be updated.', 'error' => mysqli_error($connec))));
            } else {
                echo(json_encode(array('status' => 'OK', 'message' => 'Post updated successfully.')));
            }
        }
?>