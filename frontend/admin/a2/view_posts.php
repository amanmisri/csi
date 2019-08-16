<?php 
    require '../configuration/database.php';
    $query = 'SELECT * FROM blog_table';
    
    //Get the result
    $result = mysqli_query($connec, $query);

    //Fetch the links
   /* $all_links = mysqli_fetch_all($result, $connec);*/
    $message = ''; $class = ''; $visibility = 'none';
    if(isset($_GET['id'])) {
        $post_id = $_GET['id'];

        $query = "DELETE FROM blog_table WHERE id= '$post_id'";
        if(mysqli_query($connec, $query)) {
            header("Refresh:0; url=view_posts.php");
        } 
    }
?>

<head>
    <title>View posts - CSI Admin</title>
</head>
<?php include('../layout/header.php') ?>
<div class="container mt-4 ml-auto mr-auto">
    <h3 class="text-center">All Posts</h3>
    <p class="text-center lead">Below are the posts created.</p>
    <?php while($rows = mysqli_fetch_array($result)) {  ?>
    <div class="card mt-2">
                <div class="card-body">
                    <h5 class="card-title"><?=$rows['blog_title']?></h5>
                    <p class="card-text"<?=$rows['blog_title']?></p>
                  <a href="../pages/post.php?id=<?=$rows['id']?>"><button class="btn btn-dark mr-2">Read</button></a>
                    <a href="./edit_post.php?id=<?=$rows['id']?>"><button class="btn btn-primary mr-2">Edit</button></a><a href="view_posts.php?id=<?=$rows['id']?>"><button class="btn btn-danger mr-2">Remove</button></a>
                </div>
            </div>
    <?php  } ?>

</div>

<?php include('../layout/footer.php') ?>