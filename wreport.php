<?php
session_start();

// // require "config/database.php";

// if(isset($_SESSION["user"]))
// {
//     echo "<script> location.replace('cart.php') </script>";
// }
//
$apiKey = "ddc95f0ec31964940443f8e920b6b658";
$cityId = "1262321";
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();
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

    <title>Weather Report</title>

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
                                    <a class="dropdown-item text-center fs-5" href="elearn.php">E - Learning</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-center fs-5 active bg-success text-light" href="wreport.php">Weather Report</a>
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
        <h5 class=" text-capitalize text-center fw-light fs-1">Weather Report</h5>

        <div class="container text-center m-auto">

            <div class="row justify-content-evenly">
                <hr class="my-2">
                <div class="card text-center col-11 col-sm-12 shadow-sm my-1">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card-body my-3">
                                <h5 class="card-title text-uppercase lead">Weather Status</h5>
                                <h5 class="card-text text-capitalize fw-light"><?php echo date("l g:i a", $currentTime); ?></h5>
                                <h5 class="card-text text-capitalize fw-light fs-6"><?php echo date("jS F, Y", $currentTime); ?></h5>
                                <h5 class="card-text text-capitalize fw-light fs-6"><?php echo ucwords($data->weather[0]->description); ?></h5>
                            </div>
                        </div>
                        <div class="col-sm-6 d-flex flex-column justify-content-center">
                            <a href="#" class="text-decoration-none">
                                <img src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png" />
                                <?php echo $data->main->temp_max; ?>&deg;C
                                <span class="px-2"><?php echo $data->main->temp_min; ?>&deg;C</span>
                            </a>
                            <h5 class=" text-capitalize fw-light fs-5 mt-2">
                                Humidity: <?php echo $data->main->humidity; ?> %
                            </h5>
                            <h5 class=" text-capitalize fw-light fs-5 mt-2">
                                Wind: <?php echo $data->wind->speed; ?> km/h
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="card text-center col-11 col-sm-12 shadow-sm my-1">
                    <div class="card-body">
                    <a class="weatherwidget-io" href="https://forecast7.com/en/12d3076d64/mysuru/" data-label_1="" data-label_2="WEATHER" data-theme="original" >MYSORE WEATHER</a>
                        <div>
                    </div>
                </div>
            </div>

        </div>
        <div class="my-1"></div>

    </div>


    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/bootstrap.bundle.js"></script>

    <script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>
</body>

</html>