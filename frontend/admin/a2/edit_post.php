<?php
    require '../configuration/database.php';
    $post_id = $_GET['id'];
    
    $query = "SELECT * FROM `blog_table` WHERE `id`='" . $post_id . "'";
    $result = mysqli_fetch_array(mysqli_query($connec, $query));
?>

<head>
    <title>Edit - CSI Admin</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<?php include('../layout/header.php') ?>
<div class="container mt-4 ml-auto mr-auto edit">
    <h3 class="text-center">Edit</h3>
    <form id="blog_form" class="edit_form">
        <div class="form-group">
            <label for="title">Title: </label>
            <input id="title" type="text" name="title" class="form-control" required placeholder="Enter a post title" autocomplete="off" value="<?php echo $result['blog_title']; ?>">
        </div>
        <div class="form-group">
            <label for="content">Blog Content: </label>
            <textarea name="content" id="editor" class="form-control"><?php echo $result['blog_content']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="current_date">Date: </label>
            <input type="text" name="current_date" id="currentDate" class="form-control" disabled value="<?php echo $result['blog_post_date']; ?>">
        </div>
        <div class="form-group">
            <label for="written_by">Written By: </label>
            <input type="text" id="author" name="written_by" class="form-control" value="CSI" disabled>
        </div>
        <button type="button" id="preview" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-lg">Preview</button>
        <input type="submit" name="submit-blog-form" value="Done" class="btn btn-success" id="edit_submit">
        <a class="btn btn-secondary" href="./admin.php">Back</a>
    </form>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div id="preview_modal" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>
</div>
<?php include('../layout/footer.php') ?>
<!--<script src="../assets/main.js"></script>-->

