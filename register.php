<?php
session_start();

// Check if the user is already logged in, redirect to dashboard if logged in
if (isset($_SESSION["user_id"])) {
    header("Location: user_dashboard.php");
    exit();
}

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting into database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
        // Include database configuration
        require_once "config.php";

        // Prepare an insert statement
        $sql = "INSERT INTO adminlogin (username, password) VALUES (?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            // Set parameters
            $param_username = $username;
            $param_password = $password; // Creates a password hash

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                echo "<script>alert('User registered successfully');
                document.location='login.html'</script>";

               // alert("User registered successfully");
                //header("location: login.html");
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

        // Close connection
        mysqli_close($link);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        .container {
            max-width: 17vw;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: flex;
        }
        .form-group {
            margin-bottom: 2vh;
            align-items: center;
            font-size: 20px;
            padding: 8px 0;
            margin: 8px 0;
            
        }
        .form-group input {
           width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
           
            
        }
        .form-group span {
            color: red;
        }
    </style>
</head>
<body>
<center><h1>Register</h1><br></center>
    <div class="container">
       
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label><br>
                <input type="text" name="username" value="<?php echo $username; ?>">
                <span><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label><br>
                <input type="password" name="password" value="<?php echo $password; ?>">
                <span><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label><br>
                <input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>">
                <span><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" value="Register" style="background-color:green;color:white">
            </div>
            <p>Already have an account? <a href="login.html">Login here</a><br>
            <a href="index.html">continue without logging in</a>
        </form>
    </div>    
</body>
</html>
