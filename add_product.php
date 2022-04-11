
<?php   
  require_once 'dbconnection.php';
  session_start();

  $user_first_name= $_SESSION['user_first_name'];
  $user_last_name=  $_SESSION['user_last_name'];
  
  if(!empty($user_first_name) && !empty($user_last_name)){     



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>



<div class="container bg-light">
            <div class="container-fluid border-bottom border-success"><!-- topbar -->
                   <?php include('topbar.php') ?>
                    
            </div><!-- topbar -->
            <div class="container-fluid">
                <div class="row"><!-- Start of row -->                            
                    <div class="col-sm-3 bg-light p-0 m-0"><!-- Start of left side -->

                            <?php include('leftsidebar.php') ?>      

                    </div>    <!-- end of left side -->




                    <div class="col-sm-9 p-5 border-start border-success"><!-- Start of right side -->
                    <?php      

                            if(isset($_GET['submit'] )){
                              
                              $product_name= $_GET['product_name'];
                              $product_category= $_GET['product_category'];
                              $product_code= $_GET['product_code'];
                              $product_entrydate=$_GET['product_entrydate'];
                              // $category_entrydate= date('d-m-Y', strtotime($_GET['category_entrydate'])) ;

                            $sql= "INSERT INTO product(product_name,product_category,product_code,product_entrydate	) VALUES ('$product_name','$product_category','$product_code','$product_entrydate')";

                            if ($conn->query($sql) == TRUE) {
                                echo "Product Insert Succefully";
                               // header("location:add_product.php");

                              } else{
                                  echo "data ont inset";
                              }
                            
                            }
                            //  

                            ?>

                            <?php 

                                $sql="SELECT * FROM category";
                                $query=$conn->query($sql);


                            ?>

                                  <h1 class="text-center text-success">Add Product</h1>

                            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">

                            <label  class="form-label">Product Name: </label>
                                <input type="text" name="product_name" required class="form-control"> <br>
                                <label class="form-label">Product Category: </label>
                                  <select name="product_category" >
                                      <?php

                                      while($data= mysqli_fetch_assoc($query)){
                                      $category_name=$data['category_name'];
                                      $category_id=$data['category_id'];
                                      
                                        echo "<option value='$category_id'>$category_name </option>";
                                        }
                                      
                                      ?>


                                    
                                  </select> <br>               
                              
                                  <label for="exampleInputEmail1" class="form-label">Product Code: </label>
                                 <input type="text" name="product_code" required class="form-control"> <br>
                                 
                                 <label for="exampleInputEmail1" class="form-label">Product Entry Date: </label>
                                <input type="DATE" name="product_entrydate" required class="form-control"> <br>
                                
                                <input type="submit" value="Add Product" name="submit" class="btn btn-success">



                            </form>
                                         
                     </div>   <!--end of right side -->
            </div>
            <div class="container-fluid border-top border-success">   <!-- start of bottom -->
            <?php include('bottombar.php') ?>   
            </div><!-- end of bottom -->

        </div>   <!-- end of continer -->






           
    
</body>
</html>

<?php 
  }else{
    header("location:login.php");
   }


?>