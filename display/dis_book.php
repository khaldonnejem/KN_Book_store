

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Display books Information</title>
</head>
<body>

<div class="container   mt-5 ">
        <!-- <div class="d-flex justify-content-between align-items-center">
            <h1>All Books Information</h1>
      
            <button style="margin-right: 15px;" class="btn btn-danger"><a class="text-white" style="text-decoration: none;color:black;" href="../login/home.php">Go Back</a></button>
        </div>
        <hr class="hr mb-4"> -->
  <div class="container overflow-x-auto p-3 mb-5"><!-- (overflow)this for side scroll -->
    <table class="table bg-secondary text-white  table-bordered border-dark mb-5">
        <thead class="table-dark">
        <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Isbn13</th>
              <th>Language ID</th>
              <th>Num Pages</th>
              <th>Publication Date</th>
              <th>Publihser ID</th>
            </tr>
        </thead>
              <?php  
              


// include("../oci.php");


  // Parse the SQL statement
  $stmt = oci_parse($conn, 'BEGIN dis_book1(:cursor_books); END;');

  // Bind the sys_refcursor as an OUT parameter
  $cursor_books = oci_new_cursor($conn);
  oci_bind_by_name($stmt, ':cursor_books', $cursor_books, -1, OCI_B_CURSOR);

  // Execute the statement
  oci_execute($stmt);

  // Execute the sys_refcursor
  oci_execute($cursor_books);

  // Fetch the rows from the sys_refcursor




              while (($row = oci_fetch_array($cursor_books, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                echo '<tr>';
              echo '<td class="bg-danger opacity-70 text-dark">'  . $row['BOOK_ID'] . '</td>';
              echo '<td>' . $row['TITLE'] . '</td>';
              echo '<td>' . $row['ISBN13'] . '</td>';
              echo '<td>' . $row['LANGUAGE_ID'] . '</td>';
              echo '<td>' . $row['NUM_PAGES'] . '</td>';
              echo '<td>' . $row['PUBLICATION_DATE'] . '</td>';
              echo '<td>' . $row['PUBLISHER_ID'] . '</td>';
                echo '</tr>';
            }
              // Free the cursor
  oci_free_statement($cursor_books);

  // Close the connection
  oci_close($conn);
            
            ?>
              
          
           
    </table>
  </div>
 
</body>
</html>


