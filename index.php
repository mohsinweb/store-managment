
<?php   
        
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
    <title>index</title>
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




                    <div class="col-sm-9 p-5 border-start border-success"><!-- Start of left side -->
                        <div class="row p-4 border-bottom border-success">
                            <div class="col-sm-3">
                                      <a href="add_category.php">
                                          <i class="fa-solid fa-folder-plus text-success display-1">
                                          </i>
                                    </a>  
                                   <h6 class="text-success">Add Category</h6> 
                            </div>
                            <div class="col-sm-3">
                                  
                                 <a href="list_of_category.php"><i class="fa-solid fa-folder-open text-success display-1"></i></a> 
                                 <h6 class="text-success"> Category List</h6> 
                            </div>
                            <div class="col-sm-3">
                                     
                                      <a href="add_product.php"><i class="fa-solid fa-box text-success display-1"></i>
                                    </a>  
                                   <h6 class="text-success">Add Product</h6> 
                            </div>
                            <div class="col-sm-3">
                                  
                                 <a href="list_of_product.php"><i class="fa-solid fa-clipboard-list text-success display-1"></i></a> 
                                 <h6 class="text-success"> Product List</h6> 
                            </div>
                            </div>
                            <div class="row p-3 border-bottom border-success">
                                    <div class="col-sm-3">
                                            <a href="add_store_product.php"><i class="fa-solid fa-store text-success display-1"></i></a> 
                                            
                                            <h6 class="text-success">Add Store Product</h6> 
                                    </div>
                                    <div class="col-sm-3">
                                            <a href="list_of_entry_store_product.php"><i class="fa-solid fa-store text-success display-1"></i></a> 
                                           
                                            
                                            <h6 class="text-success">List Of Store Product</h6> 
                                    </div>
                                    <div class="col-sm-3">
                                            <a href="spend_store_product.php"><i class="fa-solid fa-folder-minus text-success display-1"></i></a> 
                                                                                   
                                            <h6 class="text-success">Add Spend Product</h6> 
                                    </div>
                                    <div class="col-sm-3">
                                            <a href="list_of_spend_product.php"><i class="fa-solid fa-bars-staggered text-success display-1"></i></a>
                                            
                                                                                   
                                            <h6 class="text-success">List  Spend Product</h6> 
                                    </div>


                            </div>
                            <div class="row p-3 border-bottom border-success">
                                    <div class="col-sm-3">
                                            <a href="report.php"><i class="fa-solid fa-chart-column text-success display-1"></i></a> 
                                            
                                            
                                            <h6 class="text-success">Reportt</h6> 
                                    </div>

                            </div>
                            <div class="row p-3 border-bottom border-success">
                                    <div class="col-sm-3">
                                            <a href="user.php"><i class="fa-solid fa-user-plus text-success display-1"></i></a> 
                                            
                                            
                                            <h6 class="text-success">Add User</h6> 
                                    </div>
                                    <div class="col-sm-3">
                                            <a href="list_of_user.php"><i class="fa-solid fa-users text-success display-1"></i></a> 
                                            
                                            
                                            <h6 class="text-success"> User List</h6> 
                                    </div>

                            
                    </div>
                        
                    </div>
                </div><!--end of left side -->
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