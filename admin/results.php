<?php
include("includes/header.php");
?>

<?php
include("includes/navigation.php");

?>

<?php 

global $con;

$sql = "SELECT * FROM result";
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
					  <th scope="col">Lottery Id</th>
					 
					  <th scope="col">Lottery Name</th>
					  <th scope="col">1st Price</th>
					  <th scope="col">2nd Price</th>
					  <th scope="col">3rd Price</th>
					  <th scope="col">Other Price</th>
					  <th scope="col">Lottery Series</th>
					 
					  <th scope="col">Date</th>
					  <?php 

	if($_SESSION['user_role']=="admin"){
	
?>
					  <th scope="col">Action</th>
	<?php } ?>
				
					</tr>
				  </thead>
				  
				  <?php  while($row = mysqli_fetch_assoc($res)){ 
                      
				  $sql = " SELECT * FROM lottery WHERE id = '{$row['lottery_id']}' ";
                  $result = mysqli_query($con , $sql);
                  if(!$result){
                        echo mysqli_error($con);
                  }
                  while($row1 = mysqli_fetch_assoc($result)){
                      $series = $row1['lottery_series'];
                      $name = $row1['name'];
                      $date = $row1['date'];
                  }
                      ?>
			<tr>
			
					
						<td><?php echo $row['id'] ?></td>
					  <td><?php echo $name ?></td>
					  <td><?php echo $row['1st'] ?></td>
					  <td><?php echo $row['2nd'] ?></td>
					  <td><?php echo $row['3rd'] ?></td>
					  <td><?php echo $row['other'] ?></td>
					  <td><?php echo $series ?></td>
					  <td><?php echo $date ?></td>
					 
					
					   <?php 
					   if($_SESSION['user_role']=="admin"){ ?>
					  <td><a onclick="return confirm('Are You sure');" href="deleteresult.php?id=<?php echo $row['id'] ?>"><button class="btn btn-danger">Delete</button></a></td>
					   <?php } ?>
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