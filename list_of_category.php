
<?php   
  require_once 'dbconnection.php';
  //session_start();

 // $user_first_name= $_SESSION['user_first_name'];
  //$user_last_name=  $_SESSION['user_last_name'];
  
  //if(!empty($user_first_name) && !empty($user_last_name)){     


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List_of_Category</title>
         
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
                           <h1 class="text-center text-success">All Category</h1>                                  
                                             <?php      

                                                $sql= "SELECT * FROM category";
                                                $query=$conn->query($sql);

                                             ?>

                             <table  class="table table-bordered w-80">
                                         <tr class="table-primary">
                                                <th>SL</th>
                                                <th>Category</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                        </tr>

                                                <?php                  
                                                while( $data=mysqli_fetch_assoc($query))

                                                {
                                                ?>
                                            <tr class="table-success">
                                                <td>  <?php echo  $data['category_id'] ?> </td>
                                                <td> <?php echo $data['category_name'] ?></td>
                                                <td> <?php echo $data['category_entrydate'] ?></td>
                                                <td>
                                                    <a href="edit_category.php?id= <?php echo  $data['category_id'] ?>">Edit</a><br>
                                                    
                                                </td>
                                          </tr>
                                                <?php 
                                                }
                                                ?>
                                     </table>

                                                </form>  
                                               
                     </div><!--end of right side -->
            </div>
            <div class="container-fluid border-top border-success">   <!-- start of bottom -->
            <?php include('bottombar.php') ?>   
            </div><!-- end of bottom -->

        </div>   <!-- end of continer -->

         



    
</body>
</html>


<?php 
  //}else{
//    header("location:login.php");
 //  }
//

?> 