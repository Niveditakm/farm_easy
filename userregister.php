<?php
session_start();

require "config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $phone = trim($_POST["phone"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $gender = trim($_POST["gender"]);
    $address = trim($_POST["address"]);

        $sql = "INSERT INTO farm_2021_user VALUES(DEFAULT,?,?,?,?,?,?)";


        if ($stmt = mysqli_prepare($link, $sql)) 
            {
                mysqli_stmt_bind_param($stmt,"ssssss", $name, $email, $password, $gender, $phone, $address);

                if (mysqli_stmt_execute($stmt)) 
                {                    
                    $_SESSION["register"] = "success";
                    echo"<script> location.replace('register.php') </script>";
                } 
                else 
                {
                    $_SESSION["register"] = "failed";
                    echo"<script> location.replace('register.php') </script>";
                }
            }


            mysqli_stmt_close($stmt);
            mysqli_close($link);
  
}
