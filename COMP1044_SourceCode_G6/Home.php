<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = new mysqli($server, $username, $password, $dbname);
?><!DOCTYPE html>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Library Management System
        </title>
        <link rel="stylesheet" href="LibraryMs.css">
        </head>
        <style>
            
        
    .dashboard {
    width: 300px;
    background-color:#565869;
    margin: 0 auto;
    opacity: .8;
    color: white;
    border-radius: 25PX;
    padding: 20PX;
    float:left;
    margin-left:120px;
    margin-top: 20px;
}
        </style>

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
        <br><br><br><br><br><br><br>
		
        <div class="dashboard">
            <h2>Total Books:</h2>
            <?php 
                $dash_book_query = "SELECT * from book";
                $dash_book_query_run = mysqli_query($conn,$dash_book_query);

                if($book_total = mysqli_num_rows($dash_book_query_run))
                {
                    echo "<h4>$book_total</h4>";
                }
                else{
                    echo '<h4>No Books</h4>';
                }
            ?>
        </div>
		
        <div class="dashboard">
            <h2>Total Members:</h2>
            <?php 
                $dash_member_query = "SELECT * from member";
                $dash_member_query_run = mysqli_query($conn,$dash_member_query);

                if($member_total = mysqli_num_rows($dash_member_query_run))
                {
                    echo "<h4>$member_total</h4>";
                }
                else{
                    echo '<h4>No Members</h4>';
                }
            ?>
        </div>
        

        <div class="dashboard">
            <h2>Total Borrowed books:</h2>
            <?php 
                $dash_borrow_query = "SELECT * from borrowdetails";
                $dash_borrow_query_run = mysqli_query($conn,$dash_borrow_query);

                if($borrow_total = mysqli_num_rows($dash_borrow_query_run))
                {
                    echo "<h4>$borrow_total</h4>";
                }
                else{
                    echo '<h4>No Books is borrowed</h4>';
                }
            ?>
        </div>
		
        <div class="dashboard">
            <h2>Total Categories:</h2>
            <?php 
                $dash_category_query = "SELECT * from category";
                $dash_category_query_run = mysqli_query($conn,$dash_category_query);

                if($category_total = mysqli_num_rows($dash_category_query_run))
                {
                    echo "<h4>$category_total</h4>";
                }
                else{
                    echo '<h4>No Category</h4>';
                }
            ?>
        </div>
		
        <div class="dashboard">
            <h2>Total Banned:</h2>
            <?php 
                $dash_banned_query = "SELECT * from member WHERE `status` = 'Banned' OR `status` = 'Ban'";
                $dash_banned_query_run = mysqli_query($conn,$dash_banned_query);

                if($banned_total = mysqli_num_rows($dash_banned_query_run))
                {
                    echo "<h4>$banned_total</h4>";
                }
                else{
                    echo '<h4>No Members is banned</h4>';
                }
            ?>
        </div>
    </body>
</html>