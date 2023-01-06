
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="32x32" href="../imgaes/user.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>All Users</title>
</head>
<body style="background-color: #DDD2CE;">
<i class="fa-solid fa-user"></i>
<div class="container  mt-5 ">
<div class="d-flex justify-content-between align-items-center">
        <h1>All Users</h1>
        <button style="margin-right: 15px;" class="btn btn-danger"><a class="text-white" style="text-decoration: none;color:black;" href="../navbar.php">Go Back</a></button>
    </div>
    <hr>
    <table class="table bg-secondary text-dark table-bordered border-dark mb-5">
        <thead class="table-dark">
        <tr>
              <th>Name</th>
              <th>Password</th>
              
            </tr>
        </thead>
        <?php

        include("../oci.php");

$stid = oci_parse($conn, 'SELECT user_name FROM users');
oci_execute($stid);


while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo '<tr>';
    echo '<td>'.$row["USER_NAME"].'</td>';
    echo  '<td>'."&bull;&bull;&bull;&bull;&bull;&bull;".'</td>';
    echo '</tr>';
}



oci_close($conn);


?>

          
           
    </table>
  </div>
    
        
<div class="container  mt-5 ">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Delete User</h1>
    </div>
    <hr>
        <div class="container mt-5">
        
        <center>
        <form method="POST" action="" >
                <table class="table table-bordered" style="background-color:rgb(50,100,150); width:450px ;">
                    <tr>
                        <td> <label class="text-white">User Name</label></td>
                        <td><input type="text" name="user_name" value="<?php echo @$_POST['user_name']?>" required></td>
                    </tr>
       
                    <tr>
                        <td style="text-align: center;" colspan="2"><input class="btn btn-dark" type="submit" name="submit" value="Delete"></td>
                    </tr>


                </table>
        </form>
        </center>
    </div>
    <?php

    
    // Prepare PL/SQL statement
    $sql = 'Delete from users where user_name = :username';
    $stid = oci_parse($conn, $sql);
 

    // set variables
    $user_name =  @$_POST['user_name'];
   
    
    // Bind variables to placeholders
    oci_bind_by_name($stid, ':username', $user_name);
    
    if (isset($_POST['submit'])) {
    
    
        // Execute PL/SQL statement
        $result = oci_execute($stid);

        if ($result) {
            echo " record deleted successfully";
            // header("Location:dis_book.php");
            header("Refresh:0");

        
        } else {
            echo "Error: " . $sql . "<br>" . oci_error($conn);
        }
}

    oci_free_statement($stid);
    oci_close($conn);

    ?>



<div class="container  mt-5 ">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Register User</h1>
    </div>
    <hr>
        <div class="container mt-5">
        
        <center>
        <form method="POST" action="" >
                <table class="table table-bordered " style="background-color:rgb(50,100,150); width:450px ;">
                    <tr>
                        <td> <label class="text-white">User Name</label></td>
                        <td><input type="text" name="user_name" value="<?php echo @$_POST['user_name']?>" required></td>
                    </tr>
                    <tr>
                    <td> <label class="text-white">Password</label></td>
                        <td><input type="text" name="password" value="<?php echo @$_POST['password']?>" required></td>
                    </tr>
       
                    <tr>
                        <td style="text-align: center;" colspan="2"><input class="btn btn-dark" type="submit" name="submit" value="Register"></td>
                    </tr>


                </table>
        </form>
        </center>
    </div>

<?php
include("../oci.php");
// INTO author (author_name, author_id) VALUES ('A. Bartlett Giamatti', 1)
   // Prepare PL/SQL statement
   $sql = 'INSERT into users (user_name,password) VALUES (:username , :password)';
   $stid = oci_parse($conn, $sql);


   // set variables
   $user_name =  @$_POST['user_name'];
   $password =  @$_POST['password'];
  
   
   // Bind variables to placeholders
   oci_bind_by_name($stid, ':username', $user_name);
   oci_bind_by_name($stid, ':password', $password);
   
   if (isset($_POST['submit'])) {
   
   
       // Execute PL/SQL statement
       $result = oci_execute($stid);

       if ($result) {
        echo "New user created successfully";
           // header("Location:dis_book.php");
           header("Refresh:0");

       
       } else {
           echo "Error: " . $sql . "<br>" . oci_error($conn);
       }
}

   oci_free_statement($stid);
   oci_close($conn);

   ?>


    
</body>
</html>









