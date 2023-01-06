

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="32x32" href="../imgaes/icons8-book-30.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Number of books for each author</title>
</head>
<body style="background-color: #DDD2CE;">

<div class="container   mt-5 ">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Number of books for each author</h1>
      
            <button style="margin-right: 15px;" class="btn btn-danger"><a class="text-white" style="text-decoration: none;color:black;" href="../navbar.php">Go Back</a></button>
        </div>
        <hr class="hr mb-4">
  <div class="container overflow-x-auto p-3 mb-5"><!-- (overflow)this for side scroll -->
    <table class="table table-bordered bg-secondary border-dark mb-5">
        <thead class="table-dark">
        <tr>
              <th>Author Name</th>
              <th>Book Numbers</th>
            </tr>
        </thead>
              <?php  
              


include("../oci.php");


  // Call the stored procedure
  $stmt = oci_parse($conn, 'BEGIN num_books1(:cur); END;');

  $cursor_books = oci_new_cursor($conn);
  oci_bind_by_name($stmt, ':cur', $cursor_books, -1, OCI_B_CURSOR);
  oci_execute($stmt);

  // Execute the sys_refcursor
  oci_execute($cursor_books);


        // Fetch the rows from the sys_refcursor
            while ($row = oci_fetch_array($cursor_books, OCI_ASSOC+OCI_RETURN_NULLS)) {
                // Process the row
                echo '<tr>';
                echo '<td>' . $row['AUTHOR_NAME'] . '</td>';
                echo '<td>' . $row['NUM_BOOKS1'] . '</td>';
                echo '</tr>';
            }

  oci_close($conn);
            
            ?>
              
          
           
    </table>
  </div>
 
</body>
</html>





