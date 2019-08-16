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
            <input type="number" name="txtSeminarId" class="form-control" id="txtSeminarId" aria-describedby="emailHelp" placeholder="Enter Workshop ID">
          </div>
          <div class="form-group">
            <label for="txtTitle">Title</label>
            <input type="text" name="txtTitle" class="form-control" id="txtTitle" placeholder="Enter Title" required="required">
          </div>

          <div class="form-group">
            <label for="txtGuest">Guest</label>
            <input type="text" name="txtGuest" class="form-control" id="txtGuest" placeholder="Enter Guest" required="required">
          </div>

          <div class="form-group">
            <label for="txtInformation">Information</label>
            <textarea name="txtInformation" class="form-control" id="txtInformation" placeholder="Enter Information" required="required" rows="5"></textarea>
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
    </div>
    <script type="text/javascript">
            $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      	});
        </script>
    </body>
</html>
<?php
    if(isset($_POST["insert"]))
    {
        if(isset($_FILES["image"]))
        {
            include 'Connection/dbconn.php';
            $title=$_POST["txtTitle"];
            $guest=$_POST["txtGuest"];
            $information=$_POST["txtInformation"];
			$rnum=rand(00000,99999);
			$conn=OpenCon();
			$name=$rnum.$_FILES['image']['name'];
			$target_dir="upload/seminar/";
            $target_file = $target_dir . basename($_FILES['image']['name']);
            if(!empty($_POST["seminarId"]))
            {
                $seminarId=$_POST["txtSeminarId"];
                $sql="INSERT INTO `seminar`(`seminar_id`, `title`, `guest`, `information`, `images`) VALUES ($seminarId,'$title','$guest','$information','$name')";
            }
            else
            {
                $sql="INSERT INTO `seminar`(`title`, `guest`, `information`, `images`) VALUES ('$title','$guest','$information','$name')";
            }
			if(mysqli_query($conn,$sql))
			{
				//echo '<script type="text/javascript">alert("Data Inserted Successfully");</script>';
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir.$name);
                header("Location: seminar-admin.php");	
			}
        }
    }
?>