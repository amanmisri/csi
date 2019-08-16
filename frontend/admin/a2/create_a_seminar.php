<head>
    <title>Create a post - CSI Admin</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>
<?php include('../layout/header.php') ?>
<div class="container mt-4 ml-auto mr-auto">
    <h3 class="text-center">Create a seminar event</h3>
    <p class="text-center lead">Create a seminar event for the CSI</p>
    <form id="seminar_form">
        <div class="form-group">
            <label for="title">Event Name: </label>
            <input id="title" type="text" name="title" class="form-control" required placeholder="Enter a post title" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="content">Seminar Content: </label>
            <textarea name="content_one" id="editor" class="form-control"></textarea>
        </div>
         <div class="form-group">
            <label for="content">Seminar Speaker: </label>
             <input class="form-control" name="seminar_speaker" id="">
        </div>
        <button type="button" id="preview" class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-lg">Preview</button>
        <input type="submit" name="submit-blog-form" value="Create" class="btn btn-success" id="create_submit">
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

