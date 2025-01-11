<?php
session_start();

require "config/database.php";

$result = mysqli_query($link, "SELECT * FROM farm_2021_link");

$totalrows = mysqli_num_rows($result);

if ($totalrows > 0) 
{
  $row = mysqli_fetch_array($result);

  $linkone = $row["farm_2021_link_one"];
  $linktwo = $row["farm_2021_link_two"];
  $linkthree = $row["farm_2021_link_three"];
  $linkfour = $row["farm_2021_link_four"];
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

    <title>E - Learning</title>

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
                            <a class="nav-link w-75 mx-auto" href="register.php">Register</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                More
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item text-center fs-5" href="helpcenter.php">Help Center</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-center fs-5" href="govscheme.php">Government Scheme</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-center fs-5 active bg-success text-light" href="elearn.php">E - Learning</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-center fs-5" href="wreport.php">Weather Report</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
        // if (isset($_SESSION["login"])) {
        ?>
        <!-- <div class="row justify-content-center g-0">
            <div class="alert alert-danger alert-dismissible col-md-6 col-10 fade show mt-3" role="alert">
                <strong>Login Failed!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div> -->
        <?php
        // }
        // unset($_SESSION["login"]);
        ?>
        <h5 class=" text-capitalize text-center fw-light fs-1">E - Learning</h5>

        <div class="container text-center m-auto">

            <div class="row justify-content-evenly">
                <hr class="my-2">
                <div class="card text-center col-11 col-sm-5 shadow-sm my-1">
                    <div class="card-body">
                        <div class="ratio ratio-16x9">
                            <iframe src="<?php if(isset($linkone)) echo $linkone;  ?>" title="YouTube video" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="card text-center col-11 col-sm-5 shadow-sm my-1">
                    <div class="card-body">
                        <div class="ratio ratio-16x9">
                            <iframe src="<?php if(isset($linktwo)) echo $linktwo;  ?>" title="YouTube video" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-evenly">
                <hr class="my-2">
                <div class="card text-center col-11 col-sm-5 shadow-sm my-1">
                    <div class="card-body">
                        <div class="ratio ratio-16x9">
                            <iframe src="<?php if(isset($linkthree)) echo $linkthree;  ?>" title="YouTube video" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="card text-center col-11 col-sm-5 shadow-sm my-1">
                    <div class="card-body">
                        <div class="ratio ratio-16x9">
                            <iframe src="<?php if(isset($linkfour)) echo $linkfour;  ?>" title="YouTube video" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="my-1"></div>

    </div>


    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/bootstrap.bundle.js"></script>

</body>

</html>