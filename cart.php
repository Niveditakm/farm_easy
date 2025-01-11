<?php
session_start();

require "config/database.php";

if (!isset($_SESSION["user"])) {
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
  <title>Cart</title>



  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">
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
      border-color: #dc3545;
    }

    .form-control:focus {
      border-color: red;
      background-color: whitesmoke;
      box-shadow: 0 0 0 3px rgba(255, 0, 0, .25);
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
                <a class="nav-link home" aria-current="page" href="index.php">
                  <span data-feather="home"></span>
                  Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link cart active text-light bg-success" aria-current="page" href="cart.php">
                  <span data-feather="shopping-cart"></span>
                  Cart
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link orders" aria-current="page" href="orders.php">
                  <span data-feather="truck"></span>
                  Orders
                </a>
              </li>
              <!-- <li class="nav-item">
            <a class="nav-link product" aria-current="page" href="viewproducts.php">
              <span data-feather="package"></span>
              View Products
            </a>
            </li> -->
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
            <h1 class="h3 lead">View Cart</h1>
          </div>
          <?php
          if (isset($_SESSION["remove"])) {
            if ($_SESSION["remove"] == "success") {
          ?>
              <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                <strong>Cart Cleared Successfully!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
            } else if ($_SESSION["remove"] == "failed") {
            ?>
              <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                <strong>Delete Failed!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
            }
            ?>
          <?php

            unset($_SESSION["remove"]);
          }
          ?>

          <form id="form" name="form" method="POST" action="payment.php" class="text-center">
            <h4 class="h4 text-center mb-4">Products</h4>
            <div class="row justify-content-center">
              <?php
              $total = 0.0;
              if (isset($_SESSION["cart"])) {
                foreach ($_SESSION["cart"] as $key) {
                  $total += $key["productprice"] * $key["productquantity"];
              ?>
                  <div class="card col-11 my-2 rounded-0 shadow-sm text-start">
                    <span class="text-uppercase fw-bold pt-2"><?php echo $key["productname"]; ?></span>

                    <div class="row mb-3 mt-1">
                      <div class="col-6 fst-italic">₹ <?php echo $key["productprice"]; ?></div>
                      <div class="col-6 text-end">X <span class="badge text-wrap bg-primary rounded-circle"><?php echo $key["productquantity"]; ?></span></div>
                    </div>
                  </div>
              <?php
                }
              }
              ?>
            </div>
            <?php
            if (isset($_SESSION["cart"])) {
            ?>
              <div class="row justify-content-center mt-3 gap-3 gap-sm-0">
                <p class=" lead mt-1 mb-3">Total : ₹ <?php echo $total; ?></p>
                <input type="hidden" name="producttotal" id="producttotal" value="<?php echo $total; ?>">
                <div class="col-md-5">
                  <button id="resetbut" class="btn btn-danger border text-light col-md-12 col-12 mx-auto border-secondary" type="submit" form="reset">Reset Cart</button>
                </div>
                <div class="col-md-5">
                  <button id="signin" class="btn btn-success border text-light col-md-12 col-12 mx-auto border-secondary" type="submit">Place Order</button>
                </div>
              </div>
            <?php
            }
            ?>
          </form>

          <form id="reset" name="reset" method="POST" action="resetcart.php" class="text-center"></form>
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
    $(function() {
      $("#resetbut").on("click", function() {

        $("#reset").submit();

      });
    });
  </script>


  <script>
    (function() {
      'use strict'

      feather.replace()


    })()
  </script>
</body>

</html>