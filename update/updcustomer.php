<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="../imgaes/icons8-book-30.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Update Customer</title>
    <style>
        input {
            width: 290px;
        }

        label {
            font-weight: bold;
        }
    </style>
</head>

<body style="background-color: #DDD2CE;">
    
        
    <div class="container   mt-5 ">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Update Customer</h1>
      
            <button style="margin-right: 15px;" class="btn btn-danger"><a class="text-white" style="text-decoration: none;color:black;" href="../navbar.php">Go Back</a></button>
        </div>
        <hr class="hr mb-4">
        <div class="container mt-5">
        <form method="POST">
                <table class="table table-bordered" style="background-color:rgb(50,100,150); width:450px ;">
                    <tr>
                        <td> <label class="text-white">Customer Id</label></td>
                        <td><input type="text" name="customer_id" value="<?php echo @$_POST['customer_id']?>"></td>
                    </tr>
                    <tr>
                        <td><label class="text-white">First Name</label></td>
                        <td><input type="text" name="first_name"  value="<?php echo @$_POST['first_name']?>"></td>
                    </tr>
                    <tr>
                        <td><label class="text-white">Last Name</label></td>
                        <td><input type="text" name="last_name"  value="<?php echo @$_POST['last_name']?>"></td>
                    </tr>

                    <tr>
                        <td><label class="text-white">Email</label></td>
                        <td><input type="email" name="email"  value="<?php echo @$_POST['email']?>"></td>
                    </tr>

                    <tr>
                        <td style="text-align: center;" colspan="2"><input class="btn btn-dark" type="submit" name="submit" value="Update"></td>
                    </tr>


                </table>
        </form>

    </div>
    <?php
    include("../oci.php");

    
    // Prepare PL/SQL statement
    $sql = 'BEGIN update_customer(:customer_id, :first_name, :last_name , :email,:result); END;';
    $stid = oci_parse($conn, $sql);
    
    // Set values for variables

    $input_string0 =  @$_POST['customer_id'];
    $truncated_string0 = substr($input_string0, 0, 50);
    
    $input_string = @$_POST['first_name'];
    $truncated_string = substr($input_string, 0, 50);

    $input_string2 = @$_POST['last_name'];
    $truncated_string2 = substr($input_string2, 0, 50);
    
    $input_string3 = @$_POST['email'];
    $truncated_string3 = substr($input_string3, 0, 50);
    
    
    
    
    // Bind variables to placeholders
    oci_bind_by_name($stid, ':customer_id', $truncated_string0);
    oci_bind_by_name($stid, ':first_name', $truncated_string);
    oci_bind_by_name($stid, ':last_name', $truncated_string2);
    oci_bind_by_name($stid, ':email', $truncated_string3);
    oci_bind_by_name($stid, ":result", $result, 10);
    
    
    // Execute PL/SQL statement
    $result = oci_execute($stid);
    if (isset($_POST['submit'])) {

    // if ($result) {
    //     echo "<div class='text-white' style ='background-color:#326496;text-align:center;font-size:25px;'><b>Customer updated successfully</b></div>";
    // } else {
    //     echo "Error: " . $sql . "<br>" . oci_error($conn);
    // }
    if ($result) {
        if ($result > 0) {
            echo "Customer updated successfully";
        } else {
            echo "Error: Customer with ID $truncated_string0 does not exist";
        }
    } else {
        $error = oci_error($stid);
        echo "Error: " . $error['message'];
    }
}

    oci_free_statement($stid);
    oci_close($conn);

    ?>

</body>

</html>













