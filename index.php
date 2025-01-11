<?php
session_start();

require "config/database.php";

if (isset($_SESSION["user"])) {
    // echo "<script> location.replace('cart.php') </script>";
    $user = $_SESSION["user"];
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

    <title>Home</title>

    <style>
        .bg-image {
            background: url("images/bg.jpg");
            /* background-blend-mode: screen; */
            background-size: cover;
            /* background-color: darkgray; */
        }

        .card-img-top {
            width: 100%;
            height: 35vh;
            object-fit: cover;
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
                        <?php
                        if (!isset($user)) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link active bg-success text-light w-75 mx-auto" href="index.php">Home</a>
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
                                        <a class="dropdown-item text-center fs-5" href="wreport.php">Weather Report</a>
                                   </li>
                                </ul>
                            </li>
                        <?php
                        } elseif (isset($user)) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link active bg-success text-light w-75 mx-auto" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link w-75 mx-auto" href="cart.php">Cart</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link w-75 mx-auto" href="logout.php">Log Out</a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid m-auto">
            <?php
            if (isset($_SESSION["add"])) {
                if ($_SESSION["add"] == "success") {
            ?>
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        <strong>Product Added To Cart!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            <?php
                }
                unset($_SESSION["add"]);
            }
            ?>
            <div class="row justify-content-between">
                <div class="col-sm-3 lead text-center fs-4">
                    Category - Vegetables
                </div>
                <div class="col-sm-3 lead text-center">
                    <?php
                    if (isset($user)) {
                        echo "<span>Logged In As $user</span>";
                    }
                    ?>
                </div>
            </div>
            <hr>
            <div class="row justify-content-start">
                <?php
                $query = "select * from farm_2021_product where farm_2021_product_quantity > 0 and farm_2021_product_category = 'vegetables' and farm_2021_product_status = 'Available'";

                $result = mysqli_query($link, $query);

                while ($row = mysqli_fetch_array($result)) {
                    $id = $row['id'];
                    $farm_2021_product_image = $row['farm_2021_product_image'];
                    $farm_2021_product_name = $row['farm_2021_product_name'];
                    $farm_2021_product_quantity = $row['farm_2021_product_quantity'];
                    $farm_2021_product_farmer = $row['farm_2021_product_farmer'];
                    $farm_2021_product_price = $row['farm_2021_product_price'];
                    $farm_2021_product_category = $row['farm_2021_product_category'];
                ?>
                    <div class="col-sm-3 mb-2">
                        <div class="card shadow-sm">
                            <img src="<?php echo $farm_2021_product_image; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-6">
                                        <p class="card-text lead text-capitalize"><?php echo $farm_2021_product_name; ?></p>
                                    </div>
                                    <div class="col-6">
                                        <p class="card-text lead text-capitalize">
                                            Quantity - <span class="max"><?php echo $farm_2021_product_quantity; ?></span></p>
                                    </div>
                                    <div class="my-1"></div>
                                    <div class="col-6">
                                        <p class="card-text lead text-capitalize ">Price -</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="card-text lead text-capitalize">
                                            <span class="">₹ <?php echo $farm_2021_product_price; ?></span>
                                        </p>
                                    </div>
                                    <div class="my-1"></div>
                                    <div class="col-4">
                                        <p class="card-text lead text-capitalize ">Farmer -</p>
                                    </div>
                                    <div class="col-8">
                                        <p class="card-text lead text-capitalize">
                                            <span class=""><?php echo $farm_2021_product_farmer; ?></span>
                                        </p>
                                    </div>
                                    <div class="mt-2 mb-3"></div>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-success btn-sm w-100" name="butadd" id="butadd" data-bs-toggle="modal" data-bs-target="#product<?php echo $id; ?>"><span class="lead"> Add To Cart</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="product<?php echo $id; ?>" tabindex="-1" aria-labelledby="imagelabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body lead">
                                        <form action="addcart.php" method="post">
                                            <img class="rounded m-auto d-block img-fluid" src="<?php echo $farm_2021_product_image; ?>">
                                            <div class="my-2"></div>
                                            <div class="d-grid d-flex col gap-3" role="group" aria-label="Basic outlined example">
                                                <button type="button" class="btn btn-danger minus w-25">-</button>
                                                <input type="text" name="productquantity" id="productquantity" class="value text-center form-control bg-light w-100 shadow-none" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" value="1" max="<?php echo $farm_2021_product_quantity; ?>" min="1" maxlength="2" readonly>
                                                <button type="button" class="btn btn-primary plus w-25">+</button>
                                            </div>
                                            <div class="my-2"></div>
                                            <input type="hidden" name="productname" id="productname" value="<?php echo $farm_2021_product_name; ?>">
                                            <input type="hidden" name="productimage" id="productimage" value="<?php echo $farm_2021_product_image; ?>">
                                            <input type="hidden" name="productprice" id="productprice" value="<?php echo $farm_2021_product_price; ?>">
                                            <input type="hidden" name="productcategory" id="productcategory" value="<?php echo $farm_2021_product_category; ?>">
                                            <input type="hidden" name="productfarmer" id="productfarmer" value="<?php echo $farm_2021_product_farmer; ?>">
                                            <button type="submit" class="btn btn-success btn-sm w-100" name="butsave" id="butsave" value="<?php echo $id; ?>"><span class="lead"> Add To Cart</span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

        <div class="container-fluid m-auto">
            <hr class="my-5">
        </div>


        <div class="container-fluid m-auto">
            <div class="row justify-content-between">
                <div class="col-sm-3 lead text-center fs-4">
                    Category - Fruits
                </div>
                <div class="col-sm-3 lead text-center">
                    <?php
                    // if (isset($user)) {
                    //     echo "<span>Logged In As $user</span>";
                    // }
                    ?>
                </div>
            </div>
            <hr>
            <div class="row justify-content-start">
                <?php
                $query = "select * from farm_2021_product where farm_2021_product_quantity > 0 and farm_2021_product_category = 'fruits' and farm_2021_product_status = 'Available'";

                $result = mysqli_query($link, $query);

                while ($row = mysqli_fetch_array($result)) {
                    $id = $row['id'];
                    $farm_2021_product_image = $row['farm_2021_product_image'];
                    $farm_2021_product_name = $row['farm_2021_product_name'];
                    $farm_2021_product_quantity = $row['farm_2021_product_quantity'];
                    $farm_2021_product_farmer = $row['farm_2021_product_farmer'];
                    $farm_2021_product_price = $row['farm_2021_product_price'];
                    $farm_2021_product_category = $row['farm_2021_product_category'];
                ?>
                    <div class="col-sm-3 mb-2">
                        <div class="card shadow-sm">
                            <img src="<?php echo $farm_2021_product_image; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-6">
                                        <p class="card-text lead text-capitalize"><?php echo $farm_2021_product_name; ?></p>
                                    </div>
                                    <div class="col-6">
                                        <p class="card-text lead text-capitalize">
                                            Quantity - <span class="max2"><?php echo $farm_2021_product_quantity; ?></span></p>
                                    </div>
                                    <div class="my-1"></div>
                                    <div class="col-6">
                                        <p class="card-text lead text-capitalize ">Price -</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="card-text lead text-capitalize">
                                            <span class="">₹ <?php echo $farm_2021_product_price; ?></span>
                                        </p>
                                    </div>
                                    <div class="my-1"></div>
                                    <div class="col-4">
                                        <p class="card-text lead text-capitalize">Farmer -</p>
                                    </div>
                                    <div class="col-8">
                                        <p class="card-text lead text-capitalize">
                                            <span class=""><?php echo $farm_2021_product_farmer; ?></span>
                                        </p>
                                    </div>
                                    <div class="mt-2 mb-3"></div>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-success btn-sm w-100" name="butadd" id="butadd" data-bs-toggle="modal" data-bs-target="#product<?php echo $id; ?>"><span class="lead"> Add To Cart</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="product<?php echo $id; ?>" tabindex="-1" aria-labelledby="imagelabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body lead">
                                        <form action="addcart.php" method="post">
                                            <img class="rounded m-auto d-block img-fluid" src="<?php echo $farm_2021_product_image; ?>">
                                            <div class="my-2"></div>
                                            <div class="d-grid d-flex col gap-3" role="group" aria-label="Basic outlined example">
                                                <button type="button" class="btn btn-danger minus2 w-25">-</button>
                                                <input type="text" name="productquantity" id="productquantity" class="value2 text-center form-control bg-light w-100 shadow-none" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" value="1" max="<?php echo $farm_2021_product_quantity; ?>" min="1" maxlength="2" readonly>
                                                <button type="button" class="btn btn-primary plus2 w-25">+</button>
                                            </div>
                                            <div class="my-2"></div>
                                            <input type="hidden" name="productname" id="productname" value="<?php echo $farm_2021_product_name; ?>">
                                            <input type="hidden" name="productimage" id="productimage" value="<?php echo $farm_2021_product_image; ?>">
                                            <input type="hidden" name="productprice" id="productprice" value="<?php echo $farm_2021_product_price; ?>">
                                            <input type="hidden" name="productcategory" id="productcategory" value="<?php echo $farm_2021_product_category; ?>">
                                            <input type="hidden" name="productfarmer" id="productfarmer" value="<?php echo $farm_2021_product_farmer; ?>">
                                            <button type="submit" class="btn btn-success btn-sm w-100" name="butsave" id="butsave" value="<?php echo $id; ?>"><span class="lead"> Add To Cart</span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>


        <div class="my-1"></div>

    </div>


    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/bootstrap.bundle.js"></script>

    <script>
        $(function() {

            $(".plus").on("click", function() {
                debugger;

                var value = $(this).closest("div").find(".value").val();

                var max = $(this).closest("div").find("input[name=productquantity]").attr("max");

                max = +max - 1;

                if (+value >= 1 && +value <= +max) {

                    value = +value + 1;

                    $(this).closest("div").find("input[name=productquantity]").val(value);

                }

            });

            $(".minus").on("click", function() {
                debugger;

                var value = $(this).closest("div").find(".value").val();

                var max = $(this).closest("div").find("input[name=productquantity]").attr("min");

                //   max = +max - 1;

                if (+value > +max) {

                    value = +value - 1;

                    $(this).closest("div").find("input[name=productquantity]").val(value);

                }

            });

            $(".plus2").on("click", function() {
                debugger;

                var value = $(this).closest("div").find(".value2").val();

                var max = $(this).closest("div").find("input[name=productquantity]").attr("max")

                max = +max - 1;

                if (+value >= 1 && +value <= +max) {

                    value = +value + 1;

                    $(this).closest("div").find("input[name=productquantity]").val(value);

                }

            });

            $(".minus2").on("click", function() {
                debugger;

                var value = $(this).closest("div").find(".value2").val();

                var max = $(this).closest("div").find("input[name=productquantity]").attr("min")

                //   max = +max - 1;

                if (+value > +max) {

                    value = +value - 1;

                    $(this).closest("div").find("input[name=productquantity]").val(value);

                }

            });

        });
    </script>

</body>

</html>