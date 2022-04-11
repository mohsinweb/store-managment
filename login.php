
<?php   
  require_once 'dbconnection.php';

  session_start();

$user_first_name= $_SESSION['user_first_name'];
  $user_last_name=  $_SESSION['user_last_name'];

  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />    

</head>
<body>




                      

<div class="container bg-light">
            <div class="container-fluid border-bottom border-success"><!-- topbar -->
            <div class="row p-3">
                    <div class="col-sm-9">
                             <h1 class=""> <a href="index.php" class="text-decoration-none text-success">Store Managment System</a> </h1>
                    </div>
                    
                </div>
                    
            </div><!-- topbar -->
            <div class="container-fluid">
                <div class="row"><!-- Start of row -->                            
                    <div class="col-sm-3 bg-light p-0 m-0"><!-- Start of left side -->

                            <?php include('leftsidebar.php') ?>      

                    </div>    <!-- end of left side -->




                    <div class="col-sm-9 p-5 border-start border-success"><!-- Start of right side -->
                    <?php      

                                  if(isset($_POST['submit'] )){

                                    
                                    
                                    $user_email=$_POST['user_email'];
                                    $user_password=$_POST['user_password'];




                                  $sql= "SELECT * FROM users WHERE user_email='$user_email' AND user_password='$user_password'";

                                  $query= $conn->query($sql);


                                  if(mysqli_num_rows($query)>0){

                                    $data= mysqli_fetch_array($query);

                                    $user_first_name= $data['user_first_name'];
                                    $user_last_name= $data['user_last_name'];
                                    
                                    $_SESSION['user_first_name']=$user_first_name;
                                    $_SESSION['user_last_name']=$user_last_name;

                                  

                                   //   header("location:index.php");

                                     
                                  }else{
                                      echo "somethins went wrong";
                                  }

                                  }                

                                  ?>



                                  <h1 class="text-success">If You are registered. Please Login Here</h1>

                                  <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">

                                  <b>User Email:</b> <br>
                                      <input type="email" name="user_email" required class="form-control w-50"> 
                                  <b>Password:</b>  <br>
                                      <input type="password" name="user_password" required class="form-control w-50 mb-2" > 
                                                  
                                  <input type="submit" value="log_in" name="submit" class="btn btn-success">

                                  </form>   
                                         
                                         
                     </div>   <!--end of right side -->
            </div>
            <div class="container-fluid border-top border-success">   <!-- start of bottom -->
            <?php include('bottombar.php') ?>   
            </div><!-- end of bottom -->

        </div>   <!-- end of continer -->






          
</body>
</html>