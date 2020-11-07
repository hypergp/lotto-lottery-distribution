<?php ob_start(); ?>
<?php 
require_once("../includes/init.php");
?>


<?php 
session_start();
if(isset($_SESSION['user_role'])){
	if($_SESSION['user_role']!="retailer"){
		header('Location: ../index.php');
	}
}
else{
	header('Location: ../index.php');
}
?>


<?php 
if(isset($_POST['submit']))
{

	global $con;
	$date = date("d/m/Y");

		$sql= " SELECT * FROM lottery WHERE id = '{$_POST['element_2']}'";
		echo $sql;
		$res = mysqli_query($con,$sql);	
		while($row = mysqli_fetch_assoc($res)){
			$price = $row['price'];
		}
	$sql = " INSERT INTO `sales`( `date`,`lottery`, `price`, `retailer`) ";

	$sql .= " VALUES (' $date ', '{$_POST['element_2']}' ,  '$price' ,  '{$_POST['element_3']}' ) ";
	$result = mysqli_query($con,$sql);
	if(!$result){
		echo mysqli_error($con);
	}
	header('Location: ../payment/First.php');
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Lotto - Payment System</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Untitled Form</a></h1>
		<form id="form_4969" class="appnitro"  method="post">
					<div class="form_description">
			<h2>Payment Options</h2>
			<p>Choose lottery and retailer proceed to payment</p>
		</div>						
			<ul >
			
					<li id="li_2" >
		<label class="description" for="element_2">Lottery Name & Price </label>
		<div>
		<select class="element select medium" id="element_2" name="element_2"> 
		<?php 
		global $con;
		$sql= " SELECT * FROM lottery ";
		echo $sql;
		$res = mysqli_query($con,$sql);
		while($row = mysqli_fetch_assoc($res)){
		
		    
		?>

			
<option value="<?php echo $row['id'] ; ?>" ><?php echo $row['name'] ; ?>&nbsp ₹<?php echo $row['price'] ; ?></option>

		<?php } ?>
		</select>
		</div> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Retailer Name </label>
		<div>
		<select class="element select medium" id="element_3" name="element_3"> 
		<?php 
		global $con;
		$sql= " SELECT * FROM logina WHERE `usertype` = 'retailer' ";
		echo $sql;
		$res = mysqli_query($con,$sql);
		while($row = mysqli_fetch_assoc($res)){
		
		    
		?>

			
<option value="<?php echo $row['name'] ; ?>" ><?php echo $row['name'] ; ?> </option>

		<?php } ?>

		</select>
		</div> 
		</li>		<li id="li_1" >
	
		<!-- <span>
			<input id="element_1_1" name="element_1_1" class="element text currency" size="10" value="" type="text" /> .		
			<label for="element_1_1">Dollars</label>
		</span>
		<span>
			<input id="element_1_2" name="element_1_2" class="element text" size="2" maxlength="2" value="" type="text" />
			<label for="element_1_2">Cents</label>
		</span> -->
		 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="4969" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Pay Now" />
		</li>
			</ul>
		</form>	
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>