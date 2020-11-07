<?php include("includes/header.php"); ?>

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
    global $con;

    $id = $_GET['id'];

    $sql = " SELECT * FROM generate WHERE lottery_id = '{$id}' ";
    $res = mysqli_query($con , $sql);

    $arr = array();
    while($row = mysqli_fetch_assoc($res))
    {
    $start = explode("-" ,$row['start'])[0];
    $end = explode("-" ,$row['end'])[0];
    $arr[]=$start;
    $arr[]=$end;
  
    }
    $winner = array();
    for($i=0 ; $i<8;$i++){

    
    $k = rand(0,(count($arr) - 1));
    $str = $arr[$k];
    // echo print_r($arr);
    $num = rand(1,1000);

    $winner[] = $str . "-" . $num;
    }
    // print_r($winner);
    $otherwinners = " ".$winner[3] ."<br>".$winner[4]."<br>".$winner[5]."<br>".$winner[6]."<br>".$winner[7];
    $sql = " INSERT INTO `result`( `lottery_id`, `1st`, `2nd`, `3rd`, `other`) ";
    $sql .= " VALUES ( '$id' , '$winner[0]' , '$winner[1]' , '$winner[2]' , '$otherwinners' ) ";

    // echo $sql;

    $result = mysqli_query($con , $sql);
    if(!$result){
        echo mysqli_error($con);
    }


    header('Location: results.php');
}



?>