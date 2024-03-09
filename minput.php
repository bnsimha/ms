<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//Prepare and bind parameters
$stmt = $conn->prepare("INSERT INTO manuscripts (MANUSCRIPTID, TITLE, AUTHORID,DATE, LANGUAGE, URL, TYPE, DATEOFACQUISITION, QUALITYINDEX) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssss", $MANUSCRIPTID, $TITLE, $AUTHORID, $DATE, $LANGUAGE, $URL, $TYPE, $DATEOFACQUISITION, $QUALITYINDEX);

//Set parameters and execute
$MANUSCRIPTID= $_POST['MANUSCRIPTID'];
$TITLE = $_POST['TITLE'];
$AUTHORID = mysqli_real_escape_string($conn,$_POST['AUTHORID']);
$DATE = $_POST['DATE'];
$LANGUAGE = $_POST['LANGUAGE'];
$URL = $_POST['URL'];
$TYPE = $_POST['TYPE'];
$DATEOFACQUISITION = $_POST['DATEOFACQUISITION'];
$QUALITYINDEX = $_POST['QUALITYINDEX'];

if ($stmt->execute()) {
  echo "<script language='javascript'>";
  echo "alert('DATA INSERTED SUCCESSFULLY!')";
  echo "</script>";
    header("location: asmanus.php");
} else {
    echo "Error: " . mysqli_error($conn). "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>