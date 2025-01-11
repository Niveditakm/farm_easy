<?php
session_start();

require "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

    $id = trim($_POST["butdel"]);
  
            $sql = 'DELETE FROM farm_2021_product WHERE id = ?';

            if ($stmt = mysqli_prepare($link, $sql)) 
            {
                mysqli_stmt_bind_param($stmt,"s", $id);

                if (mysqli_stmt_execute($stmt)) 
                {                    
                    $_SESSION["delete"] = "success";
                    echo"<script> location.replace('viewproduct.php') </script>";
                } 
                else 
                {
                    $_SESSION["delete"] = "failed";
                    echo"<script> location.replace('viewproduct.php') </script>";
                }
            }
        mysqli_stmt_close($stmt);
        mysqli_close($link);
}
