<?php
    require '../configuration/database.php';

    //f (isset($_POST['submit-blog-form'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $post_date = date("M j, Y");
        $author = 'CSI';

        //echo(json_encode(array('title' => $title, 'content' => $content, 'date' => $post_date, 'author' => $author)));

        $query = "INSERT INTO blog_table (blog_title, blog_content, blog_post_date, blog_post_author) VALUES('$title', '$content', '$post_date', '$author')";

        if(!mysqli_query($connec, $query)) {
            echo(json_encode(array('status' => 'OK', 'message' => 'Post could not be created.', 'error' => mysqli_error($connec))));

        } else {
            echo(json_encode(array('status' => 'OK', 'message' => 'Post created successfully.')));
        }
 ?>