<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  	<title>Seminar Admin</title>
  	<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script  src="http://code.jquery.com/jquery-3.3.1.js"></script>
		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
		<script type="text/javascript" src="js/jquery.redirect.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="CSS/design.css">
		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" type="text/css" href="CSS/style123.css">
	<script type="text/javascript">
	function deleteData(seminar_id)
	{
		$("#myDiv").load(
			'seminar-admin.php',{seminarId:seminar_id});
	}
	function updateData(seminar_id)
	{
		$.redirect("seminar-update.php",{seminarId:seminar_id},"POST",null,null,true);
	}
	function viewData(seminar_id)
	{	
		$("#table_seminar").empty();
		$("#myDiv").load(
			'seminar-admin.php',{seminarIdd:seminar_id});
	}
	function CloseModalPopup()
	{	
		$("#myModal").hide();
		location.reload(true);
	}
</script>
</head>

<?php
	include 'Connection/dbconn.php';
	if (!empty($_REQUEST["seminarId"])) {
		$seminarId=$_REQUEST["seminarId"];
		//echo '<script type="text/javascript">alert("'.$seminarId.'");</script>';
		$conn=OpenCon();
		$sq1="select images from seminar where seminar_id=".$seminarId."";
		$result=mysqli_query($conn,$sq1);
		while($rows = mysqli_fetch_Assoc($result))
		{
			$imgSrc="upload/seminar/".$rows["images"];
			unlink($imgSrc);
		}
		$sql="delete from seminar where seminar_id=".$seminarId."";
		if(mysqli_query($conn,$sql)===true);
		{
			echo '<script type="text/javascript">$("#table_seminar").empty();location.reload(true);</script>';
		}
	}
	if(!empty($_REQUEST["seminarIdd"]))
	{
		$seminarId=$_REQUEST["seminarIdd"];
		$conn=OpenCon();
		$sql1="select * from seminar where seminar_id=".$seminarId."";
		$result=mysqli_query($conn,$sql1);
		while($rows = mysqli_fetch_assoc($result))
		{
			$imgSrc="upload/seminar/".$rows["images"];
			echo '
			
				<div class="modal-content" id="myModal" style="margin:auto;">
        			<div class="modal-header">
          				<h1 class="modal-title">'.$rows['title'].'</h1>
        			</div>
        			<div class="modal-body">
        				<h4>Id: '.$rows['seminar_id'].'</h4>
          				<h5>Guest: '.$rows['guest'].'</h5>
          				<h6>Information: '.$rows['information'].'</h6>
      						<div id="myCarousel" class="carousel slide" data-ride="carousel">
      						<ol class="carousel-indicators">
    							<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    							<li data-target="#myCarousel" data-slide-to="1"></li>
    							<li data-target="#myCarousel" data-slide-to="2"></li>
  							</ol>
  							<div class="carousel-inner">
    							<div class="item active">
      								<img src="'.$imgSrc.'">
    							</div>
							</div>
							<a class="left carousel-control" href="#myCarousel" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
							<span class="sr-only">Previous</span>
						  </a>
						  <a class="right carousel-control" href="#myCarousel" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
							<span class="sr-only">Next</span>
						  </a>
        			</div>
        			<div class="modal-footer">
          				<button type="button" class="btn btn-danger btn-default" onclick="CloseModalPopup()">Close</button>
        			</div>
				  </div>
				</div>
			';
		}
	}
	$conn=OpenCon();
	$query="select * from seminar";
	$result=mysqli_query($conn,$query);
?>
<body>

<!--<div id="mySidebar" class="sidebar" onmouseover="toggleSidebar()" onmouseout="toggleSidebar()">
  <a href="function()"><span><i class="material-icons">info</i><span class="icon-text">Home</span></a><br>
  <a href="seminar-admin.php"><i class="material-icons">spa</i><span class="icon-text"></span>Seminar</a></span>
  </a><br>
  <a href="workshop-admin.php"><i class="material-icons">monetization_on</i><span class="icon-text"></span>Workshops</span></a><br>
  <a href="#"><i class="material-icons">email</i><span class="icon-text"></span>Logout<span></a>
</div>-->

<div id="main">
  <h2></h2>
  <p>
  <div class="table_seminar" id="table_seminar" data-example-id="striped-table">
	<form action="seminar-insert.php" method="post">
	<input type="submit" id="insertData" value="Insert Data" name="insertData" class="btn btn-primary" style="position: relative; float:right; margin-right:50px; margin-bottom: 50px;"/>
	</form>
<form method="POST" name="seminarForm">
  <table class="table table-striped table-bordered table-hover">
    <caption></caption>
    <thead>
      <tr>
        <th>Seminar Id</th>
        <th>Title</th>
        <th>Delete</th>
		<th>Update</th>
		<th>View</th>
      </tr>
    </thead>
    <tbody>
    <?php
		while($rows=mysqli_fetch_assoc($result))
		{
	?>
      <tr>
        <th scope="row"><?php echo $rows['seminar_id'] ?></th>
        <td><?php echo $rows['title'] ?></td>
		<td><input type="button" value="Delete" onclick="deleteData(<?php echo $rows['seminar_id']; ?>)"></td>
		<td><input type="button" value="Update" onclick="updateData(<?php echo $rows['seminar_id']; ?>)"></td>
		<td><input type="button" value="View" onclick="viewData(<?php echo $rows['seminar_id']; ?>)"></td>
      </tr>
      <?php
			}
		?>
    </tbody>
	<!--
    <tfoot>
    <tr class="note"><th>Source</th><td colspan=3><a href="https://getbootstrap.com/css/#tables">BootStrap documentation</a></td></tr>
    </tfoot>
	-->
  </table>
</form>
</div>
<div id="myDiv"></div>

<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
<?php
	CloseCon($conn);
?>