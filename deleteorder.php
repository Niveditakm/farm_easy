<?php 
session_start();

include "config/database.php";

$id = 0;

if(isset($_POST['butdel'])){
   $id = mysqli_real_escape_string($link,$_POST['butdel']);
}
else
{
    echo"<script> location.replace('orders.php') </script>";
}

if($id > 0){

  // Check record exists
  $checkRecord = mysqli_query($link,"SELECT * FROM farm_2021_order WHERE id=".$id);

  $totalrows = mysqli_num_rows($checkRecord);

  $row = mysqli_fetch_array($checkRecord);

  $quantity = $row["farm_2021_order_quantity"];
  $name = $row["farm_2021_order_name"];
  $farmer = $row["farm_2021_order_farmer"];

  if($totalrows > 0)
  {
	  
    $query = "DELETE FROM farm_2021_order WHERE id=".$id;
    mysqli_query($link,$query);
	  
    $query = "UPDATE farm_2021_product SET farm_2021_product_quantity = farm_2021_product_quantity + $quantity , farm_2021_product_status = IF(farm_2021_product_quantity != 0,'Available','Unavailable') WHERE farm_2021_product_name = '$name' AND farm_2021_product_farmer = '$farmer'";
    mysqli_query($link,$query);
	
	$_SESSION["remove"] = 'success';
    echo"<script> location.replace('orders.php') </script>";
   
  }
  else
  {
    $_SESSION["remove"] = 'failed';
    echo"<script> location.replace('orders.php') </script>";
  }
}
?>