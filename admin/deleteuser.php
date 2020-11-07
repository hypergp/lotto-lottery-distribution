<?php
include("includes/header.php");
?>
<?php 
session_start();
if(isset($_SESSION['user_role'])){
	if($_SESSION['user_role']!="admin"){
		header('Location: ../index.php');
	}
}
else{
	header('Location: ../index.php');
}

?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = " DELETE FROM `logina` WHERE `id` = $id ";
    echo $sql;
   $result = mysqli_query($con,$sql);
   if(!$result){
    echo mysqli_error($con);
}
    header('Location: users.php');
}


?>