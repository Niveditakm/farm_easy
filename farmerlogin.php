<?php
session_start();

require "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

        $sql = 'SELECT farm_2021_farmer_name FROM farm_2021_farmer WHERE farm_2021_farmer_email = ? AND farm_2021_farmer_password = ?';

        if ($stmt = mysqli_prepare($link, $sql)) 
        {
            mysqli_stmt_bind_param($stmt, "ss", $email, $password);

            mysqli_stmt_execute($stmt);

            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) > 0) 
            {
                mysqli_stmt_bind_result($stmt, $name);
                mysqli_stmt_fetch($stmt);
                $_SESSION["farmer"] = $email;
                $_SESSION["farmername"] = $name;
                echo"<script> location.replace('addproduct.php') </script>";
            } 
            else 
            {
                $_SESSION["login"] = "failed";
                echo"<script> location.replace('index.php') </script>";
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($link);
}
