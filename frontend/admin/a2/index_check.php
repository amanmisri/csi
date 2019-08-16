<?php 
 
    include('../layout/header.php');
  

    require '../configuration/database.php';

    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username == 'csi_admin' && $password == 'csi@somaiya123') {

            $_SESSION['admin_id'] = 'csi_admin';

            //echo "logged in";
            header('Location: ../admin/admin.php');
        }
      if(isset($_SESSION['admin_id'])){
        header('Location: ../admin/admin.php');
      }
    }
?>