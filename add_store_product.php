
<?php   
  require ('dbconnection.php');


              function data_list($table, $column1,$column2){

                require ('dbconnection.php');
                    $sql="SELECT * FROM $table";
                    $query=$conn->query($sql);

                    while($data= mysqli_fetch_assoc($query)){
                      $data_id=$data[$column1];
                      $data_name=$data[$column2];
                     
                    
                        echo "<option value='$data_id'>$data_name </option>";
                      }
                    }
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
    <title>Store_Product</title>
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
                    <h1 class="text-center text-success">Add Store Product</h1>
                                          
                                   <?php      

                                  if(isset($_GET['store_product_name'] )){

                                    
                                    $store_product_name= $_GET['store_product_name'];
                                    $store_product_quantity= $_GET['store_product_quantity'];
                                    $store_product_entrydate= $_GET['store_product_entrydate'];
                                    
                                    // $category_entrydate= date('d-m-Y', strtotime($_GET['category_entrydate'])) ;



                                  $sql= "INSERT INTO store_product(store_product_name,store_product_quantity,store_product_entrydate	) VALUES ('$store_product_name','$store_product_quantity','$store_product_entrydate')";


                                  if ($conn->query($sql) == TRUE) {
                                      echo "DATA INSERT ";
                                   //   header("location:add_store_product.php");

                                    } else{
                                        echo "data ont inset";
                                    }
                                  
                                  }


                                  ?>





                                  <form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">

                              <div class="">
                                  <label class="form-label">Product Name:</label>
                                  
                              </div>
                                 
                                        <select name="store_product_name" class="form form-select mb-3" >
                                          
                                          <?php
                                                  data_list('product','product_id','product_name');
                                            
                                            ?>


                                          
                                        </select>   
                                        <div class="mb-3">
                                           <label class="form-label">Product Quantity:</label>    
                                           <input type="text" name="store_product_quantity" class="form-control" required>                             
                                          </div>  

                                        <div class="mb-3">
                                           <label class="form-label">Product Entry Date:</label>    
                                           <input type="DATE" name="store_product_entrydate" class="form-control" required>                             
                                          </div>                      
                                      
                                   
                                   
                                 
                                      <input type="submit" value="Add Store Product" name="submit" class="btn btn-success">



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