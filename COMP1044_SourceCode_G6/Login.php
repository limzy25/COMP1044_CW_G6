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
            body {
                text-align: center;
            }
        </style>
    </head>

    <body>
        <div class="navbar">
            <img src="books.webp" style="float:left"; width="70px"; height="45px">

            <a href="Login.php">Library Management System</a>

            <div class="about_us">
              <a href="About us.php">about us</a>
            </div>

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
				
				$sql = "SELECT * From users WHERE user_id = '$user'";
				$results = $conn -> query($sql);
					
				if($results->num_rows<=0)
				{
					$sqli = "SELECT * From users WHERE username = '$user'";
					$result = $conn -> query($sqli);
						
					if($result->num_rows <=0)
					{
						echo "userid/username is wrong";
					}
					else
					{
						$sqlii = "SELECT * From users WHERE password = '$password'";
						$res = $conn -> query($sqlii);
							
						if($res->num_rows <= 0)
						{
							echo "password is wrong";
						}
						else
						{
							header("Location: Home.php");
						}
					}
				}
				else
				{
					$sqlii = "SELECT * From users WHERE password = '$password'";
					$res = $conn -> query($sqlii);
							
					if($res->num_rows <= 0)
					{
						echo "password is wrong";
					}
					else
					{
						header("Location: Home.php");
					}
				}
				
			}
			$conn->close();
			?>
                <br>
                <h1 style="text-align: center; font-size: 35px; font-family: Lucida Console;">Library Management System</h1>
                <h1 style="text-align: center; font-size: 25px;">User Login Form</h1><br>

                
                <form name="Login" action="Login.php" method="POST">
                    <div class="login">
                        <input type="text" name="user" placeholder="Username" required> <br><br>
                        <input type="password" name="password" placeholder="Password" required> <br><br>
                        <button type = "submit" name = "Submit" value="Submit">Login</button>
                    </div>
                </form>
                <p style="color: white; padding-left: 15px; ">
                    <br><br>
                    <a style="color:white;" href="forgotpassword.php">Forgot password?</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                    New to this website? &nbsp <a style="color:white;" href="createaccp2.php">Sign Up</a>
                </p>
            </div>
        </section>

    </body>
</html>