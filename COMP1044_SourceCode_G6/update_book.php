<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = new mysqli($server, $username, $password, $dbname);
if($conn === false){
	die("ERROR" .mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Library Management System (UpdateBook)
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
				$book = $_POST['book_id'];
				$booktitle = $_POST['book_title'];
				$categoryid = $_POST['category_id'];
				$author = $_POST['author'];
				$bookcopies = $_POST['book_copies'];
				$bookpub = $_POST['book_pub'];
				$publisher = $_POST['publisher_name'];
				$isbn = $_POST['isbn'];
				$copyrightyear = $_POST['copyright_year'];
				$dateadded = $_POST['date_added'];
				$status = $_POST['status'];
				
				$sql = "SELECT * From Book WHERE book_id = '$book'";
				$result = $conn -> query ($sql);
				
				if($result -> num_rows <= 0)
				{
					echo "Invalid Book ID";
				}
				else
				{
					if($booktitle == "" && $categoryid == "" && $author == "" && $bookcopies == "" && $bookpub == "" && $publisher == "" && $isbn == "" && $copyrightyear == "" && $dateadded == "" && $status == "")
					{
						echo "Please input the details that you want to update.";
					}
					if($booktitle!="")
					{
						$query = "UPDATE book SET book_title='$booktitle' where book_id='$book'";
						if(mysqli_query($conn,$query)){
						echo "Book Title Updated Successfully<br>";
						}
					}
					if($categoryid!="")
					{
						$sql = "SELECT * From category WHERE category_id = '$categoryid'";
						$result = $conn -> query($sql);
						
						if($result -> num_rows <= 0)
						{
							echo "Invalid Category ID<br>";
						}
						else
						{
							$query = "UPDATE book SET category_id='$categoryid' where book_id='$book' ";
							if(mysqli_query($conn,$query))
							{
								echo "Category id Updated Successfully<br>";
							}
						}
					}
					if($author!="")
					{ 
						$query = "UPDATE book SET author='$author' where book_id='$book'";
						if(mysqli_query($conn,$query)){
						echo "Author Updated Successfully<br>";
						}
					}
					
					if($bookcopies!="")
					{
						$query = "UPDATE book SET book_copies='$bookcopies' where book_id='$book'";
						if(mysqli_query($conn,$query)){
						echo "Book Copies Updated Successfully<br>";
						}
					}
					
					if($bookpub!="")
					{
						$query = "UPDATE book SET book_pub='$bookpub' where book_id='$book'";
						if(mysqli_query($conn,$query)){
						echo "Book pub Updated Successfully<br>";
						}
					}
					
					if($publisher!="")
					{
						$query = "UPDATE book SET publisher_name='$publisher' where book_id='$book'";
						if(mysqli_query($conn,$query)){
						echo "Publisher name Updated Successfully<br>";
						}
					}
					
					if($isbn!="")
					{
						$query = "UPDATE book SET isbn='$isbn' where book_id='$book'";
						if(mysqli_query($conn,$query)){
						echo "ISBN Updated Successfully<br>";
						}
					}
					
					if($copyrightyear!="")
					{
						$query = "UPDATE book SET copyright_year='$copyrightyear' where book_id='$book'";
						if(mysqli_query($conn,$query)){
						echo "Copyright Year Updated Successfully<br>";
						}
					}
					
					if($dateadded!="")
					{
						$query = "UPDATE book SET date_added='$dateadded' where book_id='$book'";
						if(mysqli_query($conn,$query)){
						echo "Data added Updated Successfully<br>";
						}
					}
					
					if($status!="")
					{
						$query = "UPDATE book SET status='$status' where book_id='$book'";
						if(mysqli_query($conn,$query))
						{
							echo "Status Updated Successfully";
						}
					}
				}
			}
		?>
		<div class="details">	
			<h1 style="text-align: center; font-size: 25px; color: #ddd;">Update book</h1><br>
				<form name="UpdateBook" action="update_book.php" method="POST">
						
							<input type="text" name="book_id" placeholder="Book ID" required>
							<input type="text" name="book_title" placeholder="Book Title">
							<input type="text" name="category_id" placeholder="Category Number">
							<input type="text" name="author" placeholder="Author">
							<input type="text" name="book_copies" placeholder="Book Copies">
							<input type="text" name="book_pub" placeholder="Book Publisher">
							<input type="text" name="publisher_name" placeholder="Publisher">
							<input type="text" name="isbn" placeholder="ISBN">
							<input type="text" name="copyright_year" placeholder="Copyright Year">
							<input type="datetime-local" name="date_added" placeholder="Date Added(YYYY-Mm-DD HH:MM:SS)">
							<input type="text" name="status" placeholder="Status"> <br>
				  <div class="update">
							<button type="submit" name="update" value="Update"> Update </button>
				  </div>
				</form>
		</div>
		</div>
	</body>
</html>

