<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

        <form method="POST" action="">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Submit">
        </form> 

        <?php
    // Initialize the session
    session_start();
    
    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: /login/home.php");
        exit;
    }
    
    // Include config file
    require_once "oci.php";
    
    // Define variables and initialize with empty values
    $username = $password = "";
    $username_err = $password_err = "";
    
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        // Check if username is empty
        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter username.";
        } else{
            $username = trim($_POST["username"]);
        }
        
        // Check if password is empty
        if(empty(trim($_POST["password"]))){
            $password_err = "Please enter your password.";
        } else{
            $password = trim($_POST["password"]);
        }
        
        // Validate credentials
        if(empty($username_err) && empty($password_err)){
            // Prepare a select statement
            $sql = "SELECT  user_name, password FROM users WHERE user_name = :username";
            
            // Set the bind variables
            $stmt = oci_parse($conn, $sql);
            oci_bind_by_name($stmt, ":username", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(oci_execute($stmt)){
                // Check if username exists, if yes then verify password
                if(oci_fetch($stmt)){
                    // $id = oci_result($stmt, "id");
                    $username = oci_result($stmt, "username");
                    $hashed_password = oci_result($stmt, "password");
                    if(password_verify($password, $hashed_password)){
                        // Password is correct, so start a new session
                        session_start();
                        
                        // Store data in session variables
                        $_SESSION["loggedin"] = true;
                        // $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username;                            
                        
                        // Redirect user to welcome page
                        header("location: login/home.php");
                    } else{
                        // Display an error message if password is not valid
                        $password_err = "The password you entered was not valid.";
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            
            // Close statement
            oci_free_statement($stmt);
        }
        
        // Close connection
        oci_close($conn);
    }
?>

</body>
</html>