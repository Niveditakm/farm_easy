<?php
session_start();

require "config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // $phone = trim($_POST["phone"]);
    // $address = trim($_POST["address"]);
    $status = "Pending";
    $date = date("Y-m-d");
    // $time = date("H:i");
    $user = $_SESSION["user"];
    $address = $_SESSION["useraddress"];

    foreach ($_SESSION["cart"] as $key) 
    {
        $name = $key["productname"];
        $price = $key["productprice"] * $key["productquantity"];
        $quantity = $key["productquantity"];
        $image = $key["productimage"];
        $category = $key["productcategory"];
        $farmer = $key["productfarmer"];
        $id = $key["butsave"];

        $sql = 'INSERT INTO farm_2021_order VALUES (DEFAULT,?,?,?,?,?,?,?,?,?,?)';

        if ($stmt = mysqli_prepare($link, $sql)) 
        {
            mysqli_stmt_bind_param($stmt, "ssssssssss", $name, $price, $category, $quantity, $farmer, $user, $date, $address, $image, $status);

            if (mysqli_stmt_execute($stmt)) 
            {
                $sql = "UPDATE farm_2021_product SET farm_2021_product_quantity =  farm_2021_product_quantity - $quantity,farm_2021_product_status = IF(farm_2021_product_quantity = 0, 'Unavailable', 'Available') WHERE id = ?";

                if ($line = mysqli_prepare($link, $sql)) 
                {
                    mysqli_stmt_bind_param($line, "s", $id);
                    mysqli_stmt_execute($line);
                }

                mysqli_stmt_close($line);
            } 
            else 
            {
                $_SESSION["order"] = "failed";
                echo "<script> location.replace('orders.php') </script>";
            }

            mysqli_stmt_store_result($stmt);
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
    unset($_SESSION["cart"]);

    $_SESSION["order"] = "success";
    echo "<script> location.replace('orders.php') </script>";
}
