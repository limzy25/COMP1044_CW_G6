<html>
    <head>
        <title>
            Library Management System (AddBook)
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
        input[type=datetime-local]{
            height: 30px;
            width: 300px;
            border-radius: 10px;
            padding: 10px;
            margin:5px;
        }

        .submit input[type=submit]{
          font-size: 20px;
          font-weight: bold;
          padding: 25px 10px;
          border-radius: 10px;
          position: relative;
          border: 0px;
          margin-top: 16px;.
          text-decoration: none;
        }

        tr, td {
          color: #ddd;
        }

        select {
            height: 30px;
            width: 300px;
            border-radius: 10px;
            margin:5px;
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
        <br>

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
				$book_title = $_POST['book_title'];
				$isbn = $_POST['isbn'];
				$category = $_POST['category_id'];
				// Create connection
				$connect = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($connect->connect_error) 
				{
					die("Connection failed: " . $connect->connect_error);
				}
				
				$sql = "SELECT * From category WHERE category_id = '$category'";
				$res = $connect -> query($sql);
				
				if($res -> num_rows > 0)
				{
					$sql_book = "SELECT * FROM book where book_title = '$book_title' AND isbn = '$isbn' ";
					$result_book = $connect->query($sql_book);
					
					
					if($result_book -> num_rows > 0)
					{
						echo "The book has already been added to the database.";
					}
					else
					{
						$addbook = "INSERT INTO book values('','$_POST[book_title]','$_POST[category_id]','$_POST[author]','$_POST[book_copies]','$_POST[book_pub]','$_POST[publisher_name]','$_POST[isbn]','$_POST[copyright_year]','$_POST[date_added]','$_POST[status]')";
						if($connect->query($addbook) == TRUE)
						{
							echo "The book has been successfully added to the library database";
						}
						else
						{
							echo "Error: " .$connect->error;
						}
					}
				}
				else
				{
					echo "Invalid Category ID";
				}
				$connect->close();
			}
			?>
			<br>
            <h1 style="text-align: center; font-size: 25px;">Add a book to the Library</h1>

            <form name="AddBook" action="add_book.php" method="POST">

              <table border="2" align="center" cellpadding="5" cellspacing="5">
                <tr>
                  <td>Book Title :</td>
                  <td> <input type="text" name="book_title" required> </td>
                </tr>
                <tr>
                  <td>Category :</td>
                  <td>
                  <?php
                    $mysqli = new MYSQLI ('localhost', 'root', '', 'library');
                    $result_category= $mysqli->query("SELECT * FROM category");
                    ?>
                    <select name="category_id">
                      <option>category</option>
                      <?php
                      while ($row = $result_category -> fetch_assoc())
                      {
                        $category_ID = $row['category_id'];
                        $category_name = $row['classname'];
                        echo "<option value ='$category_ID'> $category_ID | $category_name </option>";
                      }
                      ?>   
                  </td>
                </tr>
                <tr>
                  <td>Author :</td>
                  <td> <input type="text" name="author" required> </td>
                </tr>
                <tr>
                  <td>Book Copies :</td>
                  <td> <input type="text" name="book_copies" required> </td>
                </tr>
                <tr>
                  <td>Book Publisher :</td>
                  <td> <input type="text" name="book_pub" required> </td>
                </tr>
                <tr>
                  <td>Publisher Name :</td>
                  <td> <input type="text" name="publisher_name" required> </td>
                </tr>
                <tr>
                  <td>ISBN :</td>
                  <td> <input type="text" name="isbn" required> </td>
                </tr>
                <tr>
                  <td>Copyright Year :</td>
                  <td> <input type="text" name="copyright_year" required> </td>
                </tr>
                <tr>
                  <td>Date Added :</td>
                  <td> <input type="datetime-local" name="date_added" required> </td>
                </tr>
                <tr>
                  <td>Status :</td>
                  <td> <input type="text" name="status" required> </td>
                </tr>
              </table>
              <br>

              <div class ="submit">
                <input type="submit" name="submit" value="ADD Book"/>
              </div>

            </form>
          </div>
        </section>
    </body>
</html>