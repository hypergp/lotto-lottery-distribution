<?php   
    include "dbconnection.php";
?>
<html>
<head>
    <title>Registration</title>
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
        .regform{
            width:800px;
            background-color:rgb(0,0,0,0.6);
            margin:auto;
            color:#FFFFFF;
            padding:10px 0px 10px 0px;
            text-align:center;
            border-radius:15px 15px 0px 0px;
        }
        .maine{
            background-color:rgb(0,0,0,0.5);
            width:800px;
            height:550px;
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
            margin-left:30px;
            margin-top:20px;
            width:125px;
            height:-25px;
            color:white;
            font-size:18px;
            font-weight:700;
        }
        .firstname{
            position:relative;
            left:200px;
            top:-37px;
            line-height:40px;
            border-radius:6px;
            padding:0 22px;
            font-size:16px;
        }
        .age{
            position:relative;
            left:200px;
            top:-37px;
            line-height:40px;
            border-radius:6px;
            padding:0 22px;
            font-size:16px;
        }
        .dob{
            position:relative;
            left:200px;
            top:-37px;
            line-height:40px;
            border-radius:6px;
            padding:0 22px;
            font-size:16px;
        }
        .email{
            position:relative;
            left:200px;
            top:-37px;
            line-height:40px;
            border-radius:6px;
            padding:0 22px;
            font-size:16px;
        }
        .password{
            position:relative;
            left:200px;
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
            line-height:40px;
            border-radius:6px;
            padding:0 22px;
            font-size:16px;
        }
        button{
            color:#3BAF9F;
            display:block;
            margin:20px 100px 100px 280px;
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
    <!-- <script>
        var check = function() {
            if (document.getElementById('password').value ==document.getElementById('confirm_password').value) {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'matching';
             } 
            else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'not matching';
            }
        }
    </script> -->
</head>
<body>
    <div class="regform">
        <h1>Wholesarer Registration Form</h1>
    </div>
    <div class="maine">
        <form method="post">
            <div id="name">
                <h2 class="name">Name</h2>
                <input class="firstname" type="text" name="t1"><br>
                <h2 class="name">Email</h2>
                <input class="age" type="text" name="t2"><br>
                <h2 class="name">DOB</h2>
                <input class="dob" type="date" name="t3"><br>
                <h2 class="name">Phone</h2>
                <input class="email" type="text" name="t4"><br>
                <h2 class="name">Password</h2>
                <input class="password" type="password" name="password"><br>
                <button type="submit" value="submit" name="submit">Register</button>
                <h2 class="ex-acc">Already have an account? <a href="login (1).php">Sign in</a></h2>
            </div>
        </form>
    </div>
    <?php
        global $con;

        if(isset($_REQUEST["submit"]))
        {
            $name=$_POST["t1"];
            $email=$_POST["t2"];
            $dob=$_POST["t3"];
            $phone=$_POST["t4"];
            $pass=$_POST["password"];
            $_SESSION["email"]=$email;
            echo mysqli_error($con);
           
            $qry1="INSERT INTO logina(name,email,phone,password,usertype,dob) VALUES ('$name','$email','$phone','$pass','wholesaler','$dob')";
            $result = mysqli_query($con,$qry1);
            if(!$result){
                echo mysqli_error($con);
            }
            else{
                echo "hehhedhd";
            }
          
            // echo "<script> alert('Registration successful.Kindly login to continue.')</script>";
        }
    ?>
</body>
</html>
