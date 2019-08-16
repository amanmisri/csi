<head>
    <title>Create a post - CSI Admin</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<?php include('../layout/header.php') ?>
<div class="container mt-4 ml-auto mr-auto">
    <h3 class="text-center">Create a post</h3>
    <p class="text-center lead">Create a blog post for the Computer Society of India.</p>
    <form  action="../scripts/createPost.php" method="post">
        <div class="form-group">
            <label for="title">Title: </label>
            <input id="title" type="text" name="title" class="form-control" required placeholder="Enter a post title" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="content">Blog Content: </label>
            <textarea name="content" id="editor" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="current_date">Date: </label>
            <input type="text" name="current_date" id="currentDate" class="form-control" disabled value="<?php echo date("M j, Y"); ?>">
        </div>
        <div class="form-group">
            <label for="written_by">Written By: </label>
            <input type="text" name="written_by" id="author" class="form-control" value="CSI" disabled>
        </div>
        <button type="button" id="preview" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-lg">Preview</button>
        <input type="submit" name="submit-blog-form" value="Create" class="btn btn-success" id="create_submit">
        <a class="btn btn-secondary" href="../welcome.php">Back</a>
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

