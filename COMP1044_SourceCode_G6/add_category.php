<html>
    <head>
        <title>
            Library Management System (AddCategory)
        </title>
        <link rel="stylesheet" href="LibraryMs.css">
        <style>

        body {
          text-align: center;
        }
        .box {
          width: 650px;
          background-image: linear-gradient(#565869, grey);
          justify-content: center;
          margin: 0 auto;
          opacity: .8;
          color: #ddd;
          border-radius: 25PX;
          padding: 10PX;
          }

        .submit input[type=submit]:hover{
          background-color: #ddd;
          color: #aaa85a;
          cursor: pointer;
        }

          input[type=text]{
            height: 30px;
            width: 300px;
            border-radius: 10px;
            padding: 10px;
            margin:5px;
        }

        .submit input[type=submit]{
          font-size: 20px;
          font-weight: bold;
          padding: 10px;
          width: 50 px;
          border-radius: 10px;
          position: relative;
          border: 0px;
          margin-top: 16px;.
        }

        tr, td {
          color: #ddd;
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

        <br><br><br>

        <section>
          <div class="box">
            <br>
			<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "library";

			if(isset($_POST["submit"]))
			{
				$classname  =  $_POST['classname'];
				// Create connection
				$connect = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($connect->connect_error) 
				{
					die("Connection failed: " . $connect->connect_error);
				}
				$sql = "SELECT * FROM category where classname = '$classname'";
				$result = $connect->query($sql);
				
				if($result -> num_rows <=0)
				{
					$addcategory = "INSERT INTO category values('','$classname')";
					if($connect->query($addcategory) == TRUE)
					{
						echo "Successfully added a new category to the database!";
					}
					else
					{
						echo "Error";
					}
				}
				else
				{
					echo "This classname is already in the category";
				}
				$connect->close();
			}
			?>
			<br><br>
            <h1 style="text-align: center; font-size: 25px;">Add a category to the system</h1>

            <form name="AddCategory" action="add_category.php" method="POST">

              <table border="2" align="center" cellpadding="5" cellspacing="5">
                <tr>
                  <td>Classname :</td>
                  <td> <input type="text" name="classname" required> </td>
                </tr>
              </table>
              <br>

              <div class ="submit">
                <input type="submit" name="submit" value="ADD Category"/>
              </div>
            </form>
          </div>
        </section>
    </body>
</html>