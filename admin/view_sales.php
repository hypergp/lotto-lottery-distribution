
<?php
include("includes/header.php");
?>

<?php
include("includes/navigation.php");

?>

<?php 

global $con;

$sql = "SELECT * FROM sales";
$res = mysqli_query($con,$sql);

?>

<div class="container-fluid">
      <div class="row">
      <?php include("includes/sidebar.php"); ?>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Posts</h1>
            <h6>Welcome <?php echo $_SESSION['user_name'] ; ?> | Your role is <?php echo $_SESSION['user_role'] ; ?></h6>
          </div>
		
			<div id="admin-index-form">
		
			
			
				
				<table class="table">
				  <thead>
					<tr>				 
					  <th scope="col">ID</th>
					  <th scope="col">Date</th>
					  <th scope="col">Lottery Name</th>
					  <th scope="col">Price</th>
                      <th scope="col">Retailer Name</th>
					  <?php 

	if($_SESSION['user_role']=="admin"){
	
?>
					
	<?php } ?>
				
					</tr>
				  </thead>

                <?php 
                while($row=mysqli_fetch_assoc($res))
  {
  ?>  
	
			
					<tr>
				
				
					  <td><?php echo $row['id'] ?></td>
					  <td><?php echo  $row['date']; ?></td>
					  <td><?php echo $row['lottery'] ?></td>
					  <td><?php echo 100 * $row['price'] ?></td>
                      <td><?php echo $row['retailer'] ?></td>

					 
					
					  
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