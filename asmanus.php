<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manuscripts</title>
    <style>
        
        body {
            left: 30px;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5; /* Earthy shade */
            color: #330000; /* Maroon */
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

   .filters-section{
            width: 15%;
            padding: 20px;
            border: 2px solid maroon;
            border-radius: 5px;
            background-color: #F3DEC8;
        }
        .manuscripts-section {
            flex: 1; //Take remaining space 
            padding: 5vh;
            display: flex;
            margin-left:7vw;
            flex-wrap: wrap; // Allow manuscript boxes to wrap to next row 
            justify-content: space-between;
        }
        
        .manuscript-box {
            color: maroon;
            width: calc(40% - 10px); //Each box occupies one-third of the available space with some spacing 
            background-color: #fff;
            margin-top:3vh;
            margin-right:2vw;
            border: 2px solid maroon;
            border-radius: 5px;
            padding: 2vh;
            margin-bottom:2vh;
            max-width:45vh;
        }
        
         .larger-text {
    font-size: 3em; /* You can adjust the value to make the text larger */
  }
        /* Adjustments for Filters and Manuscript Display Sections */
.content-wrapper {
    display: flex;
    flex-direction: row; /* Display items in a row */
}



.filters-section {
    
    border: 1px solid maroon; /* Add a border to separate the sections */
    color: maroon;
    max-height: 35vh;
}

    </style>
</head>
<body>

<div class="navbar1">
  <!-- Logo -->
  <img src="jssate.png" style="max-width: 170px;" class="navbar-logo"></a>
  <h1 style="text-align:center;color:white">MANUSCRIPTS</h1>
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
    <!-- Heading and Introduction -->
    <br><br><br><br>
    <h3 style="padding:1vw;">Welcome to our Manuscripts section where you can explore ancient texts and documents of significant historical and cultural value.</h3>

    <!-- Left Section - Filters -->
    <div class="content-wrapper">
    <div class="filters-section">
        <h2>Filters</h2>
        <form method="POST">
            <label for="lang">Language:</label>
            <br>
            <select name="lang" id="lang">
                <option value="sanskrit">Sanskrit</option>
                <option value="vedic sanskrit">Vedic Sanskrit</option>
                <option value="tamil">Tamil</option>

            </select><br>
            <label for="mat">Material:</label>
            <br>
            <select name="mat" id="mat" >
                <option value="Birch bark manuscript">Birch Bark</option>
                <option value="Palm leaf manuscript">Palm Leaf</option>
    
            </select><br>
            <br>
            <button type="submit">Filter Data</button>
            <!--<button type="button" onclick="clearFilters()">Clear All</button>-->

        </form>
    </div>
    <script>
        function clearFilters() {
            // Logic to clear all filters
            
        }
    </script>
    <div class="manuscripts-section">
    <?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="ms";
    
    $conn=new mysqli($servername,$username,$password,$dbname);
    
    if($conn->connect_error)
    {
        die("connection failed:" .$conn->connect_error);
    }
    
   
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve selected options from form
    if (isset($_POST['mat'])){
    $mat = $_POST['mat'];
    $lang = $_POST['lang'];
    
$sql="SELECT * FROM manuscripts WHERE LANGUAGE='$lang' AND TYPE='$mat'";
$result=$conn->query($sql);
echo"<table border='1' style='border-collapse:collapse;'>";

if($result->num_rows>0){
    
    while($row=$result->fetch_assoc())  {
            echo '<div class="manuscript-box">';
            echo '<h4>' . $row["MANUSCRIPTID"] . '</h4>';
            echo '<h2>' . $row["TITLE"] . '</h2>';
            echo '<p>QUALITY INDEX:' . $row["QUALITYINDEX"] . '</p>';
            echo '<a href="'.$row["URL"].'"target="_blank">View Manuscript</a>';
            echo '</div>';
    }
}
else{
    echo"<tr><td colspan='2'> No data found</td></tr>";
}
echo"</table>";
}}
else{
  $sql="SELECT * FROM manuscripts";
  $result=$conn->query($sql);
  echo"<table border='1' style='border-collapse:collapse;'>";
  
  if($result->num_rows>0){
      
      while($row=$result->fetch_assoc())  {
              echo '<div class="manuscript-box">';
              echo '<h4>' . $row["MANUSCRIPTID"] . '</h4>';
              echo '<h2>' . $row["TITLE"] . '</h2>';
              echo '<p>QUALITY INDEX:' . $row["QUALITYINDEX"] . '</p>';
              echo '<a href="'.$row["URL"].'"target="_blank">View Manuscript</a>';
              echo '</div>';
      }
  }
  else{
      echo"<tr><td colspan='2'> No data found</td></tr>";
  }
  echo"</table>";
  //echo '<a href="newentry.html"target="_blank">Know any manuscript that doesnt exist here?</a>';
}
$conn->close();
?>
<br><p>
<a href="newentry.html"target="_blank">Know any manuscript that doesnt exist here?</a></p>
    </body>
</html>