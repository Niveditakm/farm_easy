<?php
session_start();
require "config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $new = false;

    if (isset($_SESSION["user"])) 
    {
        if (isset($_SESSION["cart"])) 
        {
            foreach ($_SESSION["cart"] as &$key) 
            {
                if($_POST["butsave"] == $key["butsave"])
                {
                    $key["productquantity"] = $key["productquantity"] + $_POST["productquantity"];

                    $new = true;
                }
            }

            if($new == false)
            {
                $value = count($_SESSION["cart"]);
                $_SESSION["cart"][$value] = $_POST;                    
            }
        } 
        else 
        {
            $_SESSION["cart"][0] = $_POST;
        }

        $_SESSION["add"] = "success";
        echo "<script> location.replace('index.php') </script>";
    }
    else
    {
        echo "<script> location.replace('login.php') </script>";
    }
}
