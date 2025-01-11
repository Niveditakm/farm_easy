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

    <title>Help Center</title>

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
                                    <a class="dropdown-item text-center fs-5 active bg-success text-light" href="helpcenter.php">Help Center</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-center fs-5" href="govscheme.php">Government Scheme</a>
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
        <h5 class=" text-capitalize text-center fw-light fs-1">Help Centers</h5>

        <div class="container text-center m-auto">

            <div class="row justify-content-center">
                <hr class="my-2">
                <div class="card text-center col-11 col-md-8 shadow-sm">
                    <div class="row">
                        <div class="col-sm-8 col-8">
                            <div class="card-body my-3">
                                <h5 class="card-title text-uppercase text-start lead">Vikram Agro Service Centre</h5>
                                <h5 class="card-text text-capitalize text-start fw-light">Fertilizer Store</h5>
                                <h5 class="card-text text-capitalize text-start fw-light fs-6">151, Ramavilas Rd, near Sadvidya College</h5>
                                <h5 class="card-text text-capitalize text-start fw-light fs-6">Phone - <a href="tel:+919964061028">9964061028</a></h5>
                            </div>
                        </div>
                        <div class="col-sm-4 col-4 d-flex flex-column align-items-center justify-content-center">
                        <a href="https://www.google.com/maps/dir//Vikram+Agro+Service+Centre,+151,+Ramavilas+Rd,+near+Sadvidya+College,+Devaraja+Mohalla,+Chamrajpura,+Mysuru,+Karnataka+570001/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x3baf700ee7bc1dbb:0x312607f93400b7e?sa=X&ved=2ahUKEwidxebVlezxAhVRfSsKHS3zCq4Q48ADMAB6BAgEEDw" class="text-decoration-none"><i class="fas fa-directions fs-2 rounded-circle p-2 border border-2 border-primary text-primary"></i></a> 
                            <h5 class=" text-capitalize text-center fw-light fs-5 mt-2">
                               <a href="https://www.google.com/maps/dir//Vikram+Agro+Service+Centre,+151,+Ramavilas+Rd,+near+Sadvidya+College,+Devaraja+Mohalla,+Chamrajpura,+Mysuru,+Karnataka+570001/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x3baf700ee7bc1dbb:0x312607f93400b7e?sa=X&ved=2ahUKEwidxebVlezxAhVRfSsKHS3zCq4Q48ADMAB6BAgEEDw" class="text-decoration-none">Directions</a> 
                            </h5>
                        </div>
                    </div>
                </div>
                <hr class="my-2">
                <div class="card text-center col-11 col-md-8 shadow-sm">
                    <div class="row">
                        <div class="col-sm-8 col-8">
                            <div class="card-body my-3">
                                <h5 class="card-title text-uppercase text-start lead">Bharatha Agro Engineering Centre</h5>
                                <h5 class="card-text text-capitalize text-start fw-light">Agricultural service</h5>
                                <h5 class="card-text text-capitalize text-start fw-light fs-6">4D, Brindavan Extension 1st Stage, Brindavan Extension 1st Stage, Near State Bank of Mysore, Brindavan Extension, Mysuru, Karnataka 570020</h5>
                                <h5 class="card-text text-capitalize text-start fw-light fs-6">Phone - 0821 251 0273</h5>
                            </div>
                        </div>
                        <div class="col-sm-4 col-4 d-flex flex-column align-items-center justify-content-center">
                        <a href="https://www.google.com/maps/dir//Bharatha+Agro+Engineering+Centre,+4D,+Brindavan+Extension+1st+Stage,+Brindavan+Extension+1st+Stage,+Near+State+Bank+of+Mysore,+Brindavan+Extension,+Mysuru,+Karnataka+570020/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x3baf7a7adc1957bf:0xb089ace769bce411?sa=X&ved=2ahUKEwidxebVlezxAhVRfSsKHS3zCq4Q48ADMAF6BAgEEEc" class="text-decoration-none"><i class="fas fa-directions fs-2 rounded-circle p-2 border border-2 border-primary text-primary"></i></a> 
                            <h5 class=" text-capitalize text-center fw-light fs-5 mt-2">
                               <a href="https://www.google.com/maps/dir//Bharatha+Agro+Engineering+Centre,+4D,+Brindavan+Extension+1st+Stage,+Brindavan+Extension+1st+Stage,+Near+State+Bank+of+Mysore,+Brindavan+Extension,+Mysuru,+Karnataka+570020/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x3baf7a7adc1957bf:0xb089ace769bce411?sa=X&ved=2ahUKEwidxebVlezxAhVRfSsKHS3zCq4Q48ADMAF6BAgEEEc" class="text-decoration-none">Directions</a> 
                            </h5>
                        </div>
                    </div>
                </div>
                <hr class="my-2">
                <div class="card text-center col-11 col-md-8 shadow-sm">
                    <div class="row">
                        <div class="col-sm-8 col-8">
                            <div class="card-body my-3">
                                <h5 class="card-title text-uppercase text-start lead">Karnataka Institute for Agricultural Marketing</h5>
                                <h5 class="card-text text-capitalize text-start fw-light">College of agriculture</h5>
                                <h5 class="card-text text-capitalize text-start fw-light fs-6">Near B. M. Hospital, Hunsur, Main Rd, Hinkal, Mysuru, Karnataka 570006</h5>
                                <h5 class="card-text text-capitalize text-start fw-light fs-6">Phone - 0821 251 2303</h5>
                            </div>
                        </div>
                        <div class="col-sm-4 col-4 d-flex flex-column align-items-center justify-content-center">
                        <a href="https://www.google.com/maps/dir//Karnataka+Institute+for+Agricultural+Marketing,+Near+B.+M.+Hospital,+Hunsur,+Main+Rd,+Hinkal,+Mysuru,+Karnataka+570006/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x3baf7a92d6985c6b:0x9a8d405981f58a75?sa=X&ved=2ahUKEwiu2KuwnOzxAhVDcCsKHdTFAJkQ48ADMAZ6BAgBEFc" class="text-decoration-none"><i class="fas fa-directions fs-2 rounded-circle p-2 border border-2 border-primary text-primary"></i></a> 
                            <h5 class=" text-capitalize text-center fw-light fs-5 mt-2">
                               <a href="https://www.google.com/maps/dir//Karnataka+Institute+for+Agricultural+Marketing,+Near+B.+M.+Hospital,+Hunsur,+Main+Rd,+Hinkal,+Mysuru,+Karnataka+570006/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x3baf7a92d6985c6b:0x9a8d405981f58a75?sa=X&ved=2ahUKEwiu2KuwnOzxAhVDcCsKHdTFAJkQ48ADMAZ6BAgBEFc" class="text-decoration-none">Directions</a> 
                            </h5>
                        </div>
                    </div>
                </div>
                <hr class="my-2">
                <div class="card text-center col-11 col-md-8 shadow-sm">
                    <div class="row">
                        <div class="col-sm-8 col-8">
                            <div class="card-body my-3">
                                <h5 class="card-title text-uppercase text-start lead">MYSORE ORGANIC FARMS PVT LTD</h5>
                                <h5 class="card-text text-capitalize text-start fw-light">Agricultural service</h5>
                                <h5 class="card-text text-capitalize text-start fw-light fs-6">#87/4, Lingambudhipalya Road Near RT Nagar Ring Road, Junction, Mysuru - Ooty Rd, Karnataka 570008</h5>
                                <h5 class="card-text text-capitalize text-start fw-light fs-6">Phone - 98801 11593</h5>
                            </div>
                        </div>
                        <div class="col-sm-4 col-4 d-flex flex-column align-items-center justify-content-center">
                        <a href="https://www.google.com/maps/dir//MYSORE+ORGANIC+FARMS+PVT+LTD,+%2387%2F4,+Lingambudhipalya+Road+Near+RT+Nagar+Ring+Road,+Junction,+Mysuru+-+Ooty+Rd,+Karnataka+570008/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x3baf653cd12b0303:0x9bdae5b58a1a8cea?sa=X&ved=2ahUKEwiu2KuwnOzxAhVDcCsKHdTFAJkQ48ADMAh6BAgBEHA" class="text-decoration-none"><i class="fas fa-directions fs-2 rounded-circle p-2 border border-2 border-primary text-primary"></i></a> 
                            <h5 class=" text-capitalize text-center fw-light fs-5 mt-2">
                               <a href="https://www.google.com/maps/dir//MYSORE+ORGANIC+FARMS+PVT+LTD,+%2387%2F4,+Lingambudhipalya+Road+Near+RT+Nagar+Ring+Road,+Junction,+Mysuru+-+Ooty+Rd,+Karnataka+570008/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x3baf653cd12b0303:0x9bdae5b58a1a8cea?sa=X&ved=2ahUKEwiu2KuwnOzxAhVDcCsKHdTFAJkQ48ADMAh6BAgBEHA" class="text-decoration-none">Directions</a> 
                            </h5>
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