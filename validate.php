<?php
 
include_once('connection.php');
  
function test_input($data) {
     
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);
    $stmt = $conn->prepare("SELECT * FROM adminlogin");
    $stmt->execute();
    $users = $stmt->fetchAll();
     
    foreach($users as $user) {
         
        if(($user['username'] == $username) && 
            ($user['password'] == $password)) {
                if($user["usertype"]=='u'){
                    $_SESSION["username"] = $username;
                header("location: aftsignin.php");
                exit();
                }
                else{
                    $_SESSION["username"] = $username;
                    header("location: asborrow.php");
                }
        }
        else {
           continue;            
        }
    }
    echo "<script language='javascript'>";
            echo "alert('WRONG INFORMATION')";
            echo "</script>";
            die();
}
 
?>