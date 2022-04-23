<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = new mysqli($server, $username, $password, $dbname);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Library Management System (UpdateMember)
        </title>
        <link rel="stylesheet" href="LibraryMs.css">
        <style>
		body {
			text-align: center;
		}
		.container {
			width: 700px;
			background-image: linear-gradient(#565869, grey);
			justify-content: center;
			margin: 0 auto;
			opacity: 0.8;
			color: #ddd;
			border-radius: 25PX;
			padding: 10PX;
		}
		input {
			height: 25px;
			width: 300px;
			border-radius: 10px;
			padding: 10px;
			margin:2px;
		}

		.update button{
			font-size: 20px;
			font-weight: bold;
			padding: 10px;
			width: 50 px;
			border-radius: 10px;
			position: relative;
			border: 0px;
			margin-top: 10px;.
		}

		.details button:hover{
			background-color: #ddd;
			color: #aaa85a;
			cursor: pointer;
		}
        </style>
    </head>

    <body>
        <div class="navbar">
            <img src="books.webp" style="float:left"; width="70px"; height="45px">

            <a href="Home.php">Library Management System</a>

            <div class="dropdown">
                <button class="dropbtn">User  
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                  <a href="Login.php">Logout</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbtn">Borrow  
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                  <a href="add_borrow.php">Add</a>
                  <a href="search_borrow.php">Search</a>
                  <a href="update_borrow.php">Update</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbtn">Category
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                  <a href="add_category.php">Add</a>
                  <a href="search_category.php">Search</a>
                  <a href="delete_category.php">Delete</a>
                </div>
            </div>  

            <div class="dropdown">
                <button class="dropbtn">Member  
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                  <a href="add_member.php">Add</a>
                  <a href="search_member.php">Search</a>
                  <a href="update_member.php">Update</a>
                  <a href="delete_member.php">Delete</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropbtn">Book  
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                  <a href="add_book.php">Add</a>
                  <a href="search_book.php">Search</a>
                  <a href="update_book.php">Update</a>
                  <a href="delete_book.php">Delete</a>
                </div>
              </div>

        </div>

        <br><br>
        <div class="container">
        <?php
		if(isset($_POST['update']))
		{
			$member = $_POST['member_id'];
			$firstname=$_POST['firstname'];
			$lastname=$_POST['lastname'];
			$address=$_POST['address'];
			$contact=$_POST['contact'];
			$type=$_POST['type_id'];
			$yearlevel=$_POST['year_level'];
			$status=$_POST['status'];
			
			$sql = "SELECT * From member WHERE member_id = '$member'";
			$result = $conn -> query ($sql);
			
			if($result -> num_rows <= 0)
			{
				echo "Invalid Type ID";
			}
			else
			{
				if($firstname == "" && $lastname == "" && $address == "" && $contact == "" && $type == "" && $yearlevel == "" && $status == "")
				{
					echo "Please input the details that you want to update.";
				}
				if($firstname!="")
				{
					$query = "UPDATE member SET firstname='$firstname' where member_id='$member' ";
					if(mysqli_query($conn,$query))
					{
						echo "Firstname Updated Successfully<br>";
					}
				}
				if($lastname!="")
				{
					$query = "UPDATE member SET lastname='$lastname' where member_id='$member' ";
					if(mysqli_query($conn,$query))
					{
						echo "Lastname Updated Successfully<br>";
					}
				}
				if($address!="")
				{
					$query = "UPDATE member SET address='$address' where member_id='$member' ";
					if(mysqli_query($conn,$query))
					{
						echo "Address Updated Successfully<br>";
					}
				}
				if($contact!="")
				{
					$query = "UPDATE member SET contact='$contact' where member_id='$member' ";
					if(mysqli_query($conn,$query))
					{
						echo "Contact Updated Successfully<br>";
					}
				}
				if($type!="")
				{
					$sql = "SELECT * From type WHERE type_id = '$type'";
					$result = $conn -> query($sql);
					
					if($result -> num_rows <= 0)
					{
						echo "Invalid Type ID<br>";
					}
					else
					{
					$query = "UPDATE member SET type_id='$type' where member_id='$member' ";
					if(mysqli_query($conn,$query))
					{
						echo "Type Updated Successfully<br>";
					}
					}
				}
				if($yearlevel!="")
				{
					$query = "UPDATE member SET year_level='$yearlevel' where member_id='$member' ";
					if(mysqli_query($conn,$query))
					{
						echo "Year_Level Updated Successfully<br>";
					}
				}
				if($status!="")
				{
					$query = "UPDATE member SET status='$status' where member_id='$member' ";
					if(mysqli_query($conn,$query))
					{
						echo "Status Updated Successfully";
					}
				}
			}
		}
			
		?>
          <h1>Updating Member Details</h1>

          <form name="UpdateMember" action="update_member.php" method="POST">
            <input type="text" name="member_id" placeholder="Member ID" required><br>
            <input type="text" name="firstname" placeholder="First Name"><br>
            <input type="text" name="lastname" placeholder="Last Name"><br>
            <input type="text" name="gender" placeholder="Gender"><br>
            <input type="text" name="address" placeholder="Address"><br>
            <input type="text" name="contact" placeholder="Contact Number"><br>
            <input type="text" name="type_id" placeholder="Type ID"><br>
            <input type="text" name="year_level" placeholder="Year Level"><br>
            <input type="text" name="status" placeholder="Status"><br>
            <div class="update">
				<button type="submit" name="update" value="Update">Update</button>
            </div>
          </form>
        </div>
	</body>
</html>