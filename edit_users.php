
<?php   
  require_once 'dbconnection.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit_Category</title>
</head>
<body>

            <?php      

            //fetch data from database and show in form

                   if(isset($_GET['id'])){
                       $getid=$_GET['id'];


                       $sql="SELECT * FROM users WHERE user_id=$getid";
                       $query=$conn->query($sql);
                      $data=mysqli_fetch_assoc($query);
                   

                      $user_id =$data['user_id'];
                      $user_first_name=$data['user_first_name'];
                      $user_last_name=$data['user_last_name'];
                      $user_email=$data['user_email'];
                      

                   }


                  // update data 
                   if(isset($_GET['user_first_name'])){

                    $new_user_first_name= $_GET['user_first_name'];
                    $new_user_last_name= $_GET['user_last_name'];
                    $new_user_email= $_GET['user_email'];

                    $new_user_id= $_GET['user_id'];


                    $result=" UPDATE users SET 
                    user_first_name='$new_user_first_name',
                    user_last_name='$new_user_last_name',
                    user_email='$new_user_email'                  
                    WHERE user_id ='$new_user_id'                   
                        ";


                        if($conn->query($result)==TRUE){
                            echo "Update secceffuly";
                         //   header("location:edit_category.php");
                        }else{
                            echo "not update".$conn->error;
                        }

                   }
              
            ?>

            <?php 
            
            // if(isset($_GET['id'])){
            //     $st=$_GET['id'];

            //     $sql1= "DELETE FROM users WHERE user_id='$st'";
            //     $query =$conn->query($sql1);

            //     if( $query ){
            //             header("location:list_of_users.php");
            //     }
            // }
            
            
            
            ?>





                    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">

                    <b>User First Name:</b>  <br>
                        <input type="text" name="user_first_name" required  value="<?php echo $user_first_name?>"> <br><br>
                    <b>User Last Name:</b>  <br>
                        <input type="text" name="user_last_name" required value="<?php echo $user_last_name?>"> <br><br>
                    <b>User Email:</b>  <br>
                        <input type="email" name="user_email" required value="<?php echo $user_email?>"> <br><br>
                        <input type="number" name="user_id" required hidden value="<?php echo $user_id?>"> <br><br>
                  



                    <input type="submit" value="Update" name="submit">



</form>
    
</body>
</html>