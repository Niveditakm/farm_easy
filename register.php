<?php
session_start();

require "config/database.php";

if(isset($_SESSION["user"])) 
{
    echo "<script> location.replace('cart.php') </script>";
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <title>User Register</title>

    <style>
        .bg-image {
            background: url("images/bg.jpg");
            /* background-blend-mode: screen; */
            background-size: cover;
            /* background-color: darkgray; */
        }
    </style>

</head>

<body>
    <div class="min-vh-100 d-flex flex-column bg-image">
        <nav class="navbar navbar-light bg-success shadow-sm mb-2">
            <div class="container-fluid">
                <span class="lead text-light fw-bold">FARM</span>
                <a class="ms-auto btn btn-outline-light border border-success" type="button" data-bs-toggle="offcanvas" data-bs-target="#menu" aria-controls="menu">
                    <span class="navbar-toggler-icon"></span>
                </a>
            </div>
            <div class="offcanvas offcanvas-end shadow-sm" data-bs-scroll="true" tabindex="-1" id="menu" aria-labelledby="menuLabel">
                <div class="offcanvas-header bg-success">
                    <h5 class="offcanvas-title lead fw-bold ms-auto text-light" id="menuLabel">MENU</h5>
                    <button type="button" class="btn-close border border-success text-reset btn-outline-light" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav text-center lead fw-bold">
                        <li class="nav-item">
                            <a class="nav-link w-75 mx-auto" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link w-75 mx-auto" aria-current="page" href="farmer/index.php">Farmer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link w-75 mx-auto" aria-current="page" href="admin/index.php">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link w-75 mx-auto" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active bg-success text-light w-75 mx-auto" href="index.php">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
        if (isset($_SESSION["register"])) {
            if ($_SESSION["register"] == "success") {
        ?>
                <div class="row justify-content-center g-0">
                    <div class="alert alert-success alert-dismissible col-md-6 col-10 fade show mt-3" role="alert">
                        <strong>Registration Success!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php
            } elseif ($_SESSION["register"] == "failed") {
            ?>
                <div class="row justify-content-center g-0">
                    <div class="alert alert-danger alert-dismissible col-md-6 col-10 fade show mt-3" role="alert">
                        <strong>Registration Failed!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
        <?php
            }
        }
        unset($_SESSION["register"]);
        ?>
        <div class="card text-center col-11 col-sm-6 m-auto shadow-sm">
            <div class="card-header bg-success border border-success">
            </div>
            <div class="card-body my-3">
                <h5 class="card-title text-uppercase lead mb-4">User Register</h5>
                <form id="register" method="post" action="userregister.php">
                    <div class="row justify-content-center">

                        <div class="row justify-content-center">
                            <div class="col-md-6 col-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="far fa-envelope"></i></span>
                                    <input type="text" class="form-control" name="name" id="name" aria-label="Name" placeholder="Full Name" pattern="[A-Za-z ]{3,30}" title="min 3 chars - max 30 chars" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="far fa-envelope"></i></span>
                                    <input type="text" class="form-control" name="email" id="email" aria-label="Email" placeholder="Email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-12">
                                <div class="input-group mb-4">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                                    <input type="password" name="password" id="password" class="form-control" aria-label="Password" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="input-group mb-4">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                                    <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" aria-label="Password" placeholder="Confirm Password" required>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-12">
                                <div class="input-group mb-4">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-venus-mars"></i></span>
                                    <select id="gender" name="gender" class="form-control" required>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="input-group mb-4">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
                                    <input type="text" name="phone" id="phone" class="form-control" aria-label="Phone Number" placeholder="Phone Number" pattern="(6|7|8|9)[0-9]{9}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-12">
                                <div class="input-group mb-4">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-map"></i></span>
                                    <textarea name="address" id="address" class="form-control" rows="1" aria-label="Address" placeholder="Address" required></textarea>
                                </div>
                            </div>
                            </div>
                        <div class="col-md-10 col-12">
                            <div class="d-grid my-2">
                                <button class="btn btn-outline-success" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer bg-success border border-success">
            </div>
        </div>
        <div class="my-1"></div>

    </div>


    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/bootstrap.bundle.js"></script>

    <script>
  $(function()
  {
     $("#register").on("submit",function(e)
      {     
        var p1 = $("#password").val();
        var p2 = $("#confirmpassword").val();
     
        if(p1 != p2)
        {
         e.preventDefault();
         alert("Password Don't Match");
        }     
      });
  });
    </script>

</body>

</html>