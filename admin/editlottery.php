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
include("includes/navigation.php");
?>
<?php 
if(isset($_POST['submit'])){
  $id = $_GET['id'];
  $name = $_POST['name'];
  $i1st_price = $_POST['i1st_price'];
  $i2nd_price = $_POST['i2nd_price'];
  $i3rd_price = $_POST['i3rd_price'];
  $other_price = $_POST['other_price'];
   $lottery_series = $_POST['lottery_series'];
   $price = $_POST['price'];
   $date = $_POST['date'];

   $sql = " UPDATE `lottery` SET `name`='$name',`1st_price`= '$i1st_price',`2nd_price`='$i2nd_price',`3rd_price`='$i3rd_price',`other_price`='$other_price',`lottery_series`= '$lottery_series',`price`='$price',`date`='$date' WHERE `id` = '$id' " ;
   $result = mysqli_query($con,$sql);
	if(!$result)
	{
		echo mysqli_error($con);
	}
  header('Location: lottery.php');
}


?>
<div class="container-fluid">
      <div class="row">
      <?php include("includes/sidebar.php"); ?>
	  

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">EDIT New Lottery</h1>
            <h6>Welcome <?php echo $_SESSION['user_name']; ?>  | Your role is <?php echo $_SESSION['user_role']; ?></h6>
          </div>
		
			<div id="admin-index-form">
		    <?php  
      global $con;
    $id = $_GET['id'];
    $sql = " SELECT * FROM lottery WHERE id = '$id' ";
    $resul = mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($resul))
    {
    
    ?>
		
			
				<form method="post" enctype="multipart/form-data">
				<div class="col-md-10 mx-5">
				
				<label >lottery Name : </label>
				
					 <input type="text"  name="name" class="form-control" value="<?php echo $row['name']; ?>" ><br>
				
					 
					 <label for="lottery_category_id">1st price:		 </label>
					 <input type="text" id="lottery_title_id" name="i1st_price" class="form-control" value="<?php echo $row['1st_price']; ?>" ><br>
					
				
			
					<label for="lottery_subcategory_id">2nd price: </label>
					<input type="text" id="lottery_title_id" name="i2nd_price" class="form-control" value="<?php echo $row['2nd_price']; ?>" ><br>
					
		

					<label for="lottery_brand_id">3rd price: </label>
					<input type="text" id="lottery_title_id" name="i3rd_price" class="form-control" value="<?php echo $row['3rd_price']; ?>" ><br>
					
			
					<label for="lottery_brand_id">Other price: </label>
					<input type="text" id="lottery_title_id" name="other_price" class="form-control"  value="<?php echo $row['other_price']; ?>" ><br>
					

					<label for="lottery_brand_id">Lottery Series: </label>
					<input type="text" id="lottery_title_id" name="lottery_series" class="form-control" value="<?php echo $row['lottery_series']; ?>" ><br>

					<label for="lottery_brand_id">Price: </label>
					<input type="text" id="lottery_title_id" name="price" class="form-control" value="<?php echo $row['price']; ?>" ><br>

					<label for="lottery_brand_id">Date: </label>
					<input type="text" id="lottery_title_id" name="date" class="form-control" value="<?php echo $row['date']; ?>" ><br>
					

					

					
					
					
					 
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