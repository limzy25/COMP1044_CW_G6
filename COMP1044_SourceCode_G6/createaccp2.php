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
			input {
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

						$username = $_POST['username'];
						$password = $_POST['password'];
						$firstname = $_POST['firstname'];
						$lastname = $_POST['lastname'];
						$confirm = $_POST['confirmpassword'];
						
						$sql = "SELECT * From users WHERE username = '$username'";
						$results = $conn -> query($sql);
							
						if($results->num_rows<=0)
						{
							$sqli = "SELECT * From users WHERE firstname = '$firstname' AND lastname = '$lastname'";
							$result = $conn -> query($sqli);
								
							if($result->num_rows <=0)
							{
								if($confirm != $password)
								{
									echo "Your password is incorrect";
								}
								else
								{
									$sqlii = "INSERT INTO users (username, password,firstname,lastname) VALUES ('$username','$password','$firstname','$lastname')";
									$res = $conn->query($sqlii);
									
									if($res->num_rows === FALSE)
									{
										echo "Account created unsuccessfully";
									}
									else
									{
										header("Location: Home.php");
									}
								}
							}
							else
							{
								echo "You have created an account before.";
							}
						}
						else
						{
							echo "This username is used";
						}
					}
					$conn->close();
				?>

				<form action="createaccp2.php" method="post">
					<h2>Create an account</h2>
					<div class="login">
					<input type = "text" name = "username" placeholder="Username" required><br>
					<input type = "text" name = "firstname" placeholder="Firstname" required><br>
					<input type = "text" name = "lastname" placeholder="Lastname" required><br>
					<input type = "password" name = "password" placeholder="Password" required><br>
					<input type = "password" name = "confirmpassword" placeholder="Confirm Password" required><br><br>
					<button type = "submit" name = "Submit" value="Sign Up"> Sign up </button><br>
					<p style="color: white; padding-left: 15px; ">
									<a style="color:white;" href="Login.php">Already have an account?</a>
					</p>
					</div>
				</form>
			</div>
		</section>
	</body>
</html>