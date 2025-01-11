<?php
session_start();

require "../config/database.php";

if(isset($_SESSION["farmer"]))
{
    echo "<script> location.replace('addproduct.php') </script>";
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <title>Farmer Login</title>

    <style>
        .bg-image {
            background: url("../images/bg.jpg");
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
                            <a class="nav-link w-75 mx-auto" aria-current="page" href="../index.php">User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link w-75 mx-auto" aria-current="page" href="../admin/index.php">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active bg-success text-light w-75 mx-auto" href="index.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link w-75 mx-auto" href="register.php">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
        if (isset($_SESSION["login"])) {
        ?>
          <div class="row justify-content-center g-0">
            <div class="alert alert-danger alert-dismissible col-md-6 col-10 fade show mt-3" role="alert">
                <strong>Login Failed!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>
        <?php
        }
        unset($_SESSION["login"]);
        ?>
        <div class="card text-center col-11 col-md-4 m-auto shadow-sm">
            <div class="card-header bg-success border border-success">
            </div>
            <div class="card-body my-3">
                <h5 class="card-title text-uppercase lead mb-4">Farmer Login</h5>
                <form id="login" method="post" action="farmerlogin.php">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="far fa-envelope"></i></span>
                            <input type="text" class="form-control" name="email" id="email" aria-label="Email">
                        </div>
                        </div>
                       <div class="col-md-10 col-12">
                        <div class="input-group mb-4">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                            <input type="password" name="password" id="password" class="form-control" aria-label="Password">
                        </div>
                        </div>
                      <div class="col-md-10 col-12">
                        <div class="d-grid my-2">
                            <button class="btn btn-outline-success" type="submit">Login</button>
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


    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>

</body>

</html>