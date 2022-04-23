<html>
    <head>
        <title>
            Library Management System (DeleteMember)
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

        <br>

        <section>
          <div class="box">
            <br>
			<?php

			$conn = new mysqli("localhost", "root", "", "library");

			if ($conn -> connect_error)
			{
			  die("Connection failed: " . $conn->connect_error);
			}
			  
			if(isset($_POST['submit']))
			{
			  $member = $_POST['Member'];

			  
				$sql = "SELECT * From member WHERE member_id = '$member'";
				$results = $conn -> query($sql);
				
				if($results->num_rows <= 0 )
				{
				  $sql = "SELECT firstname,lastname, CONCAT(FIRSTNAME, ' ', LASTNAME) AS FULLNAME FROM `member` WHERE (CONCAT(FIRSTNAME,' ', LASTNAME) = '$member')";
				  $results = $conn -> query($sql);
				
				  if($results->num_rows <= 0 )
				  {
					echo "Invalid MemberID/Name";
				  }
				  else
				  {
					$sqli = "SELECT member.member_id FROM member,borrowdetails WHERE member.member_id = borrowdetails.member_id AND  (CONCAT(member.FIRSTNAME, ' ',member.LASTNAME) = '$member')";
					$res = $conn -> query ($sqli);
					
					if($res -> num_rows <=0)
					{
					  $sqli = "DELETE From member WHERE (CONCAT(member.FIRSTNAME, ' ',member.LASTNAME) = '$member')";;
					  $result = $conn -> query($sqli);
					
					  if($result === TRUE)
					  {
						echo "Member sucessfully deleted";
					  }
					  else
					  {
						echo "member is not deleted";
					  }
					}
					else
					{
					  $sqli = "DELETE member,borrowdetails From member INNER JOIN borrowdetails ON member.member_id = borrowdetails.member_id WHERE (CONCAT(member.FIRSTNAME, ' ',member.LASTNAME) = '$member')";
					  $result = $conn -> query($sqli);
					
					  if($result === TRUE)
					  {
						echo "Member sucessfully deleted";
					  }
					  else
					  {
						echo "member is not deleted";
					  }
					}
				  }
				}
				else
				{
				  $sqli = "SELECT member.member_id FROM member,borrowdetails WHERE member.member_id = borrowdetails.member_id AND member.member_id='$member'";
				  $res = $conn -> query ($sqli);
				  
				  if($res -> num_rows <=0)
				  {
					$sqli = "DELETE From member WHERE member_id = '$member'";
					$result = $conn -> query($sqli);
				  
					if($result === TRUE)
					{
					  echo "Member sucessfully deleted";
					}
					else
					{
					  echo "member is not deleted";
					}
				  }
				  else
				  {
					$sqli = "DELETE borrowdetails,member From borrowdetails INNER JOIN member ON member.member_id = borrowdetails.member_id WHERE borrowdetails.member_id = '$member'";
					$result = $conn -> query($sqli);
				  
					if($result === TRUE)
					{
					  echo "Member sucessfully deleted";
					}
					else
					{
					  echo "member is not deleted";
					}
				  }
				}
			  }
			  $conn->close();

			?><br>
            <h1 style="text-align: center; font-size: 25px;">Delete a member from the system</h1>

            <form name="DeleteMember" action="delete_member.php" method="POST">

              <table border="2" align="center" cellpadding="5" cellspacing="5">
                <tr>
                  <td>Member ID/Name :</td>
                  <td> <input type="text" name="Member" required> </td>
                </tr>
              </table>
              <br>

              <div class ="submit">
                <input type="submit" name="submit" value="Delete Member"/>
              </div>

            </form>

          </div>
        </section>


    </body>
    
</html>