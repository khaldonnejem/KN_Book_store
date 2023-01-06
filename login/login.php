<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
  <link rel="icon" type="image/png" sizes="32x32" href="../imgaes/icons8-book-30.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>login</title>
</head>

<body>
  <center><h1 class="mt-5">Online Book Store</h1></center>
  <div class="login-page">
    <div class="form">
      <form action="" class="login-form" method="POST">
        <input type="text" name="username" placeholder="username" required>
        <input type="password" name="password" pattern="\d*" placeholder="password" required>
        <input style="background-color: greenyellow;" type="submit" name="submit" value="login"></input>
      </form>
    </div>
  </div>

  <?php
  include("../oci.php");

  $username = @$_POST['username'];
  $password = @$_POST['password'];
  // Prepare a SQL statement to select the user's record
  $sql = 'SELECT * FROM users WHERE user_name = :username AND password = :password';

  // Bind the values for the placeholders
  $stmt = oci_parse($conn, $sql);
  oci_bind_by_name($stmt, ':username', $username);
  oci_bind_by_name($stmt, ':password', $password);

  oci_execute($stmt);

  // Fetch the user's record from the result set
  $user = oci_fetch_array($stmt, OCI_ASSOC + OCI_RETURN_NULLS);
  // Check if the user's record was found
  if (isset($_POST['submit'])) {
    if ($user) {
      // echo "accessed";
      header("Location:../navbar.php");
      exit();
    } else {
      echo "<div class='text-white' style = 'background-color:red;text-align:center;'><b>not accessed</b></div>";
    }
  }
  oci_free_statement($stmt);
  oci_close($conn);

  ?>
  <script>
    $('.message a').click(function() {
      $('form').animate({
        height: "toggle",
        opacity: "toggle"
      }, "slow");
    });
  </script>
</body>

</html>