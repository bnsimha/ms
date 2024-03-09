<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BORROW</title>
    <style>
        
        body {
            left: 30px;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5; /* Earthy shade */
            color: #330000; /* Maroon */
        }
        p,h2{
            margin-left:20px;
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
    position: sticky;
    top:13vh;
    z-index: 2;
   
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
    <li class="navbar-menu-item"><a href="#">SITEMAP</a></li>
    <li class="navbar-menu-item"><a href="login.html">SIGN IN</a></li>
  </ul>
</div>
<div class="navbar">
    <a href="manus.php">MANUSCRIPT</a>
    <a href="#">COLLECTIONS</a>
    <a href="conservation.php">CONSERVATION</a>
    <a href="borrow.php">BORROW</a>
  </div>
</body></html>  
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
   
    // Check if query was successful
    if ($query) {
        $sql="SELECT * FROM transactions";
        $result=$conn->query($sql);
        echo"<html><body><br><br><br><br>";
        echo"<table>";
        echo"<br><tr><th>BORROWER ID</th><th>MANUSCRIPT ID</th></tr>";
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                     echo"<tr><td>".$row["BORROWERID"]."</td><td>".$row["MANUSCRIPTID"]."</td><tr>";
                         }
                        }
        else{
              echo"<tr><td colspan='2'> No data found</td></tr>";
                }
                echo"</table>";
                echo"</body></html>";}
         else {
                echo 'Error detected: ' . mysqli_error($conn);
                }
    // Close database connection
     mysqli_close($conn);
     }
            ?>
