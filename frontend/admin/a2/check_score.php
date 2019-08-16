<?php 
    require '../configuration/database.php';
    $query = "SELECT  `id`, `name_of_student`, `email_student`, `phone_number`, `score` FROM `problem_of_the_week` ORDER BY score DESC";
    
    //Get the result
    $result = mysqli_query($connec, $query);

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
                    <h6>Name : <?=$rows['name_of_student']?></h6>
                     <h6>Email: <?=$rows['email_student']?></h6>
                      <h6>Number : <?=$rows['phone_number']?></h6>
                       <h6>Score: <?=$rows['score']?></h6>
                        </div>
                </div>
           
    <?php  } ?>
 </div>
</div>

<?php include('../layout/footer.php') ?>