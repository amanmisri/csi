<?php
require '../configuration/database.php';
$query = 'CREATE TABLE `user_submit_problem` ( `id` int(11) NOT NULL, `user_email` varchar(255) NOT NULL, `problem_id` int(11) NOT NULL )';
if(!mysqli_query($connec, $query)){
	echo "sad";
}else{ echo 'happy';}
?>


