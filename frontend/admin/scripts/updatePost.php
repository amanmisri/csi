<?php 
    require '../configuration/database.php';

        if(isset($_GET['id'])) {
            $post_id = $_GET['id'];

            $title = $_POST['title'];
            $content = $_POST['content'];
            $post_date = $_POST['current_date'];
            $author = 'CSI';

            $query = "UPDATE blog_table SET blog_title='$title', blog_content='$content', blog_post_author='$author' WHERE id='$post_id'";

            if(!mysqli_query($connec, $query)) {
                echo(json_encode(array('status' => 'OK', 'message' => 'Post could not be updated.', 'error' => mysqli_error($connec))));
            } else {
                echo(json_encode(array('status' => 'OK', 'message' => 'Post updated successfully.')));
            }
        }
?>