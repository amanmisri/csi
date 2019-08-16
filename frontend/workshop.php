<?php
  include 'Connection\dbconn.php';
  $conn=OpenCon();
  $sql="select * from workshop";
  $result=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Seminars</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css'>
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" type="text/css" href="CSS/design.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<div id="mySidebar" class="sidebar" onmouseover="toggleSidebar()" onmouseout="toggleSidebar()">
  <a href="../index.html"><span><i class="material-icons">info</i><span class="icon-text">Home</span></a><br>
  <a href="seminar.php"><i class="material-icons">spa</i><span class="icon-text"></span>Seminar</a></span>
  </a><br>
  <a href="workshop.php"><i class="material-icons">monetization_on</i><span class="icon-text"></span>Workshops</span></a><br>
  
</div>
<!-- partial:index.partial.html -->
<div class="container">
  <div class="row">
    <?php
      while($rows=mysqli_fetch_assoc($result))
      {
        $imgSrc="admin/upload/workshop/".$rows["images"];
    ?>
    <div class="col-xs-10 col-md-10 col-lg-10">
      <div class="card">
      <img class="card-img-top" src="<?php echo $imgSrc; ?>">
      <div class="card-block">
        <h4 class="card-title"><?php echo $rows["name"];?></h4>
        <p class="card-text" class="paddin"><?php echo $rows["details"];?></p>
      </div>
      <div class="card-footer">
        <small class="text-muted"><?php echo $rows["place"];?></small>
      </div>
    </div>
    </div>
    <?php
      }
    ?>
</div>
</div>
<div id="main">
  <h2></h2>
  <p>
</div>
</body>
</html>