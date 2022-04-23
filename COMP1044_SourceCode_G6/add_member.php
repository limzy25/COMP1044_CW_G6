<html>
    <head>
        <title>
            Library Management System (AddMember)
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

        select {
            height: 30px;
            width: 300px;
            border-radius: 10px;
            margin:5px;
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
				$contact = $_POST['contact'];
				$type = $_POST['type_id'];
				// Create connection
				$connect = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($connect->connect_error) 
				{
					die("Connection failed: " . $connect->connect_error);
				}
				$sqli = "SELECT * FROM type where type_id = '$type'";
				$results = $connect->query($sqli);
				
				if($results -> num_rows <= 0)
				{
					echo "This type id is not valid";
				}
				else
				{
					$sql = "SELECT * FROM member where contact = '$contact'";
					$result = $connect->query($sql);
					
					if($result -> num_rows <= 0)
					{
						$addmember = "INSERT INTO member values('','$_POST[firstname]','$_POST[lastname]','$_POST[gender]','$_POST[address]','$_POST[contact]','$_POST[type_id]','$_POST[year_level]','$_POST[status]')";
						if($connect->query($addmember) == TRUE)
						{
							echo "Successfully added a new member to the database.";
						}
						else
						{
							echo "Error: " .$connect->error;
						}
					}
					else
					{
						echo "This member has already been added";
					}
				}
				$connect->close();
			}

			?>
            <br>
            <h1 style="text-align: center; font-size: 25px;">Add a member to the system</h1>

            <form name="AddMember" action="add_member.php" method="POST">

              <table border="2" align="center" cellpadding="5" cellspacing="5">
                <tr>
                  <td>First Name :</td>
                  <td> <input type="text" name="firstname" required> </td>
                </tr>
                <tr>
                  <td>Last Name :</td>
                  <td> <input type="text" name="lastname" required> </td>
                </tr>
                <tr>
                  <td>Gender :</td>
                  <td> <input type="text" name="gender" required> </td>
                </tr>
                <tr>
                  <td>Address :</td>
                  <td> <input type="text" name="address" required> </td>
                </tr>
                <tr>
                  <td>Contact :</td>
                  <td> <input type="text" name="contact" required> </td>
                </tr>
                <tr>
                  <td>Type ID :</td>
                  <td> 
                  <?php
                    $mysqli = new MYSQLI ('localhost', 'root', '', 'library');
                    $result_type= $mysqli->query("SELECT * FROM `type`");
                    ?>
                    <select name="type_id">
                      <option>type</option>
                      <?php
                      while ($row = $result_type -> fetch_assoc())
                      {
                        $type_ID = $row['type_id'];
                        $type_name = $row['borrowertype'];
                        echo "<option value ='$type_ID'> $type_ID | $type_name </option>";
                      }
                      ?>     
                 </td>
                </tr>
                <tr>
                  <td>Year Level :</td>
                  <td> <input type="text" name="year_level" required> </td>
                </tr>
                <tr>
                  <td>Status :</td>
                  <td> <input type="text" name="status" required> </td>
                </tr>
              </table>
              <br>

              <div class ="submit">
                <input type="submit" name="submit" value="ADD Member"/>
              </div>

            </form>

          </div>
        </section>
    </body>
</html>