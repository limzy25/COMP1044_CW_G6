<html>
    <head>
        <title>
            Library Management System (AddBorrow)
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

        .submit input[type=submit]:hover{
          background-color: #ddd;
          color: #aaa85a;
          cursor: pointer;
        }

        tr, td {
          color: #ddd;
        }
        input[type=text]{
          height: 30px;
          width: 300px;
          border-radius: 10px;
          padding: 10px;
          margin:5px;
		}

    input[type=datetime-local] {
            height: 30px;
            width: 300px;
            border-radius: 10px;
            padding: 10px;
            margin:5px;
        }
        input[type=date] {
            height: 30px;
            width: 300px;
            border-radius: 10px;
            padding: 10px;
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
                  <a href="delete_member.php">Delete</a>
                </div>
            </div>  

            <div class="dropdown">
                <button class="dropbtn">Member  
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                  <a href="add_member.php">Add</a>
                  <a href="search_members.php">Search</a>
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
				$book_id = $_POST['book_id'];
				$member_id = $_POST['member_id'];
				$user_id = $_POST['user_id'];
				// Create connection
				$connect = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($connect->connect_error) 
				{
					die("Connection failed: " . $connect->connect_error);
				}
				
				$book = "SELECT * From book WHERE book_id = '$book_id'";
				$resbook = $connect -> query ($book);
				
				if ($resbook ->num_rows > 0)
				{
					$member = "SELECT * From member WHERE member_id = '$member_id';";
					$resmember = $connect -> query ($member);
					
					if ($resmember ->num_rows > 0)
					{
						$banned = "SELECT * From member WHERE member_id = '$member_id' AND (status ='Banned' OR status ='Ban')";
						$resban = $connect -> query($banned);
						
						if($resban -> num_rows > 0)
						{
							echo "This member has been banned";
						}
						else
						{
							$sql = "SELECT * FROM borrowdetails where book_id = '$book_id' AND member_id = '$member_id' AND borrow_status = 'pending'";
							$result = $connect->query($sql);
				
							if($result -> num_rows <= 0)
							{
								$addborrowdetails = "INSERT INTO borrowdetails values('','$_POST[book_id]','$_POST[member_id]','$_POST[date_borrow]','$_POST[due_date]','pending','','$_POST[user_id]')";
								if($connect->query($addborrowdetails) == TRUE)
								{
									echo "Successfully added book borrow details to the database.";
								}
								else
								{
									echo "Error: " .$connect->error;
								}
							}
							else
							{
								echo "The person with that member ID has already borrowed that book and still havent returned.";
							}
						}
					}
					else
					{
						echo "Invalid Member ID";
					}
				}
				else
				{
					echo "Invalid Book ID";
				}
				$connect->close();
			}
			?>
			<br>
            <h1 style="text-align: center; font-size: 25px;">Add a borrow detail to the system</h1>

            <form name="AddBorrow" action="add_borrow.php" method="POST">

              <table border="2" align="center" cellpadding="5" cellspacing="5">
                <tr>
                  <td>Book ID :</td>
                  <td> <input type="text" name="book_id" required> </td>
                </tr>
                <tr>
                  <td>Member ID :</td>
                  <td> <input type="text" name="member_id" required> </td>
                </tr>
                <tr>
                  <td>Date Borrow :</td>
                  <td> <input type="datetime-local" name="date_borrow" required> </td>
                </tr>
                <tr>
                  <td>Due Date :</td>
                  <td> <input type="date" name="due_date" required> </td>
                </tr>
                <tr>
                  <td>User ID :</td>
                  <td> <input type="text" name="user_id" required> </td>
                </tr>
              </table>
              <br>

              <div class ="submit">
              <input type="submit" name="submit" value="ADD Borrow Detail"/>
              </div>
            </form>
			
          </div>
        </section>
    </body>
</html>