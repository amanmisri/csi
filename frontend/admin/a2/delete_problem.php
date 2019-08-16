<?php 
    require '../configuration/database.php';
    $query = 'SELECT * FROM `problem_of_the_week_admin`';
    
    //Get the result
    $result = mysqli_query($connec, $query);

    //Fetch the links
   /* $all_links = mysqli_fetch_all($result, $connec);*/
    $message = ''; $class = ''; $visibility = 'none';
    if(isset($_GET['id'])) {
        $post_id = $_GET['id'];

        $query = "DELETE FROM `problem_of_the_week_admin` WHERE id= '$post_id'";
        if(mysqli_query($connec, $query)) {
            header("Refresh:0; url=delete_problem.php");
        } 
    }
?>

<head>
    <title>View posts - CSI Admin</title>
</head>
<?php include('../layout/header.php') ?>
<div class="container mt-4 ml-auto mr-auto">
    <h3 class="text-center">All Problems</h3>
    <?php while($rows = mysqli_fetch_array($result)) {  ?>
    <div class="card mt-2">
                <div class="card-body">
                    <h3>Problem</h3>
                        <p><?=$rows['problem']?><p>
                        <div>
                            <p> <?=$rows['option_1']?></p>
                           <p> <?=$rows['option_2']?> </p>
                           <p> <?=$rows['option_3']?></p>
                           <p> <?=$rows['option_4']?></p>
                    <a href="delete_problem.php?id=<?=$rows['id']?>"><button class="btn btn-danger mr-2">Remove</button>
                        </div>
                </div>
            </div>
    <?php  } ?>

</div>

<?php include('../layout/footer.php') ?>