<html>
    <head>
        <title>
            Library Management System (DeleteCategory)
        </title>
        <link rel="stylesheet" href="LibraryMs.css">
        <style>

        body {
          text-align: center;
        }
        .box {
          width: 700px;
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

          input[type=text] {
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

        <br><br><br><br>

        <section>
          <div class="box">
            <br><br>
			<?php

			$conn = new mysqli("localhost", "root", "", "library");

			if ($conn -> connect_error)
			{
				die("Connection failed: " . $conn->connect_error);
			}
				
			if(isset($_POST['submit']))
			{
				$category = $_POST['Category'];
				
				$sql = "SELECT * From category WHERE classname = '$category'";
				$results = $conn -> query($sql);
					
				if($results->num_rows <= 0 )
				{
					$sqli = "SELECT * From category WHERE category_id = '$category'";
					$result = $conn -> query($sqli);
					
					if($result->num_rows <= 0 )
					{
						echo "Invalid CategoryID/Classname";
					}
					else
					{
						$sqlii = "SELECT category.category_id From category,book WHERE book.category_id = category.category_id AND category.category_id='$category'";
						$res = $conn -> query ($sqlii);
						
						if($res -> num_rows <= 0)
						{
							$sqli = "DELETE From category WHERE category_id = '$category'";
							$result = $conn -> query($sqli); 
							if($result === TRUE)
							{
								echo "Category sucessfully deleted";
							}
							else
							{
								echo "category is not deleted";
							}
						}
						else
						{
							$select = "SELECT category.category_id, book.book_id, borrowdetails.borrow_details_id FROM category INNER JOIN book ON category.category_id = book.category_id INNER JOIN borrowdetails on book.book_id=borrowdetails.book_id WHERE book.category_id='$category'";
							$resu = $conn->query($select);
							
							if($resu -> num_rows <= 0)
							{
								$sqli = "DELETE book,category From category INNER JOIN book ON category.category_id = book.category_id WHERE book.category_id='$category'";
								$result = $conn -> query($sqli); 
								if($result === TRUE)
								{
									echo "Category sucessfully deleted";
								}
								else
								{
									echo "category is not deleted";
								}
							}
							else
							{
								$sqli = "DELETE book,borrowdetails From category INNER JOIN book ON category.category_id = book.category_id INNER JOIN borrowdetails on book.book_id=borrowdetails.book_id WHERE book.category_id='$category';";
								$sqli .= "DELETE book,category From book INNER JOIN category ON category.category_id = book.category_id WHERE book.category_id='$category'";
								$result = $conn -> multi_query($sqli);
						
								if($result === TRUE)
								{
										
									echo "Category sucessfully deleted";
									
								}
								else
								{
									echo "category is not deleted";
								}
							}	
						}
					}
				}
				else
				{
					$sqlii = "SELECT category.category_id From category,book WHERE book.category_id = category.category_id AND category.classname='$category'";
						$res = $conn -> query ($sqlii);
						
						if($res -> num_rows <= 0)
						{
							$sqli = "DELETE From category WHERE classname = '$category'";
							$result = $conn -> query($sqli); 
							if($result === TRUE)
							{
								echo "Category sucessfully deleted";
							}
							else
							{
								echo "category is not deleted";
							}
						}
						else
						{
							$select = "SELECT category.category_id, book.book_id, borrowdetails.borrow_details_id FROM category INNER JOIN book ON category.category_id = book.category_id INNER JOIN borrowdetails on book.book_id=borrowdetails.book_id WHERE category.classname ='$category'";
							$resu = $conn->query($select);
							
							if($resu -> num_rows <= 0)
							{
								$sqli = "DELETE book From category INNER JOIN book ON category.category_id = book.category_id WHERE category.classname='$category';";
								$sqli .= "DELETE category From category  WHERE category.classname='$category'";
								$result = $conn -> multi_query($sqli); 
								if($result === TRUE)
								{
									echo "Category sucessfully deleted";
								}
								else
								{
									echo "category is not deleted";
								}
							}
							else
							{
								$sqli = "DELETE book,borrowdetails From category INNER JOIN book ON category.category_id = book.category_id INNER JOIN borrowdetails on book.book_id=borrowdetails.book_id WHERE category.classname='$category';";
								$sqli .= "DELETE book From category INNER JOIN book ON category.category_id = book.category_id WHERE category.classname='$category';";
								$sqli .= "DELETE category From category  WHERE category.classname='$category'";
								$result = $conn -> multi_query($sqli);
						
								if($result === TRUE)
								{
										
									echo "Category sucessfully deleted";
									
								}
								else
								{
									echo "category is not deleted";
								}
							}	
						}
					}
				}
			?>
			<br><br>
            <h1 style="text-align: center; font-size: 25px;">Delete a category from the system</h1>

            <form name="DeleteCategory" action="delete_category.php" method="POST">

              <table border="2" align="center" cellpadding="5" cellspacing="5">
                <tr>
                  <td>Category ID/Name :</td>
                  <td> <input type="text" name="Category" required> </td>
                </tr>
              </table>
              <br>

              <div class ="submit">
                <input type="submit" name="submit" value="Delete Category"/>
              </div>
            </form>
          </div>
        </section>
    </body>
</html>