<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="../imgaes/icons8-book-30.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Update Author</title>
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
            <h1>Update Author</h1>
      
            <button style="margin-right: 15px;" class="btn btn-danger"><a class="text-white" style="text-decoration: none;color:black;" href="../navbar.php">Go Back</a></button>
        </div>
        <hr class="hr mb-4">
        <div class="container mt-5">
        <form method="POST">
                <table class="table table-bordered" style="background-color:rgb(50,100,150); width:450px ;">
                    <tr>
                        <td> <label class="text-white">Author Id</label></td>
                        <td><input type="text" name="author_id" value="<?php echo @$_POST['author_id']?>"></td>
                    </tr>
                    <tr>
                        <td><label class="text-white">Author Name</label></td>
                        <td><input type="text" name="author_name"  value="<?php echo @$_POST['author_name']?>"></td>
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
    $sql = 'BEGIN update_author(:author_id, :author_name); END;';
    $stid = oci_parse($conn, $sql);
    
    // Set values for variables

    $input_string0 =  @$_POST['author_id'];
    $truncated_string0 = substr($input_string0, 0, 50);
    
    $input_string = @$_POST['author_name'];
    $truncated_string = substr($input_string, 0, 50);
    
    
     
    // Bind variables to placeholders
    oci_bind_by_name($stid, ':author_id', $truncated_string0);
    oci_bind_by_name($stid, ':author_name', $truncated_string);
    
    if (isset($_POST['submit'])) {
    
    // Execute PL/SQL statement
    $result = oci_execute($stid);

    if ($result) {
        echo "<div class='text-white' style ='background-color:#326496;text-align:center;font-size:25px;'><b>Author updated successfully</b></div>";
    } else {
        echo "Error: " . $sql . "<br>" . oci_error($conn);
    }
}

    oci_free_statement($stid);
    oci_close($conn);

    ?>

</body>

</html>













