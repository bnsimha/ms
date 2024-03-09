<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="widthdevice-width, initial-scale=1.0">
        <title>Borrow page</title>
        <style>
          table{
            border: 3px solid black;
            border-collapse:collapse;
          }
          th{
            padding: 20px;
            background-color: #0D9276;
          }
          td {
        padding: 10px;
        background-color: white;
          }
            body {
             font-family: Arial, sans-serif;
             position: relative;
             display: flex;
             top:10vh;
             justify-content: center;
             align-items: center;
             height: 100vh;
           }
  
            .registration-box {
                width: 400px;
                padding: 20px;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  .registration-box input[type="text"]
  {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
  .registration-box input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #8b0000;
    border: none;
    border-radius: 4px;
    color: #fff;
    cursor: pointer;
  }
  .registration-box input[type="submit"]:hover {
    background-color: #0056b3;
  }
      
  
.navbar1 {
background-color: #8b0000;
display: flex;
justify-content: space-between;
align-items: center;
padding: 20px;
width: 100%;
top: 0;
z-index:1;
position: fixed;
overflow: hidden;
}

.navbar-logo {
color: white;
text-decoration: none;
font-size: 24px;
font-weight: bold;
}

.navbar-menu1 {
display: flex;
align-items: center;
}

.navbar-menu-item {
margin-right: 10px;
}

.navbar-menu-item:last-child {
margin-right: 5vw;
}

ul{
list-style-type: none;
}

.navbar-menu-item a {
color: white;
text-decoration: none;
font-size: 18px;
}

/* Vertical Line Divider */
.navbar-menu-item:not(:last-child)::after {
content: "|";
margin-left: 10px;
color: white;
}
/*nav bar 2*/
.navbar {
background-color:#7D0A0A;
width: 100%;
overflow-x: hidden;
position: fixed;
top:15vh;
z-index:3;   
}

.navbar a {
float: left;
height: 7vh;
display: block;
color: white;
text-align: center;
padding: 14px 16px;
text-decoration: none;
width: 25%; /* Four elements, so each takes 25% of the width */
box-sizing: border-box; /* Include padding in width calculation */
}

.navbar a:hover {
background-color: #ddd;
color: black;
}
            </style>
    </head>
    <body>
    <div class="navbar1">
  <!-- Logo -->
  <img src="jssate.png" style="max-width: 170px;" class="navbar-logo"></a>
  <h1 style="text-align:center;color:white">BORROW</h1>
  <!-- Menu Items -->
  <ul class="navbar-menu1">
    <li class="navbar-menu-item"><a href="index.html">HOME</a></li>
    <li class="navbar-menu-item"><a href="sitemap.html">SITEMAP</a></li>
    <li class="navbar-menu-item"><a href="logout.php">logout</a></li>
  </ul>
</div>
<div class="navbar">
<a href="asmanus.php">MANUSCRIPT</a>
<a href="ascollection.php">COLLECTIONS</a>
    <a href="asconservation.php">CONSERVATION</a>
    <a href="asborrow.php">BORROW</a>
  </div>
   
       <div class="registration-box">
        <h2>Enter Your Information</h2>
        <form method="POST">
            <label for="MANUSCRIPTID">MANUSCRIPT ID:</label><br>
            <input type="text" name='MANUSCRIPTID' id="MANUSCRIPTID" required/> <br><br>

            <label for="BORROWERID">BORROWER ID:</label><br>
            <input type="text" name='BORROWERID' id="BORROWERID" required/> <br><br>

           <label for="LOCATIONID">LOCATION ID:</label><br>
            <input type="text" name='LOCATIONID' id="LOCATIONID" required/> <br><br>

            <input type='submit' name='submit' id="submit" />
</form><br>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // Establish database connection
    $conn = mysqli_connect('localhost', 'root', '', 'ms');
    
    // Check for connection errors
    if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    // Sanitize user input
    $MANUSCRIPTID = mysqli_real_escape_string($conn, $_POST['MANUSCRIPTID']);
    $BORROWERID = mysqli_real_escape_string($conn, $_POST['BORROWERID']);
    $LOCATIONID = mysqli_real_escape_string($conn, $_POST['LOCATIONID']);
       
    // Construct SQL query
    $sql = "INSERT INTO transactions (MANUSCRIPTID,BORROWERID,LOCATIONID) VALUES ('$MANUSCRIPTID', '$BORROWERID', '$LOCATIONID')";
   
    // Execute query
    $query = mysqli_query($conn, $sql);
    echo'<script>';
   echo'alert("Data is successfully inserted!")';
   echo '</script>';
    // Check if query was successful
    // Close database connection
     mysqli_close($conn);
     }
            ?>
    </body>
</html>    
    
