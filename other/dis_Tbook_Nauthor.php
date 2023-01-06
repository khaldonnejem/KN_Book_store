<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="../imgaes/icons8-book-30.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Display Title & Author Name</title>
    <style>
        .result {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 30px;
  }
    </style>
</head>

<body style="background-color: #DDD2CE;">

    <div class="container border border-dark  mt-5 ">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Title of book & Author name </h1>
      
            <button style="margin-right: 15px;" class="btn btn-danger"><a class="text-white" style="text-decoration: none;color:black;" href="../navbar.php">Go Back</a></button>
        </div>
        <hr class="hr mb-4">
        <form method="POST">
                <table class="table table-secondary table-bordered border-dark mb-5" style=" width:450px ;">
                    <tr>
                        <td> <label>Book Id</label></td>
                        <td><input type="text" name="book_id" value="<?php echo @$_POST['book_id'] ?>"></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;" colspan="2"><input class="btn btn-dark" type="submit" name="submit" value="Submit"></td>
                    </tr>
                </table>
        </form>
        </div>


        <div class="container">
<?php



include("../oci.php");
// Define the PL/SQL function to be executed
$query = 'BEGIN :result := get_book_info(:book_id); END;';

// Parse the statement
$stmt = oci_parse($conn, $query);

$input_string0 =  @$_POST['book_id'];
$truncated_string0 = substr($input_string0, 0, 10);

// Bind the input and output parameters
$result = null;
oci_bind_by_name($stmt, ':book_id', $truncated_string0);
oci_bind_by_name($stmt, ':result', $result, 32);

if (isset($_POST['submit'])) {
    // Execute the statement
    oci_execute($stmt);
    if ($_POST['book_id']) {
    
        // Use the result of the function
        echo "<div class = 'result bg-secondary text-white'>
                $result
            </div>";
    } else {
        echo "invalid id book";
    }
}
// Close the connection
oci_close($conn);

?>
</div>
</body>

</html>

