<?php
include("oci.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="imgaes/icons8-book-30.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css
    .css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <style>
  /* #bg-image {
    background-image: url('imgaes/6834343.jpg');
    background-size: 550px;
    background-position: right;
    
  } */
  /* .container-fluid {
    background-color: rgba(255, 255, 255, 0.7);
  } */
  #nn { /* this nn is for fixed navbar*/ 
  position: fixed;
  /* top: 0;
  left: 0;
  right: 0; */
  /* z-index: 1; */
    }
    /* .nav {
  position: sticky;
  top: 0;
  z-index: 1;
} */
#imgdrop {
    height: 20px;
}

</style>
    <title>Dashboard</title>
</head>
<body style="background-color: #DDD2CE;" >

    <div class="container-fluid" >
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div id="nn" class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="navbar.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto   text-white text-decoration-none">
                        <b class="fs-5 d-none d-sm-inline mt-3">Online Book Store   <i class="fa-solid fa-house"></i>

                        </b>
                    </a>
                 
                    <!-- <hr class="hr"> -->
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        
                        <li>
                            <a href="#submenu1" data-bs-toggle="collapse navbar-collapse" class="nav-link   text-warning  px-0 align-middle">
                                <i class="fs-4 bi-speedometer2"></i> <b class= "btn btn-info" class="ms-1 d-none d-sm-inline">Display <img id="imgdrop" src="imgaes/dropdwon2.png" alt=""></b> 
                               
                            </a>
                              
                            <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="#booid" class="nav-link px-0"> <span class="d-none text-white d-sm-inline">Books
                                    <i class="fa-solid fa-book"></i>
                                    </span></a>
                                </li>
                                <li>
                                    <a href="#autid" class="nav-link px-0"> <span class="d-none text-white d-sm-inline">Authors
                                    <i class="fa-solid fa-user-pen"></i>
                                    </span></a>
                                </li>
                                <li>
                                    <a href="#cusid" class="nav-link px-0"> <span class="d-none text-white d-sm-inline">Customers
                                    <i class="fa-solid fa-users"></i>
                                    </span> </a>
                                </li>
                            </ul>
                        </li>
                      
                        
                      
                    </ul>
                    <!-- <div class="dropdown pb-4">
                        <a href="#submenu1" class="d-flex align-items-center text-white text-decoration-none" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fs-4 bi-speedometer2"></i> <b class= "btn btn-info" class="ms-1 d-none d-sm-inline">Display <img id="imgdrop" src="imgaes/dropdwon2.png" alt=""></b> 
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li class="dropdown-item">
                                    <a href="#booid" class="nav-link px-0"> <span class="d-none d-sm-inline">Books</span></a>
                            </li>
                            <li>
                                <a href="#autid" class="dropdown-item"> <span class="d-none d-sm-inline">Authors</span></a>
                            </li>
                            <li>
                                    <a href="#cusid" class="dropdown-item"> <span class="d-none d-sm-inline">Customers</span> </a>
                            </li>
                    </div> -->
                    <hr>
                    <div class="dropdown pb-4  ">
                        <a href="#submenu1" class="d-flex align-items-center text-white text-decoration-none" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fs-4 bi-speedometer2"></i> <b class= "btn btn-info" class="ms-1 d-none d-sm-inline">Register <img id="imgdrop" src="imgaes/dropdwon2.png" alt=""></b> 
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li class="dropdown-item">
                                    <a href="register/regBook.php" class="nav-link px-0"> <span class="d-none d-sm-inline">New Book
                                    <i class="fa-solid fa-book-medical"></i>
                                    </span></a>
                            </li>
                            <li>
                                <a href="register/regAuthor.php" class="dropdown-item"> <span class="d-none d-sm-inline">New Author
                                <i class="fa-solid fa-user-plus"></i>
                                </span></a>
                            </li>
                            <li>
                                    <a href="register/regCus.php" class="dropdown-item"> <span class="d-none d-sm-inline">New Customer
                                    <i class="fa-solid fa-person-circle-plus"></i>
                                    </span> </a>
                            </li>
                    </div>
                    <hr>
                    <div class="dropdown pb-4">
                        <a href="#submenu1" class="d-flex align-items-center text-white text-decoration-none" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fs-4 bi-speedometer2"></i> <b class= "btn btn-info" class="ms-1 d-none d-sm-inline">Update<img id="imgdrop" src="imgaes/dropdwon2.png" alt=""></b> 
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li class="dropdown-item">
                                    <a href="update/updbook.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Books
                                    <i class="fa-solid fa-pen"></i>
                                    </span></a>
                            </li>
                            <li>
                                <a href="update/updauthor.php" class="dropdown-item"> <span class="d-none d-sm-inline">Authors
                                <i class="fa-solid fa-pen"></i>
                                </span></a>
                            </li>
                            <li>
                                    <a href="update/updcustomer.php" class="dropdown-item"> <span class="d-none d-sm-inline">Customers
                                    <i class="fa-solid fa-pen"></i>
                                    </span> </a>
                            </li>
                    </div>
                    <hr>
                    <div class="dropdown pb-4 ">
                        <a href="#submenu1" class="d-flex align-items-center text-white text-decoration-none" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fs-4 bi-speedometer2"></i> <b class= "btn btn-info" class="ms-1 d-none d-sm-inline">Delete <img id="imgdrop" src="imgaes/dropdwon2.png" alt=""></b> 
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li class="dropdown-item">
                                    <a href="delete/delBook.php" class="nav-link px-0"> <span class="d-none d-sm-inline">Books
                                    <i class="fa-solid fa-trash-can"></i>
                                    </span></a>
                            </li>
                            <li>
                                <a href="delete/delAuthor.php" class="dropdown-item"> <span class="d-none d-sm-inline">Authors
                                <i class="fa-solid fa-trash-can"></i>
                                </span></a>
                            </li>
                            <li>
                                    <a href="delete/delCustomer.php" class="dropdown-item"> <span class="d-none d-sm-inline">Customers
                                    <i class="fa-solid fa-trash-can"></i>
                                    </span> </a>
                            </li>
                    </div>
                    <hr>
                    <div class="dropdown pb-4  mb-sm-auto mb-0">
                        <a href="#submenu1" class="d-flex align-items-center text-white text-decoration-none" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fs-4 bi-speedometer2"></i> <b class= "btn btn-danger" class="ms-1 d-none d-sm-inline">Others <img id="imgdrop" src="imgaes/dropdwon2.png" alt=""></b> 
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark ">
                            <li class="dropdown-item">
                                    <a href="other/dis_Tbook_Nauthor.php" class="nav-link "> <span class="d-none d-sm-inline">Title Book & Author Name</span></a>
                            </li>
                            <li>
                                <a href="other/dis_Ncustomer_addressStatus.php" class="dropdown-item"> <span class="d-none d-sm-inline">Customer Name & Address Status</span></a>
                            </li>
                            <li>
                                    <a href="other/num_books.php" class="dropdown-item"> <span class="d-none d-sm-inline">Number Of Books</span> </a>
                            </li>
                    </div>
                    <hr>










                    <!-- <div class="dropdown">
  <button class="btn btn-info dropdown-toggle " id="dropdownUser1" type="button"  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown button
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div> -->



                    <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none " id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <!-- <img src="https://avatars.githubusercontent.com/u/91114015?s=400&u=31afc715f07bbd6e499e518d1f5b2a2e82699ad2&v=4" alt="hugenerd" width="30" height="30" class="rounded-circle"> -->
                            <i class="fa-solid fa-bars"></i>
                            <span class="d-none d-sm-inline mx-1">Settings</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="users/user.php">Users
                            <i class="fa-solid fa-users-gear"></i>
                            </a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="login/signout.php">Signout
                            <i class="fa-solid fa-right-from-bracket"></i>
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>





            
            <div  class="col py-3">
              <center id="booid"><h1>All Books Information</h1>
            
            </center>


              
                <hr>
                <?php include("display/dis_book.php");?>

                <center id="autid"><h1>All Author Information</h1></center>
                <hr>
                <?php include("display/dis_author.php");?>

                <center id="cusid"><h1>All Customers Information</h1></center>
                <hr>
                <?php include("display/dis_customer.php");?>
            </div>

        </div>
</div>





<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->


<!--  include Popper  -->

<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script> -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js
"></script>

<script>
    // $('.collapse').collapse('hide');

</script>



</body>
</html>