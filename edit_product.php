
<?php   
  require_once 'dbconnection.php';

  
  //session_start();

  //$user_first_name= $_SESSION['user_first_name'];
    //$user_last_name=  $_SESSION['user_last_name'];
  
  //if(!empty($user_first_name) && !empty($user_last_name)){     
  


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit_Product</title>
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

                                    if(isset($_GET['id'])){
                                          $getid=$_GET['id'];

                                            $sql="SELECT * FROM product WHERE product_id=$getid";
                                            $query=$conn->query($sql);
                                            $data=mysqli_fetch_assoc($query);


                                            $product_id=$data['product_id'];
                                            $product_name=$data['product_name'];
                                            $product_category=$data['product_category'];
                                            $product_code=$data['product_code'];
                                            $product_entrydate	=$data['product_entrydate'];

                                    }


                                    ?>

                                    <?php 

                                    $sql="SELECT * FROM category";
                                    $query=$conn->query($sql);


                                    ?>

                                    <?php 

                                    if(isset($_GET['product_name'])){

                                    $new_product_name=$_GET['product_name'];
                                    $new_product_category=$_GET['product_category'];
                                    $new_product_code=$_GET['product_code'];
                                    $new_product_entrydate=$_GET['product_entrydate'];
                                    $new_product_id=$_GET['product_id'];

                                    $sql1= "UPDATE product SET product_name='$new_product_name', product_category='$new_product_category',product_code='$new_product_code',product_entrydate='$new_product_entrydate' WHERE product_id =$new_product_id";

                                    $query1=$conn->query($sql1);
                                    if($query1){
                                      echo "update seccefully";
                                    }else{
                                      echo "not update".$conn->error;
                                    }

                                    }





                                    ?>


                                     <h1 class="text-success text-center">Update Product</h1>
                                    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">

                                   <label for="" class="">Product Name:</label>   <br>
                                    <input type="text" value="<?php echo $product_id ?>" name="product_id" hidden > 
                                    <input type="text" value="<?php echo $product_name ?>" name="product_name" class="form-control" required> <br>
                                           <label for="">Product Category:</label>   <br>
                                            <select name="product_category" class="form-select">
                                          <?php

                                          while($data= mysqli_fetch_assoc($query)){
                                          $category_name=$data['category_name'];
                                          $category_id=$data['category_id'];
                                          ?>



                                              <option value='<?php echo $category_id ?>' <?php  if($category_id==$product_category){ echo "selected";} ?>> <?php echo $category_name ?>   </option>;
                                        <?php   } ?>
                                      
                                      </select><br>                        

                                     <label for="">Product Code:</label> <br>
                                    <input type="text" name="product_code" value="<?php echo $product_code ?>" required class="form-control"> <br>
                                   <label for="">Projuct Entry Date:</label> <br>
                                    <input type="DATE" name="product_entrydate" value="<?php echo $product_entrydate ?>" required class="form-control"> <br> 
                                    <input type="submit" value="Update Product" name="submit" class="btn btn-success">



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
 // }else{
 //   header("location:login.php");
//}


?>