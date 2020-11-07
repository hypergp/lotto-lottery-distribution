<?php
include("includes/header.php");
?>

<?php
include("includes/navigation.php");
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
if(isset($_POST['submit'])){
  $lottery_id = $_GET['id'];
  $start = $_POST['start'];
  $end = $_POST['end'];
  
  $user_id = $_POST['user_id'];
 

   $sql = " INSERT INTO `generate`( `wholesaler_id`, `start`, `end`, `lottery_id`) ";
   $sql .= " VALUES ('$user_id','$start','$end','$lottery_id') " ;

   mysqli_query($con,$sql);

   header('Location: lottery.php');

 
}


?>

<div class="container-fluid">
      <div class="row">
      <?php include("includes/sidebar.php"); ?>




   

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit User</h1>
        
          </div>
		
			<div id="admin-index-form">
		

			
				<form method="post" enctype="multipart/form-data">
				<div class="col-md-10 mx-5">
            

        <?php  
      global $con;
    $id = $_GET['id'];
    $sql = " SELECT * FROM lottery WHERE id = '$id' ";
    $resul = mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($resul))
    {
    
    ?>
				<label for="first_name_id">Lottery Name  : </label>
				
					 <input type="text" id="first_name_id" name="name" class="form-control" disabled value="<?php echo $row['name']; ?>" ><br>
				
                <label for="email_id">Starting No : </label>
				
					 <input type="text" id="email_id" name="start" class="form-control"  ><br>

                     <label for="password_id">Ending No : </label>
				
					 <input type="text" id="password_id" name="end" class="form-control"  ><br>

                   
				

                <label for="user_type_id">Wholesaler: </label>
					<select name="user_id" class="form-control" id="user_type_id">
					<?php 
				
				$sqli = " SELECT * FROM logina WHERE usertype = 'wholesaler' ";
				$res = mysqli_query($con , $sqli);
				while($rowi = mysqli_fetch_assoc($res)){
				
				
				?>
					<option value="<?php echo $rowi['id']; ?>"  ><?php echo $rowi['name']; ?></option>
				   <?php 
				}
				   ?>

					</select><br> 

                
					
				

					
				
				
					 
					 
					 <button name="submit" type="submit" class="btn btn-primary">Submit</button>
				</div>
				</form>
    <?php } ?>
				
				
			</div>
        
          </div>
        </main>
      </div>
    </div>


    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=ey5ln3e6qq2sq6u5ka28g3yxtbiyj11zs8l6qyfegao3c0su"></script>

<script>tinymce.init({ selector:'textarea' });</script>
    <?php
include("includes/footer.php");
?>