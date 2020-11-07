<?php
include("includes/header.php");
?>

<?php
include("includes/navigation.php");

?>


<?php 

global $con;

$sql = "SELECT * FROM lottery";
$res = mysqli_query($con,$sql);




?>

<div class="container-fluid">
      <div class="row">
      <?php include("includes/sidebar.php"); ?>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Posts</h1>
            <h6>Welcome <?php echo $_SESSION['user_name'] ; ?> | Your role is <?php echo $_SESSION['user_role'] ; ?> </h6>
          </div>
		
			<div id="admin-index-form">
		
			
				<h1>ALL LOTTERY:</h1>
				<?php 

if($_SESSION['user_role']=="admin"){

?>
				<a href="addlottery.php"><button class="btn btn-info">Add New</button></a>
<?php } ?>
				<hr>
				
				<table class="table">
				  <thead>
					<tr>
					  <th scope="col">Lottery Id</th>
					 
					  <th scope="col">Lottery Name</th>
					  <th scope="col">1st Price ₹</th>
					  <th scope="col">2nd Price ₹</th>
					  <th scope="col">3rd Price ₹</th>
					  <th scope="col">Other Price ₹</th>
					  <th scope="col">Lottery Series</th>
					  <th scope="col">Lottery Price ₹</th>
					  <th scope="col">Date</th>
					 
					  <?php 

	if($_SESSION['user_role']=="admin"){
	
?>
					  <th scope="col">Action</th>
	<?php } ?>
	<?php 

if($_SESSION['user_role']=="retailer"){

?>
				  <th scope="col">Action</th>
<?php } ?>
				
					</tr>
				  </thead>
				  
				  <?php  while($row = mysqli_fetch_assoc($res)){ ?>
			<tr>
			
					
						<td><?php echo $row['id'] ?></td>
					  <td><?php echo $row['name'] ?></td>
					  <td><?php echo $row['1st_price'] ?></td>
					  <td><?php echo $row['2nd_price'] ?></td>
					  <td><?php echo $row['3rd_price'] ?></td>
					  <td><?php echo $row['other_price'] ?></td>
					  <td><?php echo $row['lottery_series'] ?></td>
					  <td><?php echo $row['price'] ?></td>
					  <td><?php echo $row['date'] ?></td>
					
					  <?php 

	if($_SESSION['user_role']=="admin"){
	
?>
					  <td><a href="result.php?id= <?php echo $row['id'] ?>"><button class="btn btn-warning">Result</button></a><a href="generation.php?id= <?php echo $row['id'] ?>"><button class="btn btn-success">Generate</button></a><a href="editlottery.php?id= <?php echo $row['id'] ?>"><button class="btn btn-info">Edit</button></a> <a onclick="return confirm('Are You sure');" href="deletelottery.php?id=<?php echo $row['id'] ?>"><button class="btn btn-danger">Delete</button></a></td>
					  <?php  }  ?>

					  <?php 

if($_SESSION['user_role']=="retailer"){

?>
				  <td><a href="booking/form.php?id= <?php echo $row['id'] ?>&price=<?php echo $row['price']; ?>"><button class="btn btn-warning">Book</button></a></td>
				  <?php  }  ?>


			</tr>

				<?php } ?>

			
				  
				  </tbody>
				</table>
				
	
        
          </div>
        </main>
      </div>
    </div>
	
    <?php
include("includes/footer.php");
?>