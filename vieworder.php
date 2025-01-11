<?php
session_start();

require "../config/database.php";

if (!isset($_SESSION["farmer"])) {
  echo "<script> location.replace('index.php') </script>";
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Dashboard">
  <meta name="author" content="Intrella">
  <meta name="generator" content="Intrella">
  <title>View Order</title>



  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    body {
      font-size: .875rem;
    }

    .bg-cover {
      background-size: cover !important;
    }

    .feather {
      width: 16px;
      height: 16px;
      vertical-align: text-bottom;
    }

    /*
 * Sidebar
 */

    .sidebar {
      position: fixed;
      top: 0;
      /* rtl:raw:
  right: 0;
  */
      bottom: 0;
      /* rtl:remove */
      left: 0;
      z-index: 100;
      /* Behind the navbar */
      padding: 48px 0 0;
      /* Height of navbar */
      box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
    }

    @media (max-width: 767.98px) {
      .sidebar {
        top: 5rem;
      }
    }

    .sidebar-sticky {
      position: relative;
      top: 0;
      height: calc(100vh - 48px);
      padding-top: .5rem;
      overflow-x: hidden;
      overflow-y: auto;
      /* Scrollable contents if viewport is shorter than content. */
    }

    .sidebar .nav-link {
      font-weight: 500;
      color: #333;
    }

    .sidebar .nav-link .feather {
      margin-right: 4px;
      color: #727272;
    }

    .sidebar .nav-link.active {
      color: #007bff;
    }

    .sidebar .nav-link:hover .feather,
    .sidebar .nav-link.active .feather {
      color: inherit;
    }

    .sidebar-heading {
      font-size: .75rem;
      text-transform: uppercase;
    }

    /*
 * Navbar
 */

    .navbar-brand {
      padding-top: .75rem;
      padding-bottom: .75rem;
      font-size: 1rem;
      background-color: rgba(0, 0, 0, .25);
      box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
    }

    .navbar .navbar-toggler {
      top: .25rem;
      right: 1rem;
    }

    .navbar .form-control {
      padding: .75rem 1rem;
      border-width: 0;
      border-radius: 0;
    }

    .form-control {
      color: darkslategray;
      background-color: #eef2f3;
      border-color: green;
    }

    .form-control:focus {
      border-color: green;
      background-color: #f8f9fa;
      box-shadow: 0 0 0 3px rgba(0, 255, 0, .25);
    }

    .form-select {
      color: darkslategray;
      background-color: #eef2f3;
      border-color: green;
    }

    .form-select:focus {
      border-color: green;
      background-color: #f8f9fa;
      box-shadow: 0 0 0 3px rgba(0, 255, 0, .25);
    }
  </style>
</head>

<body>

  <div class="d-flex flex-column min-vh-100 bg-cover" style="background:#eef2f3;">

    <header class="navbar navbar-dark sticky-top bg-success flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 text-center fw-bold" href="#">FARM</a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- <input class="form-control bg-success w-100" type="text"  aria-label="Search" disabled> -->
      <div class="form-control bg-success w-100"></div>
      <ul class="navbar-nav px-3">
      </ul>
    </header>

    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
          <div class="position-sticky pt-3">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link addproduct" aria-current="page" href="addproduct.php">
                  <span data-feather="plus-circle"></span>
                  Add Product
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link farmer" aria-current="page" href="viewproduct.php">
                  <span data-feather="users"></span>
                  View Product
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link farmer" aria-current="page" href="editproduct.php">
                  <span data-feather="edit"></span>
                  Edit Product
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link order active text-light bg-success" aria-current="page" href="vieworder.php">
                  <span data-feather="package"></span>
                  View Order
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link farmer" aria-current="page" href="logout.php">
                  <span data-feather="log-out"></span>
                  Sign Out
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h3 lead">View Orders</h1>
          </div>
          <?php
          if (isset($_SESSION["change"])) {
            if ($_SESSION["change"] == "success") {
          ?>
              <div class="row justify-content-center">
                <div class="alert alert-success col-md-6 alert-dismissible fade show" role="alert">
                  <strong>Change Successfull!</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              </div>
            <?php
            } elseif ($_SESSION["change"] == "failed") {
            ?>
              <div class="row justify-content-center">
                <div class="alert alert-danger col-md-6 alert-dismissible fade show" role="alert">
                  <strong>Change Failed!</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              </div>
          <?php
            }
          }
          unset($_SESSION["change"]);
          ?>
          <h4 class="text-center">View/Delete Orders
            <hr>
          </h4>
          <form action="deleteorder.php" class="text-center" method="POST">
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead class="bg-success text-white">
                  <tr class="text-center">
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>User</th>
                    <th>Added Date</th>
                    <th>Address</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $farmer = $_SESSION["farmer"];
                  $sql = "SELECT * FROM farm_2021_order WHERE farm_2021_order_farmer = '$farmer' AND farm_2021_order_status = 'Pending'";

                  if ($stmt = mysqli_prepare($link, $sql)) {
                    if (mysqli_stmt_execute($stmt)) {
                      mysqli_stmt_store_result($stmt);

                      mysqli_stmt_bind_result($stmt, $id, $name, $price, $category, $quantity, $farmer, $user, $date, $address, $image, $status);

                      while (mysqli_stmt_fetch($stmt)) {
                        echo '<tr class="text-center">';
                        echo '<td>' . $name . '</td>';
                        echo '<td>' . $price . '</td>';
                        echo '<td>' . $category . '</td>';
                        echo '<td>' . $quantity . '</td>';
                        echo '<td>' . $user . '</td>';
                        echo '<td>' . $date . '</td>';
                        echo '<td>' . $address . '</td>';
                        echo '<td><a data-bs-toggle="modal" data-bs-target="#imgv' . $id . '">
        <img width="60px" class="img-thumbnail rounded m-auto d-block" src="../' . $image . '">
        </a></td>';
                        echo '<td>' . $status . '</td>';
                        if ($status == "Pending") {
                          echo '<td><div class="form-group"><button class="btn btn-danger btn-sm delete text-white" id ="butdel" name ="butdel" value="' . $id . '"><i class="fa fa-trash"></i></button></div></td>';
                        } else {
                          echo '<td>N/A<td>';
                        }
                        echo '</tr>';
                        echo '
        <div class="modal fade" id="imgv' . $id . '" tabindex="-1" aria-labelledby="imgvLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-body">
                <img class="rounded m-auto d-block img-fluid" src="../' . $image . '">
              </div>
            </div>
          </div>
        </div>';
                      }
                    }
                  }
                  mysqli_stmt_close($stmt);
                  ?>
                </tbody>
              </table>
            </div>

          </form>

          <div class="my-5">
            <hr>
          </div>

          <?php
          if (isset($_SESSION["change"])) {
            if ($_SESSION["change"] == "success") {
          ?>
              <div class="row justify-content-center">
                <div class="alert alert-success col-md-6 alert-dismissible fade show" role="alert">
                  <strong>Status Changed Successfully!</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              </div>
            <?php
            } elseif ($_SESSION["change"] == "failed") {
            ?>
              <div class="row justify-content-center">
                <div class="alert alert-danger col-md-6 alert-dismissible fade show" role="alert">
                  <strong>Change Failed!</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              </div>
          <?php
            }
          }
          unset($_SESSION["change"]);
          ?>
          <h4 class="text-center">Complete Orders
            <hr>
          </h4>
          <form action="statusorder.php" class="text-center" method="POST">
            <div class="table-responsive">
              <table class="table table-striped table-hover table-bordered shadow-sm align-middle">
                <thead class="bg-success bg-gradient text-white">
                  <tr class="text-center">
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>User</th>
                    <th>Added Date</th>
                    <th>Address</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $email = $_SESSION["farmer"];

                  $sql = "SELECT * FROM farm_2021_order WHERE farm_2021_order_farmer = '$farmer'";

                  if ($stmt = mysqli_prepare($link, $sql)) {
                    if (mysqli_stmt_execute($stmt)) {
                      mysqli_stmt_store_result($stmt);

                      mysqli_stmt_bind_result($stmt, $id, $name, $price, $category, $quantity, $farmer, $user, $date, $address, $image, $status);

                      while (mysqli_stmt_fetch($stmt)) {
                        echo '<tr class="text-center">';
                        echo '<td>' . $name . '</td>';
                        echo '<td>' . $price . '</td>';
                        echo '<td>' . $category . '</td>';
                        echo '<td>' . $quantity . '</td>';
                        echo '<td>' . $user . '</td>';
                        echo '<td>' . $date . '</td>';
                        echo '<td>' . $address . '</td>';
                        echo '<td><a data-bs-toggle="modal" data-bs-target="#imgv' . $id . '">
                      <img width="60px" class="img-thumbnail rounded m-auto d-block" src="../' . $image . '">
                      </a></td>';
                        echo '<td>' . $status . '</td>';
                        if ($status == "Pending") {
                        echo '<td><div class="form-group"><button class="btn btn-primary btn-sm delete text-white" id ="butdel" name ="butdel" value="' . $id . '">Change</button></div></td>';
                        } else {
                          echo '<td>N/A<td>';
                        }
                        echo '</tr>';
                        echo '
                      <div class="modal fade" id="imgv' . $id . '" tabindex="-1" aria-labelledby="imgvLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-body">
                              <img class="rounded m-auto d-block img-fluid" src="../' . $image . '">
                            </div>
                          </div>
                        </div>
                      </div>';
                      }
                    }
                  }
                  mysqli_stmt_close($stmt);
                  mysqli_close($link);
                  ?>
                </tbody>
              </table>
            </div>

          </form>
          <div class="my-1"></div>
        </main>

      </div>
    </div>


    <!-- <div class="wrapper flex-grow-1"></div>
<footer style="background:#eef2f3;" class="shadow">
  <p class="font-weight-bold text-center pt-1">© <script>document.write(new Date().getFullYear());</script> BLOOD BANK</p>
  </footer> -->

  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>

  <script>
    function previewFile(input) {
      debugger;
      var file = $("#getFile").get(0).files[0];

      if (file) {
        var reader = new FileReader();

        reader.onload = function() {
          $("#previewImg").attr("src", reader.result);
          $("#previewImg").addClass("img-thumbnail");
          $("#previewImg").show();
        }

        reader.readAsDataURL(file);
      }
    }
  </script>


  <script>
    (function() {
      'use strict'

      feather.replace()


    })()
  </script>
</body>

</html>