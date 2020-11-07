<?php
    session_start();
    include "dbconnection.php";
?>
<?php
if(isset($_SESSION['user_role']))
{
    header('Location: admin/users.php');
    echo "hello";
}
?>
<?php
        if(isset($_REQUEST["login"]))
        {
            global $con;
            $email=$_POST['email'];
            $pass=$_POST['pass'];
            
         
        
            // $_SESSION["email"]=$data["Email"];
            $qry="select * from logina where email='$email' AND  password='$pass' AND status='Approved' ";
            $res=mysqli_query($con,$qry);
            $type="hello";
         
            while($row=mysqli_fetch_assoc($res)){
            $type = $row['usertype'];
            
            

                            
                                $_SESSION['user_id'] = $row['id'];
								$_SESSION['user_name'] = $row['name'];
								$_SESSION['user_email'] = $row['email'];
								$_SESSION['user_status'] = $row['status'];
                                $_SESSION['user_role'] = $row['usertype'];
        }

                 if($type == "retailer")
        {
            header('Location: admin/lottery.php');
        }
        elseif($type == "admin")
        {
            header('Location: admin/users.php');
        }
        elseif($type == "wholesaler")
        {
            header('Location: admin/lottery.php');
        }
        else{
            echo " <script>alert('invalid username or password')</script> ";

        }

echo $_SESSION['user_role'];
           // $count=mysqli_num_rows($res);
            // if($count==1)
            //     header('Location:loggedin.php');
            // else
            //     echo "<script>alert('Invalid Username or Password.')</script>";
             
        }
    ?>
<html>
    <head>
        <title>Login</title>
        <style type="text/css">
        *{
            margin:0px;
            padding:0px;
        }
        body{
            background-image:url(./images/lottery.jpg);
            background-size:cover;
            background-position:center;
            font-family:sans-serif;
            margin-top:40px;
        }
        .login-form{
            width:800px;
            background-color:rgb(0,0,0,0.6);
            margin:auto;
            color:#FFFFFF;
            padding:10px 0px 10px 0px;
            text-align:center;
            border-radius:15px 15px 0px 0px;
        }
        .main{
            background-color:rgb(0,0,0,0.5);
            width:800px;
            height:400px;
            margin:auto;
            text-align:center;
        }
        form{
            padding:10px;
        }
        #name{
            width:100%;
            height:100px;
        }
        .name{
            margin-left:150px;
            margin-top:20px;
            width:125px;
            height:-25px;
            color:#000000;
            font-size:18px;
            font-weight:700;
        }
        .email{
            position:relative;
            left:190px;
            top:-37px;
            line-height:40px;
            border-radius:6px;
            padding:0 22px;
            font-size:16px;
        }
        .password{
            position:relative;
            left:190px;
            top:-37px;
            line-height:40px;
            border-radius:6px;
            padding:0 22px;
            font-size:16px;
        }
        .ex_acc{
            position:relative;
            left:200px;
            top:-37px;
            color:#FFFFFF;
            line-height:40px;
            border-radius:6px;
            padding:0 22px;
            font-size:16px;
        }
        button{
            color:#3BAF9F;
            display:block;
            margin:35px 80px 80px 340px;
            text-align:center;
            border-radius:12px;
            border:2px solid #366473;
            padding:14px 50px;
            outline:none;
            color:black;
            cursor:pointer;
            transition:0.25px;
        }
        a:hover{
            color:orange;
        }
    </style>
    </head>
<body>
    <div class="login-form">
        <h1>Login Form</h1>
    </div>
    <div class="main">  
        <form method="post">
            <div id="name">
                <h2 class="name">Email</h2>
                <input class="email" type="text" name="email">
                <h2 class="name">Password</h2>
                <input class="password" type="password" name="pass">
                <!-- <h2 class="name">Usertype</h2>
                <input type="radio" id="Wholesaler" name="type" value="Wholesaler">
                <label>Wholesaler</label> <br>
                <input type="radio" id="Wholesaler" name="type" value="Retailer">
                <label>Retailer</label> -->
                <button type="submit" value="login" name="login">Login</button>
               <!--<h2 class="ex-acc">Doesn't have an account? <a href="retailerreg.php">Sign up</a></h2>-->
            </div>
        </form>
    </div>
    
</body>
</html>