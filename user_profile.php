<html>
<?php
include "user_header.php";
include "dbconnection.php";
?>
<head>
    <title>USER Profile</title>
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <style>
        td {
            color:#064ea7;
        }
        .btn1 {
                color: #fff;
                border-radius: 20px;
                border: 2px solid #02b875;
                background: #02b875;
                padding: 4.5px 60px;
                font-size: 1.15em;

            }
        .btn1:hover {
                color: #fff;
                border-radius: 20px;
                border: 2px solid #02b875;
                background: #02b875;
                padding: 4px 60px;
                font-size: 1.15em;
 
        }
    </style>
</head>
<body>
<?php session_start();
    if(empty($_SESSION["email"]))
    header('Location:login (1).php');
    $email=$_SESSION["email"];
    $qry="select * from retailer_registration where Email='$email'";
    $res=mysqli_query($con,$qry);
    $data=mysqli_fetch_assoc($res);
    ?> 
    <h2><center><strong>ACCOUNT DETAILS</strong></center></h2>
    <table class="table" style="border-radius: 5px; margin: 107px 380px;">
        <tr>
            <th>NAME</th><td><?php echo $data["Name"]; ?></td>
        </tr>
        <tr>
            <th>EMAIL</th><td><?php echo $data["Email"]; ?></td>
        </tr>
        <tr>
            <th>PHONE</th><td><?php echo $data["Phone"]; ?></td>
        </tr>
        <tr>
            <th>DATE OF BIRTH</th><td><?php echo $data["DOB"]; ?></td>
        </tr>
        <tr>
        <td></td><td><a class="btn1" href="updateprofile.php">Edit Profile</a></td></tr>
        <td></td><td> <a  class= "btn1" href="logout.php">Logout</a></td></tr>
    </table>
</body>
</html>