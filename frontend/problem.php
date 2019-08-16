
<head>
    <link rel="shortcut icon" href="..\csilogobg.png">
    <title> CSI-Problem.</title>
</head>
<?php include('layout/header.php');
error_reporting(E_ERROR | E_PARSE);
require 'admin/configuration/database.php';
$query = "SELECT * FROM `problem_of_the_week_admin` ORDER BY ID DESC LIMIT 1";
$result = mysqli_fetch_array(mysqli_query($connec, $query));


?>

    <div class="container mt-4">
    <form action="admin/scripts/submit_problem.php" method="post">
        <h3>Problem</h3>
                        <p><?=$result['problem']?><p>
                        <div>
                            <label><input type="radio" name="options" id="option1" autocomplete="off" value="<?=$result['option_1']?>" required> <?=$result['option_1']?></label><br>
                            <label><input type="radio" name="options" id="option2" autocomplete="off" value="<?=$result['option_2']?>"> <?=$result['option_2']?></label><br>
                            <label><input type="radio" name="options" id="option3" autocomplete="off" value="<?=$result['option_3']?>"> <?=$result['option_3']?></label><br>
                            <label><input type="radio" name="options" id="option4" autocomplete="off" value="<?=$result['option_4']?>"><?=$result['option_4']?></label><br>
                            <input type="hidden" name="id" value='<?=$result['id']?>'>
                        </div><br>
            <div class="row">
                <div class="col-sm-4">
                    <div class="" ="form-group">
                        <label for="name">Name: </label>
                        <input class="form-control" autocomplete="off" type="text" name="name" id="student_name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:<sup style="color:red;">(make sure you use one email id for all the answers)*</sup></label>
                        <input class="form-control" autocomplete="off" type="email" name="email" id="student_email" required>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile No: </label>
                        <input class="form-control" autocomplete="off" type="number" name="mobile" id="student_mobile" maxlength="10" required>
                    </div>
                    <em>Each correct answer will give you 5 points</em><br>
                    <input type="submit" value="Submit" class="btn btn-success mt-2">
                    <a class="btn btn-dark mt-2" href="csi-project">Back</a>
                </div>
            </div>
        </form>
    </div>

<?php include('layout/footer.php') ?>
