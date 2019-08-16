<head>
    <title>CSI Admin</title>
</head>
<?php

    include('../layout/header.php');
    //echo $_SESSION['admin_id'];
    if(isset($_SESSION['admin_id'])) {
        echo '<div class="container mt-4 text-center">
        <h2>CSI Admin</h2>
        <p>A panel for CSI members</p>
        <a href="./create_a_post.php"><button class="btn btn-dark">Create a post</button></a>
        <a href="./create_a_seminar.php"><button class="btn btn-dark">Create a seminar</button></a>
        <a href="./view_seminars.php"><button class="btn btn-dark">View Seminars</button></a>
        <a href="./view_posts.php"><button class="btn btn-dark">View Posts</button></a>
        <a href="./create_a_problem.php"><button class="btn btn-dark">Create a problem</button></a>
        <a href="./delete_problem.php"><button class="btn btn-dark">Delete a problem</button></a>
        <a href="./check_score.php"><button class="btn btn-dark">Check Scores</button></a>
        <a href="../scripts/logout.php"><button class="btn btn-default">Logout</button></a>
    </div>';
    } else {
        header('Location: ./');
    }
?>

<?php include('../layout/footer.php') ?>