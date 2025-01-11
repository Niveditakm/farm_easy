<?php
session_start();

require "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $name = trim($_POST["name"]);
    $price = trim($_POST["price"]);
    $category = trim($_POST["category"]);
    $quantity = trim($_POST["quantity"]);
    $errors = null;
    $path = null;
    $status = "Available";
    $date = date("Y-m-d");
    $farmer = $_SESSION["farmer"];

        if ($_FILES["getFile"]["size"] !== 0) 
        {
            $file_name = $_FILES['getFile']['name'];
            $file_size = $_FILES['getFile']['size'];
            $file_tmp = $_FILES['getFile']['tmp_name'];
            $file_type = $_FILES['getFile']['type'];
            // $file_ext = strtolower(end(explode('.',$_FILES['pimg']['name'])));
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $extensions = array("jpeg", "jpg", "png");

            if (in_array($file_ext, $extensions) === false) 
            {
                $errors = "extension not allowed, please choose a JPEG or PNG file.";
            }

            if (is_null($errors) == true) 
            {
                move_uploaded_file($file_tmp, "../images/" . $file_name);
                $path = "images/" . $file_name;
            }
        }   


        if ($errors == null) 
        {
            $sql = 'INSERT INTO farm_2021_product VALUES(DEFAULT,?,?,?,?,?,?,?,?)';

            if ($stmt = mysqli_prepare($link, $sql)) 
            {
                mysqli_stmt_bind_param($stmt,"ssssssss", $name, $price, $category, $quantity, $farmer, $date, $path, $status);


                if (mysqli_stmt_execute($stmt)) 
                {                    
                    $_SESSION["add"] = "success";
                    echo"<script> location.replace('addproduct.php') </script>";
                } 
                else 
                {
                    $_SESSION["add"] = "failed";
                    echo"<script> location.replace('addproduct.php') </script>";
                }
            }
        }
        else 
        {
            $_SESSION["add"] = "failed";
            echo"<script> location.replace('addproduct.php') </script>";
        }
        mysqli_stmt_close($stmt);
        mysqli_close($link);
}
