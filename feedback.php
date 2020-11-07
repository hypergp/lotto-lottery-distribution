<?php
    session_start();
    include "dbconnection.php";
?>
<html>
    <head>
        <title>Feedback</title>
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
        .feedback-form{
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
            height:500px;
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
            color:#FFFFFF;
            font-size:18px;
            font-weight:700;
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
        .firstname{
            position:relative;
            left:190px;
            top:-37px;
            line-height:40px;
            border-radius:6px;
            padding:0 22px;
            font-size:16px;
        }
        .date{
            position:relative;
            left:190px;
            top:-37px;
            line-height:40px;
            border-radius:6px;
            padding:0 22px;
            font-size:16px;
        }
        .feedback{
            position:relative;
            left:190px;
            top:-37px;
            line-height:100px;
            border-radius:6px;
            padding:0 22px;
            font-size:16px;
        }
        </style>
    </head>
    <body>
        <div class="feedback-form">
            <h1>Feedback form</h1>
        </div>
        <div class="main">
            <form method="post">
                <div id="name">
                    <h2 class="name">Name</h2>
                    <input class="firstname" type="text" name="name">
                    <h2 class="name">Email</h2>
                    <input class="firstname" type="text" name="email">
                    <h2 class="name">Date</h2>
                    <input class="date" type="date" name="date">
                    <h2 class="name">Feedback</h2>
                    <input class="feedback" type="text" name="feedback">
                    <button type="submit" value="submit" name="submit">Submit</button>
                </div>
            </form>
        </div>
        <?php
            if(isset($_REQUEST["submit"]))
            {
                $name=$_POST["name"];
                $email=$_POST["email"];
                $date=$_POST["date"];
                $feedback=$_POST["feedback"];
                $qry="INSERT INTO `lotterymanagement`.`feedback` (`name`, `email`, `date`, `feedback`) VALUES ('$name', '$email', '$date', '$feedback');";
                mysqli_query($con,$qry);
                echo "<script>alert('Your feedback has been submitted successfully.Thank You!')</script>";
            }
        ?>
    </body>
</html>