<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONSERVATION</title>
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
  <h1 style="text-align:center;color:white">CONSERVATION</h1>
  <!-- Menu Items -->
  <ul class="navbar-menu1">
    <li class="navbar-menu-item"><a href="index.html">HOME</a></li>
    <li class="navbar-menu-item"><a href="sitemap.html">SITEMAP</a></li>
    <li class="navbar-menu-item"><a href="login.html">SIGN UP</a></li>
  </ul>
</div>
<div class="navbar">
    <a href="manus.php">MANUSCRIPT</a>
    <a href="#">COLLECTIONS</a>
    <a href="conservation.php">CONSERVATION</a>
    <a href="borrow.php">BORROW</a>
  </div>
    <!-- Heading and Introduction -->
    <br><br><br><br><br><br>
    <p>Manuscripts are susceptible to deterioration by physical factors, biological factors, chemical
factors and human factors.<br><ol>
<li>Physical factor: Light, moisture, water, heat, fire and particulates. These are also called
environmental agents.</li>
<li>Biological factor: Fungus, Insect and Rodents</li>
<li>Chemical factors: Dust, Pollution, Acidy, oxidation etc.</li>
<li>Human factor: Innocence and negligence, Mishandling, Improper cleaning, improper storage,
writing with ink.</li></ol>
<h2>Preservation or Preventive Conservation</h2>
<p>Preventive conservation is process in which we take all the measures to prevent the happening
of damages. Creating and environment which is conductive to longevity of the
documents/manuscripts and which makes the life the deteriorating factors impossible can do this.
Preservation makes and attempts to maintain the object in a sound physical and chemical condition. It
is therefore and unending process.<br><br>

In order to prevent manuscripts from deterioration, preventive measures are taken to create
and environment in which the deteriorating agents cannot act on the manuscripts. This includes
protection of manuscripts from atmospheric pollutants from light, from insects, from temperature and
relative humidity and proper storage and good housekeeping.

Preventive Conservation = Cleaning (General & Solvents), Guarding, Proper thread for
Binding , Covering with cloth, Boxing, Oiling
</p>
    <!-- Left Section - Filters -->
    <div class="content-wrapper">
    <div class="filters-section">
        <h2>Filters</h2>
        <form method="POST">
            <label for="ea">Expertise Area:</label>
            <br>
            <select name="ea" id="ea">
                <option value="Ithihasa">Ithihasa</option>
                <option value="Sahitya">Sahitya</option>
                <option value="Art">Art</option>
                <option value="Tantra">Tantra</option>
                <option value="Jyothisha">Jyothisha</option>
                <option value="Vedanta">Vedanta</option>
                <option value="Puranas">Puranas</option>
                <option value="Wood Scripts">Wood Scripts</option>
                
            </select><br><br>
            <button type="submit">Filter Data</button>
           <!-- <button type="button" onclick="clearFilters()">Clear All</button>-->
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

    if (isset($_POST['ea'])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve selected options from form
    $ea = $_POST['ea'];
$sql="SELECT * FROM conservationists WHERE EXPERTISEAREA='$ea'";
$result=$conn->query($sql);
echo"<table border='1' style='border-collapse:collapse;'>";

if($result->num_rows>0){
    
    while($row=$result->fetch_assoc())  {
            echo '<div class="manuscript-box">';
            echo '<h4>' . $row["CONSERVATIONISTID"] . '</h4>';
            echo '<h2>' . $row["CONSERVATIONISTNAME"] . '</h2>';
            echo '<p>EMAIL ID:' . $row["EMAILID"] . '</p>';
            echo '</div><br><br>';
    }
}
else{
    echo"<tr><td colspan='2'> No data found</td></tr>";
}
echo"</table>";
}}
else{

  $sql="SELECT * FROM conservationists";
  $result=$conn->query($sql);
  echo"<table border='1' style='border-collapse:collapse;'>";
  
  if($result->num_rows>0){
      
      while($row=$result->fetch_assoc())  {
              echo '<div class="manuscript-box">';
              echo '<h4>' . $row["CONSERVATIONISTID"] . '</h4>';
              echo '<h2>' . $row["CONSERVATIONISTNAME"] . '</h2>';
              echo '<p>EMAIL ID:' . $row["EMAILID"] . '</p>';
              echo '</div><br><br>';
      }
  }
  else{
      echo"<tr><td colspan='2'> No data found</td></tr>";
  }
  echo"</table>";
}
$conn->close();
?>
    </body>
</html>