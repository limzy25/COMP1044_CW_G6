<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Library Management System
        </title>
        <link rel="stylesheet" href="login.css">
        <link rel="stylesheet" href="LibraryMs.css">
        <style>
            body 
			{
                text-align: center;
            }
			input 
			{
    			margin:7px;
			}	
        </style>
    </head>

    <body>
        <div class="navbar">
            <img src="books.webp" style="float:left"; width="70px"; height="45px">

            <a href="Login.php">Library Management System</a>

        </div>

        <br><br><br><br>

        <section>
        <div class="box">
	    <?php

		$conn = new mysqli("localhost", "root", "", "library");

		if ($conn -> connect_error)
		{
			die("Connection failed: " . $conn->connect_error);
		}
			
		if(isset($_POST['Submit']))
		{
			$user = $_POST['user'];
			$password = $_POST['password'];
			$confirm = $_POST['confirmpassword'];
			
			
				$sql = "SELECT * From users WHERE user_id = '$user'";
				$results = $conn -> query($sql);
				
				if($results->num_rows<=0)
				{
					$sqli = "SELECT * From users WHERE username = '$user'";
					$result = $conn -> query($sqli);
					
					if($result->num_rows <=0)
					{
						echo "Userid/Username is wrong";
					}
					else
					{
						if($confirm != $password)
						{
							echo "Your password is incorrect";
						}
						else
						{
							$sqlii = "UPDATE users SET password = '$password' WHERE username = '$user'";
							$res = $conn -> query($sqlii);
						
							if($res === True)
							{
								header("Location: Home.php");
							}
							else
							{
								echo "Password is wrong";
							}
						}
					}
				}
				else
				{
					if($confirm != $password)
					{
						echo "Your password is incorrect";
					}
					else
					{
						$sqlii = "UPDATE users SET password = '$password' WHERE user_id = '$user'";
						$res = $conn -> query($sqlii);
						
						if($res === True)
						{
							header("Location: Home.php");
						}
						else
						{
							echo "Password is wrong";
							
						}
					}
					
				}
			}
			$conn->close();
		?>

		<h2>Forgot password</h2>
		<form action="forgotpassword.php" method="post">
		
		<div class="login">
			<input type = "text" name = "user" placeholder="Userid/Username" required><br>
			<input type = "password" name = "password" placeholder="New Password" required><br>
			<input type = "password" name = "confirmpassword" placeholder="Confirm Password" required><br><br>
			<button type = "submit" name = "Submit" value="Submit"> submit </button>
			<p style="color: white; padding-left: 15px; "><br>
				<a style="color:white;" href="createaccp2.php">Sign Up</a>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
				<a style="color:white;" href="Login.php".php">Go back to login</a>
			</p>
			</form>
		</div>
		</section>

	</body>
</html>