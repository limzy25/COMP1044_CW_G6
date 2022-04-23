<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Library Management System (SearchCategory)
        </title>
        <link rel="stylesheet" href="LibraryMs.css">
        <style>
          .container{
			width: 100%;
			min-height: 100vh;
			display:block;
			align-items:  top;
			justify-content: center;
		}

		.search_bar{
			width: 100%;
			max-width: 700px;
			background-image: linear-gradient(#565869, grey);
			align-items: right;
			border-radius: 60px;
			padding: 10px 20px;
			backdrop-filter: blur(4px) saturate(180%);
			position:relative;
			margin: 0 auto;
		}

		.search_bar input {
			background: transparent;
			flex: 1;
			border: 0;
			outline:none;
			padding: 24px 24px;
			font-size: 20px;
			color: white;
			
		}

		.search_bar input[type=submit]{
			cursor: pointer;
			float: right;
			border: 0;
			border-radius: 20%;
			background: none;
			cursor: pointer;
		}
		.search_bar input[type=submit]:hover{
			cursor: pointer;
			background-color: #ddd;
			color: #aaa85a;
		}
		::placeholder {
			color: white;
		}


		.table{
			margin: 2%;
			padding: 5px;
		}

		.table table{
			width: 100%;
			color: #d96459;
			font-family: inherit;
			font-size: 20px;
			text-align: center;
			flex: 1;
		}

		.table table th{
			background-image: linear-gradient(#565869, grey);
			color: white;
			padding: 6px;
			font-size: 22px;
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
          <div class="table">
            <table>
              <tr>
                <th>Category ID</th>
                <th>Class name </th>
              </tr>
              <?php
				$server = "localhost";
				$username = "root";
				$password = "";
				$dbname = "library";

				$conn = mysqli_connect($server, $username, $password, $dbname);
				
				if($conn === false)
				{
					die("ERROR" .mysqli_connect_error());
				}

				$sql = "SELECT * FROM category" ;
				$result = $conn->query ($sql);

				if ($result-> num_rows > 0){
					while($row = $result-> fetch_assoc())
					{
						echo "<tr><td>".$row['category_id']."</td><td>".$row["classname"]."</td></tr>" ;
					}
					echo "</table>";
				}
				else
				{
					echo "0 results";
				}
			  ?>
            </table>
          </div>
        </div>
    </body>
</html>
