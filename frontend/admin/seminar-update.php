<?php
    include 'Connection/dbconn.php';
    if(!empty($_REQUEST["seminarId"]))
    {
        $seminarId=$_REQUEST["seminarId"];
        $conn=OpenCon();
        $query="select * from seminar where seminar_id=".$seminarId."";
		$result=mysqli_query($conn,$query);
		while($rows=mysqli_fetch_assoc($result))
		{
      $dir = "upload/seminar/" . $rows["images"];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
		<script  src="http://code.jquery.com/jquery-3.3.1.js"></script>
		<script type="text/javascript" src="js/jquery.redirect.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" 1`src="CSS/formstyles.css">
    </head>
    <body>

    <div class="col-md-6 offset-md-3 mt-5">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="txtSeminarId" required="required">Seminar ID</label>
            <input readonly type="number" name="txtSeminarId" class="form-control" value="<?php echo $rows['seminar_id']; ?>" id="txtSeminarId" aria-describedby="emailHelp" placeholder="Enter Workshop ID">
          </div>
          <div class="form-group">
            <label for="txtTitle">Title</label>
            <input type="text" name="txtTitle" class="form-control" id="txtTitle" placeholder="Enter Title" value="<?php echo $rows['title']; ?>" required="required">
          </div>

          <div class="form-group">
            <label for="txtGuest">Guest</label>
            <input type="text" name="txtGuest" class="form-control" id="txtGuest" placeholder="Enter Guest" value="<?php echo $rows['guest']; ?>" required="required">
          </div>

          <div class="form-group">
            <label for="txtInformation">Information</label>
            <textarea name="txtInformation" class="form-control" id="txtInformation" required="required" rows="5"><?php echo $rows['information']; ?></textarea>
          </div>
          <div class="form-group">
            <h6>To view uploaded images click <a href="<?php echo $dir; ?>">here</a></h6> 
          </div>
          <hr>
          <div class="form-group mt-3">
            <label class="mr-2">Upload Images:</label>
            <input type="file" name="image" id="image">
          </div>
          <hr>
          <button type="submit" class="btn btn-primary" name="insert" id="insert">Submit</button>
          <button type="reset" class="btn btn-info">Reset</button>
        </form>
        <?php
        }}
        ?>
    </div>
    <script type="text/javascript">
        </script>
    </body>
</html>
<?php
  if(isset($_POST["insert"]))
  {
    $seminarId=$_POST["txtSeminarId"];
    $title=$_POST["txtTitle"];
    $guest=$_POST["txtGuest"];
    $information=$_POST["txtInformation"];
		$rnum=rand(00000,99999);
		$conn=OpenCon();
    if(!empty($_FILES["image"]))
    {
      $name1=$_FILES['image']['name'];
      if(strcmp($name1,'')){
			$name=$rnum.$name1;
			$target_dir="upload/seminar/";
      $target_file = $target_dir . basename($_FILES['image']['name']);
      $query="select images from seminar where seminar_id=$seminarId";
      $result=mysqli_query($conn,$query);
      while($rows=mysqli_fetch_assoc($result))
      {
        $pres_imgFile="upload/seminar/" . $rows["images"];
        unlink($pres_imgFile);
        $sql="update `seminar` set `title`='$title', `guest`='$guest', `information`='$information', `images`='$name' where `seminar_id`=$seminarId";
        if(mysqli_query($conn,$sql))
        {
          move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir.$name);
          header("Location: seminar-admin.php");
        }
      }
    }
    else {
      $sql1="update `seminar` set `title`='$title', `guest`='$guest', `information`='$information' where `seminar_id`=$seminarId";
      if(mysqli_query($conn,$sql1))
      {
        header("Location: seminar-admin.php");
      }
    }}}  
?>