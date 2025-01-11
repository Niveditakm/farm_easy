<?php
session_start();

require "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

    $id = trim($_POST["butdel"]);
  
            $sql = 'UPDATE farm_2021_order SET farm_2021_order_status = IF(farm_2021_order_status ="Pending", "Complete", "Pending") WHERE id = ?';

            if ($stmt = mysqli_prepare($link, $sql)) 
            {
                mysqli_stmt_bind_param($stmt,"s", $id);

                if (mysqli_stmt_execute($stmt)) 
                {                    
                    $_SESSION["change"] = "success";
                    echo"<script> location.replace('vieworder.php') </script>";
                } 
                else 
                {
                    $_SESSION["change"] = "failed";
                    echo"<script> location.replace('vieworder.php') </script>";
                }
            }
        mysqli_stmt_close($stmt);
        mysqli_close($link);
}
