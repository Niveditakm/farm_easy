<?php
session_start();

// // require "config/database.php";

// if(isset($_SESSION["user"]))
// {
//     echo "<script> location.replace('cart.php') </script>";
// }
//
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

    <title>Government Scheme</title>

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
                                    <a class="dropdown-item text-center fs-5 active bg-success text-light" href="govscheme.php">Government Scheme</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-center fs-5" href="elearn.php">E - Learning</a>
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
        <h5 class=" text-capitalize text-center fw-light fs-1">Government Schemes</h5>

        <div class="container text-center m-auto">

            <div class="row justify-content-center">
                <hr class="my-2">
                <div class="card text-center col-11 col-md-10 shadow-sm">
                    <div class="card-body my-3">
                        <div class="row">
                            <div class="col-sm-11 col-12">
                                <h3 class="card-title text-uppercase text-start pb-2">PM-Kisan Scheme</h3>
                                <h5 class="card-text text-start fw-normal">Pradhan Mantri Kisan Samman Nidhi Yojana is an initiative of the Government wherein 120 million small and marginal farmers of India with less than two hectares of landholding will get up to Rs. 6,000 per year as minimum income support. PM-Kisan scheme has become operational since 1st December 2018. Under this scheme, cultivators will get Rs. 6000 in three installments.</h5>
                            </div>
                            <div class="col-sm-11 col-12">
                                <h5 class=" text-capitalize text-start fw-light fs-5 mt-4">
                                    For more details
                                    <a href="https://www.pmkisan.gov.in/" class="text-decoration-none">Click Here</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-2">
                <div class="card text-center col-11 col-md-10 shadow-sm">
                    <div class="card-body my-3">
                        <div class="row">
                            <div class="col-sm-11 col-12">
                                <h3 class="card-title text-uppercase text-start pb-2">Pradhan Mantri Kisan Maandhan yojana</h3>
                                <h5 class="card-text text-start fw-normal">Prime Minister Narendra Modi launched a pension scheme for the small & marginal farmers of India last September. Under PM Kisan Maandhan scheme about 5 crore marginalised farmers will get a minimum pension of Rs 3000 / month on attaining the age of 60. Those who fall in the age group of 18 - 40 years will be eligible to apply for the scheme. Under this scheme, the farmers will be required to make a monthly contribution of Rs 55 to 200, depending on their age of entry, in the Pension Fund till they reach the retirement date, 60 years. The Government will make an equal contribution of the same amount in the pension fund for the cultivators.</h5>
                            </div>
                            <div class="col-sm-11 col-12">
                                <h5 class=" text-capitalize text-start fw-light fs-5 mt-4">
                                    For more details
                                    <a href="https://pmkmy.gov.in" class="text-decoration-none">Click Here</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-2">
                <div class="card text-center col-11 col-md-10 shadow-sm">
                    <div class="card-body my-3">
                        <div class="row">
                            <div class="col-sm-11 col-12">
                                <h3 class="card-title text-uppercase text-start pb-2">Pradhan Mantri Fasal Bima Yojana (PMFBY)</h3>
                                <h5 class="card-text text-start fw-normal">Pradhan Mantri Fasal Bima Yojana is an actuarial premium based scheme where farmer has to pay maximum premium of 2 percent for Kharif, 1.5 percent for Rabi food & oilseed crops and 5 percent for annual commercial or horticultural crops and the remaining part of the actuarial or bidded premium is equally shared by the Central & State Government.  An important purpose of the scheme is to facilitate quick claims settlement. The claims should be settled within 2 months of harvest subject to timely provision of both yield data & share of premium subsidy by State Government.</h5>
                            </div>
                            <div class="col-sm-11 col-12">
                                <h5 class=" text-capitalize text-start fw-light fs-5 mt-4">
                                    For more details
                                    <a href="https://pmfby.gov.in/" class="text-decoration-none">Click Here</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-2">
                <div class="card text-center col-11 col-md-10 shadow-sm">
                    <div class="card-body my-3">
                        <div class="row">
                            <div class="col-sm-11 col-12">
                                <h3 class="card-title text-uppercase text-start pb-2">Soil Health Card Scheme</h3>
                                <h5 class="card-text text-start fw-normal">Soil health card scheme was launched in the year 2015 in order to help the State Governments to issue Soil Health Cards to farmers of India.  The Soil Health Cards gives information to farmers on nutrient status of their soil along with recommendation on appropriate dosage of nutrients to be applied for improving soil health and its fertility.</h5>
                            </div>
                            <div class="col-sm-11 col-12">
                                <h5 class=" text-capitalize text-start fw-light fs-5 mt-4">
                                    For more details
                                    <a href="https://soilhealth.dac.gov.in/" class="text-decoration-none">Click Here</a>
                                </h5>
                            </div>
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