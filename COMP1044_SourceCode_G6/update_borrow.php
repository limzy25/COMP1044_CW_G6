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
            Library Management System (UpdateBorrow)
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
			opacity: .8;
			color: #ddd;
			border-radius: 25PX;
			padding: 10PX;
		}
		input {
			height: 25px;
			width: 300px;
			border-radius: 10px;
			padding: 10px;
			margin:5px;
		}

		.update button{
			font-size: 20px;
			font-weight: bold;
			padding: 10px;
			width: 50 px;
			border-radius: 10px;
			position: relative;
			border: 0px;
			margin-top: 16px;.
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

        <br><br><br><br>
		<div class="container">
				  
		<?php
			if(isset($_POST['update'])){

				$details=$_POST['borrow_details_id'];
				$borrow=$_POST['borrow_status'];
				$return=$_POST['date_return'];
				$member=$_POST['member_id'];
				$book=$_POST['book_id'];
				
				$sql = "SELECT * From borrowdetails WHERE borrow_details_id='$details'";
				$result = $conn->query($sql);
				
				if($result->num_rows <=0)
				{
					echo "Invalid Borrow Details ID";
				}
				else
				{
					if($book!="")
					{
						$sql = "SELECT * From book WHERE book_id = '$book'";
						$result = $conn -> query($sql);
						
						if($result -> num_rows <= 0)
						{
							echo "Invalid Book ID<br>";
						}
						else
						{
							$query = "UPDATE borrowdetails SET book_id='$book'where borrow_details_id='$details'";
							if(mysqli_query($conn,$query))
							{
								echo "Book id Updated Successfully<br>";
							}
						}
					}
					if($member!="")
					{
						$sql = "SELECT * From member WHERE member_id = '$member'";
						$result = $conn -> query($sql);
						
						if($result -> num_rows <= 0)
						{
							echo "Invalid Member ID<br>";
						}
						else
						{
							$query = "UPDATE borrowdetails SET member_id='$member'where borrow_details_id='$details'";
							
							if(mysqli_query($conn,$query))
							{
								echo "Member id Updated Successfully<br>";
							}
						}
					}
					if($borrow!="")
					{
						$query = "UPDATE borrowdetails SET borrow_status='$borrow'where borrow_details_id='$details'";
						if(mysqli_query($conn,$query))
						{
							echo "Borrow status Updated Successfully<br>";
						}
					}
					if($return!="")
					{
						$query = "UPDATE borrowdetails SET date_return='$return'where borrow_details_id='$details'";
						if(mysqli_query($conn,$query))
						{
							echo "Date Return Updated Successfully<br>";
						}
					}
					
					if($book=="" && $member=="" && $borrow=="" && $return=="")
					{
						echo "Please input the details that you want to update.";
					}
				}
			}

		?>
            <h1>Updating Borrower Details</h1>

            <form name="UpdateBorrow" action="update_borrow.php" method="POST">
				<input type="text" name="borrow_details_id" placeholder="Borrow Details ID" required><br>
				<input type="text" name="book_id" placeholder="Book ID"><br>
				<input type="text" name="member_id" placeholder="Member ID"><br>
				<input type="text" name="borrow_status" placeholder="Status of Borrow"><br>
				<input type="datetime-local" name="date_return" placeholder="Date Returned( YYYY-Mm-DD HH:MM:SS )"><br>
				<div class="update">
				  <button type="submit" name="update" value="Update"> Update</button>
				</div>
            </form>
         </div>

</body>
</html>
