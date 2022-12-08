<?php 
session_start();

	include("dbconnect.php");
	include("check.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			
			$user_id = random_num(20);
			$query = "insert into storage (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
        <title>Sign up</title>
</head>
<body>
        <style type="text/css">

        #text{

                height: 25px;
                border-radius: 5px;
                padding: 4px;
                border: solid thin #79A7D3;
                width: 100%;
        }

        #button{

                padding: 10px;
                width: 100px;
                color: white;
                background-color: #8A307F;
                border: none;
        }

        #box{

                background-color: #6883BC;
                margin: auto;
                width: 300px;
border-radius: 25px;    
        padding: 20px;
        }

        </style>


<div id="box">



    <form method="post">
            <div style="font-size: 20px;margin: 10px;color: black;">Register</div>

            <input id="text" type="text" name="user_name"><br><br>
            <input id="text" type="password" name="password"><br><br>

            <input id="button" type="submit" value="Register"><br><br>

            <a href="login.php">Click to Login</a><br><br>
    </form>
</div>

</body>
</html>
