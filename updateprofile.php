<?php
   session_start(); 
?>
<html>
    <head>
        <title>Edit Profile</title>
        <link rel="icon" href="images/lottery.jpg" type="image/x-icon">
        <style>
            .btn1 {
                color: #fff;
                border-radius: 25px;
                border: 2px solid #02b875;
                background: #02b875;
                padding: 3.5px 80px;
                font-size: 1.15em;
            }
            .btn2 {
                color: #02b875;
                border-radius: 20px;
                border: 2px solid #02b875;
                background: #fff;
                padding: 3.5px 72px;
                font-size: 1.15em;
            }
            .btn2:hover {
                color: #02b875;
                border-radius: 20px;
                border: 2px solid #02b875;
                background: #fff;
                padding: 3.5px 72px;
                font-size: 1.15em;
            }
        </style>
    </head>
    <body>
    <?php
    if(empty($_SESSION["email"]))
    header('Location:logout.php');
    include "user_header.php";
    include "dbconnection.php";
    $email=$_SESSION["email"];
    $email2=$_SESSION["email"];
    $qry="select * from retailer_registration where Email='$email'";
    $res=mysqli_query($con,$qry);
    $data=mysqli_fetch_assoc($res);
    ?>
    <h2><center><strong>EDIT PROFILE</strong></center></h2>
    <form style="margin: 63px 475px;" method="post" enctype="multipart/form-data">
        <table class="table">
            <tr>
                <td>Name</td><td></td><td></td><td><input type="text" STYLE="color:#064ea7; width:250px; height:30px; border:0.1px solid #000000; border-radius: 5px;" value="<?php echo $data["Name"]; ?>" name="t1"></td></tr>
            <tr>
                <td>Email</td><td></td><td></td><td><input type="text" STYLE="color:#064ea7; width:250px; height:30px; border:0.1px solid #000000; border-radius: 5px;" value="<?php echo $data["Email"]; ?>" name="t2"></td></tr>
            <tr>
                <td>DOB</td><td></td><td></td><td><input type="date" STYLE="color:#064ea7; width:250px; height:30px; border:0.1px solid #000000; border-radius: 5px;" value="<?php echo $data["DOB"]; ?>" name="t3"></td></tr>
            <tr>
                <td>Phone</td><td></td><td></td><td><input type="text" STYLE="color:#064ea7; width:250px; height:30px; border:0.1px solid #000000; border-radius: 5px;" value="<?php echo $data["Phone"]; ?>" name="t4"></td></tr>
            <tr>
                <td>Password</td><td></td><td></td><td><input type="password" STYLE="color:#064ea7; width:250px; height:30px; border:0.1px solid #000000; border-radius: 5px;" value="<?php echo $data["Password"]; ?>" name="t5"></td></tr>
            <tr>
                <!-- <td>PASSWORD</td><td></td><td></td><td><input type="text" STYLE="color:#064ea7; width:250px; height:30px; border:0.1px solid #000000; border-radius: 5px;" value="<?php echo $data["password"]; ?>" name="t5"></td></tr> -->
            <tr>
                <td><button type type="submit" class="btn1" name="b1">OK</button></td><td></td><td></td><td><a type="button" href="user_profile.php" class="btn2">Cancel</a></td></tr>
        </table>
    </form>
<?php
    if(isset($_REQUEST["b1"]))
    {
        $name=$_POST["t1"];
        $email=$_POST["t2"];
        $dob=$_POST["t3"];
        $phone=$_POST["t4"];
        $password=$_POST["t5"];
        $qry="update retailer_registration set Name='$name',Email='$email',DOB='$dob',Phone='$phone',Password='$password' where Email='$email2'";
        echo $qry;
        mysqli_query($con,$qry);
        $qry2="update login set Username='$email',Password='$password' where Username='$email2'";
        echo $qry2;
        mysqli_query($con,$qry2);
        $uname=$email;
        echo $uname;
        $_SESSION["email"]=$email;
        echo "<script>window.location.href='user_profile.php';</script>";
    }
?>
</body>
</html>