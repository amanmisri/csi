<head>
    <title>Create a problem - CSI Admin</title>
</head>
<?php include('../layout/header.php') ?>
<div class="container mt-4 ml-auto mr-auto">
    <h3 class="text-center">Create a problem</h3>
    <p class="text-center lead">A problem, every week.</p>

    <form method="post" action="../scripts/createProblem.php">
    <div class="form-group">
        <label for="problem">Problem: </label>
        <textarea name="problem" id="editor" class="form-control"></textarea>
    </div>
    <div class="row">
        <div class="col">
            <input type="text" name="option1" class="form-control" placeholder="Option 1">
        </div>
        <div class="col">
            <input type="text" name="option2" class="form-control" placeholder="Option 2">
        </div>
        <div class="col">
            <input type="text" name="option3" class="form-control" placeholder="Option 3">
        </div>
        <div class="col">
            <input type="text" name="option4" class="form-control" placeholder="Option 4">
        </div>
    </div>
    <br>
    <div class="form-group">
        <label for="correct_option">Correct answer: </label>
        <input type="text" name="correct_option" class="form-control" required>
    </div>
    <input type="submit" value="Create" class="btn btn-success">
</form>
</div>

<?php include('../layout/footer.php') ?>