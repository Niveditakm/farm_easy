<?php
session_start();
require "config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (isset($_SESSION["user"])) 
    {
        if (isset($_SESSION["cart"])) 
        {
            unset($_SESSION["cart"]);
        } 
        $_SESSION["remove"] = "success";
        echo "<script> location.replace('cart.php') </script>";
    }
}
