<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="../imgaes/icons8-book-30.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Register New Book</title>
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
            <h1>Register Book</h1>
      
            <button style="margin-right: 15px;" class="btn btn-danger"><a class="text-white" style="text-decoration: none;color:black;" href="../navbar.php">Go Back</a></button>
        </div>
        <hr class="hr mb-4">
        <div class="container mt-5">
        <form method="POST">
                <table class="table table-bordered" style="background-color:rgb(50,100,150); width:450px ;">
                    <tr>
                        <td> <label class="text-white">Book Id</label></td>
                        <td><input type="text" name="book_id" value="<?php echo @$_POST['book_id']?>" required></td>
                    </tr>
                    <tr>
                        <td><label class="text-white">Title</label></td>
                        <td><input type="text" name="title"  value="<?php echo @$_POST['title']?>" required></td>
                    </tr>
                    <tr>
                        <td><label class="text-white">Isbn13</label></td>
                        <td><input type="text" name="isbn13"  value="<?php echo @$_POST['isbn13']?>" required></td>
                    </tr>

                    <tr>
                        <td><label class="text-white">language ID</label></td>
                        <td><input type="text" name="language_id"  value="<?php echo @$_POST['language_id']?>" required></td>
                    </tr>

                    <tr>
                        <td> <label class="text-white">Num Pages</label></td>
                        <td> <input type="text" name="num_pages"  value="<?php echo @$_POST['num_pages']?>" required></td>
                    </tr>

                    <tr>
                        <td><label class="text-white">Publication Date</label></td>
                        <td><input type="text" name="publication_date"  value="<?php echo @$_POST['publication_date']?>" required></td>
                    </tr>


                    <tr>
                        <td><label class="text-white">Publihser ID</label></td>
                        <td><input type="text" name="publisher_id"  value="<?php echo @$_POST['publisher_id']?>" required></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;" colspan="2"><input class="btn btn-dark" type="submit" name="submit" value="Register"></td>
                    </tr>


                </table>
        </form>

    </div>
    <?php
    include("../oci.php");

    // Prepare PL/SQL statement
    $sql = 'BEGIN register_book(:book_id, :title, :isbn13 , :language_id , :num_pages, :publication_date , :publisher_id); END;';
    $stid = oci_parse($conn, $sql);

     // Set values for variables
    
    $input_string0 =  @$_POST['book_id'];
    $truncated_string0 = substr($input_string0, 0, 50);
    
    $input_string = @$_POST['title'];
    $truncated_string = substr($input_string, 0, 50);

    $input_string2 = @$_POST['isbn13'];
    $truncated_string2 = intval(substr($input_string2, 0, 50));
    
    $input_string3 = @$_POST['num_pages'];
    $truncated_string3 = intval(substr($input_string3, 0, 50));

    $language_id = @$_POST['language_id'];

    $publication_date = @$_POST['publication_date'];
    // $truncated_string4 = date('d/m/y', $input_string4);
    // $publication_date = @$_POST['publication_date']; 

    // $timestamp = strtotime('17/06/85');
    // $formattedDate = date('d/m/y', $timestamp);
    // echo $formattedDate; // outputs "17/06/85"

    $publisher_id = @$_POST['publisher_id'];
        

    // Bind variables to placeholders
    oci_bind_by_name($stid, ':book_id', $truncated_string0);
    oci_bind_by_name($stid, ':title', $truncated_string);
    oci_bind_by_name($stid, ':isbn13', $truncated_string2);
    oci_bind_by_name($stid, ':language_id', $language_id);
    oci_bind_by_name($stid, ':num_pages', $truncated_string3);
    oci_bind_by_name($stid, ':publication_date', $publication_date);
    oci_bind_by_name($stid, ':publisher_id', $publisher_id);
    
    
    if (isset($_POST['submit'])) {
    

    // Execute PL/SQL statement
    $result = oci_execute($stid);
    if ($result) {
        echo "<div class='text-white' style ='background-color:#326496;text-align:center;font-size:25px;'><b>New Book created successfully</b></div>";
    } else {
        echo " <b class = 'bg-danger'>Error: " . $sql . "</b>" . oci_error($conn);
    }
}

    oci_free_statement($stid);
    oci_close($conn);

    ?>

</body>

</html>