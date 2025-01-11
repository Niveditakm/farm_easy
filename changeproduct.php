<?php 
session_start();

include "../config/database.php";


if($_SERVER["REQUEST_METHOD"] == "POST")
{
  
  $name = $_POST['name'];
  $category = $_POST['category'];
  $quantity = $_POST['quantity'];
  $price = $_POST['price'];
  $id = $_POST['butsave'];
    
     if($_FILES["getFile"]["size"]!==0)
   {
      $errors = null;
      $file_name = $_FILES['getFile']['name'];
      $file_size = $_FILES['getFile']['size'];
      $file_tmp = $_FILES['getFile']['tmp_name'];
      $file_type = $_FILES['getFile']['type'];
      // $file_ext = strtolower(end(explode('.',$_FILES['getFile']['name'])));
	  $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false)
      {
         $errors = "extension not allowed, please choose a JPEG or PNG file.";
      }
           
      if(empty($errors)==true)
      {
         move_uploaded_file($file_tmp,"../images/".$file_name);
		 
         $path="images/".$file_name;
         
         $qryimg = "update farm_2021_product set farm_2021_product_image='$path',farm_2021_product_price='$price',farm_2021_product_category='$category',farm_2021_product_quantity='$quantity' where id='$id'";
         
		 if(mysqli_query($link,$qryimg))
         {
            $_SESSION["edit"] = 'success';
            echo"<script> location.replace('editproduct.php') </script>";
         }
         else
         {
            $_SESSION["edit"] = 'failed';
            echo"<script> location.replace('editproduct.php') </script>";
         }

	  }
      else
      {
        $_SESSION["edit"] = 'failed';
        echo"<script> location.replace('editproduct.php') </script>";
      }

   }
   else
   {      
	      
      $query = "update farm_2021_product set farm_2021_product_price='$price',farm_2021_product_category='$category',farm_2021_product_quantity='$quantity' where id='$id'";
	
      if(mysqli_query($link,$query))
      {
         $_SESSION["edit"] = 'success';
         echo"<script> location.replace('editproduct.php') </script>";
      }
      else
      {
         $_SESSION["edit"] = 'failed';
         echo"<script> location.replace('editproduct.php') </script>";
      }

    }
   
 
}
