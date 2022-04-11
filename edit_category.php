
<?php   
  require_once 'dbconnection.php';
  //session_start();

 // $user_first_name= $_SESSION['user_first_name'];
 // $user_last_name=  $_SESSION['user_last_name'];
  
 // if(!empty($user_first_name) && !empty($user_last_name)){     
  


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit_Category</title>
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


                                           $sql="SELECT * FROM category WHERE category_id=$getid";
                                            $query=$conn->query($sql);
                                        $data=mysqli_fetch_assoc($query);


                                        $category_id=$data['category_id'];
                                        $category_name=$data['category_name'];
                                        $category_entrydate=$data['category_entrydate'];

                                        }
                                        $new_category_name="";
                                        if(isset($_GET['category_name'])){

                                        $new_category_name= $_GET['category_name'];
                                        $new_category_entrydate= $_GET['category_entrydate'];
                                        $new_categoryid= $_GET['category_id'];


                                        $result="  UPDATE category SET 
                                        category_name='$new_category_name',
                                        category_entrydate='$new_category_entrydate'                  
                                        WHERE category_id =$new_categoryid                   
                                            ";


                                            if($conn->query($result)==TRUE){
                                                echo "Update secceffuly";
                                            //   header("location:edit_category.php");
                                            }else{
                                                echo "not update";
                                            }

                                        }

                                        ?>




                                        <h1 class="text-center text-success ">Update Category</h1>
                                 <form action="edit_category.php" method="GET">

                                        <b>Category:</b>  <br>
                                            <input type="text" name="category_name" class="form-control" value="<?php echo $category_name?>" required> <br>
                                        <b>Entry Date:</b> <br>
                                        <input type="DATE" name="category_entrydate"  class="form-control" value="<?php echo $category_entrydate?>"  required> <br>
                                        <input type="text" name="category_id"  class="form-control" value="<?php echo $category_id?>"  hidden> 
                                        <input type="submit" value="update Category" name="submit" class="btn btn-success">



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
//  }else{
 //   header("location:login.php");
  // }


?>
